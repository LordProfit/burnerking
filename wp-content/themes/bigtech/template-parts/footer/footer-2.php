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
$bigtech_copyright_center = $bigtech_footer_logo ? 'col-lg-4 offset-lg-4 col-md-6 text-right' : 'col-lg-12 text-center';
$bigtech_footer_bg_url_from_page = function_exists( 'get_field' ) ? get_field( 'bigtech_footer_bg' ) : '';
$bigtech_footer_bg_color_from_page = function_exists( 'get_field' ) ? get_field( 'bigtech_footer_bg_color' ) : '';
$show_footer_image = function_exists( 'get_field' ) ? get_field( 'show_footer_image' ) : '';
$footer_bg_color = get_theme_mod( 'bigtech_footer_bg_color' );


// Back To Top
$bigtech_backtotop = get_theme_mod( 'bigtech_backtotop', false );


// BG Image
if ( !$show_footer_image ) {
    $bg_img = '';

} else {
    $bg_img = !empty( $bigtech_footer_bg_url_from_page['url'] ) ? $bigtech_footer_bg_url_from_page['url'] : $footer_bg_img;
}


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
$bigtech_copyright_center = $show_copyright_menu ? 'col-lg-6' : 'col-lg-12 text-center';


// Footer Columns
$footer_columns = 0;
$footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

for ( $num = 1; $num <= $footer_widgets; $num++ ) {
    if ( is_active_sidebar( 'footer-2-' . $num ) ) {
        $footer_columns++;
    }
}

switch ( $footer_columns ) {
case '1':
    $footer_class[1] = 'col-lg-12';
    break;
case '2':
    $footer_class[1] = 'col-lg-6 col-md-6';
    $footer_class[2] = 'col-lg-6 col-md-6';
    break;
case '3':
    $footer_class[1] = 'col-lg-4 col-md-6';
    $footer_class[2] = 'col-lg-4 col-md-6 col-sm-6';
    $footer_class[3] = 'col-lg-4 col-md-6 col-sm-6';
    break;
case '4':
    $footer_class[1] = 'col-xl-3 col-lg-4 col-md-6';
    $footer_class[2] = 'col-xl-3 col-lg-5 col-sm-6';
    $footer_class[3] = 'col-xl-2 col-lg-3 col-sm-6';
    $footer_class[4] = 'col-xl-4 col-lg-4 col-md-6';
    break;
default:
    $footer_class = 'col-xl-3 col-lg-4 col-sm-6';
    break;
}

?>


<!-- footer-area -->
<footer>
    <div class="footer-area" data-bg-color="<?php print esc_attr( $bg_color );?>" data-background="<?php print esc_url( $bg_img );?>">

        <?php if ( !empty( $bigtech_backtotop ) ): ?>
            <div class="container">
                <div class="footer-scroll-wrap">
                    <button class="scroll-to-target" data-target="html"><i class="fas fa-arrow-up"></i></button>
                </div>
            </div>
        <?php endif;?>

        <?php if ( is_active_sidebar('footer-2-1') OR is_active_sidebar('footer-2-2') OR is_active_sidebar('footer-2-3') OR is_active_sidebar('footer-2-4') ): ?>
        <div class="footer-top-wrap">
            <div class="container">
                <div class="row">
                    <?php
                        if ( $footer_columns < 4 ) {
                        print '<div class="col-xl-3 col-lg-4 col-md-6">';
                        dynamic_sidebar( 'footer-2-1' );
                        print '</div>';

                        print '<div class="col-xl-3 col-lg-5 col-sm-6">';
                        dynamic_sidebar( 'footer-2-2' );
                        print '</div>';

                        print '<div class="col-xl-2 col-lg-3 col-sm-6">';
                        dynamic_sidebar( 'footer-2-3' );
                        print '</div>';

                        print '<div class="col-xl-4 col-lg-4 col-md-6">';
                        dynamic_sidebar( 'footer-2-4' );
                        print '</div>';
                        } else {
                            for ( $num = 1; $num <= $footer_columns; $num++ ) {
                                if ( !is_active_sidebar( 'footer-2-' . $num ) ) {
                                    continue;
                                }
                                print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                                dynamic_sidebar( 'footer-2-' . $num );
                                print '</div>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="container">
            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="<?php print esc_attr($bigtech_copyright_center); ?>">
                        <div class="copyright-text">
                            <p><?php print bigtech_copyright_text(); ?></p>
                        </div>
                    </div>

                    <?php if (!empty($show_copyright_menu)) : ?>
                    <div class="col-lg-6 d-none d-sm-block">
                        <div class="footer-menu">
                            <ul>
                                <?php foreach ( $copyright_menu_repeater as $item ) : ?>
                                    <li><a href="<?php echo esc_url($item['link_url']); ?>"><?php echo esc_html($item['link_text']); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    </div>
</footer>
<!-- footer-area-end -->