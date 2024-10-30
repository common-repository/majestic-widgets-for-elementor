<?php
// Include the necessary Elementor classes
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly      

class Majestic_timeline_vertical extends \Elementor\Widget_Base
{



    // Widget ID and Name
    public function get_name()
    {
        return 'majestic-timeline-vertical';
    }

    // Widget Title
    public function get_title()
    {
        return 'Majestic - Timeline Vertical';
    }

    // Widget Icon (optional)
    public function get_icon()
    {
        return 'eicon-time-line';
    }

    // Widget Category
    public function get_categories()
    {
        return ['majestic'];
    }

    public function register_scripts()
    { }



    /**
     * Register the controls for the emementor widget.
     */
    protected function register_controls()
    {
        // Add the main repeater control for blocks.
        $this->start_controls_section(
            'blocks_section',
            [
                'label' => __('Blocks', 'your-text-domain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        // Global Text Field
        $this->add_control(
            'global_text',
            array(
                'label'       => __('Global Title', 'your-text-domain'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('Default Title Text', 'your-text-domain'),
                'description' => __('This text will be applied to all blocks.', 'your-text-domain'),
            )
        );

        $repeater = new \Elementor\Repeater();

        // Date field.
        $repeater->add_control(
            'date',
            [
                'label' => __('Date', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Enter date', 'your-text-domain'),
            ]
        );

        // Title field.
        $repeater->add_control(
            'title',
            [
                'label' => __('Title', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Enter title', 'your-text-domain'),
            ]
        );

        // Description field.
        $repeater->add_control(
            'description',
            [
                'label' => __('Description', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Enter description', 'your-text-domain'),
            ]
        );

        // Color picker field.
        $repeater->add_control(
            'color',
            [
                'label' => __('Color', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000', // Default color value
            ]
        );

        $this->add_control(
            'blocks',
            [
                'label' => __('Blocks', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'date' => __('2019', 'your-text-domain'),
                        'title' => __('Title 1', 'your-text-domain'),
                        'description' => __('Enter description', 'your-text-domain'),
                        'color' => '#1B5F8C',
                    ],
                    [
                        'date' => __('2020', 'your-text-domain'),
                        'title' => __('Title 2', 'your-text-domain'),
                        'description' => __('Enter description', 'your-text-domain'),
                        'color' => '#E24A68',
                    ],
                    [
                        'date' => __('2021', 'your-text-domain'),
                        'title' => __('Title 3', 'your-text-domain'),
                        'description' => __('Enter description', 'your-text-domain'),
                        'color' => '#4CADAD',
                    ],
                    [
                        'date' => __('2022', 'your-text-domain'),
                        'title' => __('Title 4', 'your-text-domain'),
                        'description' => __('Enter description', 'your-text-domain'),
                        'color' => '#FBCA3E',
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }

    // Render the widget output on the frontend
    protected function render()
    {

        wp_enqueue_style(
            'majestic-timeline-vertical-style',
            plugin_dir_url(__FILE__) . '/css/majestic-timeline-vertical.css'
        );



        wp_enqueue_script(
            'majestic-timeline-vertical-script',
            plugin_dir_url(__FILE__) . '/js/majestic-timeline-vertical.js',
            ['jquery'],
            '1.0.0',
            true
        );
        $settings = $this->get_settings();
        $global_text = isset($settings['global_text']) ? esc_html($settings['global_text']) : '';
        $templateStart = '<div class="majestic-timeline-vertical"><h1>' . $global_text . '</h1><ul>';
        $templateEnd = '</ul></div>';
        $templateContent = '';

        if (isset($settings['blocks']) && is_array($settings['blocks']) && !empty($settings['blocks'])) {
            foreach ($settings['blocks'] as $block) {
                $date = isset($block['date']) ? esc_html($block['date']) : '';
                $title = isset($block['title']) ? esc_html($block['title']) : '';
                $description = isset($block['description']) ? esc_html($block['description']) : '';
                $color = isset($block['color']) ? sanitize_hex_color($block['color']) : '';
                $date_style = 'style="background-color: ' . $color . ';"';

                $templateContent .=
                '<li>'
                . '   <div class="date" ' . $date_style . '>' . $date . '</div>'
                    . ' <div class="title">' . $title . '</div>'
                    . ' <div class="descr">' . $description . '</div>'
                    . ' </li>';
            }
        }

        $finalTemplate = $templateStart . $templateContent . $templateEnd;

        echo wp_kses_post( $finalTemplate );
    }




    // Render the widget output in the editor
    protected function _content_template()
    { }
}

function majestic_timeline_vertical_register_widget_styles()
{
    wp_enqueue_style(
        'majestic-timeline-verticalstyle',
        plugin_dir_url(__FILE__) . '/css/majestic-timeline-vertical.css'
    );
}
add_action('elementor/frontend/before_enqueue_scripts', 'majestic_timeline_vertical_register_widget_styles');




// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Majestic_timeline_vertical());
