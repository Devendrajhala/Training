<?php

namespace Mytest\CustomAdmin\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class MemberActions extends Column
{
    /**
     * Url path
     */
    const URL_PATH_EDIT = 'affiliate/member/edit';
    const URL_PATH_DELETE = 'affiliate/member/delete';


    public function __construct(ContextInterface $context,
                                UrlInterface $url,
                                UiComponentFactory $uiComponentFactory,
                                array $components = [],
                                array $data = [])
    {
        $this->url = $url;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['entity_id'])) {
                    $item[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->url->getUrl(
                                static::URL_PATH_EDIT,
                                [
                                    'entity_id' => $item['entity_id']
                                ]
                            ),
                            'label' => __('Edit')
                        ],
                        'delete' => [
                            'href' => $this->url->getUrl(
                                static::URL_PATH_DELETE,
                                [
                                    'id' => $item['entity_id']
                                ]
                            ),
                            'label' => __('Delete'),
                            'confirm' => [
                                'title' => __('Delete ${ $.$data.title }'),
                                'message' => __('Are you sure you wan\'t to delete a ${ $.$data.title } record?')
                            ]
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }
}