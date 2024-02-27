<?php 
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    if( function_exists('acf_register_block_type') ) {

        acf_register_block_type(array(
            'name'              => 'my_quote',
            'title'             => __('Quote (WSC)'),
            'description'       => __('Add Quote (WSC)'),
            'render_template'   => 'parts/blocks/quote.php',
            'category'          => 'common',
            'post_types'        => array('post'),
        ));
        acf_register_block_type(array(
            'name'              => 'my_widget',
            'title'             => __('Widget (WSC)'),
            'description'       => __('Add Widget (WSC)'),
            'render_template'   => 'parts/blocks/widget.php',
            'category'          => 'common',
            'post_types'        => array('post'),
        ));
        acf_register_block_type(array(
            'name'              => 'my_text',
            'title'             => __('Text (WSC)'),
            'description'       => __('Add Text (WSC)'),
            'render_template'   => 'parts/blocks/text.php',
            'category'          => 'common',
            'post_types'        => array('post'),
        ));
    }
}