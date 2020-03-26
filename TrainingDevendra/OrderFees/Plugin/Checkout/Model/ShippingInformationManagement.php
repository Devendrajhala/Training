<?php
namespace TrainingDevendra\OrderFees\Plugin\Checkout\Model;


class ShippingInformationManagement
{
    /**
     * @var \Magento\Quote\Model\QuoteRepository
     */
    protected $quoteRepository;

    /**
     * @var \TrainingDevendra\OrderFees\Helper\Data
     */
    protected $dataHelper;

    /**
     * @param \Magento\Quote\Model\QuoteRepository $quoteRepository
     * @param \TrainingDevendra\OrderFees\Helper\Data $dataHelper
     */
    public function __construct(
        \Magento\Quote\Model\QuoteRepository $quoteRepository,
        \TrainingDevendra\OrderFees\Helper\Data $dataHelper
    )
    {
        $this->quoteRepository = $quoteRepository;
        $this->dataHelper = $dataHelper;
    }

    /**
     * @param \Magento\Checkout\Model\ShippingInformationManagement $subject
     * @param $cartId
     * @param \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
     */
    public function beforeSaveAddressInformation(
        \Magento\Checkout\Model\ShippingInformationManagement $subject,
        $cartId,
        \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
    )
    {
        $customFee = $addressInformation->getExtensionAttributes()->getFee();
        $quote = $this->quoteRepository->getActive($cartId);
        if ($customFee) {
            $fee = $this->dataHelper->getCustomFee();
            $subTotal = $quote->getSubtotal();
            $fee =$subTotal*($fee/100);

            $quote->setFee($fee);
        } else {
            $quote->setFee(NULL);
        }
    }
}

