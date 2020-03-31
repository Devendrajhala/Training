var config = {
    paths:{
        'Mytest': 'Mytest_CustomAdmin/js/v1'
    },
    config: {
        mixins: {
            'Magento_Catalog/js/catalog-add-to-cart': {
                'Mytest_CustomAdmin/js/add-to-cart-mixin': true
            },
            'Magento_Checkout/js/view/minicart': {
                'Mytest_CustomAdmin/js/minicart-mixin': true
            },
            'Magento_Checkout/js/checkout-data': {
                'Mytest_CustomAdmin/js/checkout-data-mixin': true
            }

        }
    },
    deps: ['Mytest_CustomAdmin/js/log-when-loaded'],
    shim:{
        'Magento_Catalog/js/view/compare-products':{
            deps:['Mytest_CustomAdmin/js/before-compare-products-example']
        }
    },


};



