<?php
namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Bigtech Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Team extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'tg-team';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Team', 'tpcore' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'tp-icon';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'tpcore' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'tpcore' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {


        // layout Panel
        $this->start_controls_section(
            'tp_layout',
            [
                'label' => esc_html__('Design Layout', 'tpcore'),
            ]
        );
        $this->add_control(
            'tp_design_style',
            [
                'label' => esc_html__('Select Layout', 'tpcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'layout-1' => esc_html__('Layout 1', 'tpcore'),
                    'layout-2' => esc_html__('Layout 2', 'tpcore'),
                ],
                'default' => 'layout-1',
            ]
        );

        $this->end_controls_section();

        // _tg_image
        $this->start_controls_section(
            '_tg_bg_section',
            [
                'label' => esc_html__('Background', 'tpcore'),
                'condition' => [
                    'tp_design_style' => 'layout-2',
                ]
            ]
        );

        $this->add_control(
            'tg_bg',
            [
                'label' => esc_html__( 'Choose Image', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'tg_bg_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();

        // tp_section_title
        $this->start_controls_section(
            'tp_section_title',
            [
                'label' => esc_html__('Title & Content', 'tpcore'),
            ]
        );

        $this->add_control(
            'tg_sub_title',
            [
                'label' => esc_html__('Sub Title', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Our team', 'tpcore'),
                'placeholder' => esc_html__('Type Heading Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_title',
            [
                'label' => esc_html__('Title', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('The Leadership Team', 'tpcore'),
                'placeholder' => esc_html__('Type Heading Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_title_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'tpcore'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => esc_html__('H1', 'tpcore'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => esc_html__('H2', 'tpcore'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => esc_html__('H3', 'tpcore'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => esc_html__('H4', 'tpcore'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => esc_html__('H5', 'tpcore'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => esc_html__('H6', 'tpcore'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h2',
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
            'tp_align',
            [
                'label' => esc_html__('Alignment', 'tpcore'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'text-left' => [
                        'title' => esc_html__('Left', 'tpcore'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'text-center' => [
                        'title' => esc_html__('Center', 'tpcore'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'text-right' => [
                        'title' => esc_html__('Right', 'tpcore'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => false,
            ]
        );

        $this->end_controls_section();

		// member list
        $this->start_controls_section(
            '_section_teams',
            [
                'label' => __( 'Members', 'tpcore' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->start_controls_tabs(
            '_tab_style_member_box_item'
        );

        $repeater->start_controls_tab(
            '_tab_member_info',
            [
                'label' => __( 'Information', 'tpcore' ),
            ]
        );

        $repeater->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'Image', 'tpcore' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'team_name',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Team Name', 'tpcore' ),
                'default' => __( 'Cameron Williamson', 'tpcore' ),
                'placeholder' => __( 'Type name here', 'tpcore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'designation',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'label' => __( 'Designation', 'tpcore' ),
                'default' => __( 'Head of Design', 'tpcore' ),
                'placeholder' => __( 'Type designation here', 'tpcore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->end_controls_tab();

        $repeater->start_controls_tab(
            '_tab_member_links',
            [
                'label' => __( 'Links', 'tpcore' ),
            ]
        );

        $repeater->add_control(
            'show_social',
            [
                'label' => __( 'Show Options?', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'tpcore' ),
                'label_off' => __( 'No', 'tpcore' ),
                'return_value' => 'yes',
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'web_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Website Address', 'tpcore' ),
                'placeholder' => __( 'Add your profile link', 'tpcore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'email_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Email', 'tpcore' ),
                'placeholder' => __( 'Add your email link', 'tpcore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'phone_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Phone', 'tpcore' ),
                'placeholder' => __( 'Add your phone link', 'tpcore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'facebook_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Facebook', 'tpcore' ),
                'default' => __( '#', 'tpcore' ),
                'placeholder' => __( 'Add your facebook link', 'tpcore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'twitter_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Twitter', 'tpcore' ),
                'default' => __( '#', 'tpcore' ),
                'placeholder' => __( 'Add your twitter link', 'tpcore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'instagram_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Instagram', 'tpcore' ),
                'default' => __( '#', 'tpcore' ),
                'placeholder' => __( 'Add your instagram link', 'tpcore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'linkedin_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'LinkedIn', 'tpcore' ),
                'placeholder' => __( 'Add your linkedin link', 'tpcore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'youtube_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Youtube', 'tpcore' ),
                'placeholder' => __( 'Add your youtube link', 'tpcore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'googleplus_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Google Plus', 'tpcore' ),
                'placeholder' => __( 'Add your Google Plus link', 'tpcore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'flickr_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Flickr', 'tpcore' ),
                'placeholder' => __( 'Add your flickr link', 'tpcore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'vimeo_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Vimeo', 'tpcore' ),
                'placeholder' => __( 'Add your vimeo link', 'tpcore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'behance_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Behance', 'tpcore' ),
                'placeholder' => __( 'Add your hehance link', 'tpcore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'dribble_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Dribbble', 'tpcore' ),
                'placeholder' => __( 'Add your dribbble link', 'tpcore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'pinterest_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Pinterest', 'tpcore' ),
                'placeholder' => __( 'Add your pinterest link', 'tpcore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'gitub_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Github', 'tpcore' ),
                'placeholder' => __( 'Add your github link', 'tpcore' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->end_controls_tab();
        $repeater->end_controls_tabs();

        // REPEATER
        $this->add_control(
            'teams',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'team_name' => esc_html__('Cameron Williamson', 'tpcore'),
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'team_name' => esc_html__('Eleanor Pena', 'tpcore'),
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'team_name' => esc_html__('Bessie Cooper', 'tpcore'),
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'team_name' => esc_html__('Darlene Robertson', 'tpcore'),
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'team_name' => esc_html__('Jacob Jones', 'tpcore'),
                    ]
                ],
                'title_field' => '{{{ team_name }}}',
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'tpcore' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label' => __( 'Text Transform', 'tpcore' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'None', 'tpcore' ),
					'uppercase' => __( 'UPPERCASE', 'tpcore' ),
					'lowercase' => __( 'lowercase', 'tpcore' ),
					'capitalize' => __( 'Capitalize', 'tpcore' ),
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

        if ( !empty($settings['tg_bg']['url']) ) {
            $tg_bg_url = !empty($settings['tg_bg']['id']) ? wp_get_attachment_image_url( $settings['tg_bg']['id'], $settings['tg_bg_size_size']) : $settings['tg_bg']['url'];
            $tg_bg_alt = get_post_meta($settings["tg_bg"]["id"], "_wp_attachment_image_alt", true);
        }

		?>

	    <!-- style 2 -->
	    <?php if ( $settings['tp_design_style'] === 'layout-2' ):

            $this->add_render_attribute( 'title_args', 'class', 'title' );
        ?>

            <!-- team-area -->
            <section id="team" class="team-area-two team-bg" style="background-image: url(<?php echo esc_url($tg_bg_url); ?>);">
                <div class="container custom-container-four">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-title text-center mb-60">
                                <span class="sub-title"><?php echo tp_kses( $settings['tg_sub_title'] ); ?></span>
                                <?php
                                    if ( !empty($settings['tg_title']) ) :
                                        printf( '<%1$s %2$s>%3$s</%1$s>',
                                            tag_escape( $settings['tg_title_tag'] ),
                                            $this->get_render_attribute_string( 'title_args' ),
                                            tp_kses( $settings['tg_title'] )
                                        );
                                    endif;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <?php foreach ( $settings['teams'] as $item ) :

                            if ( !empty($item['image']['url']) ) {
                                $tp_team_image_url = !empty($item['image']['id']) ? wp_get_attachment_image_url( $item['image']['id'], $settings['thumbnail_size']) : $item['image']['url'];
                                $tp_team_image_alt = get_post_meta($item["image"]["id"], "_wp_attachment_image_alt", true);
                            }
                        ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="team-item team-item-two wow fadeInUp" data-wow-delay=".2s">

                                <?php if( !empty($tp_team_image_url) ) : ?>
                                    <div class="team-thumb">
                                        <img src="<?php echo esc_url($tp_team_image_url); ?>" alt="<?php echo esc_attr($tp_team_image_alt); ?>">
                                    </div>
                                <?php endif; ?>

                                <div class="team-content">

                                    <h2 class="title"><?php echo tp_kses( $item['team_name'] ); ?></h2>

                                    <?php if( !empty($item['designation']) ) : ?>
                                        <span class="designation"><?php echo tp_kses( $item['designation'] ); ?></span>
                                    <?php endif; ?>

                                    <?php if( !empty($item['show_social'] ) ) : ?>
                                    <div class="team-social">
                                        <?php if( !empty($item['web_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $item['web_title'] ); ?>"><i class="fas fa-globe"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($item['email_title'] ) ) : ?>
                                        <a href="mailto:<?php echo esc_html( $item['email_title'] ); ?>"><i class="far fa-envelope"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($item['phone_title'] ) ) : ?>
                                        <a href="tell:<?php echo esc_html( $item['phone_title'] ); ?>"><i class="fas fa-phone"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($item['facebook_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $item['facebook_title'] ); ?>"><i class="fab fa-facebook-f"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($item['twitter_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $item['twitter_title'] ); ?>"><i class="fab fa-twitter"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($item['instagram_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $item['instagram_title'] ); ?>"><i class="fab fa-instagram"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($item['linkedin_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $item['linkedin_title'] ); ?>"><i class="fab fa-linkedin-in"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($item['youtube_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $item['youtube_title'] ); ?>"><i class="fab fa-youtube"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($item['googleplus_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $item['googleplus_title'] ); ?>"><i class="fab fa-google-plus-g"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($item['flickr_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $item['flickr_title'] ); ?>"><i class="fab fa-flickr"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($item['vimeo_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $item['vimeo_title'] ); ?>"><i class="fab fa-vimeo-v"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($item['behance_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $item['behance_title'] ); ?>"><i class="fab fa-behance"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($item['dribble_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $item['dribble_title'] ); ?>"><i class="fab fa-dribbble"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($item['pinterest_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $item['pinterest_title'] ); ?>"><i class="fab fa-pinterest-p"></i></a>
                                        <?php endif; ?>

                                        <?php if( !empty($item['gitub_title'] ) ) : ?>
                                        <a href="<?php echo esc_url( $item['gitub_title'] ); ?>"><i class="fab fa-github"></i></a>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>

                                </div>

                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <!-- team-area-end -->


	    <!-- style default -->
	    <?php else :
	        $this->add_render_attribute( 'title_args', 'class', 'title' );
	    ?>

        <!-- team-area -->
        <section id="team" class="team-area pt-130">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="section-title text-center mb-70">
                            <span class="sub-title"><?php echo tp_kses( $settings['tg_sub_title'] ); ?></span>
                            <?php
                                if ( !empty($settings['tg_title']) ) :
                                    printf( '<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape( $settings['tg_title_tag'] ),
                                        $this->get_render_attribute_string( 'title_args' ),
                                        tp_kses( $settings['tg_title'] )
                                    );
                                endif;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <?php foreach ( $settings['teams'] as $item ) :

                        if ( !empty($item['image']['url']) ) {
                            $tp_team_image_url = !empty($item['image']['id']) ? wp_get_attachment_image_url( $item['image']['id'], $settings['thumbnail_size']) : $item['image']['url'];
                            $tp_team_image_alt = get_post_meta($item["image"]["id"], "_wp_attachment_image_alt", true);
                        }
                    ?>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="team-item">

                            <?php if( !empty($tp_team_image_url) ) : ?>
                                <div class="team-thumb">
                                    <img src="<?php echo esc_url($tp_team_image_url); ?>" alt="<?php echo esc_attr($tp_team_image_alt); ?>">
                                </div>
                            <?php endif; ?>

                            <div class="team-content">

                                <h2 class="title"><?php echo tp_kses( $item['team_name'] ); ?></h2>

                                <?php if( !empty($item['designation']) ) : ?>
                                    <span class="designation"><?php echo tp_kses( $item['designation'] ); ?></span>
                                <?php endif; ?>

                                <?php if( !empty($item['show_social'] ) ) : ?>
                                <div class="team-social">
                                    <?php if( !empty($item['web_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $item['web_title'] ); ?>"><i class="fas fa-globe"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($item['email_title'] ) ) : ?>
                                    <a href="mailto:<?php echo esc_html( $item['email_title'] ); ?>"><i class="far fa-envelope"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($item['phone_title'] ) ) : ?>
                                    <a href="tell:<?php echo esc_html( $item['phone_title'] ); ?>"><i class="fas fa-phone"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($item['facebook_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $item['facebook_title'] ); ?>"><i class="fab fa-facebook-f"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($item['twitter_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $item['twitter_title'] ); ?>"><i class="fab fa-twitter"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($item['instagram_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $item['instagram_title'] ); ?>"><i class="fab fa-instagram"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($item['linkedin_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $item['linkedin_title'] ); ?>"><i class="fab fa-linkedin-in"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($item['youtube_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $item['youtube_title'] ); ?>"><i class="fab fa-youtube"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($item['googleplus_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $item['googleplus_title'] ); ?>"><i class="fab fa-google-plus-g"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($item['flickr_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $item['flickr_title'] ); ?>"><i class="fab fa-flickr"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($item['vimeo_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $item['vimeo_title'] ); ?>"><i class="fab fa-vimeo-v"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($item['behance_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $item['behance_title'] ); ?>"><i class="fab fa-behance"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($item['dribble_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $item['dribble_title'] ); ?>"><i class="fab fa-dribbble"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($item['pinterest_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $item['pinterest_title'] ); ?>"><i class="fab fa-pinterest-p"></i></a>
                                    <?php endif; ?>

                                    <?php if( !empty($item['gitub_title'] ) ) : ?>
                                    <a href="<?php echo esc_url( $item['gitub_title'] ); ?>"><i class="fab fa-github"></i></a>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- team-area-end -->

    	<?php endif; ?>

		<?php
	}
}

$widgets_manager->register( new TG_Team() );