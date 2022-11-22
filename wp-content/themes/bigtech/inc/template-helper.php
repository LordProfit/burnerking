<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bigtech
 */

/**
 * Wp Body Class
 */
function bigtech_custom_body_class($classes) {

    $classes[] = 'white-background';

    // return the $classes array
    return $classes;
}
add_filter('body_class','bigtech_custom_body_class');


/**
 *
 * Bigtech Header
 */

function bigtech_check_header() {
    $bigtech_header_style = function_exists( 'get_field' ) ? get_field( 'header_style' ) : NULL;
    $bigtech_default_header_style = get_theme_mod( 'choose_default_header', 'header-style-1' );

    if ( $bigtech_header_style == 'header-style-1' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-1' );
    }
    elseif ( $bigtech_header_style == 'header-style-2' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-2' );
    }
    else {

        /** Default Header Style **/
        if ( $bigtech_default_header_style == 'header-style-2' ) {
            get_template_part( 'template-parts/header/header-2' );
        }
        else {
            get_template_part( 'template-parts/header/header-1' );
        }
    }

}
add_action( 'bigtech_header_style', 'bigtech_check_header', 10 );


/**
 * [bigtech_header_lang description]
 * @return [type] [description]
 */
function bigtech_header_lang_default() {
    $bigtech_header_lang = get_theme_mod( 'bigtech_header_lang', false );
    if ( $bigtech_header_lang ): ?>

    <ul>
        <li><a href="javascript:void(0)" class="lang__btn"><?php print esc_html__( 'English', 'bigtech' );?> <i class="fa-light fa-angle-down"></i></a>
        <?php do_action( 'bigtech_language' );?>
        </li>
    </ul>

    <?php endif;?>
<?php
}

/**
 * [bigtech_language_list description]
 * @return [type] [description]
 */
function _bigtech_language( $mar ) {
    return $mar;
}
function bigtech_language_list() {

    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    if ( !empty( $languages ) ) {
        $mar = '<ul class="lang-list">';
        foreach ( $languages as $lan ) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<ul class="lang-list">';
        $mar .= '<li><a href="#">' . esc_html__( 'IND', 'bigtech' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'SPA', 'bigtech' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'GRE', 'bigtech' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'CIN', 'bigtech' ) . '</a></li>';
        $mar .= ' </ul>';
    }
    print _bigtech_language( $mar );
}
add_action( 'bigtech_language', 'bigtech_language_list' );


// Header Logo
function bigtech_header_logo() { ?>
      <?php
        $bigtech_logo_on = function_exists( 'get_field' ) ? get_field( 'is_enable_sec_logo' ) : NULL;
        $bigtech_logo = get_template_directory_uri() . '/assets/img/logo/logo.png';
        $bigtech_logo_black = get_template_directory_uri() . '/assets/img/logo/secondary_logo.png';

        $bigtech_site_logo = get_theme_mod( 'logo', $bigtech_logo );
        $bigtech_secondary_logo = get_theme_mod( 'secondary_logo', $bigtech_logo_black );
      ?>

      <?php if ( !empty( $bigtech_logo_on ) ) : ?>
         <a class="secondary-logo" href="<?php print esc_url( home_url( '/' ) );?>">
             <img src="<?php print esc_url( $bigtech_secondary_logo );?>" alt="<?php print esc_attr__( 'Logo', 'bigtech' );?>" />
         </a>
      <?php else : ?>
         <a class="main-logo" href="<?php print esc_url( home_url( '/' ) );?>">
             <img src="<?php print esc_url( $bigtech_site_logo );?>" alt="<?php print esc_attr__( 'Logo', 'bigtech' );?>" />
         </a>
      <?php endif; ?>
   <?php
}

// Header Sticky Logo
function bigtech_header_sticky_logo() {?>
    <?php
        $bigtech_logo_black = get_template_directory_uri() . '/assets/img/logo/secondary_logo.png';
        $bigtech_secondary_logo = get_theme_mod( 'secondary_logo', $bigtech_logo_black );
    ?>
      <a class="sticky-logo" href="<?php print esc_url( home_url( '/' ) );?>">
          <img src="<?php print esc_url( $bigtech_secondary_logo );?>" alt="<?php print esc_attr__( 'Logo', 'bigtech' );?>" />
      </a>
    <?php
}

