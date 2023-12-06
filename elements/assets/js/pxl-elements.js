( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */

    var Pxl_Global_Animation_Handler = function( $scope, $ ) {
        elementorFrontend.waypoint($scope.find('.pxl-animate'), function () {
            var $animate_el = $(this),
                data = $animate_el.data('settings');
            if(typeof data['animation'] != 'undefined'){
                setTimeout(function () {
                    $animate_el.removeClass('pxl-invisible').addClass('animated ' + data['animation']);
                }, data['animation_delay']);
            }
        });
        elementorFrontend.waypoint($scope.find('.pxl-scroll'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-image-wg.draw-from-top'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-image-wg.draw-from-left'), function () {
            $(this).addClass('pxl-animated');
        });
    };
    function pxlMouseDirection(){
        $('.pxl-grid-direction .item-direction').each(function () {
            $(this).on('mouseenter',function(ev){
                addClass( ev, this, 'mouse-in in' );
            });
            $(this).on('mouseleave',function(ev){
                addClass( ev, this, 'mouse-out out' );
            });
        });

    }
    function getDirection(ev, obj) {
        var w = $(obj).width(),
            h = $(obj).height(),
            x = (ev.pageX - $(obj).offset().left - (w / 2)) * (w > h ? (h / w) : 1),
            y = (ev.pageY - $(obj).offset().top - (h / 2)) * (h > w ? (w / h) : 1),
            d = Math.round( Math.atan2(y, x) / 1.57079633 + 5 ) % 4;
        return d;
    }
    function addClass( ev, obj, state ) {
        var direction = getDirection( ev, obj ),
            class_suffix = null;
        $(obj).removeAttr('class');
        switch ( direction ) {
            case 0 : class_suffix = '-top';    break;
            case 1 : class_suffix = '-right';  break;
            case 2 : class_suffix = '-bottom'; break;
            case 3 : class_suffix = '-left';   break;
        }
        $(obj).addClass( state + class_suffix );
    }
    $.fn.ctDeriction = function () {
    }
    $('.pxl-grid-direction .item-direction').ctDeriction();

    function pxlParticles(){
        /* Section Particles */
        setTimeout(function() {
            $(".pxl-row-particles").each(function() {
                particlesJS($(this).attr('id'), {
                    "particles": {
                        "number": {
                            "value": $(this).data('number'),
                        },
                        "color": {
                            "value": $(this).data('color')
                        },
                        "shape": {
                            "type": "circle",
                        },
                        "size": {
                            "value": $(this).data('size'),
                            "random": $(this).data('size-random'),
                        },
                        "line_linked": {
                            "enable": false,
                        },
                        "move": {
                            "enable": true,
                            "speed": 2,
                            "direction": $(this).data('move-direction'),
                            "random": true,
                            "out_mode": "out",
                        }
                    },
                    "retina_detect": true
                });
            });
        }, 400);
    }

    function pxl_parallax_bg(){
        $(document).find('.pxl-parallax-background').parallaxBackground({
            event: 'mouse_move',
            animation_type: 'shift',
            animate_duration: 2
        });
        $(document).find('.pxl-pll-basic').parallaxBackground();
        $(document).find('.pxl-pll-rotate').parallaxBackground({
            animation_type: 'rotate',
            zoom: 50,
            rotate_perspective: 500
        });
        $(document).find('.pxl-pll-mouse-move').parallaxBackground({
            event: 'mouse_move',
            animation_type: 'shift',
            animate_duration: 2
        });
        $(document).find('.pxl-pll-mouse-move-rotate').parallaxBackground({
            event: 'mouse_move',
            animation_type: 'rotate',
            animate_duration: 1,
            zoom: 70,
            rotate_perspective: 1000
        });
    }

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/global', Pxl_Global_Animation_Handler );
        pxlMouseDirection();
        pxlParticles();
        pxl_parallax_bg();
    } );
} )( jQuery );