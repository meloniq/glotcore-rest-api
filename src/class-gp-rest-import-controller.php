<?php
/**
 * REST API: GP_REST_Import_Controller class
 *
 * @package GlotCore\RestApi
 */

namespace GlotCore\RestApi;

use GP;
use GP_Project;
use WP_REST_Response;
use WP_REST_Request;
use WP_REST_Server;

/**
 * Core class used to manage a import via the REST API.
 *
 * @see GP_REST_Controller
 */
class GP_REST_Import_Controller extends GP_REST_Controller {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->rest_base = 'import';
		parent::__construct();
	}

	/**
	 * Registers the routes for the import endpoint.
	 *
	 * @see register_rest_route()
	 */
	public function register_routes() {

		// PUT projects/{id} .
		register_rest_route(
			$this->namespace,
			'/' . $this->rest_base . '/(?P<id>\d+)',
			array(
				array(
					'methods'             => WP_REST_Server::EDITABLE,
					'callback'            => array( $this, 'update_item' ),
					'permission_callback' => array( $this, 'update_item_permissions_check' ),
					'args'                => array(
						'id' => array(
							'description' => __( 'Unique identifier for the project.', 'glotcore-rest-api' ),
							'type'        => 'integer',
							'required'    => true,
						),
					),
				),
				'schema' => array( $this, 'get_item_schema' ),
			)
		);

	}

	/**
	 * Handles PUT requests to /projects/{id} endpoint.
	 *
	 * @param WP_REST_Request $request The REST request.
	 *
	 * @return WP_REST_Response The response.
	 */
	public function update_item( $request ) {
		$project_id = absint( $request->get_param( 'id' ) );
		$project    = GP::$project->get( $project_id );
		if ( ! $project ) {
			return $this->response_404_project_not_found();
		}

		$files = $request->get_file_params();

		if ( empty( $files['file'] ) ) {
			return new WP_REST_Response(
				array(
					'code'    => 'import_missing_file',
					'message' => __( 'A file is required with key `file`.', 'glotcore-rest-api' ),
				),
				400
			);
		}

		$format = gp_get_import_file_format( gp_post( 'format', 'po' ), $files['file']['name'] ); // phpcs:ignore WordPress.Security.NonceVerification.Missing

		if ( ! $format ) {
			return new WP_REST_Response(
				array(
					'code'    => 'import_unsupported_file_format',
					'message' => __( 'File format not supported.', 'glotcore-rest-api' ),
				),
				400
			);
		}

		$translations = $format->read_originals_from_file( $files['file']['tmp_name'] ); // phpcs:ignore WordPress.Security.NonceVerification.Missing

		if ( ! $translations ) {
			return new WP_REST_Response(
				array(
					'code'    => 'import_file_not_read',
					'message' => __( 'Couldn&#8217;t load translations from file.', 'glotcore-rest-api' ),
				),
				400
			);
		}
		
		$result = GP::$original->import_for_project( $project, $translations );

		$data = $this->prepare_item_for_response( $result, $request );

		$response = rest_ensure_response( $data );

		return $response;
	}

	/**
	 * Permission check for editing a project.
	 *
	 * @param WP_REST_Request $request The REST request.
	 *
	 * @return bool True if the request has permission, false otherwise.
	 */
	public function update_item_permissions_check( $request ) {
		$project_id = absint( $request->get_param( 'id' ) );

		return $this->current_user_can( 'write', 'project', $project_id );
	}

	/**
	 * Prepares an import result for response.
	 *
	 * @param array           $results Results of import.
	 * @param WP_REST_Request $request Request object.
	 *
	 * @return WP_REST_Response Response object.
	 */
	public function prepare_item_for_response( $results, $request ) {
		list( $originals_added, $originals_existing, $originals_fuzzied, $originals_obsoleted, $originals_error ) = $results;

		$data = array(
			'originals_added'     => (int) $originals_added,
			'originals_existing'  => (int) $originals_existing,
			'originals_fuzzied'   => (int) $originals_fuzzied,
			'originals_obsoleted' => (int) $originals_obsoleted,
			'originals_error'     => (int) $originals_error,
		);

		// Wrap the data in a response object.
		$response = rest_ensure_response( $data );

		/**
		 * Filters a project returned from the REST API.
		 * Allows modification of the project right before it is returned.
		 *
		 * @param WP_REST_Response  $response The response object.
		 * @param array             $results Results of import.
		 * @param WP_REST_Request   $request  Request used to generate the response.
		 */
		return apply_filters( 'gp_rest_prepare_import', $response, $results, $request );
	}

	/**
	 * Retrieves the import result schema, conforming to JSON Schema.
	 *
	 * @return array
	 */
	public function get_item_schema() {
		if ( $this->schema ) {
			return $this->add_additional_fields_schema( $this->schema );
		}

		$schema = array(
			'$schema'    => 'http://json-schema.org/draft-04/schema#',
			'title'      => 'import-result',
			'type'       => 'object',
			'properties' => array(
				'originals_added'     => array(
					'description' => __( 'Number of originals added during import.', 'glotcore-rest-api' ),
					'type'        => 'integer',
					'context'     => array( 'view' ),
					'readonly'    => true,
				),
				'originals_existing'  => array(
					'description' => __( 'Number of originals that already existed.', 'glotcore-rest-api' ),
					'type'        => 'integer',
					'context'     => array( 'view' ),
					'readonly'    => true,
				),
				'originals_fuzzied'   => array(
					'description' => __( 'Number of originals marked as fuzzy.', 'glotcore-rest-api' ),
					'type'        => 'integer',
					'context'     => array( 'view' ),
					'readonly'    => true,
				),
				'originals_obsoleted' => array(
					'description' => __( 'Number of originals marked as obsolete.', 'glotcore-rest-api' ),
					'type'        => 'integer',
					'context'     => array( 'view' ),
					'readonly'    => true,
				),
				'originals_error'     => array(
					'description' => __( 'Number of originals that resulted in an error.', 'glotcore-rest-api' ),
					'type'        => 'integer',
					'context'     => array( 'view' ),
					'readonly'    => true,
				),
			),
		);

		$this->schema = $schema;

		return $this->add_additional_fields_schema( $this->schema );
	}
}
