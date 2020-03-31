define(['uiComponent','Mytest_CustomAdmin/js/counter-state'], function (uiComponent, state) {
    'use strict';

    return uiComponent.extend({
        inc: function(){
            return state.increment;
        },
        increment: function () {
            state.counter += state.increment;
        }
    });
});
