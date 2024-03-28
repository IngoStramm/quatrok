<?php

add_action('wp_enqueue_scripts', 'qk_frontend_scripts');

function qk_frontend_scripts()
{

    $min = (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1', '10.0.0.3'))) ? '' : '.min';

    if (empty($min)) :
        wp_enqueue_script('quatrok-livereload', 'http://localhost:35729/livereload.js?snipver=1', array(), null, true);
    endif;

    wp_register_script('quatrok-script', QK_URL . 'assets/js/quatrok' . $min . '.js', array('jquery'), '1.0.0', true);

    wp_enqueue_script('quatrok-script');
    $telefones = qk_get_option('telefones');
    $ajax_object = array(
        'ajax_url'      => admin_url('admin-ajax.php'),
        'telefones'     => $telefones
    );

    wp_localize_script('quatrok-script', 'ajax_object', $ajax_object);
    wp_enqueue_style('quatrok-style', QK_URL . 'assets/css/quatrok.css', array(), '1.0.0', 'all');
}
