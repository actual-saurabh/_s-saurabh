<?php

/**
 * Theme Functions
 *
 * @since 0.0.1
 */
if ( ! function_exists( '_s_saurabh_register_task' ) ) {

	/**
	 * Registers task custom post type.
	 *
	 * @since 0.0.1
	 */
	function _s_saurabh_register_task() {

		// all the labels & strings for the post type
		$labels = array(
			'name' => _x( 'Tasks', 'Post Type General Name', '_s-saurabh' ),
			'singular_name' => _x( 'Task', 'Post Type Singular Name', '_s-saurabh' ),
			'menu_name' => __( 'Task Types', '_s-saurabh' ),
			'name_admin_bar' => __( 'Task Type', '_s-saurabh' ),
			'archives' => __( 'Task Archives', '_s-saurabh' ),
			'attributes' => __( 'Task Attributes', '_s-saurabh' ),
			'parent_item_colon' => __( 'Parent Task:', '_s-saurabh' ),
			'all_items' => __( 'All Tasks', '_s-saurabh' ),
			'add_new_item' => __( 'Add New Task', '_s-saurabh' ),
			'add_new' => __( 'Add New', '_s-saurabh' ),
			'new_item' => __( 'New Task', '_s-saurabh' ),
			'edit_item' => __( 'Edit Task', '_s-saurabh' ),
			'update_item' => __( 'Update Task', '_s-saurabh' ),
			'view_item' => __( 'View Task', '_s-saurabh' ),
			'view_items' => __( 'View Task', '_s-saurabh' ),
			'search_items' => __( 'Search Task', '_s-saurabh' ),
			'not_found' => __( 'Not found', '_s-saurabh' ),
			'not_found_in_trash' => __( 'Not found in Trash', '_s-saurabh' ),
			'featured_image' => __( 'Featured Image', '_s-saurabh' ),
			'set_featured_image' => __( 'Set featured image', '_s-saurabh' ),
			'remove_featured_image' => __( 'Remove featured image', '_s-saurabh' ),
			'use_featured_image' => __( 'Use as featured image', '_s-saurabh' ),
			'insert_into_item' => __( 'Insert into Task', '_s-saurabh' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Task', '_s-saurabh' ),
			'items_list' => __( 'Tasks list', '_s-saurabh' ),
			'items_list_navigation' => __( 'Tasks list navigation', '_s-saurabh' ),
			'filter_items_list' => __( 'Filter items Task', '_s-saurabh' ),
		);

		// parameters for task custom post type
		$args = array(
			'label' => __( 'Task', '_s-saurabh' ),
			'labels' => $labels,
			'supports' => array( 'title', 'editor' ),
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'can_export' => true,
			'has_archive' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'capability_type' => 'page',
		);
		register_post_type( 'task', $args );
	}

	// hook registration into init
	add_action( 'init', '_s_saurabh_register_task', 0 );
}

/**
 * Registers the task status metabox
 */
function _s_saurabh_register_task_status_meta_box() {
	add_meta_box(
		'_s_saurabh_task_status', __( 'Task Status', '_s-saurabh' ), '_s_saurabh_task_status_metabox_ui', 'task'
	);
}

// hook task metabox registration into add_metaboxes hook
add_action( 'add_meta_boxes', '_s_saurabh_register_task_status_meta_box' );

/**
 * Displays the Task Status UI
 *
 * @param object $post
 */
function _s_saurabh_task_status_metabox_ui( $post ) {

	(int) $task_status = get_post_meta( $post->ID , '_s_saurabh_task_status', true );
	?>
	<input type="checkbox" name="_s_saurabh_task_status" id="_s_saurabh_task_status" value="1" <?php checked( $task_status ); ?>>
	<label for="_s_saurabh_task_status">Task completed?</label>
	<?php
}




