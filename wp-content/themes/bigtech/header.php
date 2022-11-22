<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bigtech
 */
?>

<!doctype html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo( 'charset' );?>">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ): ?>
    <?php endif;?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head();?>
</head>

<body <?php body_class();?>>

    <?php wp_body_open();?>


    <?php
        $bigtech_preloader = get_theme_mod( 'bigtech_preloader', false );

        $bigtech_preloader_logo = get_template_directory_uri() . '/assets/img/favicon.png';

        $preloader_logo = get_theme_mod('preloader_logo', $bigtech_preloader_logo);

    ?>

    <?php if ( !empty( $bigtech_preloader ) ): ?>
    <!-- pre-loader area start -->
    <div id="preloader">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>
    <!-- pre-loader area end -->
    <?php endif;?>


    <!-- header start -->
    <?php do_action( 'bigtech_header_style' );?>
    <!-- header end -->

    <!-- main-area -->
   <main class="main-area">

      <?php do_action( 'bigtech_before_main_content' );?>