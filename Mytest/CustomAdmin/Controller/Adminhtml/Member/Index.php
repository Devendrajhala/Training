<?php


namespace Mytest\CustomAdmin\Controller\Adminhtml\Member;

use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{

    protected $pageFactory;
    /**
     * @var Action\Context
     */
    private $context;

    /**
     * Index constructor.
     * @param PageFactory $pageFactory
     * @param Action\Context $context
     */
    public function __construct(PageFactory $pageFactory, Action\Context $context)
    {
        $this->pageFactory=$pageFactory;
        parent::__construct($context);

    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        // TODO: Implement execute() method.
        return $this->pageFactory->create();
    }
}