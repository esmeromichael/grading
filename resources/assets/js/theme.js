$(function() {
    if ($('#text_nav_h').length && $('#text_nav_h').is(':visible')) {
        //* sub-level menu

        $("#text_nav_h").jMenu({
            openClick : (is_touch_device()) ? true : false,
            ulWidth : 200,
            absoluteTop : 31,
            absoluteLeft : 0,
            effects : {
                effectSpeedOpen : 100,
                effectSpeedClose : 100,
                effectTypeOpen : 'show',
                effectTypeClose : 'hide',
                effectOpen : 'linear',
                effectClose : 'linear'
            },
            TimeBeforeOpening : 100,
            TimeBeforeClosing : 100,
            animatedText : false
        });

        //* add arrow to navigation parent
        $('#text_nav_h a.fNiv').each(function() {
            if($(this).next('ul').length) {
                $(this).addClass('isTopParent').append('<i class="fa fa-angle-down"></i>')
            }
        });

        $('#text_nav_h ul a.isParent').each(function() {
            $(this).append('<i class="fa fa-angle-right"></i>');
        });

        //* add "active" class on mouseenter
        $('#text_nav_h li').on('mouseenter',function() {
            $(this).addClass('active');
        }).on('mouseleave',function() {
            $(this).removeClass('active');
        });
    }

    if ($('#side_fixed_nav').length) {
        $("#text_nav_side_fixed").tinyNav({
            target: $('#mobile_navigation'),
            active: 'link_active'
        });
    }

    if ($('#text_nav_h').length) {
        $("#text_nav_h").tinyNav({
            target: $('#mobile_navigation'),
            active: 'link_active'
        });
    }

    $('#mobile_navigation select').addClass('form-control').wrap('<div class="container" />');

    //* detect touch devices
    function is_touch_device() {
        return !!('ontouchstart' in window);
    };
});
