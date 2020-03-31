define(['uiComponent','Mytest_CustomAdmin/js/counter-state'], function (uiComponent, state) {
    'use strict';

    return uiComponent.extend({

        value:function(){
            return state.counter;
        }
    });
});
