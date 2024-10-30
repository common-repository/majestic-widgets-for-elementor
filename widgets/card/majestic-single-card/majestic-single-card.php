<?php
// Include the necessary Elementor classes
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly      

class Majestic_single_card extends \Elementor\Widget_Base
{



    // Widget ID and Name
    public function get_name()
    {
        return 'majestic-single-card';
    }

    // Widget Title
    public function get_title()
    {
        return 'Majestic - Simple Card';
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

        $this->add_control(
            'full_screen',
            [
                'label' => __('Display Full screen', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'your-text-domain'),
                'label_off' => __('No', 'your-text-domain'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $this->add_control(
            'select_option',
            [
                'label' => __('Select Card height', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'option1',
                'options' => [
                    'option1' => __('small height', 'your-text-domain'),
                    'option2' => __('Meduim height', 'your-text-domain'),
                    'option3' => __('Large Height', 'your-text-domain'),
                ],
            ]
        );


        $this->add_control(
            'select_image_width',
            [
                'label' => __('Select image Width', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'option1',
                'options' => [
                    'option1' => __('40%', 'your-text-domain'),
                    'option2' => __('50%', 'your-text-domain'),
                    'option3' => __('60%', 'your-text-domain'),
                    'option4' => __('70%', 'your-text-domain')
                ],
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
            'majestic-single-card-style',
            plugin_dir_url(__FILE__) . '/css/majestic-single-card.css'
        );



        wp_enqueue_script(
            'majestic-single-card-script',
            plugin_dir_url(__FILE__) . '/js/majestic-single-card.js',
            ['jquery'],
            '1.0.0',
            true
        );


        $settings = $this->get_settings_for_display();


        // Retrieve Configuration Tab 1 values
        $image_1 = $settings['image_1']['url'];
        $title_1 = $settings['title_1'];
        $description_1_1 = $settings['description_1_1'];
        $description_1_2  = $settings['description_1_2'];




        $color_1 = $settings['color_1'];



        $toggle_1_button = $settings['toggle_1_button'];

        $text_field_1_value = $settings['text_field_1'];
        $price_picker_1 = $settings['price_picker_1'];
        $currency_input_1 = $settings['currency_input_1'];
        // $toggle_1 = $settings['toggle_1'];

        $navigation_link_1_value = $settings['navigation_link_1'];


        $full_screen = $settings['full_screen'];
        $select_option = $settings['select_option'];
        $select_image_width = $settings['select_image_width'];
        $imageWidth = '45%';
        $textWidth = '54%';
        if ($select_image_width == 'option1') {
            $imageWidth = '40%';
            $textWidth = '59%';
        }
        if ($select_image_width == 'option2') {
            $imageWidth = '50%';
            $textWidth = '49%';
        }
        if ($select_image_width == 'option3') {
            $imageWidth = '60%';
            $textWidth = '39%';
        }
        if ($select_image_width == 'option4') {
            $imageWidth = '70%';
            $textWidth = '29%';
        }



        $height = '25vw';
        if ($select_option == 'option1') {
            $height = '25vw';
        }
        if ($select_option == 'option2') {
            $height = '30vw';
        }
        if ($select_option == 'option3') {
            $height = '35vw';
        }
        $width = '70%';
        if ($full_screen == true) {
            $width = '100%';
        }


        // require_once plugin_dir_path(__FILE__) . 'widget-template.php';

        $templateContent =
            '<div class="majestic-single-card">'
            . '<div id="container" style="background-color:' . esc_attr($color_1) . '; width:' . esc_attr($width) . '; height:' . esc_attr($height) . '" >	'
            . '<div class="product-details" style="width:' . esc_attr($textWidth) . '">'
            . '<h1>' . esc_html($title_1) . '</h1>'
            . '<p class="information" style="margin-top:20%">'
            . esc_html($description_1_1)
            . '</p>';

        if ($toggle_1_button == true) {
            $templateContent .=
                '<div class="control">'
                . '<a href="' . esc_url($navigation_link_1_value['url']) . '">'
                . '<button class="btn">'
                . ' <span class="price">' . esc_html($currency_input_1) . ' ' . esc_html($price_picker_1) . '</span>'
                . '<span class="shopping-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>'
                . ' <span class="buy">' . esc_html($text_field_1_value) . '</span>'
                . '</button>'
                . '</a>'
                . '</div>';
        }

        $templateContent .=
            '</div>'
            . '<div class="product-image" style="width:' . esc_attr($imageWidth) . '">'
            . '<img src="' . esc_url($image_1) . '" alt="">'
            . '<div class="info">'
            . '<h2> Description</h2>'
            . '<ul>'
            . esc_html($description_1_2)
            . '</ul>'
            . '</div>'
            . '</div>'
            . '</div>'
            . '</div>';

            echo wp_kses_post( $templateContent );
    }




    // Render the widget output in the editor
    protected function _content_template()
    { }
}

function majestic_single_card_register_widget_styles()
{
    wp_enqueue_style(
        'ajestic-single-card-style',
        plugin_dir_url(__FILE__) . '/css/majestic-single-card.css'
    );
}
add_action('elementor/frontend/before_enqueue_scripts', 'majestic_single_card_register_widget_styles');




// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Majestic_single_card());
