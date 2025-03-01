<?php
// Include the necessary Elementor classes
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly      

class Majestic_trend_card_list extends \Elementor\Widget_Base
{



    // Widget ID and Name
    public function get_name()
    {
        return 'majestic-trend-card-list';
    }

    // Widget Title
    public function get_title()
    {
        return 'Majestic - Trend card List';
    }

    // Widget Icon (optional)
    public function get_icon()
    {
        return 'eicon-info-box';
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
                'label' => __('Tab 1', 'your-text-domain'),
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
        // $this->add_control(
        //     'description_1_2',
        //     [
        //         'label' => __('Description 2', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::TEXTAREA,
        //         'default' => __('Corsican and I could no longer doubt but that it was Ellen, Fabians betrothed, and Harry Drakes wife. ', 'your-text-domain'),
        //     ]
        // );

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
        // $this->add_control(
        //     'price_picker_1',
        //     [
        //         'label' => __('Price Picker', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::NUMBER,
        //         'default' => 10, // Replace with your default value
        //     ]
        // );


        // $this->add_control(
        //     'currency_input_1',
        //     [
        //         'label' => __('Currency', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::TEXT,
        //         'default' => '€',
        //     ]
        // );


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


        // #################### 2222  #########################



        // Configuration Tab 2
        $this->start_controls_section(
            'section_tab_2',
            [
                'label' => __('Tab 2', 'your-text-domain'),
            ]
        );

        // Image Control
        $this->add_control(
            'image_2',
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
            'title_2',
            [
                'label' => __('Title', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Enter your title', 'your-text-domain'),
            ]
        );

        // Description 1 Control
        $this->add_control(
            'description_2_1',
            [
                'label' => __('Description 1', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('I said that the length of the Great Eastern exceeded two hectometres. For the benefit of those partial to comparisons.', 'your-text-domain'),
            ]
        );

        // Description 1 Control
        // $this->add_control(
        //     'description_2_2',
        //     [
        //         'label' => __('Description 2', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::TEXTAREA,
        //         'default' => __('Corsican and I could no longer doubt but that it was Ellen, Fabians betrothed, and Harry Drakes wife. ', 'your-text-domain'),
        //     ]
        // );

        // Description 1 Control
        // $this->add_control(
        //     'description_2_3',
        //     [
        //         'label' => __('Description 3', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::TEXTAREA,
        //         'default' => __('desciption', 'your-text-domain'),
        //     ]
        // );


        $this->add_control(
            'color_2',
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
        //     'toggle_2',
        //     [
        //         'label' => __('Display a price', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::SWITCHER,
        //         'label_on' => __('Yes', 'your-text-domain'),
        //         'label_off' => __('No', 'your-text-domain'),
        //         'default' => 'yes', // Replace with your Best Seller
        //     ]
        // );





        // $this->add_control(
        //     'price_picker_2',
        //     [
        //         'label' => __('Price Picker', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::NUMBER,
        //         'default' => 0, // Replace with your default value
        //     ]
        // );

        // $this->add_control(
        //     'currency_input_2',
        //     [
        //         'label' => __('Currency', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::TEXT,
        //         'default' => '$GLOBALS',
        //     ]
        // );


        $this->add_control(
            'toggle_2_button',
            [
                'label' => __('Display a navigation button', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'your-text-domain'),
                'label_off' => __('No', 'your-text-domain'),
                'default' => 'yes', // Replace with your default value
            ]
        );

        $this->add_control(
            'text_field_2',
            [
                'label' => __('Rename Button', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Read more', 'your-text-domain'), // Replace with your Best Seller
            ]
        );

        $this->add_control(
            'navigation_link_2',
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


        // End of Configuration Tab 2
        $this->end_controls_section();



        // ################### 33333 ##########################



        // Configuration Tab 3
        $this->start_controls_section(
            'section_tab_3',
            [
                'label' => __('Tab 3', 'your-text-domain'),
            ]
        );

        // Image Control
        $this->add_control(
            'image_3',
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
            'title_3',
            [
                'label' => __('Title', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Enter your title', 'your-text-domain'),
            ]
        );

        // Description 1 Control
        $this->add_control(
            'description_3_1',
            [
                'label' => __('Description 1', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('I said that the length of the Great Eastern exceeded two hectometres. For the benefit of those partial to comparisons.', 'your-text-domain'),
            ]
        );

        // Description 1 Control
        // $this->add_control(
        //     'description_3_2',
        //     [
        //         'label' => __('Description 2', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::TEXTAREA,
        //         'default' => __('Corsican and I could no longer doubt but that it was Ellen, Fabians betrothed, and Harry Drakes wife. ', 'your-text-domain'),
        //     ]
        // );

        // Description 1 Control
        // $this->add_control(
        //     'description_3_3',
        //     [
        //         'label' => __('Description 3', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::TEXTAREA,
        //         'default' => __('desciption', 'your-text-domain'),
        //     ]
        // );

        $this->add_control(
            'color_3',
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
        //     'toggle_3',
        //     [
        //         'label' => __('Display a price', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::SWITCHER,
        //         'label_on' => __('Yes', 'your-text-domain'),
        //         'label_off' => __('No', 'your-text-domain'),
        //         'default' => 'yes', // Replace with your Best Seller
        //     ]
        // );



        // $this->add_control(
        //     'price_picker_3',
        //     [
        //         'label' => __('Price Picker', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::NUMBER,
        //         'default' => 0, // Replace with your default value
        //     ]
        // );

        // $this->add_control(
        //     'currency_input_3',
        //     [
        //         'label' => __('Currency', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::TEXT,
        //         'default' => '$',
        //     ]
        // );

        $this->add_control(
            'toggle_3_button',
            [
                'label' => __('Display a navigation button', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'your-text-domain'),
                'label_off' => __('No', 'your-text-domain'),
                'default' => 'yes', // Replace with your default value
            ]
        );


        $this->add_control(
            'text_field_3',
            [
                'label' => __('Rename Button', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Read more', 'your-text-domain'), // Replace with your Best Seller
            ]
        );
        $this->add_control(
            'navigation_link_3',
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



        // End of Configuration Tab 3
        $this->end_controls_section();
    }





    // Render the widget output on the frontend
    protected function render()
    {

        wp_enqueue_style(
            'majestic-trend-card-list-style',
            plugin_dir_url(__FILE__) . '/css/majestic-trend-card-list.css'
        );



        wp_enqueue_script(
            'majestic-trend-card-list-script',
            plugin_dir_url(__FILE__) . '/js/majestic-trend-card-list.js',
            ['jquery'],
            '1.0.0',
            true
        );


        $settings = $this->get_settings_for_display();


        // Retrieve Configuration Tab 1 values
        $image_1 = $settings['image_1']['url'];
        $title_1 = $settings['title_1'];
        $description_1_1 = $settings['description_1_1'];
        // $description_1_2 = $settings['description_1_2'];
        // $description_1_3 = $settings['description_1_3'];


        // Retrieve Configuration Tab 2 values
        $image_2 = $settings['image_2']['url'];
        $title_2 = $settings['title_2'];
        $description_2_1 = $settings['description_2_1'];
        // $description_2_2 = $settings['description_2_2'];
        // $description_2_3 = $settings['description_2_3'];


        // Retrieve Configuration Tab 3 values
        $image_3 = $settings['image_3']['url'];
        $title_3 = $settings['title_3'];
        $description_3_1 = $settings['description_3_1'];
        // $description_3_2 = $settings['description_3_2'];
        // $description_3_3 = $settings['description_3_3'];



        $color_1 = $settings['color_1'];
        $color_2 = $settings['color_2'];
        $color_3 = $settings['color_3'];



        // $toggle_1_value = $settings['toggle_1'];
        // $toggle_2_value = $settings['toggle_2'];
        // $toggle_3_value = $settings['toggle_3'];


        $toggle_1_button = $settings['toggle_1_button'];
        $toggle_2_button = $settings['toggle_2_button'];
        $toggle_3_button = $settings['toggle_3_button'];

        $text_field_1_value = $settings['text_field_1'];
        $text_field_2_value = $settings['text_field_2'];
        $text_field_3_value = $settings['text_field_3'];


        $navigation_link_1_value = $settings['navigation_link_1'];
        $navigation_link_2_value = $settings['navigation_link_2'];
        $navigation_link_3_value = $settings['navigation_link_3'];

        // $price_picker_1_value = $settings['price_picker_1'];
        // $price_picker_2_value = $settings['price_picker_2'];
        // $price_picker_3_value = $settings['price_picker_3'];


        // $currency_input_1_value = $settings['currency_input_1'];
        // $currency_input_2_value = $settings['currency_input_2'];
        // $currency_input_3_value = $settings['currency_input_3'];



        // require_once plugin_dir_path(__FILE__) . 'widget-template.php';

        $templateContent =
            '<section class="majestic-trend-card-list">'
            . '<section class="articles">'
            . '<article>'
            . '<div class="article-wrapper" style="background-color:' . esc_attr($color_1) . '">'
            . '  <figure>'
            . '    <img src="' . esc_url($image_1) . '" alt="" />'
            . '  </figure>'
            . '  <div class="article-body">'
            . '    <h2>' . esc_html($title_1) . '</h2>'
            . '    <p>'
            . esc_html($description_1_1)
            . '    </p>';

        if ($toggle_1_button == true) {
            $templateContent .=
                '    <a target="_blank" href="' . esc_url($navigation_link_1_value['url']) . '" class="read-more">'
                . '      ' . esc_html($text_field_1_value) . ' <span class="sr-only">about this is some title</span>'
                . '      <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">'
                . '        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />'
                . '      </svg>'
                . '    </a>';
        }

        $templateContent .=
            '  </div>'
            . ' </div>'
            . '</article>'
            . '<article>'
            . '<div class="article-wrapper" style="background-color:' . esc_attr($color_2) . '">'
            . '  <figure>'
            . '    <img src="' . esc_url($image_2) . '" alt="" />'
            . '  </figure>'
            . '  <div class="article-body">'
            . '    <h2>' . esc_html($title_2) . '</h2>'
            . '    <p>'
            . esc_html($description_2_1)
            . '    </p>';

        if ($toggle_2_button == true) {
            $templateContent .=
                '    <a target="_blank" href="' . esc_url($navigation_link_2_value['url']) . '" class="read-more">'
                . '      ' . esc_html($text_field_2_value) . ' <span class="sr-only">about this is some title</span>'
                . '      <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">'
                . '        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />'
                . '      </svg>'
                . '    </a>';
        }

        $templateContent .=
            '  </div>'
            . ' </div>'
            . '</article>'
            . '<article>'
            . '<div class="article-wrapper" style="background-color:' . esc_attr($color_3) . '">'
            . '  <figure>'
            . '    <img src="' . esc_url($image_3) . '" alt="" />'
            . '  </figure>'
            . '  <div class="article-body">'
            . '    <h2>' . esc_html($title_3) . '</h2>'
            . '    <p>'
            . esc_html($description_3_1)
            . '    </p>';

        if ($toggle_3_button == true) {
            $templateContent .=
                '    <a target="_blank" href="' . esc_url($navigation_link_3_value['url']) . '" class="read-more">'
                . '      ' . esc_html($text_field_3_value) . ' <span class="sr-only">about this is some title</span>'
                . '      <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">'
                . '        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />'
                . '      </svg>'
                . '    </a>';
        }

        $templateContent .=
            '  </div>'
            . '</div>'
            . '</article>'
            . '</section>';

            echo wp_kses_post( $templateContent );
    }




    // Render the widget output in the editor
    protected function _content_template()
    { }
}

function majestic_trend_card_list_register_widget_styles()
{
    wp_enqueue_style(
        'majestic-trend-card-list-style',
        plugin_dir_url(__FILE__) . '/css/majestic-trend-card-list.css'
    );
}
add_action('elementor/frontend/before_enqueue_scripts', 'majestic_trend_card_list_register_widget_styles');




// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Majestic_trend_card_list());
