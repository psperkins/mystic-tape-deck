<?php
/**
 * Function file
 *
 * @phpcs:disable WordPress.PHP.DevelopmentFunctions.error_log_error_log
 * @phpcs:disable WordPress.PHP.DevelopmentFunctions.error_log_print_r
 */

if ( ! defined( 'LEADIN_PLUGIN_VERSION' ) ) {
	wp_die( '', '', 403 );
}

if ( ! defined( 'LEADIN_PORTAL_ID' ) ) {
	DEFINE( 'LEADIN_PORTAL_ID', intval( get_option( 'leadin_portalId' ) ) );
}

/**
 * Logs a debug statement to /wp-content/debug.log
 *
 * @param string $message message to log.
 */
function leadin_log_debug( $message ) {
	if ( WP_DEBUG === true ) {
		if ( is_array( $message ) || is_object( $message ) ) {
			error_log( print_r( $message, true ) );
		} else {
			error_log( $message );
		}
	}
}

/**
 * Returns the user role for the current user
 */
function leadin_get_user_role() {
	global $current_user;

	$user_roles = $current_user->roles;
	$user_role  = array_shift( $user_roles );

	return $user_role;
}

/**
 * Return query string from object
 *
 * @param array $arr query parameters to stringify.
 */
function leadin_http_build_query( $arr ) {
	return http_build_query( $arr, null, ini_get( 'arg_separator.output' ), PHP_QUERY_RFC3986 );
}

/**
 * Return the given version until the patch version
 * eg: 6.4.2.1-beta => 6.4.2
 *
 * @param string $version version.
 */
function leadin_parse_version( $version ) {
	preg_match( '/^\d+(\.\d+){0,2}/', $version, $match );
	if ( empty( $match ) ) {
		return '';
	}
	return $match[0];
}

function leadin_is_valid_static_version( $version ) {
	preg_match( '/static-\d+\.\d+/', $version, $match );
	return ! empty( $match );
}

/**
 * Return array of query parameters to add to the iframe src
 */
function leadin_get_query_params() {
	global $wp_version;

	$query_param_array = array(
		'l'     => get_locale(),
		'php'   => leadin_parse_version( phpversion() ),
		'v'     => LEADIN_PLUGIN_VERSION,
		'wp'    => leadin_parse_version( $wp_version ),
		'theme' => get_option( 'stylesheet' ),
		'admin' => leadin_is_admin(),
	);

	if ( leadin_is_valid_static_version( LEADIN_STATIC_BUNDLE_VERSION ) ) {
		$query_param_array['s'] = LEADIN_STATIC_BUNDLE_VERSION;
	}

	return leadin_http_build_query( $query_param_array );
}

/**
 * Return the affiliate code
 */
function leadin_get_affiliate_code() {
	$affiliate_link = get_option( 'hubspot_affiliate_code' );
	preg_match( '/(?:(?:hubs\.to)|(?:mbsy\.co))\/([a-zA-Z0-9]+)/', $affiliate_link, $matches );
	if ( count( $matches ) === 2 ) {
		return $matches[1];
	} else {
		return $affiliate_link;
	}
}

/**
 * Return the signup url based on the site options
 */
function leadin_get_signup_url() {
	// Get attribution string.
	$acquisition_option = get_option( 'hubspot_acquisition_attribution', '' );
	parse_str( $acquisition_option, $signup_params );
	$signup_params['enableCollectedForms'] = 'true';

	// Get leadin query.
	$leadin_query = leadin_get_query_params();
	parse_str( $leadin_query, $leadin_params );

	$signup_params = array_merge( $signup_params, $leadin_params );

	// Add signup pre-fill info.
	$wp_user                    = wp_get_current_user();
	$signup_params['firstName'] = $wp_user->user_firstname;
	$signup_params['lastName']  = $wp_user->user_lastname;
	$signup_params['email']     = $wp_user->user_email;
	$signup_params['company']   = get_bloginfo( 'name' );
	$signup_params['domain']    = get_site_url();

	$affiliate_code = leadin_get_affiliate_code();
	$signup_url     = LEADIN_SIGNUP_BASE_URL . '/signup/wordpress?';

	if ( LEADIN_SIGNUP_BASE_URL !== LEADIN_BASE_URL ) {
		$signup_params['redirectBaseUrl'] = LEADIN_BASE_URL;
	}

	if ( $affiliate_code ) {
		$signup_url     .= leadin_http_build_query( $signup_params );
		$destination_url = rawurlencode( $signup_url );
		return "https://mbsy.co/$affiliate_code?url=$destination_url";
	}

	$signup_params['utm_source'] = 'wordpress-plugin';
	$signup_params['utm_medium'] = 'marketplaces';

	return $signup_url . leadin_http_build_query( $signup_params );
}

