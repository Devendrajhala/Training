<?php


namespace Mytest\CustomAdmin\Api\Data;


use Magento\Framework\Data\SearchResultInterface;

interface AffiliateMemberSearchResultInterface extends SearchResultInterface
{

    /**
     * @return \Magento\Framework\Api\ExtensibleDataInterface[]
     */
    public function getItems();

    /**
     * @param array $items
     * @return SearchResultInterface
     */
    public function setItems(array $items);

}