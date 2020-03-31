<?php


namespace Mytest\CustomAdmin\Model;


use Magento\Framework\Option\ArrayInterface;

class AdminArray implements ArrayInterface
{

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        return [
            ['Value'=> '0', 'label'=> 'First'],
            ['Value'=> '1', 'label'=> 'Second'],
            ['Value'=> '2', 'label'=> 'Third'],
            ['Value'=> '3', 'label'=> 'Fourth'],
            ['Value'=> '4', 'label'=> 'Fifth']
        ];
    }
}