/**
 * Return ajax url
 */
function leadin_get_ajax_url() {
	$ajax_url = get_admin_url( get_current_blog_id(), 'admin-ajax.php' );
	return parse_url( $ajax_url )['path'];
}

/**
 * Get the parsed `leadin_route` from the query string
 */
function leadin_get_leadin_route() {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	$leadin_route = isset( $_GET['leadin_route'] ) ? wp_unslash( $_GET['leadin_route'] ) : array();
	return is_array( $leadin_route ) ? $leadin_route : array();
}

/**
 * Returns the right iframe src
 * The src will be `/hubspot-plugin/{portalId}/{path}/{routes}`,
 * where path is the content after `leadin_` in ?page=leadin_path
 * and routes is the content of the `leadin_route` query parameter
 * eg: ?page=leadin_forms&leadin_route[0]=foo&leadin_route[1]=bar
 * will point to /hubspot-plugin/{portalId}/forms/foo/bar
 */
function leadin_get_iframe_src() {
	$sub_routes = join( '/', leadin_get_leadin_route() );
	$portal_id  = get_option( 'leadin_portalId' );
	$regex      = '/^hubspot_page_leadin(_|$)/';
	$page       = get_current_screen()->id;

	if ( empty( $portal_id ) ) {
		return leadin_get_signup_url();
	}

	$pathname   = preg_replace( $regex, '', $page );
	$pathname   = empty( $pathname ) ? $pathname : "/$pathname";
	$sub_routes = empty( $sub_routes ) ? $sub_routes : "/$sub_routes";
	return LEADIN_BASE_URL . "/hubspot-plugin/$portal_id$pathname$sub_routes?" . leadin_get_query_params();
}

/**
 * Get background iframe src
 */
function leadin_get_background_iframe_src() {
	$portal_id     = get_option( 'leadin_portalId' );
	$portal_id_url = '';

	if ( ! empty( $portal_id ) ) {
		$portal_id_url = "/$portal_id";
	}

	return LEADIN_BASE_URL . "/hubspot-plugin$portal_id_url/background?" . leadin_get_query_params();
}

/**
 * Get shortcode for form
 *
 * @param string $form_id form's id.
 */
function leadin_get_form_shortcode( $form_id ) {
	$portal_id = get_option( 'leadin_portalId' );
	return "[hubspot type=form portal=$portal_id id=$form_id]";
}

/**
 * Return true if the current user has the `manage_options` capability
 */
function leadin_is_admin() {
	return current_user_can( 'manage_options' );
}

/**
 * Return 403 if the current user does not have the `manage_options` capability
 */
function leadin_manage_options_or_403() {
	if ( ! leadin_is_admin() ) {
		wp_die( '{ "error": "Insufficient permissions" }', '', 403 );
	}
}

/**
 * Validate nonce sent with ajax
 */
function leadin_validate_nonce() {
	$valid = check_ajax_referer( 'hubspot-ajax', false, false );
	if ( ! $valid ) {
		wp_die( '{ "error": "CSRF token missing or invalid" }', 403 );
	}
}

/** Get content of local file
 *
 * @param string $file_path Relative path starting from the leadin folder.
 */
function leadin_file_get_contents( $file_path ) {
	if ( file_exists( plugin_dir_path( LEADIN_BASE_PATH ) . $file_path ) ) {
		return file_get_contents( plugin_dir_path( LEADIN_BASE_PATH ) . $file_path );
	}
	return '';
}
