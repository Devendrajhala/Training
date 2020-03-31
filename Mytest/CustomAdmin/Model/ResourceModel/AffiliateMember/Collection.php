<?php


namespace Mytest\CustomAdmin\Model\ResourceModel\AffiliateMember;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Mytest\CustomAdmin\Model\AffiliateMember;
use Mytest\CustomAdmin\Model\ResourceModel\AffiliateMember as AffiliateMemberResource;

class Collection extends AbstractCollection
{

    protected $_idFieldName="entity_id";
    /**
     *
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init(
            AffiliateMember::class,
            AffiliateMemberResource::class
        );
    }

}