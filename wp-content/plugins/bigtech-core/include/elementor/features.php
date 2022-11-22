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
class TG_Features extends Widget_Base {

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
		return 'features';
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
		return __( 'Features', 'tpcore' );
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

        // _tg_background
        $this->start_controls_section(
            '_tg_background_section',
            [
                'label' => esc_html__('Background', 'tpcore'),
                'condition' => [
                    'tg_design_style' => 'layout-3',
                ]
            ]
        );

        $this->add_control(
            'tg_bg_image',
            [
                'label' => esc_html__( 'Choose Image', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();


        // Features group
        $this->start_controls_section(
            'tg_features',
            [
                'label' => esc_html__('Features List', 'tpcore'),
                'description' => esc_html__( 'Control all the style settings from Style tab', 'tpcore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tg_features_transition', [
                'label' => esc_html__('Animation Delay (ms)', 'tpcore'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => esc_html__('.3', 'tpcore'),
            ]
        );

        $repeater->add_control(
            'tg_features_icon_type',
            [
                'label' => esc_html__('Select Icon Type', 'tpcore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'image',
                'options' => [
                    'image' => esc_html__('Image', 'tpcore'),
                    'icon' => esc_html__('Icon', 'tpcore'),
                ],
            ]
        );

        $repeater->add_control(
            'tg_features_image',
            [
                'label' => esc_html__('Upload Icon Image', 'tpcore'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'tg_features_icon_type' => 'image'
                ]

            ]
        );

        if (tp_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'tg_features_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-star',
                    'condition' => [
                        'tg_features_icon_type' => 'icon'
                    ]
                ]
            );
        } else {
            $repeater->add_control(
                'tg_features_selected_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-star',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'tg_features_icon_type' => 'icon'
                    ]
                ]
            );
        }

        $repeater->add_control(
            'tg_features_title', [
                'label' => esc_html__('Title', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'basic' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Mobile payment make easy', 'tpcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_features_description',
            [
                'label' => esc_html__('Description', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Add new trending and rare artwork to your collection.',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_features_list',
            [
                'label' => esc_html__('Features List', 'tpcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tg_features_title' => esc_html__('Mobile payment make easy', 'tpcore'),
                    ],
                    [
                        'tg_features_title' => esc_html__('Lifetime free transaction', 'tpcore')
                    ],
                    [
                        'tg_features_title' => esc_html__('Protect the <br> identity', 'tpcore')
                    ],
                    [
                        'tg_features_title' => esc_html__('Security & control over money', 'tpcore')
                    ]
                ],
            ]
        );

        $this->add_responsive_control(
            'tg_features_align',
            [
                'label' => esc_html__( 'Alignment', 'tpcore' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'text-left' => [
                        'title' => esc_html__( 'Left', 'tpcore' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'text-center' => [
                        'title' => esc_html__( 'Center', 'tpcore' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'text-right' => [
                        'title' => esc_html__( 'Right', 'tpcore' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'toggle' => true,
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

        // _tg_image
		$this->start_controls_section(
            '_tg_image',
            [
                'label' => esc_html__('Thumbnail', 'tpcore'),
                'condition' => [
                    'tg_design_style' => 'layout-3',
                ]
            ]
        );

        $this->add_control(
            'tg_features_transition', [
                'label' => esc_html__('Animation Delay (ms)', 'tpcore'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => esc_html__('.3', 'tpcore'),
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

		?>

        <?php if ( $settings['tg_design_style']  == 'layout-2' ) :

            if ( !empty($settings['tg_image']['url']) ) {
                $tg_image = !empty($settings['tg_image']['id']) ? wp_get_attachment_image_url( $settings['tg_image']['id'], $settings['tg_image_size_size']) : $settings['tg_image']['url'];
                $tg_image_alt = get_post_meta($settings["tg_image"]["id"], "_wp_attachment_image_alt", true);
            }

        ?>
            <div class="container custom-container-four">
                <div class="row">

                    <?php foreach ($settings['tg_features_list'] as $item) : ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="choose-item-two wow fadeInUp" data-wow-delay="<?php echo esc_attr($item['tg_features_transition']) ?>s">
                            <div class="choose-icon-two">
                                <?php if($item['tg_features_icon_type'] !== 'image') : ?>
                                    <?php if (!empty($item['tg_features_icon']) || !empty($item['tg_features_selected_icon']['value'])) : ?>
                                        <?php tp_render_icon($item, 'tg_features_icon', 'tg_features_selected_icon'); ?>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <?php if (!empty($item['tg_features_image']['url'])): ?>
                                        <img class="light" src="<?php echo $item['tg_features_image']['url']; ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($item['tg_features_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <div class="choose-content">
                                <?php if (!empty($item['tg_features_title' ])): ?>
                                    <h2 class="title"><?php echo tp_kses( $item['tg_features_title'] ); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($item['tg_features_description'])): ?>
                                    <p><?php echo tp_kses( $item['tg_features_description'] ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>

        <?php else:

            if ( !empty($settings['tg_image']['url']) ) {
                $tg_image = !empty($settings['tg_image']['id']) ? wp_get_attachment_image_url( $settings['tg_image']['id'], $settings['tg_image_size_size']) : $settings['tg_image']['url'];
                $tg_image_alt = get_post_meta($settings["tg_image"]["id"], "_wp_attachment_image_alt", true);
            }

        ?>

            <script>
                jQuery(document).ready(function($){

                    /*=============================================
                        =         Choose Active      =
                    ===============================================*/
                    $(document).ready(function () {
                        var $slider = $('.choose-active');
                        var $progressBar = $('.slide-progress');
                        var $progressBarLabel = $('.slider__label');

                        $slider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
                            var calc = ((nextSlide) / (slick.slideCount - 1)) * 100;

                            $progressBar
                                .css('background-size', calc + '% 100%')
                                .attr('aria-valuenow', calc);

                            $progressBarLabel.text(calc + '% completed');
                        });

                        $slider.slick({
                            dots: false,
                            infinite: true,
                            speed: 1000,
                            autoplay: true,
                            arrows: false,
                            slidesToShow: 4,
                            slidesToScroll: 1,
                            responsive: [
                                {
                                    breakpoint: 1200,
                                    settings: {
                                        slidesToShow: 3,
                                        slidesToScroll: 1,
                                        infinite: true,
                                    }
                                },
                                {
                                    breakpoint: 992,
                                    settings: {
                                        slidesToShow: 2,
                                        slidesToScroll: 1
                                    }
                                },
                                {
                                    breakpoint: 767,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1,
                                        arrows: false,
                                    }
                                },
                                {
                                    breakpoint: 575,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1,
                                        arrows: false,
                                    }
                                },
                            ]
                        });
                    });

                });
            </script>

            <div class="container">
                <div class="row choose-active">

                    <?php foreach ($settings['tg_features_list'] as $item) : ?>
                    <div class="col-lg-3">
                        <div class="choose-item">
                            <div class="choose-icon">
                                <?php if($item['tg_features_icon_type'] !== 'image') : ?>
                                    <?php if (!empty($item['tg_features_icon']) || !empty($item['tg_features_selected_icon']['value'])) : ?>
                                        <?php tp_render_icon($item, 'tg_features_icon', 'tg_features_selected_icon'); ?>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <?php if (!empty($item['tg_features_image']['url'])): ?>
                                        <img class="light" src="<?php echo $item['tg_features_image']['url']; ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($item['tg_features_image']['url']), '_wp_attachment_image_alt', true); ?>">
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <div class="choose-content">
                                <?php if (!empty($item['tg_features_title' ])): ?>
                                    <h2 class="title"><?php echo tp_kses( $item['tg_features_title'] ); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($item['tg_features_description'])): ?>
                                    <p><?php echo tp_kses( $item['tg_features_description'] ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
                <div class="slide-progress" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <span class="slider__label sr-only"></span>
                </div>
            </div>

        <?php endif; ?>

        <?php
	}
}

$widgets_manager->register( new TG_Features() );