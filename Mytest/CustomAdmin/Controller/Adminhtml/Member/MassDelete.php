<?php


namespace Mytest\CustomAdmin\Controller\Adminhtml\Member;

use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Ui\Component\MassAction\Filter;
use Mytest\CustomAdmin\Model\ResourceModel\AffiliateMember\CollectionFactory;
use Magento\Backend\Model\View\Result\RedirectFactory;

class MassDelete extends Action
{

    protected $filter;
    protected $collectionFactory;
    protected $redirectFactory;

    public function __construct(
                    Filter $filter,
                    CollectionFactory $collectionFactory,
                    RedirectFactory $redirectFactory,
                    Action\Context $context)
    {
        $this->filter=$filter;
        $this->collectionFactory=$collectionFactory;
        $this->redirectFactory=$redirectFactory;
        parent::__construct($context);
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute()
    {
        $collection=$this->filter->getCollection($this->collectionFactory->create());
        $size=$collection->getSize();
        foreach ($collection as $item)
        {
            $item->delete();
        }


        $this->messageManager->addSuccessMessage('A total of '.$size.' have been deleted');

        $resultRedirect = $this->redirectFactory->create();

        return $resultRedirect->setPath('*/*/index');
        // TODO: Implement execute() method.
    }
}