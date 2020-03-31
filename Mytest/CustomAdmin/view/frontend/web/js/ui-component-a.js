define(['uiComponent'], function (uiComponent) {
    'use strict';

    return uiComponent.extend({
        initialize: function () {
            this._super();
            this.title = "Component A";
            this.additional_charge= 2;
        }
    });
});

