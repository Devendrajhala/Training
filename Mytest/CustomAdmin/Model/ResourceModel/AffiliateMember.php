<?php


namespace Mytest\CustomAdmin\Model\ResourceModel;

use  Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\AbstractModel;

class AffiliateMember extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('affiliate_member','entity_id');
    }
}