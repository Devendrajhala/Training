<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */


namespace Mytest\CustomAdmin\Api\Data;


interface AffiliateMemberInterface
{
    const ID='entity_id';

    const NAME='name';

    const ADDRESS='address';

    const STATUS ='status';

    const PHONE_NUMBER='phone_number';

    const CREATED_AT= 'created_at';

    const UPDATED_AT='updated_at';

    /**
     * @return integer
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return boolean
     */
    public function getStatus();

    /**
     * @return string
     */
    public function getAddress();

    /**
     * @return string
     */
    public function getPhoneNumber();

    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @return string
     */
    public function getUpdatedAt();

    /**
     * @param $id
     * @return \Mytest\CustomAdmin\Api\Data\AffiliateMemberInterface
     */
    public function setId($id);

    /**
     * @param $name
     * @return \Mytest\CustomAdmin\Api\Data\AffiliateMemberInterface
     */
    public function setName($name);

    /**
     * @param $status
     * @return \Mytest\CustomAdmin\Api\Data\AffiliateMemberInterface
     */
    public function setStatus($status);

    /**
     * @param $address
     * @return \Mytest\CustomAdmin\Api\Data\AffiliateMemberInterface
     */
    public function setAddress($address);

    /**
     * @param $phone_number
     * @return \Mytest\CustomAdmin\Api\Data\AffiliateMemberInterface
     */
    public function setPhoneNumber($phone_number);

    /**
     * @return \Mytest\CustomAdmin\Api\Data\AffiliateMemberExtensionInterface
     */
    public function getExtensionAttribute();

    /**
     * @param \Mytest\CustomAdmin\Api\Data\AffiliateMemberExtensionInterface $affiliateMemberExtension
     * @return $this
     */
    public function setExtensionAttribute(\Mytest\CustomAdmin\Api\Data\AffiliateMemberExtensionInterface $affiliateMemberExtension);

}