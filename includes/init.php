<?php 
// Add a custom column to the 'irm-slider' post type
function add_irm_slider_shortcode_column($columns) {
    $columns['shortcode'] = __('Shortcode');
    return $columns;
}
add_filter('manage_irm-slider_posts_columns', 'add_irm_slider_shortcode_column');

// Populate the custom column with the shortcode input field
function add_irm_slider_shortcode_column_content($column, $post_id) {
    if ($column === 'shortcode') {
        $shortcode = '[irm-slider id="' . $post_id . '"]';
        echo '<input type="text" readonly value="' . esc_attr($shortcode) . '" onclick="this.select();">';
    }
}
add_action('manage_irm-slider_posts_custom_column', 'add_irm_slider_shortcode_column_content', 10, 2);

// Make the new column sortable
function irm_slider_shortcode_column_sortable($columns) {
    $columns['shortcode'] = 'shortcode';
    return $columns;
}
add_filter('manage_edit-irm-slider_sortable_columns', 'irm_slider_shortcode_column_sortable');
