<?php


namespace Mytest\CustomAdmin\Controller\Adminhtml\Member;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Mytest\CustomAdmin\Model\AffiliateMember;
use Magento\Framework\Controller\Result\JsonFactory;

class InlineEdit extends Action
{

    protected $affiliateMember;
    protected $jsonFactory;
    /**
     * InlineEdit constructor.
     * @param AffiliateMember $affiliateMember
     * @param JsonFactory $jsonFactory
     * @param Action\Context $context
     */
    public function __construct(
                    AffiliateMember $affiliateMember,
                    JsonFactory $jsonFactory,
                    Action\Context $context)
    {
        $this->affiliateMember=$affiliateMember;
        $this->jsonFactory=$jsonFactory;
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
        $resultJson=$this->jsonFactory->create();
        $error=false;

        $message=[];

        if($this->getRequest()->getParam('isAjax'))
        {
            $postItems=$this->getRequest()->getParam('items', []);

            if(!count($postItems))
            {
                $message[]=__('Please Correct Data');
                $error = true;
            }else
                {
                    foreach (array_keys($postItems) as $modelId)
                    {
                        $model=$this->affiliateMember->load($modelId);
                        try
                        {
                            $model->setData(array_merge($model->getData(), $postItems[$modelId]));
                            $model->save();
                        }catch (\Exception $e)
                        {
                            $message[]=$e->getMessage();
                            $error = true;
                        }
                    }
                }
        }

        return $resultJson->setData([
            'message' => $message,
            'error' => $error
        ]);
    }
}