// Mobile Menu Logo
function bigtech_mobile_logo() {

    $mobile_menu_logo = get_template_directory_uri() . '/assets/img/logo/secondary_logo.png';
    $mobile_logo = get_theme_mod('mobile_logo', $mobile_menu_logo);

    ?>

    <a href="<?php print esc_url( home_url( '/' ) ); ?>">
        <img src="<?php print esc_url( $mobile_logo ); ?>" alt="<?php print esc_attr__( 'Logo', 'bigtech' );?>" />
    </a>

<?php }


/**
 * [bigtech_header_social_profiles description]
 * @return [type] [description]
 */
function bigtech_header_social_profiles() {
    $bigtech_header_fb_url = get_theme_mod( 'bigtech_header_fb_url', __( '#', 'bigtech' ) );
    $bigtech_header_twitter_url = get_theme_mod( 'bigtech_header_twitter_url', __( '#', 'bigtech' ) );
    $bigtech_header_linkedin_url = get_theme_mod( 'bigtech_header_linkedin_url', __( '#', 'bigtech' ) );
    ?>
    <ul>
        <?php if ( !empty( $bigtech_header_fb_url ) ): ?>
          <li><a href="<?php print esc_url( $bigtech_header_fb_url );?>"><span><i class="flaticon-facebook"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $bigtech_header_twitter_url ) ): ?>
            <li><a href="<?php print esc_url( $bigtech_header_twitter_url );?>"><span><i class="flaticon-twitter"></i></span></a></li>
        <?php endif;?>

        <?php if ( !empty( $bigtech_header_linkedin_url ) ): ?>
            <li><a href="<?php print esc_url( $bigtech_header_linkedin_url );?>"><span><i class="flaticon-linkedin"></i></span></a></li>
        <?php endif;?>
    </ul>

<?php
}

function bigtech_footer_social_profiles() {
    $bigtech_footer_fb_url = get_theme_mod( 'bigtech_footer_fb_url', __( '#', 'bigtech' ) );
    $bigtech_footer_twitter_url = get_theme_mod( 'bigtech_footer_twitter_url', __( '#', 'bigtech' ) );
    $bigtech_footer_vimeo_url = get_theme_mod( 'bigtech_footer_vimeo_url', __( '#', 'bigtech' ) );
    $bigtech_footer_youtube_url = get_theme_mod( 'bigtech_footer_youtube_url', __( '#', 'bigtech' ) );
    ?>

        <ul>
        <?php if ( !empty( $bigtech_footer_fb_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $bigtech_footer_fb_url );?>">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $bigtech_footer_twitter_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $bigtech_footer_twitter_url );?>">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $bigtech_footer_vimeo_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $bigtech_footer_vimeo_url );?>">
                    <i class="fab fa-vimeo-v"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $bigtech_footer_youtube_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $bigtech_footer_youtube_url );?>">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
        <?php endif;?>
        </ul>
<?php
}

/**
 * [bigtech_mobile_social_profiles description]
 * @return [type] [description]
 */
function bigtech_mobile_social_profiles() {
    $bigtech_mobile_fb_url           = get_theme_mod('bigtech_mobile_fb_url', __('#','bigtech'));
    $bigtech_mobile_twitter_url      = get_theme_mod('bigtech_mobile_twitter_url', __('#','bigtech'));
    $bigtech_mobile_instagram_url    = get_theme_mod('bigtech_mobile_instagram_url', __('#','bigtech'));
    $bigtech_mobile_linkedin_url     = get_theme_mod('bigtech_mobile_linkedin_url', __('#','bigtech'));
    $bigtech_mobile_youtube_url      = get_theme_mod('bigtech_mobile_youtube_url', __('#','bigtech'));
    ?>

    <ul class="clearfix">
        <?php if (!empty($bigtech_mobile_fb_url)): ?>
        <li class="facebook">
            <a href="<?php print esc_url($bigtech_mobile_fb_url); ?>"><i class="fab fa-facebook-f"></i></a>
        </li>
        <?php endif; ?>

        <?php if (!empty($bigtech_mobile_twitter_url)): ?>
        <li class="twitter">
            <a href="<?php print esc_url($bigtech_mobile_twitter_url); ?>"><i class="fab fa-twitter"></i></a>
        </li>
        <?php endif; ?>

        <?php if (!empty($bigtech_mobile_instagram_url)): ?>
        <li class="instagram">
            <a href="<?php print esc_url($bigtech_mobile_instagram_url); ?>"><i class="fab fa-instagram"></i></a>
        </li>
        <?php endif; ?>

        <?php if (!empty($bigtech_mobile_linkedin_url)): ?>
        <li class="linkedin">
            <a href="<?php print esc_url($bigtech_mobile_linkedin_url); ?>"><i class="fab fa-linkedin-in"></i></a>
        </li>
        <?php endif; ?>

        <?php if (!empty($bigtech_mobile_youtube_url)): ?>
        <li class="youtube">
            <a href="<?php print esc_url($bigtech_mobile_youtube_url); ?>"><i class="fab fa-youtube"></i></a>
        </li>
        <?php endif; ?>
    </ul>

<?php
}


