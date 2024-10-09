<?php 

// Create new post type with slug irm-slider
function irm_sliders_create_post_type() {
    register_post_type( 'irm-slider',
        array(
            'labels' => array(
                'name' => __( 'IRM Sliders', 'irm-sliders' ),
                'singular_name' => __( 'Slider', 'irm-sliders' ),
                'add_new' => __( 'Add New', 'irm-sliders' ),
                'add_new_item' => __( 'Add New Slider', 'irm-sliders' ),
                'edit' => __( 'Edit', 'irm-sliders' ),
                'edit_item' => __( 'Edit Slider', 'irm-sliders' ),
                'new_item' => __( 'New Slider', 'irm-sliders' ),
                'view' => __( 'View', 'irm-sliders' ),
                'view_item' => __( 'View Slider', 'irm-sliders' ),
                'search_items' => __( 'Search Sliders', 'irm-sliders' ),
                'not_found' => __( 'No Sliders found', 'irm-sliders' ),
                'not_found_in_trash' => __( 'No Sliders found in Trash', 'irm-sliders' ),
                'parent' => __( 'Parent Slider', 'irm-sliders' ),
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'custom-fields', 'editor' ),
            'has_archive' => false,
            'rewrite' => array('slug' => 'irm-slider'),
        )
    );
}
add_action( 'init', 'irm_sliders_create_post_type' );