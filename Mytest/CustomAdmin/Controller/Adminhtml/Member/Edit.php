<?php


namespace Mytest\CustomAdmin\Controller\Adminhtml\Member;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Mytest\CustomAdmin\Model\AffiliateMember;

class Edit extends Action
{
    protected $pageFactory;
    protected $affiliateMember;
    protected $registry;

    public function __construct(PageFactory $pageFactory,
                                AffiliateMember $affiliateMember,
                                Registry $registry,
                                Action\Context $context)
    {
        $this->pageFactory=$pageFactory;
        $this->affiliateMember=$affiliateMember;
        $this->registry=$registry;

        parent::__construct($context);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Mytest_CustomAdmin::parent');
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
        $id=$this->getRequest()->getParam('entity_id');


        $model=$this->affiliateMember;


        if($id)
        {

            $model->load($id);

            if(!$model->getId())
            {
                $this->messageManager->addErrorMessage(__('This member not exit'));
                $result= $this->resultRedirectFactory->create();
                return $result->setPath('affiliate/member/index');
            }
        }

        $data =$this->_getSession()->getFormData(true);

        if(!empty($data))
        {
            $model->setData($data);
        }

        $this->registry->register('member', $model);

        $resultPage= $this->pageFactory->create();

        if($id)
        {
            $resultPage->getConfig()->getTitle()->prepend('Edit');
        }else
        {
            $resultPage->getConfig()->getTitle()->prepend('Add');
        }

        return $resultPage;
    }


}