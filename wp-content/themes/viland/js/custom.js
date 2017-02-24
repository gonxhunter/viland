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

        scrollDown: function() {
            var scrollBtn = $('.scroll-down'),
                findTour = $('.find-tour');
            if(scrollBtn.length) {
                scrollBtn.on('click', function(e) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: findTour.offset().top
                    }, 500);
                });
            }
        },

        customSelect: function() {
            var select = $('select');
            if(select.length) {
                select.selectBox({
                    mobile: true
                });
            }
        },

        gridTourType: function() {
            var typeList = $('.categories-tour .categories-package'),
                typeItem = $('.item', typeList);
            if(typeItem.length) {
                typeList.masonry({
                    itemSelector: '.item',
                    gutter: 10
                });
            }
        },

        testimonialSlider: function() {
            var testList = $('.testimonials .test-list');
            if(testList.length) {
                testList.slick({
                    slide: 'li'
                });
            }
        },

        travelTab: function() {
            var tabLink = $('.menu-tab-travel a'),
                tabContent = $('.tab-content');
            if(tabLink.length) {
                tabLink.on('click', function(e) {
                    e.preventDefault();
                    tabLink.closest('li').removeClass('active');
                    $(this).closest('li').addClass('active');

                    var tabItem = $(this).attr('href');
                    tabContent.children('.tab-pane').removeClass('active');
                    tabContent.children(tabItem).addClass('active');
                });
            }
        }
    };

    // Window ready function //
    $(window).ready(function() {
        // Nav menu
        customJS.navMenu();

        // Scroll down
        customJS.scrollDown();

        // Custom select
        customJS.customSelect();
    });

    // Window load function //
    $(window).load(function() {
        // Grid tour type
        //customJS.gridTourType();

        // Testimonial slider
        customJS.testimonialSlider();

        // Travel tab
        customJS.travelTab();
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