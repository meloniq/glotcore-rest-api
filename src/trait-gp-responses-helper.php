<?php
/**
 * Trait: GP_Responses_Helper class
 *
 * @package GlotCore\RestApi
 */

namespace GlotCore\RestApi;

use WP_REST_Response;

/**
 * Trait used to provide response helper methods for REST API controllers.
 */
trait GP_Responses_Helper {

	/**
	 * Response 404 for not found glossary.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_404_glossary_not_found() {
		return new WP_REST_Response(
			array(
				'code'    => 'glossary_not_found',
				'message' => __( 'Glossary not found.', 'glotcore-rest-api' ),
			),
			404
		);
	}

	/**
	 * Response 409 for glossary already exists.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_409_glossary_already_exists() {
		return new WP_REST_Response(
			array(
				'code'    => 'glossary_already_exists',
				'message' => __( 'A glossary for this translation set already exists.', 'glotcore-rest-api' ),
			),
			409
		);
	}

	/**
	 * Response 500 for glossary creation failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_glossary_creation_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'glossary_creation_failed',
				'message' => __( 'Failed to create glossary.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 500 for glossary update failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_glossary_update_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'glossary_update_failed',
				'message' => __( 'Failed to update glossary.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 500 for glossary delete failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_glossary_deletion_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'glossary_deletion_failed',
				'message' => __( 'Failed to delete glossary.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 404 for not found glossary entry.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_404_glossary_entry_not_found() {
		return new WP_REST_Response(
			array(
				'code'    => 'glossary_entry_not_found',
				'message' => __( 'Glossary entry not found.', 'glotcore-rest-api' ),
			),
			404
		);
	}

	/**
	 * Response 409 for glossary entry already exists.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_409_glossary_entry_already_exists() {
		return new WP_REST_Response(
			array(
				'code'    => 'glossary_entry_already_exists',
				'message' => __( 'A glossary entry for this translation set already exists.', 'glotcore-rest-api' ),
			),
			409
		);
	}

	/**
	 * Response 500 for glossary entry creation failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_glossary_entry_creation_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'glossary_entry_creation_failed',
				'message' => __( 'Failed to create glossary entry.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 500 for glossary entry update failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_glossary_entry_update_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'glossary_entry_update_failed',
				'message' => __( 'Failed to update glossary entry.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 500 for glossary entry delete failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_glossary_entry_deletion_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'glossary_entry_deletion_failed',
				'message' => __( 'Failed to delete glossary entry.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 404 for not found locale.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_404_locale_not_found() {
		return new WP_REST_Response(
			array(
				'code'    => 'locale_not_found',
				'message' => __( 'Locale not found.', 'glotcore-rest-api' ),
			),
			404
		);
	}

	/**
	 * Response 404 for not found original string.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_404_original_not_found() {
		return new WP_REST_Response(
			array(
				'code'    => 'original_not_found',
				'message' => __( 'Original string not found.', 'glotcore-rest-api' ),
			),
			404
		);
	}

	/**
	 * Response 409 for original string already exists.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_409_original_already_exists() {
		return new WP_REST_Response(
			array(
				'code'    => 'original_already_exists',
				'message' => __( 'An identical original string already exists.', 'glotcore-rest-api' ),
			),
			409
		);
	}

	/**
	 * Response 500 for original string creation failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_original_creation_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'original_creation_failed',
				'message' => __( 'Failed to create original string.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 500 for original string update failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_original_update_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'original_update_failed',
				'message' => __( 'Failed to update original string.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 500 for original string delete failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_original_deletion_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'original_deletion_failed',
				'message' => __( 'Failed to delete original string.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 404 for not found project.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_404_project_not_found() {
		return new WP_REST_Response(
			array(
				'code'    => 'project_not_found',
				'message' => __( 'Project not found.', 'glotcore-rest-api' ),
			),
			404
		);
	}

	/**
	 * Response 409 for project already exists.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_409_project_already_exists() {
		return new WP_REST_Response(
			array(
				'code'    => 'project_already_exists',
				'message' => __( 'An identical project already exists.', 'glotcore-rest-api' ),
			),
			409
		);
	}

	/**
	 * Response 500 for project creation failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_project_creation_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'project_creation_failed',
				'message' => __( 'Failed to create project.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 500 for project update failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_project_update_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'project_update_failed',
				'message' => __( 'Failed to update project.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 500 for project delete failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_project_deletion_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'project_deletion_failed',
				'message' => __( 'Failed to delete project.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 404 for not found project permission.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_404_project_permission_not_found() {
		return new WP_REST_Response(
			array(
				'code'    => 'project_permission_not_found',
				'message' => __( 'Project permission not found.', 'glotcore-rest-api' ),
			),
			404
		);
	}

	/**
	 * Response 409 for project permission already exists.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_409_project_permission_already_exists() {
		return new WP_REST_Response(
			array(
				'code'    => 'project_permission_already_exists',
				'message' => __( 'A project permission for this project already exists.', 'glotcore-rest-api' ),
			),
			409
		);
	}

	/**
	 * Response 500 for project permission creation failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_project_permission_creation_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'project_permission_creation_failed',
				'message' => __( 'Failed to create project permission.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 500 for project permission update failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_project_permission_update_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'project_permission_update_failed',
				'message' => __( 'Failed to update project permission.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 500 for project permission delete failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_project_permission_deletion_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'project_permission_deletion_failed',
				'message' => __( 'Failed to delete project permission.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 404 for not found translation.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_404_translation_not_found() {
		return new WP_REST_Response(
			array(
				'code'    => 'translation_not_found',
				'message' => __( 'Translation not found.', 'glotcore-rest-api' ),
			),
			404
		);
	}

	/**
	 * Response 409 for translation already exists.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_409_translation_already_exists() {
		return new WP_REST_Response(
			array(
				'code'    => 'translation_already_exists',
				'message' => __( 'An identical translation already exists.', 'glotcore-rest-api' ),
			),
			409
		);
	}

	/**
	 * Response 500 for translation creation failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_translation_creation_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'translation_creation_failed',
				'message' => __( 'Failed to create translation.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 500 for translation update failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_translation_update_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'translation_update_failed',
				'message' => __( 'Failed to update translation.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 500 for translation delete failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_translation_deletion_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'translation_deletion_failed',
				'message' => __( 'Failed to delete translation.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 404 for not found translation set.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_404_translation_set_not_found() {
		return new WP_REST_Response(
			array(
				'code'    => 'translation_set_not_found',
				'message' => __( 'Translation set not found.', 'glotcore-rest-api' ),
			),
			404
		);
	}

	/**
	 * Response 409 for translation set already exists.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_409_translation_set_already_exists() {
		return new WP_REST_Response(
			array(
				'code'    => 'translation_set_already_exists',
				'message' => __( 'A translation set with the same project, locale, and slug already exists.', 'glotcore-rest-api' ),
			),
			409
		);
	}

	/**
	 * Response 500 for translation set creation failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_translation_set_creation_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'translation_set_creation_failed',
				'message' => __( 'Failed to create translation set.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 500 for translation set update failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_translation_set_update_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'translation_set_update_failed',
				'message' => __( 'Failed to update translation set.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 500 for translation set delete failed.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_500_translation_set_deletion_failed() {
		return new WP_REST_Response(
			array(
				'code'    => 'translation_set_deletion_failed',
				'message' => __( 'Failed to delete translation set.', 'glotcore-rest-api' ),
			),
			500
		);
	}

	/**
	 * Response 404 for not found user.
	 *
	 * @return WP_REST_Response The response object.
	 */
	public function response_404_user_not_found() {
		return new WP_REST_Response(
			array(
				'code'    => 'user_not_found',
				'message' => __( 'User not found.', 'glotcore-rest-api' ),
			),
			404
		);
	}
}