/**
 * [bigtech_header_menu description]
 * @return [type] [description]
 */
function bigtech_header_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => 'navigation',
            'container'      => '',
            'fallback_cb'    => 'Bigtech_Navwalker_Class::fallback',
        ] );
    ?>
    <?php
}


/**
 * [bigtech_home_menu description]
 * @return [type] [description]
 */
function bigtech_home_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'home-menu',
            'menu_class'     => 'navigation',
            'container'      => '',
            'fallback_cb'    => 'Bigtech_Navwalker_Class::fallback',
        ] );
    ?>
    <?php
}

/**
 * [bigtech_header_menu description]
 * @return [type] [description]
 */
function bigtech_mobile_menu() {
    ?>
    <?php
        $bigtech_menu = wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => 'navigation',
            'container'      => '',
            'fallback_cb'    => false,
            'echo'           => false,
        ] );

    $bigtech_menu = str_replace( "menu-item-has-children", "menu-item-has-children has-children", $bigtech_menu );
        echo wp_kses_post( $bigtech_menu );
    ?>
    <?php
}

/**
 * [bigtech_home_mobile_menu description]
 * @return [type] [description]
 */
function bigtech_home_mobile_menu() {
    ?>
    <?php
        $bigtech_menu = wp_nav_menu( [
            'theme_location' => 'home-menu',
            'menu_class'     => 'navigation',
            'container'      => '',
            'fallback_cb'    => false,
            'echo'           => false,
        ] );

    $bigtech_menu = str_replace( "menu-item-has-children", "menu-item-has-children has-children", $bigtech_menu );
        echo wp_kses_post( $bigtech_menu );
    ?>
    <?php
}

/**
 * [bigtech_search_menu description]
 * @return [type] [description]
 */
function bigtech_header_search_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'header-search-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'Bigtech_Navwalker_Class::fallback',
            'walker'         => new Bigtech_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [bigtech_footer_menu description]
 * @return [type] [description]
 */
function bigtech_footer_menu() {
    wp_nav_menu( [
        'theme_location' => 'footer-menu',
        'menu_class'     => 'navigation',
        'container'      => '',
        'fallback_cb'    => 'Bigtech_Navwalker_Class::fallback',
        'walker'         => new Bigtech_Navwalker_Class,
    ] );
}


/**
 * [bigtech_category_menu description]
 * @return [type] [description]
 */
function bigtech_category_menu() {
    wp_nav_menu( [
        'theme_location' => 'category-menu',
        'menu_class'     => 'cat-submenu m-0',
        'container'      => '',
        'fallback_cb'    => 'Bigtech_Navwalker_Class::fallback',
        'walker'         => new Bigtech_Navwalker_Class,
    ] );
}

/**
 *
 * bigtech footer
 */
add_action( 'bigtech_footer_style', 'bigtech_check_footer', 10 );

function bigtech_check_footer() {
    $bigtech_footer_style = function_exists( 'get_field' ) ? get_field( 'footer_style' ) : NULL;
    $bigtech_default_footer_style = get_theme_mod( 'choose_default_footer', 'footer-style-1' );

    if ( $bigtech_footer_style == 'footer-style-1' ) {
        get_template_part( 'template-parts/footer/footer-1' );
    }
    elseif ( $bigtech_footer_style == 'footer-style-2' ) {
        get_template_part( 'template-parts/footer/footer-2' );
    }
    elseif ( $bigtech_footer_style == 'footer-style-3' ) {
        get_template_part( 'template-parts/footer/footer-3' );
    } else {

        /** default footer style **/
        if ( $bigtech_default_footer_style == 'footer-style-2' ) {
            get_template_part( 'template-parts/footer/footer-2' );
        }
        elseif ( $bigtech_default_footer_style == 'footer-style-3' ) {
            get_template_part( 'template-parts/footer/footer-3' );
        }
        else {
            get_template_part( 'template-parts/footer/footer-1' );
        }

    }

}

