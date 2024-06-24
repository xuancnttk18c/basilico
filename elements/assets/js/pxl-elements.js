( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    function pxl_section_start_render(){
        var _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
        _elementor.hooks.addFilter( 'pxl_section_start_render', function( html, settings, el ) {
            if(typeof settings.pxl_parallax_bg_img != 'undefined' && settings.pxl_parallax_bg_img.url != ''){
                html += '<div class="pxl-section-bg-parallax"></div>';
            }
            if(typeof settings.pxl_bg_ken_burns_bg_img != 'undefined' && settings.pxl_bg_ken_burns_bg_img.url != ''){
                html += '<div class="pxl-section-bg-ken-burns"></div>';
            }
              
            return html;
        } );
    }  
    function pxl_animation_handler( $scope ) {
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
            var $el = $(this),
                data = $el.data('settings');
            if(typeof data != 'undefined'){
                setTimeout(function () {
                    $el.addClass('pxl-animated');
                }, data['animation_delay']);
            }else{
                $el.addClass('pxl-animated');
            }
        });
        elementorFrontend.waypoint($scope.find('.pxl-image-wg.draw-from-left'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-image-wg.draw-from-right'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-image-wg.move-from-left'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-image-wg.move-from-right'), function () {
            $(this).addClass('pxl-animated');
        }); 
        elementorFrontend.waypoint($scope.find('.pxl-image-wg.skew-in'), function () {
            $(this).addClass('pxl-animated');
        });
        elementorFrontend.waypoint($scope.find('.pxl-image-wg.skew-in-right'), function () {
            $(this).addClass('pxl-animated');
        });

    }
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
    function pxl_split_text($scope){
          
        var st = $scope.find(".pxl-split-text");
        if(st.length == 0) return;

        gsap.registerPlugin(SplitText);
        
        st.each(function(index, el) {
           var els = $(el).find('p').length > 0 ? $(el).find('p')[0] : el;
            const pxl_split = new SplitText(els, { 
                type: "lines, words, chars",
                lineThreshold: 0.5,
                linesClass: "split-line"
            });
            var split_type_set = pxl_split.chars;
           
            gsap.set(els, { perspective: 400 });
 
            var settings = {
                scrollTrigger: {
                    trigger: els,
                    toggleActions: "play reverse play reverse", //play reset play reset 
                    start: "top 86%",
                },
                duration: 0.8, 
                stagger: 0.02,
                ease: "power3.out",
            };
            if( $(el).hasClass('split-in-fade') ){
                settings.opacity = 0;
            }
            if( $(el).hasClass('split-in-right') ){
                settings.opacity = 0;
                settings.x = "50";
            }
            if( $(el).hasClass('split-in-left') ){
                settings.opacity = 0;
                settings.x = "-50";
            }
            if( $(el).hasClass('split-in-up') ){
                settings.opacity = 0;
                settings.y = "80";
            }
            if( $(el).hasClass('split-in-down') ){
                settings.opacity = 0;
                settings.y = "-80";
            }
            if( $(el).hasClass('split-in-rotate') ){
                settings.opacity = 0;
                settings.rotateX = "50deg";
            }
            if( $(el).hasClass('split-in-scale') ){
                settings.opacity = 0;
                settings.scale = "0.5";
            }
 
            if( $(el).hasClass('split-lines-transform') ){
                pxl_split.split({
                    type:"lines",
                    lineThreshold: 0.5,
                    linesClass: "split-line"
                }); 
                split_type_set = pxl_split.lines;
                settings.opacity = 0;
                settings.yPercent = 100;
                settings.autoAlpha = 0;
                settings.stagger = 0.1;
            }
            if( $(el).hasClass('split-lines-rotation-x') ){
                pxl_split.split({
                    type:"lines",
                    lineThreshold: 0.5,
                    linesClass: "split-line"
                }); 
                split_type_set = pxl_split.lines;
                settings.opacity = 0;
                settings.rotationX = -120;
                settings.transformOrigin = "top center -50";
                settings.autoAlpha = 0;
                settings.stagger = 0.1;
            }
             
            if( $(el).hasClass('split-words-scale') ){
                pxl_split.split({type:"words"}); 
                split_type_set = pxl_split.words;
               
                $(split_type_set).each(function(index,elw) {
                    gsap.set(elw, {
                        opacity: 0,
                        scale:index % 2 == 0  ? 0 : 2,
                        force3D:true,
                        duration: 0.1,
                        ease: "power3.out",
                        stagger: 0.02,
                    },index * 0.01);
                });

                var pxl_anim = gsap.to(split_type_set, {
                    scrollTrigger: {
                        trigger: el,
                        toggleActions: "play reverse play reverse",
                        start: "top 86%",
                    },
                    rotateX: "0",
                    scale: 1,
                    opacity: 1,
                });
  
            }else{
                var pxl_anim = gsap.from(split_type_set, settings);
            }
             
            if( $(el).hasClass('hover-split-text') ){
                $(el).mouseenter(function(e) {
                    pxl_anim.restart();
                });
            }
        });
    }
    function pxl_split_text_hover(){
        var st = $(document).find(".pxl-split-text-only-hover");
 
        if(st.length == 0) return;
        gsap.registerPlugin(SplitText);
        
        st.each(function(index, el) {
            var els = $(el).find('p').length > 0 ? $(el).find('p')[0] : el; 
            const pxl_split_hover = new SplitText(els, { 
                type: "lines, words, chars",
                lineThreshold: 0.5,
                linesClass: "split-line"
            });
            var split_type_set = pxl_split_hover.chars;
           
            gsap.set(els, { perspective: 400 });
 
            var settings = {
                duration: 0.8, 
                stagger: 0.02,
                ease: "power3.out" //circ.out
            };
            if( $(el).hasClass('split-in-fade') ){
                settings.opacity = 0;
            }
            if( $(el).hasClass('split-in-right') ){
                settings.opacity = 0;
                settings.x = "50";
            }
            if( $(el).hasClass('split-in-left') ){
                settings.opacity = 0;
                settings.x = "-50";
            }
            if( $(el).hasClass('split-in-up') ){
                settings.opacity = 0;
                settings.y = "80";
            }
            if( $(el).hasClass('split-in-down') ){
                settings.opacity = 0;
                settings.y = "-80";
            }
            if( $(el).hasClass('split-in-rotate') ){
                settings.opacity = 0;
                settings.rotateX = "50deg";
            }
            if( $(el).hasClass('split-in-scale') ){
                settings.opacity = 0;
                settings.scale = "0.5";
            }
 
            if( $(el).hasClass('split-lines-transform') ){
                pxl_split_hover.split({
                    type:"lines",
                    lineThreshold: 0.5,
                    linesClass: "split-line"
                }); 
                split_type_set = pxl_split_hover.lines;
                settings.opacity = 0;
                settings.yPercent = 100;
                settings.autoAlpha = 0;
                settings.stagger = 0.1;
            }
            if( $(el).hasClass('split-lines-rotation-x') ){
                pxl_split_hover.split({
                    type:"lines",
                    lineThreshold: 0.5,
                    linesClass: "split-line"
                }); 
                split_type_set = pxl_split_hover.lines;
                settings.opacity = 0;
                settings.rotationX = -120;
                settings.transformOrigin = "top center -50";
                settings.autoAlpha = 0;
                settings.stagger = 0.1;
            }
             
            if( $(el).hasClass('split-words-scale') ){
                pxl_split_hover.split({type:"words"}); 
                split_type_set = pxl_split_hover.words;
               
                $(split_type_set).each(function(index,elw) {
                    gsap.set(elw, {
                        opacity: 0,
                        scale:index % 2 == 0  ? 0 : 2,
                        force3D:true,
                        duration: 0.1,
                        ease: "power3.out", //circ.out
                        stagger: 0.02,
                    },index * 0.01);
                });
                var pxl_anim = gsap.to(split_type_set, {
                    rotateX: "0",
                    scale: 1,
                    opacity: 1,
                });

                $(el).mouseenter(function(e) {
                    pxl_anim.restart();
                });
                 
            }else{
                $(el).mouseenter(function(e) {  
                    gsap.from(split_type_set, settings);
                });
            }
        });
    }

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        pxl_section_start_render();
        elementorFrontend.hooks.addAction( 'frontend/element_ready/global', function( $scope ) {
            pxl_animation_handler($scope);
        } );
        
        pxlMouseDirection();
        pxlParticles();
        pxl_parallax_bg();

        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_heading.default', function( $scope ) {
            pxl_split_text($scope);
            elementorFrontend.waypoint($scope.find('.heading-subtitle.style-1'), function () {
                $(this).addClass('pxl-animated');
            });
        } );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_button.default', function( $scope ) {

            pxl_split_text($scope);
        } );
        setTimeout(function () { 
            pxl_split_text_hover();
        }, 500);
    } );
} )( jQuery );