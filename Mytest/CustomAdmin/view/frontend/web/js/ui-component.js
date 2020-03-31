define(['uiComponent'], function (uiComponent) {
    'use strict';

    return uiComponent.extend({
        initialize: function () {
            this._super();
            this.title = "Observe Now with Property";
            this.additional_charge= 2;
            this.items=[
                {name:'Surprise Box', qty:5, price:1.5},
                {name:'Chunk Box', qty:1, price:7.5}
            ];
            this.rowTotal= item => item.qty * item.price;
            this.total=function () {
                const sum=this.items.map(this.rowTotal)
                    .reduce((acc, total) => acc + total);
                return sum + this.additional_charge;

            };
        }
    });
});

