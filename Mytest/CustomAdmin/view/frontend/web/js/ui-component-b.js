define(['uiComponent'], function (uiComponent) {
    'use strict';

    return uiComponent.extend({
        initialize: function () {
            this._super();
            this.title = "Component B";
            this.novalue = 10;
            console.log(this.novalue);
        },
        defaults:{
            value: 1,
            tracks: {
                value: true
            },
            imports: {
                value: '${ $.provider }:${$.providerProperty}'
            }
        }
    });
});

