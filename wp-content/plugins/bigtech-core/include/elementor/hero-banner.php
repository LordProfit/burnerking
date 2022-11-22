<?php
namespace TPCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Background;
use \Elementor\Control_Media;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Bigtech Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TG_Hero_Banner extends Widget_Base {

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
		return 'hero-banner';
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
		return __( 'Hero Banner', 'tpcore' );
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

        // _tg_image
        $this->start_controls_section(
            '_tg_bg_section',
            [
                'label' => esc_html__('Section Background', 'tpcore'),
            ]
        );

        $this->add_control(
            'tg_bg',
            [
                'label' => esc_html__( 'Choose Background Image', 'tpcore' ),
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
            'tp_section_title_show',
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
            'tg_content_image',
            [
                'label' => esc_html__( 'Choose Image', 'tpcore' ),
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
                'name' => 'tg_content_image_size',
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
            'tg_title',
            [
                'label' => esc_html__('Title', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Join Future Of Algorithmic Crypto Trading Strategies', 'tpcore'),
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
                'default' => esc_html__('Bigtech section description here', 'tpcore'),
                'placeholder' => esc_html__('Type section description here', 'tpcore'),
                'condition' => [
                    'tg_design_style' => 'layout-1',
                ]
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

        // tg_btn_button_group
        $this->start_controls_section(
            'tg_btn_button_group',
            [
                'label' => esc_html__('Button', 'tpcore'),
                'condition' => [
                    'tg_design_style' => 'layout-4'
                ],
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
                'default' => esc_html__('Shop Now', 'tpcore'),
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
            '_tp_image_section',
            [
                'label' => esc_html__('Thumbnail', 'tpcore'),
                'condition' => [
                    'tg_design_style' => 'layout-2',
                ]
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

        $this->end_controls_section();

        // _banner_shape
        $this->start_controls_section(
            '_tg_shape_section',
            [
                'label' => esc_html__('Banner Shapes', 'tpcore'),
                'condition' => [
                    'tg_design_style' => 'layout-1',
                ]
            ]
        );

        $this->add_control(
            'tg_shape_image01',
            [
                'label' => esc_html__( 'Choose Shape 01', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'tg_shape_image02',
            [
                'label' => esc_html__( 'Choose Shape 02', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'tg_shape_image03',
            [
                'label' => esc_html__( 'Choose Shape 03', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'tg_shape_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();

        // _banner_progress
        $this->start_controls_section(
            '_tg_progress_section',
            [
                'label' => esc_html__('Banner Progress', 'tpcore'),
                'condition' => [
                    'tg_design_style' => 'layout-1',
                ]
            ]
        );

        $this->add_control(
            'tg_step01',
            [
                'label' => esc_html__('Step 01', 'tpcore'),
                'description' => 'Progress Step Text',
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Pre Sell', 'tpcore'),
                'placeholder' => esc_html__('Type Step Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_step02',
            [
                'label' => esc_html__('Step 02', 'tpcore'),
                'description' => 'Progress Step Two',
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Soft Cap', 'tpcore'),
                'placeholder' => esc_html__('Type Step Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_step03',
            [
                'label' => esc_html__('Step 03', 'tpcore'),
                'description' => 'Progress Step Three',
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Bonus', 'tpcore'),
                'placeholder' => esc_html__('Type Step Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_responsive_control(
            'tg_progress',
            [
                'label' => __( 'Progress Width', 'tocore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 75,
				],
                'selectors' => [
                    '{{WRAPPER}} .progress-bar' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'tg_progress_target',
            [
                'label' => esc_html__('Progress Target', 'tpcore'),
                'description' => 'Set your Progress Target',
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('65% target raised', 'tpcore'),
                'placeholder' => esc_html__('Type Target Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_progress_price',
            [
                'label' => esc_html__('Progress Price', 'tpcore'),
                'description' => 'Set your Progress Price',
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('1 ETH = $1000 = 3177.38 CIC', 'tpcore'),
                'placeholder' => esc_html__('Type Price Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // _banner_countdown
        $this->start_controls_section(
            '_tg_countdown_section',
            [
                'label' => esc_html__('Countdown Section', 'tpcore'),
                'condition' => [
                    'tg_design_style' => 'layout-1',
                ]
            ]
        );

        $this->add_control(
            'tg_presales_text',
            [
                'label' => esc_html__('Presales Start Text', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('ICO Will Start In..', 'tpcore'),
                'placeholder' => esc_html__('Type Start Text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_presales_time',
            [
                'label' => esc_html__('Presales Date', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'description' => 'dateFormat: "Y-m-d"',
                'default' => esc_html__('2023/1/29', 'tpcore'),
                'placeholder' => esc_html__('Select presales date', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // _banner_social
        $this->start_controls_section(
            '_tg_social_section',
            [
                'label' => esc_html__('Social Section', 'tpcore'),
                'condition' => [
                    'tg_design_style' => 'layout-2',
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        if (tp_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'tg_social_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-star',
                ]
            );
        } else {
            $repeater->add_control(
                'tg_social_selected_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-star',
                        'library' => 'solid',
                    ],
                ]
            );
        }

        $repeater->add_control(
            'tg_social_text',
            [
                'label' => esc_html__('Social Text', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('LinkedIn', 'tpcore'),
                'placeholder' => esc_html__('Type social name', 'tpcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_social_url',
            [
                'label' => esc_html__('Social Url', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'tpcore'),
                'placeholder' => esc_html__('Type social link', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_social_list',
            [
                'label' => esc_html__('Social - List', 'tpcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tg_social_text' => esc_html__('LinkedIn', 'tpcore'),
                    ],
                ],
                'title_field' => '{{{ tg_social_text }}}',
            ]
        );

        $this->end_controls_section();

		// TAB_STYLE
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

        // Link
        if ('2' == $settings['tg_btn_link_type']) {
            $this->add_render_attribute('tg-button-arg', 'href', get_permalink($settings['tg_btn_page_link']));
            $this->add_render_attribute('tg-button-arg', 'target', '_self');
            $this->add_render_attribute('tg-button-arg', 'rel', 'nofollow');
            $this->add_render_attribute('tg-button-arg', 'class', 'btn btn-two');
        } else {
            if ( ! empty( $settings['tg_btn_link']['url'] ) ) {
                $this->add_link_attributes( 'tg-button-arg', $settings['tg_btn_link'] );
                $this->add_render_attribute('tg-button-arg', 'class', 'btn btn-two');
            }
        }

		?>

		<?php if ( $settings['tg_design_style']  == 'layout-2' ):

            if ( !empty($settings['tg_image']['url']) ) {
                $tg_image = !empty($settings['tg_image']['id']) ? wp_get_attachment_image_url( $settings['tg_image']['id'], $settings['tg_image_size_size']) : $settings['tg_image']['url'];
                $tg_image_alt  = get_post_meta($settings["tg_image"]["id"], "_wp_attachment_image_alt", true);
            }

            $this->add_render_attribute('title_args', 'class', 'title wow fadeInDown');
            $this->add_render_attribute('title_args', 'data-wow-delay', '.2s');
        ?>

            <!-- banner-area -->
            <section class="banner-area-two">
                <div class="banner-bg-two" style="background-image: url(<?php echo esc_url($tg_bg_url); ?>);"></div>

                <?php if ( !empty($settings['tp_section_title_show']) ) : ?>
                <div class="container custom-container-four">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="banner-content text-center">
                                <?php
                                    if ( !empty($settings['tg_title' ]) ) :
                                        printf( '<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape( $settings['tg_title_tag'] ),
                                        $this->get_render_attribute_string( 'title_args' ),
                                        tp_kses( $settings['tg_title' ] )
                                    );
                                endif;
                                ?>
                                <img src="<?php echo esc_url($tg_image); ?>" alt="<?php echo esc_attr($tg_image_alt); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="banner-social-wrap">
                    <ul>

                        <?php foreach ($settings['tg_social_list'] as $item) : ?>
                            <li>
                                <a href="<?php echo esc_url( $item['tg_social_url'] ); ?>" class="banner-social-link">
                                    <?php if (!empty($item['tg_social_icon']) || !empty($item['tg_social_selected_icon']['value'])) : ?>
                                        <?php tp_render_icon($item, 'tg_social_icon', 'tg_social_selected_icon'); ?>
                                    <?php endif; ?>
                                </a>
                                <span><?php echo esc_html( $item['tg_social_text'] ); ?></span>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div>

                <div class="banner-scroll">
                    <span><?php echo esc_html__('Scroll down','tpcore'); ?></span>
                    <a href="#" data-target="#about"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/scroll_icon.svg" alt="scroll"></a>
                </div>

            </section>
            <!-- banner-area-end -->

		<?php else:

            if ( !empty($settings['tg_content_image']['url']) ) {
                $tg_content_image = !empty($settings['tg_content_image']['id']) ? wp_get_attachment_image_url( $settings['tg_content_image']['id'], $settings['tg_content_image_size_size']) : $settings['tg_content_image']['url'];
                $tg_content_image_alt  = get_post_meta($settings["tg_content_image"]["id"], "_wp_attachment_image_alt", true);
            }

            // All Shapes
            if ( !empty($settings['tg_shape_image01']['url']) ) {
                $tg_shape_image01 = !empty($settings['tg_shape_image01']['id']) ? wp_get_attachment_image_url( $settings['tg_shape_image01']['id'], $settings['tg_shape_size_size']) : $settings['tg_shape_image01']['url'];
                $tg_shape_alt01  = get_post_meta($settings["tg_shape_image01"]["id"], "_wp_attachment_image_alt", true);
            }

            if ( !empty($settings['tg_shape_image02']['url']) ) {
                $tg_shape_image02 = !empty($settings['tg_shape_image02']['id']) ? wp_get_attachment_image_url( $settings['tg_shape_image02']['id'], $settings['tg_shape_size_size']) : $settings['tg_shape_image02']['url'];
                $tg_shape_alt02  = get_post_meta($settings["tg_shape_image02"]["id"], "_wp_attachment_image_alt", true);
            }

            if ( !empty($settings['tg_shape_image03']['url']) ) {
                $tg_shape_image03 = !empty($settings['tg_shape_image03']['id']) ? wp_get_attachment_image_url( $settings['tg_shape_image03']['id'], $settings['tg_shape_size_size']) : $settings['tg_shape_image03']['url'];
                $tg_shape_alt03  = get_post_meta($settings["tg_shape_image03"]["id"], "_wp_attachment_image_alt", true);
            }


			$this->add_render_attribute('title_args', 'class', 'title');

		?>

            <script>
                jQuery(document).ready(function($){
                    /*=============================================
                        =    	  Countdown Active  	         =
                    =============================================*/
                    $('[data-countdown]').each(function () {
                        var $this = $(this), finalDate = $(this).data('countdown');
                        $this.countdown(finalDate, function (event) {
                            $this.html(event.strftime('<div class="time-count day"><span>%D</span>Days</div><div class="time-count hour"><span>%H</span>hour</div><div class="time-count min"><span>%M</span>minute</div><div class="time-count sec"><span>%S</span>second</div>'));
                        });
                    });
                });
            </script>

            <!-- banner-area -->
            <section class="banner-area banner-bg" style="background-image: url(<?php echo esc_url($tg_bg_url); ?>);">
                <div class="banner-shape-wrap">
                    <img src="<?php echo esc_url($tg_shape_image01); ?>" alt="<?php echo esc_attr($tg_shape_alt01); ?>" class="img-one">
                    <img src="<?php echo esc_url($tg_shape_image02); ?>" alt="<?php echo esc_attr($tg_shape_alt02); ?>" class="img-two">
                    <img src="<?php echo esc_url($tg_shape_image03); ?>" alt="<?php echo esc_attr($tg_shape_alt03); ?>" class="img-three">
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">

                            <?php if ( !empty($settings['tp_section_title_show']) ) : ?>
                                <div class="banner-content text-center">

                                    <img src="<?php echo esc_url( $tg_content_image ); ?>" alt="<?php echo esc_attr( $tg_content_image_alt ); ?>">

                                    <?php
                                        if ( !empty($settings['tg_title' ]) ) :
                                            printf( '<%1$s %2$s>%3$s</%1$s>',
                                            tag_escape( $settings['tg_title_tag'] ),
                                            $this->get_render_attribute_string( 'title_args' ),
                                            tp_kses( $settings['tg_title' ] )
                                        );
                                    endif;
                                    ?>

                                    <?php if ( !empty($settings['tg_description']) ) : ?>
                                        <p class="desc"><?php echo tp_kses( $settings['tg_description'] ); ?></p>
                                    <?php endif; ?>

                                </div>
                            <?php endif; ?>

                            <div class="banner-progress-wrap">
                                <ul>
                                    <li><?php echo tp_kses( $settings['tg_step01'] ); ?></li>
                                    <li><?php echo tp_kses( $settings['tg_step02'] ); ?></li>
                                    <li><?php echo tp_kses( $settings['tg_step03'] ); ?></li>
                                </ul>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <h4 class="title"><?php echo tp_kses( $settings['tg_progress_target'] ); ?> <span><?php echo tp_kses( $settings['tg_progress_price'] ); ?></span></h4>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="banner-countdown-wrap text-center">
                                <h2 class="title"><?php echo tp_kses( $settings['tg_presales_text'] ); ?></h2>
                                <div class="coming-time" data-countdown="<?php echo esc_attr( $settings['tg_presales_time'] ); ?>"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- banner-area-end -->

        <?php endif; ?>

        <?php

	}

}

$widgets_manager->register( new TG_Hero_Banner() );