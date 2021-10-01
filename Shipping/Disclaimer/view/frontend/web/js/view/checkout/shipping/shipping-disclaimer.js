/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'uiComponent',
    'Shipping_Disclaimer/js/model/config'

], function (Component, config) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Shipping_Disclaimer/checkout/shipping/shipping-disclaimer'
        },
        config: config()
    });
});
