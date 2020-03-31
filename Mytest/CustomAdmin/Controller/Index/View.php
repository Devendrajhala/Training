<?php
 
namespace Mytest\CustomAdmin\Controller\Index;
/*Use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;

use Mytest\CustomAdmin\Model\AffiliateMemberFactory;
use Mytest\CustomAdmin\Model\ResourceModel\AffiliateMember;
use Mytest\CustomAdmin\Model\ResourceModel\AffiliateMember\CollectionFactory;
*/
 
class View  extends \Magento\Framework\App\Action\Action
{
	/*protected $affiliateMemberFactory;
    protected $collectionFactory;
    protected $_resource;

    public function __construct(Context $context, AffiliateMemberFactory $affiliateMemberFactory, array $data = []) {
         $this->affiliateMemberFactory=$affiliateMemberFactory;
         //$this->collectionFactory = $collectionFactory;
         //$this->_resource = $resource;
        parent::__construct($context, $data);
    }*/
	public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();

        /*//$affilateMember =$this->affiliateMemberFactory->create();
        
        //$collection= $affilateMember->getCollection();
        foreach ($collection as $item)
        {

            print_r($item->getData());
            echo "<br>";
        }*/
    }
}