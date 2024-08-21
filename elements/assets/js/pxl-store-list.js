( function( $ ) {
    var PXLStoreListHander = function( $scope, $ ) {
        $scope.find('.pxl-store').on('click', function() {
            $(this).addClass('selected').siblings().removeClass('selected');
            console.log($(this).data('url'));
            $scope.find('store-submit').attr('href', $(this).data('url'));
        })
    };
    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_store_list.default', PXLStoreListHander );
    } );
} )( jQuery );