<?php

/**
 * bigtech_scripts description
 * @return [type] [description]
 */
function bigtech_scripts() {


    /**
     * ALL CSS FILES
    */
    wp_enqueue_style( 'bigtech-fonts', bigtech_fonts_url(), array(), '1.0.0' );
    if( is_rtl() ){
        wp_enqueue_style( 'bootstrap-rtl', BIGTECH_THEME_CSS_DIR.'bootstrap.rtl.min.css', array() );
    }else{
        wp_enqueue_style( 'bootstrap', BIGTECH_THEME_CSS_DIR.'bootstrap.min.css', array() );
    }
    wp_enqueue_style( 'animate', BIGTECH_THEME_CSS_DIR . 'animate.min.css', [] );
    wp_enqueue_style( 'font-awesome-free', BIGTECH_THEME_CSS_DIR . 'fontawesome-all.min.css', [] );
    wp_enqueue_style( 'mCustomScrollbar', BIGTECH_THEME_CSS_DIR . 'mCustomScrollbar.min.css', [] );
    wp_enqueue_style( 'odometer', BIGTECH_THEME_CSS_DIR . 'odometer.css', [] );
    wp_enqueue_style( 'slick', BIGTECH_THEME_CSS_DIR . 'slick.css', [] );
    wp_enqueue_style( 'bigtech-default', BIGTECH_THEME_CSS_DIR . 'default.css', [] );
    wp_enqueue_style( 'bigtech-core', BIGTECH_THEME_CSS_DIR . 'bigtech-core.css', [] );
    wp_enqueue_style( 'bigtech-unit', BIGTECH_THEME_CSS_DIR . 'bigtech-unit.css', [] );
    wp_enqueue_style( 'bigtech-custom', BIGTECH_THEME_CSS_DIR . 'bigtech-custom.css', [] );
    wp_enqueue_style( 'bigtech-style', get_stylesheet_uri() );
    wp_enqueue_style( 'bigtech-responsive', BIGTECH_THEME_CSS_DIR . 'responsive.css', [] );


    // ALL JS FILES
    wp_enqueue_script( 'bootstrap-bundle', BIGTECH_THEME_JS_DIR . 'bootstrap.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'jquery-odometer', BIGTECH_THEME_JS_DIR . 'jquery.odometer.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'jquery-countdown', BIGTECH_THEME_JS_DIR . 'jquery.countdown.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'jquery-knob', BIGTECH_THEME_JS_DIR . 'jquery.knob.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'countdowngampang', BIGTECH_THEME_JS_DIR . 'jquery-countdowngampang.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'ba-throttle', BIGTECH_THEME_JS_DIR . 'jquery.ba-throttle-debounce.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'mCustomScrollbar', BIGTECH_THEME_JS_DIR . 'jquery.mCustomScrollbar.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'jarallax', BIGTECH_THEME_JS_DIR . 'jarallax.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'appear-js', BIGTECH_THEME_JS_DIR . 'jquery.appear.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'easing-js', BIGTECH_THEME_JS_DIR . 'jquery.easing.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'slick', BIGTECH_THEME_JS_DIR . 'slick.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'wow', BIGTECH_THEME_JS_DIR . 'wow.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'bigtech-main', BIGTECH_THEME_JS_DIR . 'main.js', [ 'jquery' ], false, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'bigtech_scripts' );

/*
Register Fonts
*/
function bigtech_fonts_url() {
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
    */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'bigtech' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Outfit:200,300,400,500,600,700|Poppins:200,300,400,500,600,700,800' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}