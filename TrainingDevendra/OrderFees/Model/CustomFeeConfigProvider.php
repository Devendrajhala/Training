<?php
namespace TrainingDevendra\OrderFees\Model;

use Magento\Checkout\Model\ConfigProviderInterface;

class CustomFeeConfigProvider implements ConfigProviderInterface
{
    /**
     * @var \TrainingDevendra\OrderFees\Helper\Data
     */
    protected $dataHelper;

    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $checkoutSession;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * @param \TrainingDevendra\OrderFees\Helper\Data $dataHelper
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \TrainingDevendra\OrderFees\Helper\Data $dataHelper,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Psr\Log\LoggerInterface $logger

    )
    {
        $this->dataHelper = $dataHelper;
        $this->checkoutSession = $checkoutSession;
        $this->logger = $logger;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        $customFeeConfig = [];
        $enabled = $this->dataHelper->isModuleEnabled();
        $minimumOrderAmount = $this->dataHelper->getMinimumOrderAmount();
        $customFeeConfig['fee_label'] = $this->dataHelper->getFeeLabel();
        $quote = $this->checkoutSession->getQuote();
        $subtotal = $quote->getSubtotal();
        $fee=$subtotal*($this->dataHelper->getCustomFee()/100);
        
        $customFeeConfig['custom_fee_amount'] = $fee;
        $customFeeConfig['show_hide_customfee_block'] = ($enabled && ($minimumOrderAmount <= $subtotal) && $quote->getFee()) ? true : false;
        $customFeeConfig['show_hide_customfee_shipblock'] = ($enabled && ($minimumOrderAmount <= $subtotal)) ? true : false;
        return $customFeeConfig;
    }
}
