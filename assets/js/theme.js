;(function ($) {
    "use strict";
    var scroll_top;
    var window_height;
    var window_width;
    var scroll_status = '';
    var lastScrollTop = 0;
    $( document ).ready( function() {
        setTimeout(function() {
            $('.tilt-hover').each(function () {
                $(this).tilt({
                    easing:"cubic-bezier(.03,.98,.52,.99)",
                    perspective: 1200,
                    speed: 700,
                })
            });
        }, 300);

        //* Main Theme Functions
        basilico_header_sticky();
        basilico_open_menu_toggle();
        basilico_panel_mobile_menu();
        basilico_cart_toggle();
        basilico_panel_anchor_toggle();
        basilico_sidebar_tabs_toggle();
        basilico_document_click();
        basilico_document_click2();
        basilico_scroll_to_top();
        basilico_footer_fixed();
        basilico_magnific_popup();
        basilico_scroll_to_id();

        //* For Element
        basilico_element_parallax();
        basilico_fancyBoxAccordion();
        basilico_svgDrawing();
        basilico_pxlCursor();

        //* For Shop
        basilico_shop_view_layout();
        basilico_wc_single_product_gallery();
        basilico_quantity_plus_minus();
        basilico_quantity_plus_minus_action();
        basilico_table_cart_content();
        basilico_table_move_column('.woocommerce-cart-form__contents', '.woocommerce-cart-form__cart-item' ,0, 5, '', '.product-subtotal', '');
        basilico_mini_cart_dropdown_offset();
        basilico_canvas_dropdown_mini_cart();
        basilico_mini_cart_body_caculate_height();
    });
    $(window).on('load', function () {
        setTimeout(function() {
            $('#pxl-loadding.default').addClass('preloaded');
        }, 800);
        $("#pxl-loadding.content-image").fadeOut("slow");
        setTimeout(function() {
            $('#pxl-loadding').remove();
            $('.pxl-cursor').css("visibility", "visible");

            if ($('.animation').length > 0) {
                const observer = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animated');
                        }
                    });
                });
                observer.observe(document.querySelector('.animation'));
            }
        }, 3000);
    });
    $(window).on('scroll', function () {
        scroll_top = $(window).scrollTop();
        window_height = $(window).height();
        window_width = $(window).width();
        if (scroll_top < lastScrollTop) {
            scroll_status = 'up';
        } else {
            scroll_status = 'down';
        }
        lastScrollTop = scroll_top;
        basilico_header_sticky();
        basilico_scroll_to_top();
        basilico_sticky_position();
    });
    jQuery( document ).on( 'updated_wc_div', function() {
        basilico_quantity_plus_minus();
        basilico_table_cart_content();
        basilico_table_move_column('.woocommerce-cart-form__contents', '.woocommerce-cart-form__cart-item' ,0, 5, '', '.product-subtotal', '');
    } );
    // $(document).ready(function () {
    //     $("select").niceSelect();
    // });
    $( document.body ).on( 'wc_fragments_loaded wc_fragments_refreshed', function() {
        basilico_mini_cart_body_caculate_height();
        $('body').find('.pxl-hidden-template-canvas-cart').removeClass('loading');
        $('body').find('.pxl-cart-dropdown').removeClass('loading');
        $('body').removeClass('loading');
    });
    $( document ).on( 'click', '.pxl-anchor-cart .pxl-anchor', function( e ) {
        e.preventDefault();
        e.stopPropagation();
        var target = $(this).attr('data-target');
        if( target == '.pxl-cart-dropdown'){
            $(this).next(target).toggleClass('open');    
        }else{
            $(target).toggleClass('open');
            $('.pxl-page-overlay').toggleClass('active');   
            $('.product-main-img .pxl-cursor-icon').addClass('hide'); 
        }

    });
    $(document).on('click','.pxl-anchor.side-panel',function(e){
        e.preventDefault();
        e.stopPropagation();
        var target = $(this).attr('data-target');
        $(this).toggleClass('cliked');
        $(target).toggleClass('open');
        $('.pxl-page-overlay').toggleClass('active');    
        $('.product-main-img .pxl-cursor-icon').addClass('hide'); 

        var attr = $(this).attr('data-form-type');
        if (typeof attr !== 'undefined' && attr == 'login') {
            $('.pxl-register-form').removeClass('active');
            $('.pxl-login-form').addClass('active');
        }
        if (typeof attr !== 'undefined' && attr == 'reg') {
            $('.pxl-login-form').removeClass('active');
            $('.pxl-register-form').addClass('active');
        }
    });
    $(document).on('click','.pxl-close',function(e){
            e.preventDefault();
            e.stopPropagation();
            $(this).closest('.pxl-hidden-template').removeClass('open');
            $(this).closest('.sidebar-shop').removeClass('open');
            $('.pxl-anchor.side-panel').removeClass('cliked');
            $('.pxl-page-overlay').removeClass('active');    
            $('.btn-shop-sidebar-hidden-toggle').removeClass('cliked');
            $('.btn-shop-filter-top-toggle').removeClass('cliked');
            $(this).closest('.shop-filter-top-wrap').removeClass('open');
            $(this).closest('.pxl-product-attr-size-guide-panel').removeClass('open');
            $(this).closest('.pxl-login-form-checkout').removeClass('open');

            $('.wc-tabs-panel').removeClass('open');
            $('.tab-item').removeClass('active');  
        });
    function basilico_header_sticky() {
        'use strict';
        if($(document).find('.pxl-header-sticky').length > 0 && window_width >= 1200 && !$(document).find(".pxl-hidden-template.open").length > 0){
            var header_height = $('.pxl-header-desktop').outerHeight();

            var offset_top_nimation = header_height + 150;

            if (scroll_top > offset_top_nimation && scroll_status == 'up') {
                $(document).find('.pxl-header-sticky').addClass('h-fixed');
            } else{
                $(document).find('.pxl-header-sticky').removeClass('h-fixed');
            }
        }
        if($(document).find('.pxl-header-main-sticky').length > 0 && window_width >= 1200){
            var header_height = $('.pxl-header-desktop').outerHeight();

            if (scroll_top > header_height) {
                $(document).find('.pxl-header-main-sticky').addClass('h-fixed');
            }else{
                $(document).find('.pxl-header-main-sticky').removeClass('h-fixed');
            }
        }
        if ( $(document).find('.pxl-header-mobile-sticky').length > 0 && window_width < 1200  ) {
            var offset_top = $('.pxl-header-mobile').outerHeight();

            if (scroll_top > offset_top) {
                $(document).find('.pxl-header-mobile-sticky').addClass('mh-fixed');
            }else{
                $(document).find('.pxl-header-mobile-sticky').removeClass('mh-fixed');
            }
        }
        if ( $(document).find('.pxl-header-mobile-main-sticky').length > 0 && window_width < 1200  ) {
            var offset_top = $('.pxl-header-mobile').outerHeight();

            if (scroll_top > offset_top + 1) {
                $(document).find('.pxl-header-mobile-main-sticky').addClass('mh-fixed');
            }else{
                $(document).find('.pxl-header-mobile-main-sticky').removeClass('mh-fixed');
            }
        }
    }
    function basilico_sticky_position(){
        if ($('.pxl-header-sticky.h-fixed').length > 0) {
            var headerStickyHeight = $(document).find('.pxl-header-sticky.h-fixed').height();
            if ($('body.admin-bar').length > 0)
                $(document).find('.sidebar-sticky .sidebar-sticky-wrap').css('top', headerStickyHeight + 60 + 'px');
            else 
                $(document).find('.sidebar-sticky .sidebar-sticky-wrap').css('top', headerStickyHeight + 30 + 'px');           
        }
        else if ($('body.admin-bar').length > 0)
            $(document).find('.sidebar-sticky .sidebar-sticky-wrap').css('top', 60 + 'px');
        else
            $(document).find('.sidebar-sticky .sidebar-sticky-wrap').css('top', 30 + 'px');    
    }
    function basilico_open_menu_toggle(){
        'use strict';
        //* Add toggle button to parent Menu
        $('.sub-menu .current-menu-item').parents('.menu-item-has-children').addClass('current-menu-ancestor');
        $('.is-arrow .pxl-primary-menu > li.menu-item-has-children').append('<span class="main-menu-toggle"></span>');
        $('.pxl-mobile-menu li.menu-item-has-children').append('<span class="main-menu-toggle"></span>');
        $('.main-menu-toggle').on('click', function () {
            $(this).toggleClass('open');
            $(this).parent().find('> .sub-menu').toggleClass('submenu-open');
            $(this).parent().find('> .sub-menu').slideToggle();
        });

        //* Menu Dropdown
        var $menu = $('.pxl-main-navigation');
        $menu.find('.pxl-primary-menu li').each(function () {
            var $submenu = $(this).find('> ul.sub-menu');
            if ($submenu.length == 1) {
                $(this).hover(function () {
                    if ($submenu.offset().left + $submenu.width() > $(window).width()) {
                        $submenu.addClass('back');
                    } else if ($submenu.offset().left < 0) {
                        $submenu.addClass('back');
                    }
                }, function () {
                    $submenu.removeClass('back');
                });
            }
        });
    }
    function basilico_panel_mobile_menu(){
        'use strict';
        $(document).on('click','.btn-nav-mobile',function(e){
            e.preventDefault();
            e.stopPropagation();
            var target = $(this).attr('data-target');
            $(this).toggleClass('cliked');
            $(target).toggleClass('open');
            $('body').toggleClass('side-panel-open');
        });
    }
    function basilico_panel_anchor_toggle(){
        'use strict';
        $(document).on('click','.pxl-anchor.side-panel',function(e){
            e.preventDefault();
            e.stopPropagation();
            var target = $(this).attr('data-target');
            $(this).toggleClass('cliked');
            $(target).toggleClass('open');
            $('body').toggleClass('side-panel-open');
            $(document).find('.pxl-header-sticky').removeClass('h-fixed');
            setTimeout(function(){
                $('.pxl-search-form input[name="s"]').focus();
            },1000);
        });
    }
    function basilico_sidebar_tabs_toggle(){
        'use strict';
        $(".anchor-inner-item").first().addClass('active');
        $(document).on('click','.pxl-sidebar-tabs .anchor-link-item',function(e){
            e.preventDefault();
            e.stopPropagation();
            var target = $(this).attr('data-target');
            $(target).addClass('active').siblings().removeClass('active');
        });
    }
    function basilico_cart_toggle(){
        'use strict';
        $(document).on('click','.pxl-cart.side-panel',function(e){
            e.preventDefault();
            e.stopPropagation();
            var target = $(this).attr('data-target');
            $(this).toggleClass('cliked');
            $(target).toggleClass('open');
            $('body').toggleClass('side-panel-open');
            setTimeout(function(){
                $('.pxl-search-form input[name="s"]').focus();
            },1000);
        });
    }

    function basilico_document_click(){
        $(document).on('click',function (e) {
            var target = $(e.target);
            var check = '.btn-nav-mobile, .pxl-anchor.side-panel, .pxl-anchor-cart.pxl-anchor';

            if (!(target.is(check)) && target.closest('.pxl-hidden-template').length <= 0 && $('body').hasClass('side-panel-open')) {
                $('.btn-nav-mobile').removeClass('cliked');
                //$('.pxl-cart-toggle').removeClass('cliked');
                $('.pxl-hidden-template').removeClass('open');
                $('body').removeClass('side-panel-open');
            }

            if ( !(target.is('.pxl-anchor-cart.pxl-anchor')) && target.closest('.pxl-cart-dropdown').length <= 0 ) {  
                $('.pxl-cart-dropdown').removeClass('open');
            }

            if (!(target.is(check)) && target.closest('.sidebar-shop').length <= 0 && target.closest('.pxl-hidden-template').length <= 0 && $('.pxl-page-overlay').hasClass('active')) { 
                $('.pxl-hidden-template').removeClass('open');
                $('.sidebar-shop').removeClass('open');
                $('.pxl-page-overlay').removeClass('active');
            }
        });
        $(document).on('click','.pxl-close',function(e){
            e.preventDefault();
            e.stopPropagation();
            $(this).closest('.pxl-hidden-template').toggleClass('open');
            $('.btn-nav-mobile').removeClass('cliked');
            // $('.pxl-cart-toggle').removeClass('cliked');
            $('body').toggleClass('side-panel-open');
        });
    }

    function basilico_document_click2(){
        $(document).on('click',function (e) {
            var target = $(e.target);
            var check = '.pxl-anchor.side-panel, .pxl-anchor-cart.pxl-anchor, .btn-shop-sidebar-hidden-toggle, .mfp-woosq .mfp-close, .woosw-popup .woosw-popup-close';
         
            if ( $('.pxl-hidden-template.popup-newsletter').length > 0 && $('.pxl-hidden-template.popup-newsletter').hasClass('open') && target.closest('.pxl-hidden-template-wrap').length <= 0) {  
                $('.pxl-page-overlay').removeClass('active');
                if (typeof(Storage) !== 'undefined') {
                    var popup_times = localStorage.getItem( 'popup_times' );
                    localStorage.setItem( 'popup_times', ++ popup_times );
                }
            }
                
            if (!(target.is(check)) && target.closest('.sidebar-shop').length <= 0 && target.closest('.pxl-hidden-template').length <= 0 && $('.pxl-page-overlay').hasClass('active')) { 
                $('.pxl-hidden-template').removeClass('open');
                $('.sidebar-shop').removeClass('open');
                $('.pxl-page-overlay').removeClass('active');
            }

            if ( $('.pxl-hidden-template.pos-center').length > 0 && $('.pxl-hidden-template.pos-center').hasClass('open') && target.closest('.pxl-hidden-template.pos-center .pxl-hidden-template-wrap').length <= 0 ) {  
                $('.pxl-hidden-template').removeClass('open');
                $('.pxl-page-overlay').removeClass('active');
            }

            if ( $('.pxl-hidden-template.menu-page-popup').length > 0 && $('.pxl-hidden-template.menu-page-popup').hasClass('open') && target.closest('.pxl-hidden-template.menu-page-popup .pxl-hidden-template-wrap').length <= 0 ) {  
                $('.pxl-hidden-template.menu-page-popup').removeClass('open');
                $('.pxl-page-overlay').removeClass('active');
            }

            if ( !(target.is('.pxl-anchor-cart.pxl-anchor')) && target.closest('.pxl-cart-dropdown').length <= 0 ) {  
                $('.pxl-cart-dropdown').removeClass('open');
            }

            if ( $('.shop-filter-top-wrap').length > 0 && $('.shop-filter-top-wrap').hasClass('open') && target.closest('.shop-filter-top-wrap').length <= 0) {  
                $('.btn-shop-filter-top-toggle').removeClass('cliked');
                $('.shop-filter-top-wrap').removeClass('open');
                $('.pxl-page-overlay').removeClass('active-mobile');
            }

            if ( $('.pxl-product-attr-size-guide-panel').length > 0 && $('.pxl-product-attr-size-guide-panel').hasClass('open') && target.closest('.pxl-hidden-template-wrap').length <= 0) {  
                $('.pxl-product-attr-size-guide-panel').removeClass('open'); 
            }
            if ( $('.wc-tabs-panel').length > 0 && !(target.is('.woocommerce-review-link')) && $('.wc-tabs-panel').hasClass('open') && target.closest('.pxl-hidden-template-wrap').length <= 0) {  
                $('.wc-tabs-panel').removeClass('open'); 
                $('.tab-item').removeClass('active'); 
            }

            if ( $('.pxl-login-form-checkout').length > 0 && $('.pxl-login-form-checkout').hasClass('open') && target.closest('.pxl-hidden-template-wrap').length <= 0) {  
                $('.pxl-login-form-checkout').removeClass('open'); 
            }

        });
        
    }

    //* Scroll To Top
    function basilico_scroll_to_top() {
        if (scroll_top < window_height) {
            $('.pxl-scroll-top').addClass('off').removeClass('on');
        }
        if (scroll_top > window_height) {
            $('.pxl-scroll-top').addClass('on').removeClass('off');
        }
        $('.pxl-scroll-top').click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            $('html, body').stop().animate({scrollTop: 0}, 800);
        });
    }

    //* Scroll To ID
    function basilico_scroll_to_id() {
        const sections = document.querySelectorAll("section[id]");
        window.addEventListener("scroll", navHighlighter);
        function navHighlighter() {
            let scrollY = window.pageYOffset;
            sections.forEach(current => {
                const sectionHeight = current.offsetHeight;
                const sectionTop = current.offsetTop - 50;
                const sectionId = current.getAttribute("id");
                if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight && document.querySelector("a[href*=" + sectionId + "]")){
                    document.querySelector("a[href*=" + sectionId + "]").classList.add("active");
                } else if (document.querySelector("a[href*=" + sectionId + "]")) {
                    document.querySelector("a[href*=" + sectionId + "]").classList.remove("active");
                }
            });
        };
    }

    //* Footer Fixed
    function basilico_footer_fixed() {
        setTimeout(function(){
            var h_footer = $('.pxl-footer-fixed .footer-type-el').outerHeight() - 1;
            $('.pxl-footer-fixed #pxl-main').css('margin-bottom', h_footer + 'px');
        }, 600);
    }

    //* Update Post Share
    $('.social-share .social-item').on('click', function(){
        var id = document.querySelector('.status-publish').getAttribute('id').replace("post-", "");
        if (id) {
            $.ajax({
                url: main_data.ajax_url,
                type: 'POST',
                beforeSend: function () {
    
                },
                data: {
                    action: 'basilico_set_post_share',
                    post_id: id
                },
            }).always(function () {
                return false;
            });
        }
    })

    //* Video Popup
    function basilico_magnific_popup() {
        $('a.media-play-button').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

        /* Images Light Box - Gallery:True */
        $('.images-light-box').each(function () {
            $(this).magnificPopup({
                delegate: 'a.light-box',
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade',
            });
        });

        /* Gallery Image URL */
        $('a.gallery-image-popup').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade gallery-popup',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
        });
    }

    // Element Parallax
    function basilico_element_parallax() {
        let delSections = document.querySelectorAll(".pxl-element-parallax");
        delSections.forEach(section => {
            var el_data = section.getAttribute('data-parallax');
            var el_data_obj = JSON.parse(el_data);
            let imageAnim = gsap.to(section.querySelector("img"), {
                x: el_data_obj.x,
                y: el_data_obj.y,
                ease: "none",
                paused: true
            });
            let progressTo = gsap.quickTo(imageAnim, "progress", {ease: "ease-out", duration: parseFloat(section.dataset.scrub) || 0.2});

            gsap.to(section.querySelector(".elementor-widget-container"), {
                x: "0",
                y: "0",
                ease: "none",
                scrollTrigger: {
                    scrub: true,
                    trigger: section,
                    onUpdate: self => progressTo(self.progress)
                }
            });
        });
    }

    // FancyBox Accordion
    function basilico_fancyBoxAccordion() {
        var widgetList = jQuery('.pxl-fancy-box-accordion');
        if (!widgetList.length) {
            return;
        }
        widgetList.each(function () {
            var itemClass = '.box-item';
            jQuery(this)
                .find(itemClass + ':first-child')
                .addClass('active');
            jQuery(this)
                .find(itemClass)
                .on('mouseover', function () {
                    jQuery(this).addClass('active').siblings().removeClass('active');
                });
        });
    }

    // Svg Drawing
    function basilico_svgDrawing() {
        $(".svg-drawing").each(function(){
            var $selector = jQuery(this);
            $(window).scroll(function() {
                var hT = $selector.offset().top,
                    hH = $selector.outerHeight(),
                    wH = $(window).height(),
                    wS = $(this).scrollTop();
                if (wS > (hT-wH)){
                    $selector.find('.drawing').each(function () {
                        let path = $(this).get(0);
                        let length = path.getTotalLength();
                        path.style.strokeDasharray = length;
                        path.style.strokeDashoffset = length;
                    });
                    $selector.addClass('dr-start');
                }
            });

        });
    }

    //* PXL Cursor
    function basilico_pxlCursor() {
        $(document).ready(function(){
            $(".pxl-cursor").each(function(index) {
                var cms_cursor = $(this);
                gsap.set(cms_cursor, {xPercent: -50, yPercent: -50});
                var pos = { x: window.innerWidth / 2, y: window.innerHeight / 2 };
                var mouse = { x: pos.x, y: pos.y };
                var speed = 0.4;

                var xSet = gsap.quickSetter(cms_cursor, "x", "px");
                var ySet = gsap.quickSetter(cms_cursor, "y", "px");

                window.addEventListener("mousemove", e => {
                    mouse.x = e.x;
                    mouse.y = e.y;
                });

                gsap.ticker.add(() => {
                    var dt = 1.0 - Math.pow(1.0 - speed, gsap.ticker.deltaRatio());

                    pos.x += (mouse.x - pos.x) * dt;
                    pos.y += (mouse.y - pos.y) * dt;
                    xSet(pos.x);
                    ySet(pos.y);
                });

                $("*").on("mouseenter", function(e) {
                    var currentCursor = $(this).css('cursor') ;
                    if (currentCursor == "pointer"){
                        cms_cursor.addClass("active");
                    }
                });
                
                $("*").on("mouseleave", function(e) {
                    var currentCursor = $(this).css('cursor') ;
                    if (currentCursor == "pointer"){
                        cms_cursor.removeClass("active");
                    }
                });
            });
        });
    }

    function basilico_shop_view_layout(){
        $(document).on('click', '.pxl-view-layout .view-icon a', function(e){
            e.preventDefault();
            if (!$(this).parent('li').hasClass('active')){
                $('.pxl-view-layout .view-icon').removeClass('active');
                $(this).parent('li').addClass('active');
                $(this).parents('.pxl-content-area').find('.products').removeAttr('class').addClass($(this).attr('data-cls'));
            }
        });
    }

    // cart js
    function basilico_canvas_dropdown_mini_cart(){
        if ( typeof wc_add_to_cart_params === 'undefined' )
            return false;
        if( $( '.pxl-hidden-template-canvas-cart' ).length > 0 ){
            $(document.body).on( 'added_to_cart', function( evt, fragments, cart_hash, $button ) {
                $('.pxl-hidden-template-canvas-cart').toggleClass('open');
                $('.pxl-page-overlay').toggleClass('active');
                basilico_mini_cart_body_caculate_height();
            } );
        }
 
        $( document ).on( 'click', '.js-remove-from-cart', function( e ) {
            $(this).closest('.pxl-hidden-template-canvas-cart').addClass('loading');
            $(this).closest('.pxl-cart-dropdown').addClass('loading');
        });
        
    }

    function basilico_mini_cart_dropdown_offset(){
        if( $( '.pxl-cart-dropdown' ).length > 0 ){
            var window_w = $(window).width();
            
            $( '.pxl-cart-dropdown' ).each(function(index, el) {
                var anchor_cart_offset_right = $(this).closest('.pxl-anchor-cart').offset().left;
                if ( ($(this).offset().left + $(this).width() ) > window_w) {
                    var right_offset = window_w - (anchor_cart_offset_right + $(this).closest('.pxl-anchor-cart').width()) - 15;
                    $(this).css('right', (right_offset * -1));
                }
            });
             
        }
    }

    function basilico_mini_cart_body_caculate_height(){
        if( $('.pxl-hidden-template-canvas-cart').length > 0){
            var window_height = window.innerHeight;
            var $canvas_cart  = $('.pxl-hidden-template-canvas-cart');
            var $cart_header  = $canvas_cart.find( '.pxl-panel-header' );
            var $cart_content = $canvas_cart.find( '.pxl-panel-content' );
            var $cart_footer  = $canvas_cart.find( '.pxl-panel-footer' );
            
            var admin_bar_h = $('#wpadminbar').length > 0 ? $('#wpadminbar').height() : 0;
            var content_h = window_height - $cart_header.outerHeight() - $cart_footer.outerHeight() - admin_bar_h;
            content_h = Math.max( content_h, 400 );
            $cart_content.outerHeight( content_h );
        }
    } 

    function basilico_wc_single_product_gallery(){
        'use strict';
        if(typeof $.flexslider != 'undefined'){
            $('.wc-gallery-sync').each(function() {
                var itemW      = parseInt($(this).attr('data-thumb-w')),
                    itemH      = parseInt($(this).attr('data-thumb-h')),
                    itemN      = parseInt($(this).attr('data-thumb-n')),
                    itemMargin = parseInt($(this).attr('data-thumb-margin')),
                    window_w = $(window).outerWidth(),
                    itemSpace  = itemH - itemW + itemMargin;
                var gallery_layout = window_w > 575 ? 'vertical' : 'horizontal';

                if($(this).hasClass('thumbnail-vertical')){
                    $(this).flexslider({
                        selector       : '.wc-gallery-sync-slides > .wc-gallery-sync-slide',
                        animation      : 'slide',
                        controlNav     : false,
                        directionNav   : true,
                        prevText       : '<span class="flex-prev-icon"></span>',
                        nextText       : '<span class="flex-next-icon"></span>',
                        asNavFor       : '.woocommerce-product-gallery',
                        direction      : gallery_layout,
                        slideshow      : false,
                        animationLoop  : false,
                        itemWidth      : itemW, // add thumb image height
                        itemMargin     : itemSpace, // need it to fix transform item
                        move           : 1,
                        start: function(slider){
                            var asNavFor     = slider.vars.asNavFor,
                                height       = $(asNavFor).height(),
                                height_thumb = $(asNavFor).find('.flex-viewport').height();
                            if(window_w > 575) {
                                slider.css({'max-height' : height_thumb, 'overflow': 'hidden'});
                                slider.find('> .flex-viewport > *').css({'height': height, 'width': ''});
                            }
                        }
                    });
                }
                if($(this).hasClass('thumbnail-horizontal')){
                    $(this).flexslider({
                        selector       : '.wc-gallery-sync-slides > .wc-gallery-sync-slide',
                        animation      : 'slide',
                        controlNav     : false,
                        directionNav   : false,
                        prevText       : '<span class="flex-prev-icon"></span>',
                        nextText       : '<span class="flex-next-icon"></span>',
                        asNavFor       : '.woocommerce-product-gallery',
                        slideshow      : false,
                        animationLoop  : false, // Breaks photoswipe pagination if true.
                        itemWidth      : itemW,
                        itemMargin     : itemMargin,
                        start: function(slider){

                        }
                    });
                };
            });
        }
    }

    function basilico_quantity_plus_minus(){
        "use strict";
        $( ".quantity input" ).wrap( "<div class='pxl-quantity'></div>" );
        $('<span class="quantity-button quantity-down"></span>').insertBefore('.quantity input');
        $('<span class="quantity-button quantity-up"></span>').insertAfter('.quantity input');
        // contact form 7 input number
        $('<span class="pxl-input-number-spin"><span class="pxl-input-number-spin-inner pxl-input-number-spin-up"></span><span class="pxl-input-number-spin-inner pxl-input-number-spin-down"></span></span>').insertAfter('.wpcf7-form-control-wrap input[type="number"]');
    }
    function basilico_ajax_quantity_plus_minus(){
        "use strict";
        $('<span class="quantity-button quantity-down"></span>').insertBefore('.quantity input');
        $('<span class="quantity-button quantity-up"></span>').insertAfter('.quantity input');
    }
    function basilico_quantity_plus_minus_action(){
        "use strict";
        $(document).on('click','.quantity .quantity-button',function () {
            var $this = $(this),
                spinner = $this.closest('.quantity'),
                input = spinner.find('input[type="number"]'),
                step = input.attr('step'),
                min = input.attr('min'),
                max = input.attr('max'),value = parseInt(input.val());
            if(!value) value = 0;
            if(!step) step=1;
            step = parseInt(step);
            if (!min) min = 0;
            var type = $this.hasClass('quantity-up') ? 'up' : 'down' ;
            switch (type)
            {
                case 'up':
                    if(!(max && value >= max))
                        input.val(value+step).change();
                    break;
                case 'down':
                    if (value > min)
                        input.val(value-step).change();
                    break;
            }
            if(max && (parseInt(input.val()) > max))
                input.val(max).change();
            if(parseInt(input.val()) < min)
                input.val(min).change();
        });
        $(document).on('click','.pxl-input-number-spin-inner',function () {
            var $this = $(this),
                spinner = $this.parents('.wpcf7-form-control-wrap'),
                input = spinner.find('input[type="number"]'),
                step = input.attr('step'),
                min = input.attr('min'),
                max = input.attr('max'),value = parseInt(input.val());
            if(!value) value = 0;
            if(!step) step=1;
            step = parseInt(step);
            if (!min) min = 0;
            var type = $this.hasClass('pxl-input-number-spin-up') ? 'up' : 'down' ;
            switch (type)
            {
                case 'up':
                    if(!(max && value >= max))
                        input.val(value+step).change();
                    break;
                case 'down':
                    if (value > min)
                        input.val(value-step).change();
                    break;
            }
            if(max && (parseInt(input.val()) > max))
                input.val(max).change();
            if(parseInt(input.val()) < min)
                input.val(min).change();
        });
    }
    function basilico_table_cart_content(){
        "use strict";
        var table = jQuery('.woocommerce-cart-form__contents'),
            table_head = table.find('thead');
        table_head.find('.product-remove').remove();
        table_head.find('.product-thumbnail').remove();
        table_head.find('.product-name').attr('colspan',2);
        table_head.find('tr').append('<th class="product-remove">&nbsp;</th>');
    }

    function basilico_table_move_column(table, selected ,from, to, remove, colspan, colspan_value) {
        "use strict";
        var rows = jQuery(selected, table);
        var cols;
        rows.each(function() {
            cols = jQuery(this).children('th, td');
            cols.eq(from).detach().insertAfter(cols.eq(to));
        });
        var rows_remove = jQuery(remove, table);
        rows_remove.each(function(){
            jQuery(this).remove(remove);
        });
        var colspan = jQuery(colspan, table);
        colspan.each(function(){
            jQuery(this).attr('colspan',colspan_value);
        });
    }

})(jQuery);