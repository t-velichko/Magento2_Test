/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
define([
    'jquery',
    'mage/smart-keyboard-handler',
    'mage/mage',
    'mage/ie-class-fixer',
    'domReady!app/design/frontend/Velichko/m2theme/web/js/theme'
], function ($, keyboardHandler) {
    'use strict';

    /**
    *   Global Variables
    */
    var $body = $('body'),
        $header = $('header');

    if ($body.hasClass('checkout-cart-index')) {
        if ($('#co-shipping-method-form .fieldset.rates').length > 0 && $('#co-shipping-method-form .fieldset.rates :checked').length === 0) {
            $('#block-shipping').on('collapsiblecreate', function () {
                $('#block-shipping').collapsible('forceActivate');
            });
        }
    }

    $('.cart-summary').mage('sticky', {
        container: '#maincontent'
    });

    $('.panel.header > .header.links').clone().appendTo('#store\\.links');

    keyboardHandler.apply();

    /**
     * Sticky header
     */
    var headerHeight = $header.outerHeight();

    $(window).scroll(function() {
        var scrollTop = $(this).scrollTop();

        if (scrollTop > headerHeight) {
            $header.addClass('sticky');
        } else {
            $header.removeClass('sticky');
        }
    });

    $(window).trigger('scroll');
});
