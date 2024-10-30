<?php
// Include the necessary Elementor classes
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly      

class Majestic_social_scale extends \Elementor\Widget_Base
{



    // Widget ID and Name
    public function get_name()
    {
        return 'majestic-social-scale';
    }

    // Widget Title
    public function get_title()
    {
        return 'Majestic - Social scale';
    }

    // Widget Icon (optional)
    public function get_icon()
    {
        return 'eicon-social-icons';
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
            'follow_me_text',
            [
                'label' => __('Rename the button', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Follow us', 'your-text-domain'),
                'placeholder' => __('Enter your text', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'custom_color',
            [
                'label' => __('Custom Color', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'black',
                'selectors' => [
                    '{{WRAPPER}} .your-widget-class' => 'color: {{VALUE}};',
                ],
            ]
        );


        // $this->add_control(
        //     'select_option',
        //     [
        //         'label' => __('Select Option', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::SELECT,
        //         'options' => [
        //             'small' => __('Small', 'your-text-domain'),
        //             'meduim' => __('Meduim', 'your-text-domain'),
        //             'big' => __('Big', 'your-text-domain'),
        //         ],
        //         'default' => 'meduim',
        //     ]
        // );



        $this->add_control(
            'twitterUrl',
            [
                'label' => __('Twitter url', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('https://twitter.com/', 'your-text-domain'),
                'placeholder' => __('Enter your text', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'isHidetwitterUrl',
            [
                'label' => __('Hide Twitter link', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );


        $this->add_control(
            'instagram_url',
            [
                'label' => __('Instagram url', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('https://www.instagram.com/', 'your-text-domain'),
                'placeholder' => __('Enter your text', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'isHideinstgramUrl',
            [
                'label' => __('Hide Instagram link', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );


        $this->add_control(
            'youtube_url',
            [
                'label' => __('Youtube url', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('https://youtube.com/', 'your-text-domain'),
                'placeholder' => __('Enter your text', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'isHideyoutubeUrl',
            [
                'label' => __('Hide Youtube link', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'facebook_url',
            [
                'label' => __('Facebook url', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('https://facebook.com/', 'your-text-domain'),
                'placeholder' => __('Enter your text', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'isHideFacebookeUrl',
            [
                'label' => __('Hide Facebook link', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->end_controls_section();
    }




    // Render the widget output on the frontend
    protected function render()
    {

        wp_enqueue_style(
            'majestic-social-scale-style',
            plugin_dir_url(__FILE__) . '/css/majestic-social-scale.css'
        );



        wp_enqueue_script(
            'majestic-social-scale-script',
            plugin_dir_url(__FILE__) . '/js/majestic-social-scale.js',
            ['jquery'],
            '1.0.0',
            true
        );


        // require_once plugin_dir_path(__FILE__) . 'widget-template.php';

        $settings = $this->get_settings();
        $twitterUrl = $settings['twitterUrl'];
        $instagram_url = $settings['instagram_url'];
        $youtube_url = $settings['youtube_url'];
        $facebook_url = $settings['facebook_url'];
        $follow_me_text = $settings['follow_me_text'];
        // $selected_option = $settings['select_option'];
        $selectedClass = 'hexagon-wrapper';

        // if ($selected_option == 'small') {
        //     $selectedClass = 'hexagon-wrapper-small';
        // }
        // if ($selected_option == 'meduim') {
        //     $selectedClass = 'hexagon-wrapper-meduim';
        // }
        // if ($selected_option == 'big') {
        //     $selectedClass = 'hexagon-wrapper-big';
        // }

        $isHidetwitterUrl = $settings['isHidetwitterUrl'];
        $isHideinstgramUrl = $settings['isHideinstgramUrl'];
        $isHideyoutubeUrl = $settings['isHideyoutubeUrl'];
        $isHideFacebookeUrl = $settings['isHideFacebookeUrl'];
        $color_value = $settings['custom_color'];

        $templateContent =
            '<div class="majestic-social-scale"><div class="button-block">';

        if ($isHidetwitterUrl == 'no') {
            $templateContent .=
                '<div class="social">'
                . '<a style="background: linear-gradient(-180deg, white, ' . esc_attr($color_value) . ')"  target="_blank" href="' . esc_url($twitterUrl) . '">'
                . '<i class="fab fa-twitter"></i>'
                . '</a>'
                . '</div>';
        }
        if ($isHideinstgramUrl == 'no') {
            $templateContent .=
                '<div class="social">'
                . '<a style="background: linear-gradient(-180deg, white, ' . esc_attr($color_value) . ')"  target="_blank" href="' . esc_url($instagram_url) . '">'
                . '<i class="fab fa-instagram"></i>'
                . '</a>'
                . '</div>';
        }
        if ($isHideyoutubeUrl == 'no') {
            $templateContent .=
                '<div class="social">'
                . '<a style="background: linear-gradient(-180deg, white, ' . esc_attr($color_value) . ')"  target="_blank" href="' . esc_url($youtube_url) . '">'
                . '<i class="fab fa-youtube"></i>'
                . '</a>'
                . '</div>';
        }
        if ($isHideFacebookeUrl == 'no') {
            $templateContent .=
                '<div class="social">'
                . '<a style="background: linear-gradient(-180deg, white, ' . esc_attr($color_value) . ')"  target="_blank" href="' . esc_url($facebook_url) . '">'
                . '<i class="fab fa-facebook"></i>'
                . '</a>'
                . '</div>';
        }

        $templateContent .=
            '</div></div>';

            echo wp_kses_post( $templateContent );
        }



    // Render the widget output in the editor
    protected function _content_template()
    { }
}




// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Majestic_social_scale());

function majestic_social_scale_register_widget_styles()
{
    wp_enqueue_style(
        'ajestic-single-card-2style',
        plugin_dir_url(__FILE__) . '/css/majestic-social-scale.css'
    );
}
add_action('elementor/frontend/before_enqueue_scripts', 'majestic_social_scale_register_widget_styles');
