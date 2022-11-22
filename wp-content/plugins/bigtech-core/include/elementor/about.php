<?php
namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Control_Media;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Bigtech Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TP_About extends Widget_Base {

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
		return 'about';
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
		return __( 'About', 'tpcore' );
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
            'tg_design_style',
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

        // tp_section_title
        $this->start_controls_section(
            'tp_section_title',
            [
                'label' => esc_html__('Title & Content', 'tpcore'),
            ]
        );

        $this->add_control(
            'tg_section_title_show',
            [
                'label' => esc_html__( 'Section Title & Content', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tpcore' ),
                'label_off' => esc_html__( 'Hide', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'tg_sub_title',
            [
                'label' => esc_html__('Sub Title', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Who we are', 'tpcore'),
                'placeholder' => esc_html__('Type Sub Title Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_title',
            [
                'label' => esc_html__('Title', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('The World’s 1st ICO Platform That Offers Rewards', 'tpcore'),
                'placeholder' => esc_html__('Type Heading Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_description',
            [
                'label' => esc_html__('Description', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('The World’s 1st ICO Platform That Offers Rewards and The platform helps investors to make easy to purchase and sell their tokens', 'tpcore'),
                'placeholder' => esc_html__('Type section description here', 'tpcore'),
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

        // Features group
        $this->start_controls_section(
            'tp_features', [
                'label' => esc_html__('Features List', 'tpcore'),
                'description' => esc_html__( 'Control all the style settings from Style tab', 'tpcore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'tg_design_style' => 'layout-2',
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tg_features_title', [
                'label' => esc_html__('Title', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'basic' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Mouthwatering leading how real formula also', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tp_features_list',
            [
                'label' => esc_html__('Services - List', 'tpcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tg_features_title' => esc_html__('Mouthwatering leading how real formula also', 'tpcore'),
                    ],
                    [
                        'tg_features_title' => esc_html__('Locked-in have can mountain thought', 'tpcore')
                    ],
                ],
            ]
        );
        $this->end_controls_section();

        // tg_btn_button_group
        $this->start_controls_section(
            'tg_btn_button_group',
            [
                'label' => esc_html__('Button', 'tpcore'),
            ]
        );

        $this->add_control(
            'tg_btn_button_show',
            [
                'label' => esc_html__( 'Show Button', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tpcore' ),
                'label_off' => esc_html__( 'Hide', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'tg_btn_text',
            [
                'label' => esc_html__('Button Text', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Purchase Tokens', 'tpcore'),
                'title' => esc_html__('Enter button text', 'tpcore'),
                'label_block' => true,
                'condition' => [
                    'tg_btn_button_show' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'tg_btn_link_type',
            [
                'label' => esc_html__('Button Link Type', 'tpcore'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'label_block' => true,
                'condition' => [
                    'tg_btn_button_show' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'tg_btn_link',
            [
                'label' => esc_html__('Button link', 'tpcore'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'tpcore'),
                'show_external' => false,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'condition' => [
                    'tg_btn_link_type' => '1',
                    'tg_btn_button_show' => 'yes'
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_btn_page_link',
            [
                'label' => esc_html__('Select Button Page', 'tpcore'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => tp_get_all_pages(),
                'condition' => [
                    'tg_btn_link_type' => '2',
                    'tg_btn_button_show' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

        // _tg_image
		$this->start_controls_section(
            '_tg_image',
            [
                'label' => esc_html__('Thumbnail', 'tpcore'),
            ]
        );

        $this->add_control(
            'tg_image',
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
                'name' => 'tg_image_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->add_control(
            'tg_image2',
            [
                'label' => esc_html__( 'Choose Image Shape', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'tg_design_style' => 'layout-1',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'tg_image_size2',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ],
                'condition' => [
                    'tg_design_style' => 'layout-1',
                ]
            ]
        );

        $this->add_control(
            'hide_about_shape',
            [
                'label' => esc_html__( 'Hide About Shape', 'tpcore' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tpcore' ),
                'label_off' => esc_html__( 'Hide', 'tpcore' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'tg_design_style' => 'layout-2',
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

		?>

		<?php if ( $settings['tg_design_style']  == 'layout-2' ):
            if ( !empty($settings['tg_image']['url']) ) {
                $tg_image = !empty($settings['tg_image']['id']) ? wp_get_attachment_image_url( $settings['tg_image']['id'], $settings['tg_image_size_size']) : $settings['tg_image']['url'];
                $tg_image_alt = get_post_meta($settings["tg_image"]["id"], "_wp_attachment_image_alt", true);
            }

			$this->add_render_attribute('title_args', 'class', 'title');

            // Link
            if ('2' == $settings['tg_btn_link_type']) {
                $this->add_render_attribute('tg-button-arg', 'href', get_permalink($settings['tg_btn_page_link']));
                $this->add_render_attribute('tg-button-arg', 'target', '_self');
                $this->add_render_attribute('tg-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('tg-button-arg', 'class', 'btn');
            } else {
                if ( ! empty( $settings['tg_btn_link']['url'] ) ) {
                    $this->add_link_attributes( 'tg-button-arg', $settings['tg_btn_link'] );
                    $this->add_render_attribute('tg-button-arg', 'class', 'btn btn-two');
                }
            }

        ?>

        <!-- about-area -->
        <section id="about" class="about-area-two">
            <div class="container custom-container-four">
                <div class="row align-items-center">

                    <?php if (!empty($settings['tg_image'])) : ?>
                    <div class="col-lg-6">
                        <div class="about-img-two text-center wow fadeInLeft" data-wow-delay=".2s">
                            <img src="<?php echo esc_url($tg_image); ?>" alt="<?php echo esc_url($tg_image_alt); ?>">
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="col-lg-6">
                        <div class="about-content-two wow fadeInRight" data-wow-delay=".2s">

                            <div class="section-title section-title-two mb-15">
                                <span class="sub-title"><?php echo esc_html( $settings['tg_sub_title'] ); ?></span>
                                <?php
                                    if ( !empty($settings['tg_title' ]) ) :
                                        printf( '<%1$s %2$s>%3$s</%1$s>',
                                            tag_escape( $settings['tg_title_tag'] ),
                                            $this->get_render_attribute_string( 'title_args' ),
                                            tp_kses( $settings['tg_title' ] )
                                        );
                                    endif;
                                ?>
                            </div>

                            <?php if ( !empty($settings['tg_description']) ) : ?>
                                <p><?php echo tp_kses( $settings['tg_description'] ); ?></p>
                            <?php endif; ?>

                            <div class="about-list">
                                <ul>
                                    <?php foreach ( $settings['tp_features_list'] as $item ) : ?>
                                    <li><i class="fas fa-check"></i><?php echo tp_kses( $item['tg_features_title'] ); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <?php if (!empty($settings['tg_btn_text'])) : ?>
                            <a <?php echo $this->get_render_attribute_string( 'tg-button-arg' ); ?> download>
                                <?php echo $settings['tg_btn_text']; ?>
                            </a>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>

            <?php if(!empty( $settings['hide_about_shape'] )) : ?>
            <div class="about-shape-wrap">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/images/about_shape01.png" alt="" class="shape-one">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/images/about_shape02.png" alt="" class="shape-two rotateme">
            </div>
            <?php endif; ?>

        </section>
        <!-- about-area-end -->

		<?php else:
            if ( !empty($settings['tg_image']['url']) ) {
                $tg_image = !empty($settings['tg_image']['id']) ? wp_get_attachment_image_url( $settings['tg_image']['id'], $settings['tg_image_size_size']) : $settings['tg_image']['url'];
                $tg_image_alt = get_post_meta($settings["tg_image"]["id"], "_wp_attachment_image_alt", true);
            }

            if ( !empty($settings['tg_image2']['url']) ) {
                $tg_image2 = !empty($settings['tg_image2']['id']) ? wp_get_attachment_image_url( $settings['tg_image2']['id'], $settings['tg_image_size2_size']) : $settings['tg_image2']['url'];
                $tg_image_alt2 = get_post_meta($settings["tg_image2"]["id"], "_wp_attachment_image_alt", true);
            }

			$this->add_render_attribute('title_args', 'class', 'title');

            // Link
            if ('2' == $settings['tg_btn_link_type']) {
                $this->add_render_attribute('tg-button-arg', 'href', get_permalink($settings['tg_btn_page_link']));
                $this->add_render_attribute('tg-button-arg', 'target', '_self');
                $this->add_render_attribute('tg-button-arg', 'rel', 'nofollow');
                $this->add_render_attribute('tg-button-arg', 'class', 'btn');
            } else {
                if ( ! empty( $settings['tg_btn_link']['url'] ) ) {
                    $this->add_link_attributes( 'tg-button-arg', $settings['tg_btn_link'] );
                    $this->add_render_attribute('tg-button-arg', 'class', 'btn');
                }
            }
		?>

        <!-- about-area -->
        <section id="about" class="about-area">
            <div class="container">
                <div class="row align-items-center">

                    <?php if (!empty($settings['tg_image'])) : ?>
                    <div class="col-lg-6">
                        <div class="about-img wow fadeInLeft" data-wow-delay=".2s">
                            <img src="<?php echo esc_url($tg_image); ?>" alt="<?php echo esc_url($tg_image_alt); ?>">
                            <img src="<?php echo esc_url($tg_image2); ?>" alt="<?php echo esc_url($tg_image_alt2); ?>" class="img-two">
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if( !empty($settings['tg_section_title_show']) ) : ?>
                    <div class="col-lg-6">
                        <div class="about-content wow fadeInRight" data-wow-delay=".2s">
                            <div class="section-title mb-30">
                                <span class="sub-title"><?php echo esc_html( $settings['tg_sub_title'] ); ?></span>

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

                            <?php if ( !empty($settings['tg_description']) ) : ?>
                                <p><?php echo tp_kses( $settings['tg_description'] ); ?></p>
                            <?php endif; ?>

                            <?php if (!empty($settings['tg_btn_text'])) : ?>
                            <a <?php echo $this->get_render_attribute_string( 'tg-button-arg' ); ?>>
                                <?php echo $settings['tg_btn_text']; ?>
                            </a>
                            <?php endif; ?>

                        </div>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </section>
        <!-- about-area-end -->

        <?php endif; ?>

        <?php
	}
}

$widgets_manager->register( new TP_About() );