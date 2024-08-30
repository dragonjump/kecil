<?php

function getInputFormHtml()
{
    // $html = file_get_contents('input-form.html');

    $html_file = get_template_directory() . '/input-form.html';

    $html_content = file_get_contents($html_file);
    // $sanitized_html = wp_kses_post($html_content);
 

    return $html_content;
}


function subscribe_link()
{
    return 'Follow us on Twitter';
}


function subscribe_link_att($atts)
{
    // Load Js Code
    wp_enqueue_script( 'my-script', get_template_directory_uri() . '/input-form.js', array( 'jquery' ) );
  // Localize the script to make it available to the shortcode
    wp_localize_script( 'my-script', 'my_script_vars', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
    ) );
    $default = array(
        'link' => '#',
    );
    $a = shortcode_atts($default, $atts);

    $htmlLink = 'Follow us on ' . $a['link'] . getInputFormHtml();
    return $htmlLink;
}

// Bind Js-PHP function call
// functions.php
function my_ajax_handler()
{
    // This is the PHP function that will be called from JavaScript
    echo "Button clicked!";
    wp_die();
}
add_action('wp_ajax_my_ajax_handler', 'my_ajax_handler');
add_action('wp_ajax_nopriv_my_ajax_handler', 'my_ajax_handler');



add_shortcode('kecil-subscribe-param', 'subscribe_link_att');
add_shortcode('kecil-subscribe', 'subscribe_link');


// [kecil-subscribe-param link='https://www.facebook.com/Hostinger/']
// [kecil-subscribe link='https://twitter.com/Hostinger?s=20/']
?>