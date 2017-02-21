/* Custom js */
(function($) {
    // Global variables
    var $desktop = 1200,
        $laptop = 992,
        $tablet = 768,
        $mobile = 480;

    // Custom functions
    var customJS = {
        navMenu: function() {
            var menuItem = $('.menu .menu-item-has-children');
            if(menuItem.length) {
                if($(window).width() > $desktop - 1) {
                    menuItem.on('mouseover', function() {
                        $(this).addClass('hovered');
                    });
                    menuItem.on('mouseout', function() {
                        $(this).removeClass('hovered');
                    });
                }
            }
        },

        customSelect: function() {
            var select = $('select');
            if(select.length) {
                select.selectpicker();
            }
        }
    };

    // Window ready function //
    $(window).ready(function() {
        // Nav menu
        customJS.navMenu();
        // Custom select
        customJS.customSelect();
    });

    // Window load function //
    $(window).load(function() {

    });

    // Window resize function //
    var width = $(window).width(),
        resize = 0;
    $(window).resize(function() {
        var _self = $(this);
        resize++;
        setTimeout(function() {
            resize--;
            if (resize === 0) {
                // Done resize ...
                if (_self.width() !== width) {
                    width = _self.width();
                    // Done resize width ...
                }
            }
        }, 100);
    });

})(jQuery);