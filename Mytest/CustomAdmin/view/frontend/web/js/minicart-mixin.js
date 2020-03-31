define([], function () {
    'use strict';

    return function(Minicart){
        return  Minicart.extend({
            update: function (updateCart) {
                console.log('Update minicart successfully intercepted');
                console.log(updateCart);
                return this._super(updateCart);
            }
        })
    }
});
