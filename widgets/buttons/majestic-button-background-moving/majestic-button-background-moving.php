<?php
// Include the necessary Elementor classes
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly      

class Majestic_button_background_moving extends \Elementor\Widget_Base
{



    // Widget ID and Name
    public function get_name()
    {
        return 'majestic-button-background-moving';
    }

    // Widget Title
    public function get_title()
    {
        return 'Majestic Button Background moving';
    }

    // Widget Icon (optional)
    public function get_icon()
    {
        return 'eicon-button';
    }

    // Widget Category
    public function get_categories()
    {
        return ['majestic'];
    }

    public function register_scripts()
    { }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_images',
            [
                'label' => __('Images', 'your-text-domain'),
            ]
        );


        $this->add_control(
            'color_picker',
            [
                'label' => __('Color Picker', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'blue',
                'selectors' => [
                    '{{WRAPPER}} .your-element-class' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'button_name',
            [
                'label' => __('Rename the button', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Discover', 'your-text-domain'),
                'placeholder' => __('Enter your text', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'link_url',
            [
                'label' => __('Link URL', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://example.com', 'your-text-domain'),
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );



        // $this->add_control(
        //     'select_option',
        //     [
        //         'label' => __('Select Option', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::SELECT,
        //         'options' => [
        //             // 'small' => __('Small', 'your-text-domain'),
        //             'meduim' => __('Meduim', 'your-text-domain'),
        //             'big' => __('Big', 'your-text-domain'),
        //         ],
        //         'default' => 'meduim',
        //     ]
        // );



        // $this->add_control(
        //     'twitterUrl',
        //     [
        //         'label' => __('Twitter url', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::TEXT,
        //         'default' => __('https://twitter.com/', 'your-text-domain'),
        //         'placeholder' => __('Enter your text', 'your-text-domain'),
        //     ]
        // );

        // $this->add_control(
        //     'isHidetwitterUrl',
        //     [
        //         'label' => __('Hide Twitter link', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::SWITCHER,
        //         'default' => 'no',
        //     ]
        // );


        // $this->add_control(
        //     'instagram_url',
        //     [
        //         'label' => __('Instagram url', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::TEXT,
        //         'default' => __('https://www.instagram.com/', 'your-text-domain'),
        //         'placeholder' => __('Enter your text', 'your-text-domain'),
        //     ]
        // );

        // $this->add_control(
        //     'isHideinstgramUrl',
        //     [
        //         'label' => __('Hide Instagram link', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::SWITCHER,
        //         'default' => 'no',
        //     ]
        // );


        // $this->add_control(
        //     'youtube_url',
        //     [
        //         'label' => __('Youtube url', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::TEXT,
        //         'default' => __('https://youtube.com/', 'your-text-domain'),
        //         'placeholder' => __('Enter your text', 'your-text-domain'),
        //     ]
        // );

        // $this->add_control(
        //     'isHideyoutubeUrl',
        //     [
        //         'label' => __('Hide Youtube link', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::SWITCHER,
        //         'default' => 'no',
        //     ]
        // );

        // $this->add_control(
        //     'facebook_url',
        //     [
        //         'label' => __('Facebook url', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::TEXT,
        //         'default' => __('https://facebook.com/', 'your-text-domain'),
        //         'placeholder' => __('Enter your text', 'your-text-domain'),
        //     ]
        // );

        // $this->add_control(
        //     'isHideFacebookeUrl',
        //     [
        //         'label' => __('Hide Facebook link', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::SWITCHER,
        //         'default' => 'no',
        //     ]
        // );

        $this->end_controls_section();
    }




    // Render the widget output on the frontend
    protected function render()
    {

        wp_enqueue_style(
            'majestic-button-background-moving-style',
            plugin_dir_url(__FILE__) . '/css/majestic-button-background-moving.css'
        );



        wp_enqueue_script(
            'majestic-button-background-moving-script',
            plugin_dir_url(__FILE__) . '/js/majestic-button-background-moving.js',
            ['jquery'],
            '1.0.0',
            true
        );


        // require_once plugin_dir_path(__FILE__) . 'widget-template.php';
        $settings = $this->get_settings();
        $selected_color = $settings['color_picker'];
        $selected_url = $settings['link_url']['url'];
        $button_name = $settings['button_name'];



        $templateContent = '<div class="majestic-button-background-moving">'
            . '<main>'
            . '<article>'
            . '<button style="background-color:' . esc_attr($selected_color) . '">'
            . '<a target="_blank" href="' . esc_url($selected_url) . '"></a>'
            . esc_html($button_name)
            . '</button>'
            . '</article>'
            . '</main>'
            . '</div>';

            echo wp_kses_post( $templateContent );
        }



    // Render the widget output in the editor
    protected function _content_template()
    { }
}




// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Majestic_button_background_moving());
