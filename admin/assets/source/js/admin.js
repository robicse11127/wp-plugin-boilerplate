;(function($) {
    "use strict";
    /**
     * Settings Tab
     */
    var settings_tab = function() {
        $( '.wppb-tabs li a' ).on( 'click', function(e) {
            e.preventDefault();
            $( '.wppb-tabs li a' ).removeClass( 'active' );
            $(this).addClass( 'active' );
            var tab = $(this).attr( 'href' );
            $( '.wppb-settings-tab' ).removeClass( 'active' );
            $( '.wppb-settings-tabs' ).find( tab ).addClass( 'active' );
        });
    }
    settings_tab();

    /**
     * Save Test Form
     */
    $('#wppb-test-form').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: wppb_admin_localizer.ajax_url,
            type: 'post',
            data: {
                action: 'save_test_form',
                fields: $('#wppb-test-form').serialize(),
                security: wppb_admin_localizer.ajax_nonce
            },
            success: function(response) {
                var flag = JSON.parse(response);
                if( flag == 'Success' ) {
                    swal( 'Settings saved!', '', 'success' );
                }else {
                    swal( 'Something went wrong!', '', 'error' );
                }
            }
        })
    })
})(jQuery);