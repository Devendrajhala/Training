<?php


namespace Mytest\CustomAdmin\Block\Adminhtml\Member\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton  extends Generic implements ButtonProviderInterface
{

    public function getButtonData()
    {
        // TODO: Implement getButtonData() method.
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'sort_order' => 50
        ];
    }
}