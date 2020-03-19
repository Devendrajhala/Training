<?php

namespace TrainingDevendra\StaticBlock\Controller\Index;

class Display extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    /**
     * Display constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }
    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return void
     */
    public function execute()
    {
        return $this->_pageFactory->create();
        // TODO: Implement execute() method.
    }
}
