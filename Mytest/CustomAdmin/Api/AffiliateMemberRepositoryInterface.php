<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */


namespace Mytest\CustomAdmin\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface AffiliateMemberRepositoryInterface
{
    /**
     * @return \Mytest\CustomAdmin\Api\Data\AffiliateMemberInterface[]
     */
    public function getList();

    /**
     * @param  int $id
     * @return \Mytest\CustomAdmin\Api\Data\AffiliateMemberInterface
     */
    public function getAffiliateMemberById($id);

    /**
     * @param int $id
     * @return void
     */
    public function deleteById($id);

    /**
     * @param \Mytest\CustomAdmin\Api\Data\AffiliateMemberInterface $member
     * @return \Mytest\CustomAdmin\Api\Data\AffiliateMemberInterface
     */
    public function setAffiliateMember(\Mytest\CustomAdmin\Api\Data\AffiliateMemberInterface $member);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Mytest\CustomAdmin\Api\Data\AffiliateMemberSearchResultInterface
     */
    public function getSearchResultList(SearchCriteriaInterface $searchCriteria);
}