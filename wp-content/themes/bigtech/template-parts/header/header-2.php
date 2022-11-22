<?php

	/**
	* Template part for displaying header layout one
	*
	* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	*
	* @package bigtech
	*/

    // Header Settings
    $bigtech_show_header_right = get_theme_mod( 'bigtech_show_header_right', false );
    $bigtech_show_heder_lang = get_theme_mod( 'bigtech_show_heder_lang', false );
    $bigtech_show_heder_btn = get_theme_mod( 'bigtech_show_heder_btn', false );
    $bigtech_heder_btn_text = get_theme_mod( 'bigtech_heder_btn_text', __( 'Buy Now', 'bigtech' ) );
    $bigtech_heder_btn_url = get_theme_mod( 'bigtech_heder_btn_url', __( '#', 'bigtech' ) );
    $bigtech_show_mobile_social = get_theme_mod( 'bigtech_show_mobile_social', false );

?>


<!-- header-area -->
<header id="header">
    <div id="header-fixed-height"></div>
    <div id="sticky-header" class="menu-area">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu-wrap">
                        <nav class="menu-nav">
                            <div class="logo">
                                <?php bigtech_header_logo(); ?>
                            </div>
                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                <?php bigtech_home_menu(); ?>
                            </div>

                            <?php if ( !empty($bigtech_show_header_right) ) : ?>
                            <div class="header-action d-none d-md-block">
                                <ul>

                                    <?php if ( !empty($bigtech_show_heder_lang) ) : ?>
                                        <li class="header-lang"><span class="selected-lang">ENG</span>
                                            <?php do_action('bigtech_language'); ?>
                                        </li>
                                    <?php endif; ?>

                                    <?php if ( !empty($bigtech_show_heder_btn) ) : ?>
                                        <li class="header-btn"><a href="<?php echo esc_url($bigtech_heder_btn_url); ?>" class="btn"><?php echo esc_html($bigtech_heder_btn_text); ?></a></li>
                                    <?php endif; ?>

                                </ul>
                            </div>
                            <?php endif; ?>

                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="mobile-menu">
                        <nav class="menu-box">
                            <div class="close-btn"><i class="fas fa-times"></i></div>
                            <div class="nav-logo">
                                <?php bigtech_mobile_logo(); ?>
                            </div>
                            <div class="menu-outer">
                                <?php bigtech_home_mobile_menu(); ?>
                            </div>

                            <?php if (!empty( $bigtech_show_mobile_social )) : ?>
                            <div class="social-links">
                                <?php bigtech_mobile_social_profiles(); ?>
                            </div>
                            <?php endif; ?>

                        </nav>
                    </div>
                    <div class="menu-backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-area-end -->