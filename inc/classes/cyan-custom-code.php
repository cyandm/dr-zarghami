<?php

class cyn_custom_code
{

    function __construct()
    {
        add_action('wp_head', [$this, 'cyn_head_tag']);
        add_action('wp_body_open', [$this, 'cyn_start_body_tag']);
        add_action('wp_footer', [$this, 'cyn_end_body_tag']);
    }


    function cyn_head_tag()
    {
        for ($i = 1; $i <= 10; $i++) {
            echo get_option("cyn_head_code_$i");
        }
    }

    function cyn_start_body_tag()
    {
        for ($i = 1; $i <= 10; $i++) {
            echo get_option("cyn_start_body_code_$i");
        }
    }
    function cyn_end_body_tag()
    {
        for ($i = 1; $i <= 10; $i++) {
            echo get_option("cyn_end_body_code_$i");
        }
    }
}