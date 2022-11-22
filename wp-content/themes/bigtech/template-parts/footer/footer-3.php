<?php

/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bigtech
*/

$footer_bg_img = get_theme_mod( 'bigtech_footer_bg' );
$bigtech_footer_logo = get_theme_mod( 'bigtech_footer_logo' );
$bigtech_footer_top_space = function_exists('get_field') ? get_field('bigtech_footer_top_space') : '0';
$bigtech_footer_bg_url_from_page = function_exists( 'get_field' ) ? get_field( 'bigtech_footer_bg' ) : '';
$bigtech_footer_bg_color_from_page = function_exists( 'get_field' ) ? get_field( 'bigtech_footer_bg_color' ) : '';
$footer_bg_color = get_theme_mod( 'bigtech_footer_bg_color' );

// Social Center
$footer_style_3_switch = get_theme_mod( 'footer_style_3_switch', false );
$show_footer_social = get_theme_mod( 'show_footer_social', false );
$bigtech_menu_center = $show_footer_social ? 'col-md-8' : 'col-lg-12 menu-center';
$bigtech_social_center = ( has_nav_menu( 'footer-menu') ) ? 'col-md-4' : 'col-lg-12 social-center';

// Back To Top
$bigtech_backtotop = get_theme_mod( 'bigtech_backtotop', false );

// BG Image
$bg_img = !empty( $bigtech_footer_bg_url_from_page['url'] ) ? $bigtech_footer_bg_url_from_page['url'] : $footer_bg_img;

// BG Color
$bg_color = !empty( $bigtech_footer_bg_color_from_page ) ? $bigtech_footer_bg_color_from_page : $footer_bg_color;


// Footer
$show_copyright_menu = get_theme_mod( 'show_copyright_menu', false );
$defaults_menu = [
    [
        'link_text' => esc_html__( 'Terms and conditions', 'bigtech' ),
        'link_url'  => '#',
    ],
    [
        'link_text' => esc_html__( 'Privacy policy', 'bigtech' ),
        'link_url'  => '#',
    ],
];
$copyright_menu_repeater = get_theme_mod('copyright_menu_repeater' , $defaults_menu);
$bigtech_copyright_center = $show_copyright_menu && $bigtech_backtotop ? 'col-lg-5' : 'col-lg-12 text-center';

?>


<!-- footer-area -->
<footer>
    <div class="footer-area-two">
        <div class="container custom-container-four">

            <?php if ( !empty( $show_footer_social ) || has_nav_menu( 'footer-menu' ) ): ?>
                <div class="footer-top-wrap">
                    <div class="row align-items-center">
                        <?php if( has_nav_menu( 'footer-menu') ): ?>
                            <div class="<?php echo esc_attr($bigtech_menu_center); ?>">
                                <div class="footer-menu-two">
                                    <?php bigtech_footer_menu(); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( !empty( $show_footer_social ) ): ?>
                        <div class="<?php echo esc_attr($bigtech_social_center); ?>">
                            <div class="footer-social">
                                <?php bigtech_footer_social_profiles(); ?>
                            </div>
                        </div>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?>

            <div class="footer-bottom">
                <div class="row justify-content-between">

                    <div class="<?php print esc_attr($bigtech_copyright_center); ?>">
                        <div class="copyright-text">
                            <p><?php print bigtech_copyright_text(); ?></p>
                        </div>
                    </div>

                    <?php if ( !empty( $bigtech_backtotop ) ): ?>
                    <div class="col-lg-2">
                        <div class="scroll-up text-center">
                            <button class="scroll-to-target" data-target="html"><i class="fas fa-arrow-up"></i></button>
                            <span><?php echo esc_html__('Scroll Top','bigtech') ?></span>
                        </div>
                    </div>
                    <?php endif;?>

                    <?php if (!empty($show_copyright_menu)) : ?>
                    <div class="col-lg-5">
                        <div class="footer-bottom-menu">
                            <ul>
                                <?php
                                    $maxItem = 0;
                                    foreach ( $copyright_menu_repeater as $key => $item ) :
                                    if(++$maxItem > 2) break;
                                ?>
                                    <li><a href="<?php echo esc_url($item['link_url']); ?>"><?php echo esc_html($item['link_text']); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif;?>

                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-area-end -->