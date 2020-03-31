<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */


namespace Mytest\CustomAdmin\Model;

use  Magento\Framework\Api\SearchCriteriaInterface;
use  Mytest\CustomAdmin\Api\AffiliateMemberRepositoryInterface;
use  Mytest\CustomAdmin\Model\ResourceModel\AffiliateMember\CollectionFactory;
use  Mytest\CustomAdmin\Model\AffiliateMemberFactory;
use  Mytest\CustomAdmin\Model\ResourceModel\AffiliateMember;
use  Mytest\CustomAdmin\Api\Data\AffiliateMemberSearchResultInterfaceFactory;
use  Magento\Framework\Api\SearchCriteria\CollectionProcessor;

class AffiliateMemberRespository implements AffiliateMemberRepositoryInterface
{
    private $collectionFactory;
    private $affiliateMemberFactory;
    private $affiliateMember;
    private $affiliateMemberSearchResult;
    private $collectionProcessor;

    /**
     * AffiliateMemberRespository constructor.
     * @param CollectionFactory $collectionFactory
     * @param \Mytest\CustomAdmin\Model\AffiliateMemberFactory $affiliateMemberFactory
     * @param AffiliateMember $affiliateMember
     * @param AffiliateMemberSearchResultInterfaceFactory $affiliateMemberSearchResult
     * @param CollectionProcessor $collectionProcessor
     */
    public function __construct(CollectionFactory $collectionFactory,
                                AffiliateMemberFactory $affiliateMemberFactory,
                                AffiliateMember $affiliateMember,
                                AffiliateMemberSearchResultInterfaceFactory $affiliateMemberSearchResult,
                                CollectionProcessor $collectionProcessor)
    {
        $this->collectionFactory=$collectionFactory;
        $this->affiliateMemberFactory=$affiliateMemberFactory;
        $this->affiliateMember=$affiliateMember;
        $this->affiliateMemberSearchResult=$affiliateMemberSearchResult;
        $this->collectionProcessor=$collectionProcessor;
    }

    /**
     * @return \Magento\Framework\DataObject[]
     */
    public function getList()
    {
        // TODO: Implement getList() method.
        return $this->collectionFactory->create()->getItems();
    }

    /**
     * @param int $id
     * @return \Mytest\CustomAdmin\Api\Data\AffiliateMemberInterface
     */
    public function getAffiliateMemberById($id)
    {
        // TODO: Implement getAffiliateMemberById() method.
        $member=$this->affiliateMemberFactory->create();
        return $member->load($id);
    }

    /**
     * @param \Mytest\CustomAdmin\Api\Data\AffiliateMemberInterface $member
     * @return Mytest\CustomAdmin\Api\Data\AffiliateMemberInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function setAffiliateMember(\Mytest\CustomAdmin\Api\Data\AffiliateMemberInterface $member)
    {
        if($member->getId()==null)
        {
            $this->affiliateMember->save($member);
            return $member;
        }else {

            $newMember=$this->affiliateMemberFactory->create()->load($member->getId());
            foreach ($member->getData() as $key =>$value)
            {
                $newMember->setData($key, $value);
            }
            $this->affiliateMember->save($newMember);
            return $newMember;
        }

    }

    /**
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function deleteById($id)
    {
        $member=$this->affiliateMemberFactory->create()->load($id);
        $member->delete();
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Mytest\CustomAdmin\Api\Data\AffiliateMemberSearchResultInterface
     */
    public function getSearchResultList(SearchCriteriaInterface $searchCriteria)
    {
        // TODO: Implement getSearchResultList() method.
        $collection =$this->affiliateMemberFactory->create()->getCollection();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults = $this->affiliateMemberSearchResult->create();
        $searchResults->getSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getData());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }


}