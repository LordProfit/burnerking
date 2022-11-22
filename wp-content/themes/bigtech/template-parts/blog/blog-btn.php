<?php

/**
 * Template part for displaying post btn
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bigtech
 */

$bigtech_blog_btn = get_theme_mod('bigtech_blog_btn', __( 'Read More', 'bigtech' ) );
$bigtech_blog_btn_switch = get_theme_mod( 'bigtech_blog_btn_switch', true );

?>

<?php if ( !empty( $bigtech_blog_btn_switch ) ): ?>
<div class="tg-blog-post-bottom">
    <a href="<?php the_permalink(); ?>" class="btn btn-two"><?php print esc_html($bigtech_blog_btn); ?> <i class="fas fa-arrow-right"></i></a>
</div>
<?php endif;?>