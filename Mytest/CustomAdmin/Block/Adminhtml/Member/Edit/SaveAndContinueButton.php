<?php


namespace Mytest\CustomAdmin\Block\Adminhtml\Member\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveAndContinueButton extends Generic implements ButtonProviderInterface
{

    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
        // TODO: Implement getButtonData() method.
        return [
            'label' => __('Save And  Continue'),
            'class' => 'save',
            'sort_order' => 40
        ];
    }
}