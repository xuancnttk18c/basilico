( function( $ ) {
    function basilico_tabs_handler($scope){
        var link_to_tabs_carousel_id = $scope.find('.link-to-tabs-carousel-id').text().trim();

        $scope.find(".pxl-tabs .tabs-title .tab-title").on("click", function(e){
            e.preventDefault();
            var target = $(this).data("target");
            $(this).addClass('active').siblings().removeClass('active');
            $(target).addClass('active').siblings().removeClass('active'); 
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

            });
            if ($scope.find('.pxl-tabs-carousel').length > 0 && link_to_tabs_carousel_id.length == 0)
                $scope.find('.pxl-tabs-carousel').slick('refresh');
        });

        if (link_to_tabs_carousel_id != undefined) {
            $scope.find('[data-slide]').click(function(e){
                var slideno = $(this).data('slide');
                $('#' + link_to_tabs_carousel_id).slick('slickGoTo', slideno);
            });
        }

        if ($scope.find(".pxl-tabs .pxl-tabs-arrows")) {
            $scope.find(".pxl-tabs .pxl-tabs-arrows .pxl-tab-arrow-next").on("click", function(e) {
                e.preventDefault();
                if ($scope.find(".pxl-tabs .tabs-title .tab-title.active").next())
                    $scope.find(".pxl-tabs .tabs-title .tab-title.active").next().addClass('active').siblings().removeClass('active');
                else
                    $scope.find(".pxl-tabs .tabs-title .tab-title.active").first().addClass('active').siblings().removeClass('active');

                var target = $scope.find(".pxl-tabs .tabs-title .tab-title.active").data("target");
                $(target).addClass('active').siblings().removeClass('active'); 
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
                });
            });
            $scope.find(".pxl-tabs .pxl-tabs-arrows .pxl-tab-arrow-prev").on("click", function(e) {
                e.preventDefault();
                if ($scope.find(".pxl-tabs .tabs-title .tab-title.active").prev())
                    $scope.find(".pxl-tabs .tabs-title .tab-title.active").prev().addClass('active').siblings().removeClass('active');
                else
                    $scope.find(".pxl-tabs .tabs-title .tab-title.active").last().addClass('active').siblings().removeClass('active');

                var target = $scope.find(".pxl-tabs .tabs-title .tab-title.active").data("target");
                $(target).addClass('active').siblings().removeClass('active'); 
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
                });
            });
        }
    }

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_tabs.default', function($scope) {
            basilico_tabs_handler($scope);
        } );
    } );
} )( jQuery );