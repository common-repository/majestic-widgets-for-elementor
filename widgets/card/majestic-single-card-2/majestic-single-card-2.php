<?php
// Include the necessary Elementor classes
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly      

class Majestic_single_card_2 extends \Elementor\Widget_Base
{



    // Widget ID and Name
    public function get_name()
    {
        return 'majestic-single-card-2';
    }

    // Widget Title
    public function get_title()
    {
        return 'Majestic - Interactive Card';
    }

    // Widget Icon (optional)
    public function get_icon()
    {
        return 'eicon-image-box';
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


        // #################### 11111  #########################



        // Configuration Tab 1
        $this->start_controls_section(
            'section_tab_1',
            [
                'label' => __('General', 'your-text-domain'),
            ]
        );

        // Image Control
        $this->add_control(
            'image_1',
            [
                'label' => __('Image', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // Title Control
        $this->add_control(
            'title_1',
            [
                'label' => __('Title', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Enter your title', 'your-text-domain'),
            ]
        );

        // Description 1 Control
        $this->add_control(
            'description_1_1',
            [
                'label' => __('Description 1', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('I said that the length of the Great Eastern exceeded two hectometres. For the benefit of those partial to comparisons.', 'your-text-domain'),
            ]
        );

        // Description 1 Control
        $this->add_control(
            'description_1_2',
            [
                'label' => __('Image flip description', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Image Flip description ', 'your-text-domain'),
            ]
        );

        // Description 1 Control
        // $this->add_control(
        //     'description_1_3',
        //     [
        //         'label' => __('Description 3', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::TEXTAREA,
        //         'default' => __('desciption', 'your-text-domain'),
        //     ]
        // );


        $this->add_control(
            'color_1',
            [
                'label' => __('Color', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'white', // Replace with your default color value
                'selectors' => [
                    '{{WRAPPER}} .your-selector' => 'color: {{VALUE}};',
                ],
            ]
        );

        // $this->add_control(
        //     'toggle_1',
        //     [
        //         'label' => __('Display a price', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::SWITCHER,
        //         'label_on' => __('Yes', 'your-text-domain'),
        //         'label_off' => __('No', 'your-text-domain'),
        //         'default' => 'yes', // Replace with your default value
        //     ]
        // );



        // Price Picker Control for Tab 1
        $this->add_control(
            'price_picker_1',
            [
                'label' => __('Price Picker', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 10, // Replace with your default value
            ]
        );


        $this->add_control(
            'currency_input_1',
            [
                'label' => __('Currency', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '€',
            ]
        );


        $this->add_control(
            'toggle_1_button',
            [
                'label' => __('Display a navigation button', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'your-text-domain'),
                'label_off' => __('No', 'your-text-domain'),
                'default' => 'yes', // Replace with your default value
            ]
        );


        $this->add_control(
            'text_field_1',
            [
                'label' => __('Rename Button', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Discover', 'your-text-domain'), // Replace with your Best Seller
            ]
        );

        $this->add_control(
            'navigation_link_1',
            [
                'label' => __('Navigation Link', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '',
                    'is_external' => false,
                ],
                'placeholder' => __('Enter URL', 'your-text-domain'),
            ]
        );


        // End of Configuration Tab 1
        $this->end_controls_section();
    }





    // Render the widget output on the frontend
    protected function render()
    {

        wp_enqueue_style(
            'majestic-single-card-2-style',
            plugin_dir_url(__FILE__) . '/css/majestic-single-card-2.css'
        );



        wp_enqueue_script(
            'majestic-single-card-2-script',
            plugin_dir_url(__FILE__) . '/js/majestic-single-card-2.js',
            ['jquery'],
            '1.0.0',
            true
        );


        $settings = $this->get_settings_for_display();


        // Retrieve Configuration Tab 1 values
        $image_1 = $settings['image_1']['url'];
        $title_1 = $settings['title_1'];
        $description_1_1 = $settings['description_1_1'];
        $text_field_1_value = $settings['text_field_1'];

        $navigation_link_1_value = $settings['navigation_link_1'];

        $templateContent =





            '<div class="majestic-single-card-2"><figure class="image-block">'
            . '<h1>The Beach</h1>'
            . '<img src="' . esc_url($image_1) . '" alt="" />'
            . '<figcaption>'
            . '	<h3>'
            . esc_html($title_1)
            . '</h3>'
            . '	<p>'
            . esc_html($description_1_1)
            . '</p>'
            . '<a target="_blank" href="' . esc_url($navigation_link_1_value['url']) . '">'
            . '<button>'
            . esc_html($text_field_1_value)
            . '	</button>'
            . '</a>'
            . '	</figcaption>'
            . '</figure>'
            . '</div>';


            echo wp_kses_post( $templateContent );
    }




    // Render the widget output in the editor
    protected function _content_template()
    { }
}

function majestic_single_card_2_register_widget_styles()
{
    wp_enqueue_style(
        'majestic-single-card-2style',
        plugin_dir_url(__FILE__) . '/css/majestic-single-card-2.css'
    );
}
add_action('elementor/frontend/before_enqueue_scripts', 'majestic_single_card_2_register_widget_styles');




// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Majestic_single_card_2());
