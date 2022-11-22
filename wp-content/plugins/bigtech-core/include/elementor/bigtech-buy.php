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
class TP_Buy extends Widget_Base {

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
		return 'tg-buy';
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
		return __( 'Bigtech Buy', 'tpcore' );
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
                'label' => esc_html__('Background', 'tpcore'),
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
                'label' => esc_html__('Buy Tab List', 'tpcore'),
            ]
        );

        $tab_repeater = new \Elementor\Repeater();

        $tab_repeater->add_control(
            'tab_item_text', [
                'label' => esc_html__('Nav Item Text', 'tpcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Funding Allocation', 'tpcore'),
                'label_block' => true,
            ]
        );

        $tab_repeater->add_control(
            'tab_item_title', [
                'label' => esc_html__('Coin Price', 'tpcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('1 CNL = 0.0863 BTC', 'tpcore'),
                'label_block' => true,
            ]
        );

        $tab_repeater->add_control(
            'tab_item_desc', [
                'label' => esc_html__('Tab Description', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'basic' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('The World’s 1st ICO Platform That Offers Rewards and The platform helps investors to make easy to purchase and sell their tokens', 'tpcore'),
                'label_block' => true,
            ]
        );

        $tab_repeater->add_control(
            'tg_services_btn_text',
            [
                'label' => esc_html__('Button Text', 'tpcore'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Buy Now', 'tpcore'),
                'title' => esc_html__('Enter button text', 'tpcore'),
                'label_block' => true,
            ]
        );

        $tab_repeater->add_control(
            'tg_services_link_type',
            [
                'label' => esc_html__( 'Choose Link Type', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
            ]
        );

        $tab_repeater->add_control(
            'tg_services_link',
            [
                'label' => esc_html__( 'Choose Link link', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'https://buy.volleytoken.io/', 'tpcore' ),
                'show_external' => true,
                'default' => [
                    'url' => 'https://buy.volleytoken.io/',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'condition' => [
                    'tg_services_link_type' => '1',
                ]
            ]
        );

        $tab_repeater->add_control(
            'tg_services_page_link',
            [
                'label' => esc_html__( 'Select Choose Link Page', 'tpcore' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => tp_get_all_pages(),
                'condition' => [
                    'tg_services_link_type' => '2',
                ]
            ]
        );

        $this->add_control(
            'tg_tab_list',
            [
                'label' => esc_html__('Bigtech Buy List', 'tpcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $tab_repeater->get_controls(),
                'default' => [
                    [
                        'tab_item_text' => esc_html__('Funding Allocation', 'tpcore'),
                    ],
                    [
                        'tab_item_text' => esc_html__('Token Allocation', 'tpcore'),
                    ],
                ],
                'condition' => [
                    'tg_design_style' => 'layout-1'
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tg_chart_text', [
                'label' => esc_html__('Distribution Text', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'basic' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Contingency: 70%', 'tpcore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_chart_list',
            [
                'label' => esc_html__('Bigtech Distribution List', 'tpcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tg_chart_text' => esc_html__('Contingency: 70%', 'tpcore'),
                    ],
                    [
                        'tg_chart_text' => esc_html__('Business Development: 10%', 'tpcore'),
                    ],
                    [
                        'tg_chart_text' => esc_html__('Investor: 30%', 'tpcore'),
                    ],
                    [
                        'tg_chart_text' => esc_html__('Poland: 8%', 'tpcore'),
                    ],
                    [
                        'tg_chart_text' => esc_html__('Legal & Regulation: 10%', 'tpcore'),
                    ],
                    [
                        'tg_chart_text' => esc_html__('Czech Republic: 15%', 'tpcore'),
                    ],
                ],
                'condition' => [
                    'tg_design_style' => 'layout-1'
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

        $randID = wp_rand();
		$settings = $this->get_settings_for_display();

        if ( !empty($settings['tg_bg']['url']) ) {
                $tg_bg_url = !empty($settings['tg_bg']['id']) ? wp_get_attachment_image_url( $settings['tg_bg']['id'], $settings['tg_bg_size_size']) : $settings['tg_bg']['url'];
                $tg_bg_alt = get_post_meta($settings["tg_bg"]["id"], "_wp_attachment_image_alt", true);
            }

		?>

		<?php if ( $settings['tg_design_style']  == 'layout-2' ):

            if ( !empty($settings['tg_image']['url']) ) {
                $tg_image = !empty($settings['tg_image']['id']) ? wp_get_attachment_image_url( $settings['tg_image']['id'], $settings['tg_image_size_size']) : $settings['tg_image']['url'];
                $tg_image_alt = get_post_meta($settings["tg_image"]["id"], "_wp_attachment_image_alt", true);
            }

			$this->add_render_attribute('title_args', 'class', 'title');

        ?>

            <div class="section-title text-center">
                <h2 class="title"><?php echo esc_html__('More Style Coming Soon :)','tpcore') ?></h2>
            </div>

		<?php else:

            if ( !empty($settings['tg_image']['url']) ) {
                $tg_image = !empty($settings['tg_image']['id']) ? wp_get_attachment_image_url( $settings['tg_image']['id'], $settings['tg_image_size_size']) : $settings['tg_image']['url'];
                $tg_image_alt = get_post_meta($settings["tg_image"]["id"], "_wp_attachment_image_alt", true);
            }

			$this->add_render_attribute('title_args', 'class', 'title');

		?>

            <script>
                jQuery(document).ready(function($){

                    /*=============================================
                        =    		 Jarallax Active  	         =
                    =============================================*/
                    $('.jarallax').jarallax({
                        speed: 0.2,
                    });

                });
            </script>

            <!-- chart-area -->
            <section id="sales" class="chart-area chart-bg jarallax" style="background-image: url(<?php echo esc_url($tg_bg_url); ?>);">
                <div class="container">
                    <div class="chart-inner">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6 col-md-10 order-0 order-lg-2">
                                <div class="chart-wrap wow fadeInRight" data-wow-delay=".2s">

                                    <?php if (!empty($settings['tg_image'])) : ?>
                                        <img src="<?php echo esc_url($tg_image); ?>" alt="<?php echo esc_url($tg_image_alt); ?>">
                                    <?php endif; ?>

                                    <ul>

                                        <?php foreach ($settings['tg_chart_list'] as $item) : ?>
                                            <li><?php echo tp_kses( $item['tg_chart_text'] ); ?></li>
                                        <?php endforeach; ?>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-10">
                                <div class="chart-content wow fadeInLeft" data-wow-delay=".2s">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    <?php if ( $settings['tg_tab_list'] ) {
                                        $flag = true;
                                        foreach (  $settings['tg_tab_list'] as $key => $tg_tab_item ) { ?>

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link <?php echo $flag ? 'active' : ''; ?>" id="tab-<?php echo $key.$randID ?>" data-bs-toggle="tab" data-bs-target="#tabb-<?php echo $key.$randID ?>" type="button" role="tab" aria-controls="tabb-<?php echo $key.$randID ?>" aria-selected="<?php echo $flag ? 'true' : 'false'; ?>"><?php echo esc_html( $tg_tab_item['tab_item_text'] ) ?></button>
                                        </li>

                                    <?php
                                        $flag = false;
                                        }
                                    } ?>

                                    </ul>
                                    <div class="tab-content" id="myTabContent">

                                        <?php if ( $settings['tg_tab_list'] ) {
                                        $flag = true;
                                        foreach (  $settings['tg_tab_list'] as $key => $tg_tab_item ) {

                                            // Link
                                            if ('2' == $tg_tab_item['tg_services_link_type']) {
                                                $link = get_permalink($tg_tab_item['tg_services_page_link']);
                                                $target = '_self';
                                                $rel = 'nofollow';
                                            } else {
                                                $link = !empty($tg_tab_item['tg_services_link']['url']) ? $tg_tab_item['tg_services_link']['url'] : '';
                                                $target = !empty($tg_tab_item['tg_services_link']['is_external']) ? '_blank' : '';
                                                $rel = !empty($tg_tab_item['tg_services_link']['nofollow']) ? 'nofollow' : '';
                                            }

                                        ?>
                                        <div class="tab-pane fade <?php echo $flag ? 'show active' : ''; ?>" id="tabb-<?php echo $key.$randID ?>" role="tabpanel" aria-labelledby="tab-<?php echo $key.$randID ?>">
                                            <div class="chart-content-inner">
                                                <h2 class="title"><?php echo esc_html( $tg_tab_item['tab_item_title'] ) ?></h2>
                                                <p><?php echo esc_html( $tg_tab_item['tab_item_desc'] ) ?></p>
                                                <a href="<?php echo esc_url($link); ?>" target="_blank" class="btn">Buy Now</a>
                                            </div>
                                        </div>
                                        <?php
                                        $flag = false;
                                        }
                                        } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- chart-area-end -->

        <?php endif; ?>

        <?php
	}
}

$widgets_manager->register( new TP_Buy() );