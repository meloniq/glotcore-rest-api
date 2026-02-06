<?php
/**
 * Plugin Name:       GlotCore REST API
 * Plugin URI:        https://blog.meloniq.net/gp-rest/
 *
 * Description:       Extends GlotPress by adding REST API endpoints, enabling developers to integrate, extend, and build custom applications on top of the GlotPress translation system.
 * Tags:              glotpress, rest, api, endpoint, interface
 *
 * Requires at least: 4.9
 * Requires PHP:      7.4
 * Version:           0.1
 *
 * Author:            MELONIQ.NET
 * Author URI:        https://meloniq.net/
 *
 * License:           GPLv2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Text Domain:       glotcore-rest-api
 *
 * Requires Plugins:  glotpress
 *
 * @package GlotCore\RestApi
 */

namespace GlotCore\RestApi;

// If this file is accessed directly, then abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'GC_RESTAPI_TD', 'glotcore-rest-api' );
define( 'GC_RESTAPI_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'GC_RESTAPI_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/**
 * GP Init Setup.
 *
 * @return void
 */
function gp_init() {
	global $glotcore_restapi;

	require_once __DIR__ . '/src/class-gp-options.php';
	require_once __DIR__ . '/src/trait-gp-profile-helper.php';
	require_once __DIR__ . '/src/trait-gp-responses-helper.php';
	require_once __DIR__ . '/src/trait-gp-query-params-helper.php';

	require_once __DIR__ . '/src/class-gp-rest-controller.php';
	require_once __DIR__ . '/src/class-gp-rest-formats-controller.php';
	require_once __DIR__ . '/src/class-gp-rest-glossaries-controller.php';
	require_once __DIR__ . '/src/class-gp-rest-glossary-entries-controller.php';
	require_once __DIR__ . '/src/class-gp-rest-import-controller.php';
	require_once __DIR__ . '/src/class-gp-rest-languages-controller.php';
	require_once __DIR__ . '/src/class-gp-rest-originals-controller.php';
	require_once __DIR__ . '/src/class-gp-rest-projects-controller.php';
	require_once __DIR__ . '/src/class-gp-rest-project-permissions-controller.php';
	require_once __DIR__ . '/src/class-gp-rest-profile-controller.php';
	require_once __DIR__ . '/src/class-gp-rest-translations-controller.php';
	require_once __DIR__ . '/src/class-gp-rest-translation-sets-controller.php';

	$glotcore_restapi                        = array();
	$glotcore_restapi['formats']             = new GP_REST_Formats_Controller();
	$glotcore_restapi['glossaries']          = new GP_REST_Glossaries_Controller();
	$glotcore_restapi['glossary-entries']    = new GP_REST_Glossary_Entries_Controller();
	$glotcore_restapi['import']              = new GP_REST_Import_Controller();
	$glotcore_restapi['languages']           = new GP_REST_Languages_Controller();
	$glotcore_restapi['originals']           = new GP_REST_Originals_Controller();
	$glotcore_restapi['projects']            = new GP_REST_Projects_Controller();
	$glotcore_restapi['project-permissions'] = new GP_REST_Project_Permissions_Controller();
	$glotcore_restapi['profile']             = new GP_REST_Profile_Controller();
	$glotcore_restapi['translations']        = new GP_REST_Translations_Controller();
	$glotcore_restapi['translation-sets']    = new GP_REST_Translation_Sets_Controller();
}
add_action( 'gp_init', 'GlotCore\RestApi\gp_init' );
