<?php
/**
 * REST API: GP_Options class
 *
 * @package GlotCore\RestApi
 */

namespace GlotCore\RestApi;

/**
 * Class for various options used in the REST API.
 */
class GP_Options {

	/**
	 * Get "Sort by" options.
	 *
	 * @return array
	 */
	public static function get_sort_by_options() {
		$options = array(
			'original_date_added'       => __( 'Date added (original)', 'glotcore-rest-api' ),
			'translation_date_added'    => __( 'Date added (translation)', 'glotcore-rest-api' ),
			'translation_date_modified' => __( 'Date modified (translation)', 'glotcore-rest-api' ),
			'original'                  => __( 'Original string', 'glotcore-rest-api' ),
			'translation'               => __( 'Translation', 'glotcore-rest-api' ),
			'priority'                  => __( 'Priority', 'glotcore-rest-api' ),
			'references'                => __( 'Filename in source', 'glotcore-rest-api' ),
			'length'                    => __( 'Original length', 'glotcore-rest-api' ),
			'random'                    => __( 'Random', 'glotcore-rest-api' ),
		);

		return $options;
	}

	/**
	 * Get "Sort order" options.
	 *
	 * @return array
	 */
	public static function get_sort_order_options() {
		$options = array(
			'asc'  => __( 'Ascending', 'glotcore-rest-api' ),
			'desc' => __( 'Descending', 'glotcore-rest-api' ),
		);

		return $options;
	}

	/**
	 * Get "Term scope" options.
	 *
	 * @return array
	 */
	public static function get_term_scope_options() {
		$options = array(
			'scope_originals'    => __( 'Originals only', 'glotcore-rest-api' ),
			'scope_translations' => __( 'Translations only', 'glotcore-rest-api' ),
			'scope_context'      => __( 'Context only', 'glotcore-rest-api' ),
			'scope_references'   => __( 'References only', 'glotcore-rest-api' ),
			'scope_both'         => __( 'Both Originals and Translations', 'glotcore-rest-api' ),
			'scope_any'          => __( 'Any', 'glotcore-rest-api' ),
		);

		return $options;
	}

	/**
	 * Get "Filter status" options.
	 *
	 * @return array
	 */
	public static function get_filter_status_options() {
		$options = array(
			'current'      => __( 'Current', 'glotcore-rest-api' ),
			'waiting'      => __( 'Waiting', 'glotcore-rest-api' ),
			'fuzzy'        => __( 'Fuzzy', 'glotcore-rest-api' ),
			'untranslated' => __( 'Untranslated', 'glotcore-rest-api' ),
			'rejected'     => __( 'Rejected', 'glotcore-rest-api' ),
			'old'          => __( 'Old', 'glotcore-rest-api' ),
		);

		return $options;
	}

	/**
	 * Get "Filter options" options.
	 *
	 * @return array
	 */
	public static function get_filter_options_options() {
		$options = array(
			'with_comment' => __( 'With comment', 'glotcore-rest-api' ),
			'with_context' => __( 'With context', 'glotcore-rest-api' ),
			'warnings'     => __( 'With warnings', 'glotcore-rest-api' ),
			'with_plural'  => __( 'With plural', 'glotcore-rest-api' ),
		);

		return $options;
	}
}
