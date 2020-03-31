<?php
 
namespace Mytest\CustomAdmin\Block;
 
Use Magento\Framework\App\Action\Action;
//use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\ResponseInterface;

use Mytest\CustomAdmin\Model\AffiliateMemberFactory;
use Mytest\CustomAdmin\Model\ResourceModel\AffiliateMember;


class TestListData extends \Magento\Framework\View\Element\Template
{
    
    protected $affiliateMember;
    protected $collectionFactory;
    protected $_resource;

    public function __construct(
          Context $context,
          AffiliateMemberFactory $affiliateMember,
          array $data = []
    ) {
         $this->affiliateMember=$affiliateMember;
         //$this->_resource = $resource;
        parent::__construct($context, $data);
    }
 
    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__(' Member List Page'));
        
        return parent::_prepareLayout();
    }
 
    public function getTestCollection()
    {
         $test =  $this->affiliateMember->create();
         $collection =  $test->getCollection();
         return $collection;
        //return $collection;
    }

    public function getTest() {
       return "Test";
    }
}