// bigtech_copyright_text
function bigtech_copyright_text() {
   print get_theme_mod( 'bigtech_copyright', wp_kses_post( 'Copyright © 2022 Bigtech All Rights Reserved.', 'bigtech' ) );
}


/**
 *
 * pagination
 */
if ( !function_exists( 'bigtech_pagination' ) ) {

    function _bigtech_pagi_callback( $pagination ) {
        return $pagination;
    }

    //page navegation
    function bigtech_pagination( $prev, $next, $pages, $args ) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ( $pages == '' ) {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if ( !$pages ) {
                $pages = 1;
            }

        }

        $pagination = [
            'base'      => add_query_arg( 'paged', '%#%' ),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ( $wp_rewrite->using_permalinks() ) {
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
        }

        if ( !empty( $wp_query->query_vars['s'] ) ) {
            $pagination['add_args'] = ['s' => get_query_var( 's' )];
        }

        $pagi = '';
        if ( paginate_links( $pagination ) != '' ) {
            $paginations = paginate_links( $pagination );
            $pagi .= '<ul class="pagination">';
            foreach ( $paginations as $key => $pg ) {
                $pagi .= '<li class="page-item">' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _bigtech_pagi_callback( $pagi );
    }
}


// header top bg color
function bigtech_breadcrumb_bg_color() {
    $color_code = get_theme_mod( 'bigtech_breadcrumb_bg_color', '#222' );
    wp_enqueue_style( 'bigtech-custom', BIGTECH_THEME_CSS_DIR . 'bigtech-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: " . $color_code . "}";

        wp_add_inline_style( 'bigtech-breadcrumb-bg', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'bigtech_breadcrumb_bg_color' );

// breadcrumb-spacing top
function bigtech_breadcrumb_spacing() {
    $padding_px = get_theme_mod( 'bigtech_breadcrumb_spacing', '160px' );
    wp_enqueue_style( 'bigtech-custom', BIGTECH_THEME_CSS_DIR . 'bigtech-custom.css', [] );
    if ( $padding_px != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: " . $padding_px . "}";

        wp_add_inline_style( 'bigtech-breadcrumb-top-spacing', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'bigtech_breadcrumb_spacing' );

// breadcrumb-spacing bottom
function bigtech_breadcrumb_bottom_spacing() {
    $padding_px = get_theme_mod( 'bigtech_breadcrumb_bottom_spacing', '160px' );
    wp_enqueue_style( 'bigtech-custom', BIGTECH_THEME_CSS_DIR . 'bigtech-custom.css', [] );
    if ( $padding_px != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: " . $padding_px . "}";

        wp_add_inline_style( 'bigtech-breadcrumb-bottom-spacing', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'bigtech_breadcrumb_bottom_spacing' );

// scrollup
function bigtech_scrollup_switch() {
    $scrollup_switch = get_theme_mod( 'bigtech_scrollup_switch', false );
    wp_enqueue_style( 'bigtech-custom', BIGTECH_THEME_CSS_DIR . 'bigtech-custom.css', [] );
    if ( $scrollup_switch ) {
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style( 'bigtech-scrollup-switch', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'bigtech_scrollup_switch' );

// theme color
function bigtech_custom_color() {
    $color_code = get_theme_mod( 'bigtech_color_option', '#2b4eff' );
    wp_enqueue_style( 'bigtech-custom', BIGTECH_THEME_CSS_DIR . 'bigtech-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= ".demo-class { background-color: " . $color_code . "}";

        $custom_css .= ".demo-class { color: " . $color_code . "}";

        $custom_css .= ".demo-class { border-color: " . $color_code . "}";
        $custom_css .= ".demo-class { border-left-color: " . $color_code . "}";
        $custom_css .= ".demo-class { stroke: " . $color_code . "}";
        $custom_css .= ".demo-class { border-color: " . $color_code . "}";
        wp_add_inline_style( 'bigtech-custom', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'bigtech_custom_color' );


// theme color
function bigtech_custom_color_primary() {
    $color_code = get_theme_mod( 'bigtech_color_option_2', '#f2277e' );
    wp_enqueue_style( 'bigtech-custom', BIGTECH_THEME_CSS_DIR . 'bigtech-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= ".demo-class { background-color: " . $color_code . "}";

        $custom_css .= ".demo-class { color: " . $color_code . "}";

        $custom_css .= ".demo-class { border-left-color: " . $color_code . "}";
        wp_add_inline_style( 'bigtech-custom', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'bigtech_custom_color_primary' );

// theme color
function bigtech_custom_color_scrollup() {
    $color_code = get_theme_mod( 'bigtech_color_scrollup', '#2b4eff' );
    wp_enqueue_style( 'bigtech-custom', BIGTECH_THEME_CSS_DIR . 'bigtech-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= ".demo-class { color: " . $color_code . "}";
        $custom_css .= ".demo-class { stroke: " . $color_code . "}";
        wp_add_inline_style( 'bigtech-custom', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'bigtech_custom_color_scrollup' );

// theme color
function bigtech_custom_color_secondary() {
    $color_code = get_theme_mod( 'bigtech_color_option_3', '#30a820' );
    wp_enqueue_style( 'bigtech-custom', BIGTECH_THEME_CSS_DIR . 'bigtech-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= ".demo-class { background-color: " . $color_code . "}";

        $custom_css .= ".demo-class { color: " . $color_code . "}";

        $custom_css .= ".asdf { border-color: " . $color_code . "}";
        wp_add_inline_style( 'bigtech-custom', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'bigtech_custom_color_secondary' );

// theme color
function bigtech_custom_color_secondary_2() {
    $color_code = get_theme_mod( 'bigtech_color_option_3_2', '#ffb352' );
    wp_enqueue_style( 'bigtech-custom', BIGTECH_THEME_CSS_DIR . 'bigtech-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= ".demo-class { background-color: " . $color_code . "}";

        $custom_css .= ".demo-class { color: " . $color_code . "}";

        $custom_css .= ".demo-class { border-color: " . $color_code . "}";
        wp_add_inline_style( 'bigtech-custom', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'bigtech_custom_color_secondary_2' );


// bigtech_kses_intermediate
function bigtech_kses_intermediate( $string = '' ) {
    return wp_kses( $string, bigtech_get_allowed_html_tags( 'intermediate' ) );
}

function bigtech_get_allowed_html_tags( $level = 'basic' ) {
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}



// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function bigtech_kses($raw){

   $allowed_tags = array(
      'a'                         => array(
         'class'   => array(),
         'href'    => array(),
         'rel'  => array(),
         'title'   => array(),
         'target' => array(),
      ),
      'abbr'                      => array(
         'title' => array(),
      ),
      'b'                         => array(),
      'blockquote'                => array(
         'cite' => array(),
      ),
      'cite'                      => array(
         'title' => array(),
      ),
      'code'                      => array(),
      'del'                    => array(
         'datetime'   => array(),
         'title'      => array(),
      ),
      'dd'                     => array(),
      'div'                    => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'dl'                     => array(),
      'dt'                     => array(),
      'em'                     => array(),
      'h1'                     => array(),
      'h2'                     => array(),
      'h3'                     => array(),
      'h4'                     => array(),
      'h5'                     => array(),
      'h6'                     => array(),
      'i'                         => array(
         'class' => array(),
      ),
      'img'                    => array(
         'alt'  => array(),
         'class'   => array(),
         'height' => array(),
         'src'  => array(),
         'width'   => array(),
      ),
      'li'                     => array(
         'class' => array(),
      ),
      'ol'                     => array(
         'class' => array(),
      ),
      'p'                         => array(
         'class' => array(),
      ),
      'q'                         => array(
         'cite'    => array(),
         'title'   => array(),
      ),
      'span'                      => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'iframe'                 => array(
         'width'         => array(),
         'height'     => array(),
         'scrolling'     => array(),
         'frameborder'   => array(),
         'allow'         => array(),
         'src'        => array(),
      ),
      'strike'                 => array(),
      'br'                     => array(),
      'strong'                 => array(),
      'data-wow-duration'            => array(),
      'data-wow-delay'            => array(),
      'data-wallpaper-options'       => array(),
      'data-stellar-background-ratio'   => array(),
      'ul'                     => array(
         'class' => array(),
      ),
      'svg' => array(
           'class' => true,
           'aria-hidden' => true,
           'aria-labelledby' => true,
           'role' => true,
           'xmlns' => true,
           'width' => true,
           'height' => true,
           'viewbox' => true, // <= Must be lower case!
       ),
       'g'     => array( 'fill' => true ),
       'title' => array( 'title' => true ),
       'path'  => array( 'd' => true, 'fill' => true,  ),
      );

   if (function_exists('wp_kses')) { // WP is here
      $allowed = wp_kses($raw, $allowed_tags);
   } else {
      $allowed = $raw;
   }

   return $allowed;
}