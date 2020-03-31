<?php


namespace Mytest\CustomAdmin\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;


class Status extends Column
{
    /**
     * Status constructor.
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param array $components
     * @param array $data
     */
    public function __construct(ContextInterface $context,
                                UiComponentFactory $uiComponentFactory,
                                array $components=[],
                                array $data=[])
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
         $options = [];
        if(isset($dataSource['data']['items']))
        {


            foreach ($dataSource['data']['items'] as $item)
            {
                if($item['status'] ==1)
                {
                    $options[]= [
                        'label' => 'Yes',
                        'value' => $item['status'],
                    ];
                }else
                    {
                        /** @var TYPE_NAME $options */
                        $options[]= [
                            'label' => 'No',
                            'value' => $item['status'],
                        ];
                    }
            }
        }
        return $options;
    }
}