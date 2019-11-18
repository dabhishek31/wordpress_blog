/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 * Things like site title, description, and various theme option changes.
 *
 */

(function($) {

	var base_url = window.location.origin+window.location.pathname;

  	wp.customize('trooper_lite_logo', function ( value ) {
        value.bind( function( newval ) {
        	if(newval === '') {
                $('.author .avatar').attr('src', base_url + '/wp-content/themes/trooper/assets/images/avatar.png');
            } else {
                $('.author .avatar').attr('src', newval);
            }
        });
    });

  	wp.customize('trooper_lite_logo_name', function ( value ) {
        value.bind( function( newval ) {
			$('#site-title > a').text( newval );
        });
    });

    wp.customize('trooper_lite_author_snippet', function ( value ) {
        value.bind( function( newval ) {
            $('#site-description').text( newval );
        });
    });

    wp.customize('trooper_lite_footer_cpy', function ( value ) {
        value.bind( function( to ) {
			$('#footer-text').show().text(to);
        });
    });

})(jQuery);
