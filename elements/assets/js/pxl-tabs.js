( function( $ ) {
    var PXLTabsHandler = function( $scope, $ ) {
        var first_toggle_bg = $scope.find(".pxl-tabs .tabs-title .toggle-slide");
        var first_active = $scope.find(".pxl-tabs .tabs-title .tab-title.active");
        var f_ative_w = first_active.width();
        var f_ative_offset = first_active.get(0).offsetLeft;
        var link_to_tabs_carousel_id = $scope.find('.link-to-tabs-carousel-id').text().trim();
        first_toggle_bg.width(f_ative_w);
        first_toggle_bg.css({left: f_ative_offset});
        $scope.find(".pxl-tabs .tabs-title .tab-title").on("click", function(e){
            e.preventDefault();
            var target = $(this).data("target");
            var toggle_bg = $(this).parent().find('.toggle-slide');
            var ative_w = $(this).width();
            var ative_offset = $(this).get(0).offsetLeft;
            $(this).addClass('active').siblings().removeClass('active');
            $(target).addClass('active').siblings().removeClass('active');
            toggle_bg.width(ative_w);
            toggle_bg.css({left: ative_offset});
            $(target).siblings().find('.pxl-animate').each(function(){
                var data = $(this).data('settings');
                $(this).removeClass('animated '+data['animation']).addClass('pxl-invisible');
            });
            $(target).find('.pxl-animate').each(function(){
                var data = $(this).data('settings');
                var cur_anm = $(this);
                setTimeout(function () {  
                    $(cur_anm).removeClass('pxl-invisible').addClass('animated ' + data['animation']);
                }, data['animation_delay']);
            })
            if ($scope.find('.pxl-tabs-carousel').length > 0 && link_to_tabs_carousel_id.length == 0)
                $scope.find('.pxl-tabs-carousel').slick('refresh');
        });
        if (link_to_tabs_carousel_id != undefined) {
            $scope.find('[data-slide]').click(function(e){
                var slideno = $(this).data('slide');
                $('#' + link_to_tabs_carousel_id).slick('slickGoTo', slideno);
            });
        }
    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_tabs.default', PXLTabsHandler );
    } );
} )( jQuery );