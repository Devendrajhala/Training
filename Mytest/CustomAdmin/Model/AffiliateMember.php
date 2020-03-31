<?php


namespace Mytest\CustomAdmin\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\AbstractExtensibleModel;
use Mytest\CustomAdmin\Model\ResourceModel\AffiliateMember as AffiliateMemberResource;
use Mytest\CustomAdmin\Api\Data\AffiliateMemberInterface;

class AffiliateMember extends AbstractExtensibleModel implements AffiliateMemberInterface
{
    /**
     *
     */
    protected function _construct()
    {
        $this->_init(AffiliateMemberResource::class);
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->getData(AffiliateMemberInterface::ID);
    }

    /**
     * @return string
     */
    public function getName()
    {
        // TODO: Implement getName() method.
        return $this->getData(AffiliateMemberInterface::NAME);
    }

    /**
     * @return boolean
     */
    public function getStatus()
    {
        // TODO: Implement getStatus() method.
        return $this->getData(AffiliateMemberInterface::STATUS);
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        // TODO: Implement getAddress() method.
        return $this->getData(AffiliateMemberInterface::ADDRESS);
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        // TODO: Implement getPhoneNumber() method.
        return $this->getData(AffiliateMemberInterface::PHONE_NUMBER);
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        // TODO: Implement getCreatedAt() method.
        return $this->getData(AffiliateMemberInterface::CREATED_AT);
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        // TODO: Implement getUpdatedAt() method.
        return $this->getData(AffiliateMemberInterface::UPDATED_AT);
    }

    /**
     * @param $name
     * @return \Mytest\CustomAdmin\Api\Data\AffiliateMemberInterface
     */
    public function setName($name)
    {
        // TODO: Implement setName() method.
        $this->setData(AffiliateMemberInterface::NAME, $name);
    }

    /**
     * @param $status
     * @return \Mytest\CustomAdmin\Api\Data\AffiliateMemberInterface
     */
    public function setStatus($status)
    {
        // TODO: Implement setStatus() method.
        $this->setData(AffiliateMemberInterface::STATUS, $status);
    }

    /**
     * @param $address
     * @return \Mytest\CustomAdmin\Api\Data\AffiliateMemberInterface
     */
    public function setAddress($address)
    {
        // TODO: Implement setAddress() method.
        $this->setData(AffiliateMemberInterface::ADDRESS, $address);
    }

    /**
     * @param $phone_number
     * @return \Mytest\CustomAdmin\Api\Data\AffiliateMemberInterface
     */
    public function setPhoneNumber($phone_number)
    {
        // TODO: Implement setPhoneNumber() method.
        $this->setData(AffiliateMemberInterface::PHONE_NUMBER, $phone_number);
    }

    /**
     * @return \Mytest\CustomAdmin\Api\Data\AffiliateMemberExtensionInterface
     */
    public function getExtensionAttribute()
    {
       return $this->_getExtensionAttributes();
    }

    /**
     * @param \Mytest\CustomAdmin\Api\Data\AffiliateMemberExtensionInterface $affiliateMemberExtension
     * @return $this
     */
    public function setExtensionAttribute(\Mytest\CustomAdmin\Api\Data\AffiliateMemberExtensionInterface $affiliateMemberExtension)
    {
        return $this->_setExtensionAttributes($affiliateMemberExtension);
    }
}