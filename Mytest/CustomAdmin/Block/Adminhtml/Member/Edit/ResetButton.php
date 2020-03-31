<?php


namespace Mytest\CustomAdmin\Block\Adminhtml\Member\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class ResetButton extends Generic implements ButtonProviderInterface
{

    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
        // TODO: Implement getButtonData() method.
        return  [
            'label' => __('Reset'),
            'class' => 'reset',
            'on_click' => 'location.reload()',
            'sort_order' => 30
        ];
    }
}