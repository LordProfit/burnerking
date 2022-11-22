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
class TP_Roadmap extends Widget_Base {

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
        return 'roadmap';
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
        return __( 'Road Map', 'tpcore' );
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
                'default' => esc_html__('OUr Roadmap', 'tpcore'),
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
                'default' => esc_html__('Bigtech Strategy and Project Plan', 'tpcore'),
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

        // roadmap group
        $this->start_controls_section(
            'tg_roadmap',
            [
                'label' => esc_html__('RoadMap List', 'tpcore'),
                'description' => esc_html__( 'Control all the style settings from Style tab', 'tpcore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tg_roadmap_year', [
                'label' => esc_html__('Roadmap Year', 'tpcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Mid of Q4 2021', 'tpcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_roadmap_title', [
                'label' => esc_html__('Title', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'basic' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Concept', 'tpcore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tg_roadmap_description',
            [
                'label' => esc_html__('Description', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Roadmap Description Here',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_roadmap_list',
            [
                'label' => esc_html__('Roadmap - List', 'tpcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tg_roadmap_year' => esc_html__('Mid of Q4 2021', 'tpcore'),
                    ],
                    [
                        'tg_roadmap_year' => esc_html__('Mid of Q4 2021', 'tpcore'),
                    ],
                    [
                        'tg_roadmap_year' => esc_html__('Mid of Q4 2021', 'tpcore'),
                    ],
                ],
                'title_field' => '{{{ tg_roadmap_year }}}',
            ]
        );

        $this->end_controls_section();

        // roadmap bottom group
        $this->start_controls_section(
            'tg_bottom_roadmap',
            [
                'label' => esc_html__('RoadMap Bottom List', 'tpcore'),
                'description' => esc_html__( 'Control all the style settings from Style tab', 'tpcore' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'tp_design_style' => 'layout-2'
                ]
            ]
        );

        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'tg_roadmap_bottom_year', [
                'label' => esc_html__('Roadmap Year', 'tpcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Mid of Q1 2021', 'tpcore'),
                'label_block' => true,
            ]
        );

        $repeater2->add_control(
            'tg_roadmap_bottom_title', [
                'label' => esc_html__('Title', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'basic' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Concept', 'tpcore'),
                'label_block' => true,
            ]
        );

        $repeater2->add_control(
            'tg_roadmap_bottom_description',
            [
                'label' => esc_html__('Description', 'tpcore'),
                'description' => tp_get_allowed_html_desc( 'intermediate' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Roadmap Description Here',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tg_roadmap_bottom_list',
            [
                'label' => esc_html__('Roadmap - List', 'tpcore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'tg_roadmap_bottom_year' => esc_html__('Mid of Q1 2021', 'tpcore'),
                    ],
                    [
                        'tg_roadmap_bottom_year' => esc_html__('Mid of Q2 2021', 'tpcore'),
                    ],
                    [
                        'tg_roadmap_bottom_year' => esc_html__('Mid of Q3 2021', 'tpcore'),
                    ],
                ],
                'title_field' => '{{{ tg_roadmap_bottom_year }}}',
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

        <?php if ( $settings['tp_design_style']  == 'layout-2' ):
            $this->add_render_attribute('title_args', 'class', 'title');
        ?>

            <!-- roadmap-area -->
            <section class="roadmap-area-two">
                <div class="container custom-container-two">
                    <div class="row justify-content-center">
                        <div class="col-xl-6">
                            <div class="section-title section-title-two text-center mb-65">
                                <span class="sub-title"><?php echo tp_kses( $settings['tg_sub_title'] ); ?></span>
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="roadmap-wrap-two">
                                <?php foreach ($settings['tg_roadmap_list'] as $item) : ?>
                                <div class="roadmap-item">
                                    <span class="roadmap-title"><?php echo tp_kses( $item['tg_roadmap_year'] ); ?></span>
                                    <div class="roadmap-content">
                                        <span class="dot"></span>
                                        <h4 class="title"><?php echo tp_kses( $item['tg_roadmap_title'] ); ?></h4>
                                        <p><?php echo tp_kses( $item['tg_roadmap_description'] ); ?></p>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="roadmap-wrap-two bottom">
                                <?php foreach ($settings['tg_roadmap_bottom_list'] as $item2) : ?>
                                <div class="roadmap-item">
                                    <span class="roadmap-title"><?php echo tp_kses( $item2['tg_roadmap_bottom_year'] ); ?></span>
                                    <div class="roadmap-content">
                                        <span class="dot"></span>
                                        <h4 class="title"><?php echo tp_kses( $item2['tg_roadmap_bottom_title'] ); ?></h4>
                                        <p><?php echo tp_kses( $item2['tg_roadmap_bottom_description'] ); ?></p>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- roadmap-area-end -->


        <?php else:
            $this->add_render_attribute('title_args', 'class', 'title');
        ?>

        <!-- roadMap-area -->
        <section id="roadmap" class="roadmap-area">
            <div class="container custom-container-two">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-8">
                        <div class="section-title text-center mb-60">
                            <span class="sub-title"><?php echo tp_kses( $settings['tg_sub_title'] ); ?></span>
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bt-roadmap_x">
                            <div class="bt-roadmap-wrap">

                                <?php foreach ($settings['tg_roadmap_list'] as $item) : ?>
                                <div class="bt-roadmap-item">
                                    <span class="roadmap-title"><?php echo tp_kses( $item['tg_roadmap_year'] ); ?></span>
                                    <div class="roadmap-content">
                                        <span class="dot"></span>
                                        <h4 class="title"><?php echo tp_kses( $item['tg_roadmap_title'] ); ?></h4>
                                        <?php echo tp_kses( $item['tg_roadmap_description'] ); ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- roadMap-area-end -->

        <?php endif; ?>

        <?php
    }
}

$widgets_manager->register( new TP_Roadmap() );