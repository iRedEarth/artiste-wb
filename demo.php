<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://metabox.io/docs/registering-meta-boxes/
 */


add_filter( 'rwmb_meta_boxes', 'artiste_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function artiste_register_meta_boxes( $meta_boxes )
{
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'artiste_';

	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'artiste_resume',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'Actor Job Fields', 'meta-box' ),

		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'job' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',

		// Auto save: true, false (default). Optional.
		'autosave'   => true,

		// List of meta fields
		'fields'     => array(

			// ROLE
			array(
				// Field name - Will be used as label
				'name'  => __( 'Role', 'meta-box' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}role",
				// Field description (optional)
				'desc'  => __( 'Role', 'meta-box' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => __( 'Default text value', 'meta-box' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),

			// VENUE
			array(
				// Field name - Will be used as label
				'name'  => __( 'Venue', 'meta-box' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}venue",
				// Field description (optional)
				'desc'  => __( 'Theater, Theater Company, TV Network', 'meta-box' ),
				'type'  => 'text',
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),

			// DIRECTOR
			array(
				// Field name - Will be used as label
				'name'  => __( 'Director', 'meta-box' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}director",
				// Field description (optional)
				'desc'  => __( 'Show Director', 'meta-box' ),
				'type'  => 'text',
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),

			// JOB CATEGORIES
			array(
				'name'    => __( 'Job Category', 'meta-box' ),
				'id'      => "{$prefix}job-category",
				'desc'  => __( 'Resumé Section', 'meta-box' ),
				'std'   => __( 'Regional Theater', 'meta-box' ),
				'type'    => 'taxonomy',
				'options' => array(
					// Taxonomy name
					'taxonomy' => 'job-categories',
					// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
					'type'     => 'select'
					// Additional arguments for get_terms() function. Optional
					//'args'     => array()
				)
			)

		)
	);

	return $meta_boxes;
}


