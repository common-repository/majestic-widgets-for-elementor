<?php
// Include the necessary Elementor classes
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly      

class Majestic_simple_card extends \Elementor\Widget_Base
{



    // Widget ID and Name
    public function get_name()
    {
        return 'majestic-simple-card';
    }

    // Widget Title
    public function get_title()
    {
        return 'Majestic Snap card List';
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
        $this->add_control(
            'description_1_2',
            [
                'label' => __('Description 2', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Corsican and I could no longer doubt but that it was Ellen, Fabians betrothed, and Harry Drakes wife. ', 'your-text-domain'),
            ]
        );

        // Description 1 Control
        $this->add_control(
            'description_1_3',
            [
                'label' => __('Description 3', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('desciption', 'your-text-domain'),
            ]
        );


        $this->add_control(
            'color_1',
            [
                'label' => __('Color', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#a16ae8', // Replace with your default color value
                'selectors' => [
                    '{{WRAPPER}} .your-selector' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'toggle_1',
            [
                'label' => __('Display a note', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'your-text-domain'),
                'label_off' => __('No', 'your-text-domain'),
                'default' => 'yes', // Replace with your default value
            ]
        );

        $this->add_control(
            'text_field_1',
            [
                'label' => __('Text Field', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Top Sale', 'your-text-domain'), // Replace with your Best Seller
            ]
        );


        // End of Configuration Tab 1
        $this->end_controls_section();

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
        $this->add_control(
            'description_2_2',
            [
                'label' => __('Description 2', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Corsican and I could no longer doubt but that it was Ellen, Fabians betrothed, and Harry Drakes wife. ', 'your-text-domain'),
            ]
        );

        // Description 1 Control
        $this->add_control(
            'description_2_3',
            [
                'label' => __('Description 3', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('desciption', 'your-text-domain'),
            ]
        );


        $this->add_control(
            'color_2',
            [
                'label' => __('Color', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#a16ae8', // Replace with your default color value
                'selectors' => [
                    '{{WRAPPER}} .your-selector' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'toggle_2',
            [
                'label' => __('Display a note', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'your-text-domain'),
                'label_off' => __('No', 'your-text-domain'),
                'default' => 'yes', // Replace with your Best Seller
            ]
        );

        $this->add_control(
            'text_field_2',
            [
                'label' => __('Text Field', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Best Seller', 'your-text-domain'), // Replace with your Best Seller
            ]
        );



        // End of Configuration Tab 2
        $this->end_controls_section();

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
        $this->add_control(
            'description_3_2',
            [
                'label' => __('Description 2', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Corsican and I could no longer doubt but that it was Ellen, Fabians betrothed, and Harry Drakes wife. ', 'your-text-domain'),
            ]
        );

        // Description 1 Control
        $this->add_control(
            'description_3_3',
            [
                'label' => __('Description 3', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('desciption', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'color_3',
            [
                'label' => __('Color', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#a16ae8', // Replace with your default color value
                'selectors' => [
                    '{{WRAPPER}} .your-selector' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'toggle_3',
            [
                'label' => __('Display a note', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'your-text-domain'),
                'label_off' => __('No', 'your-text-domain'),
                'default' => 'yes', // Replace with your Best Seller
            ]
        );

        $this->add_control(
            'text_field_3',
            [
                'label' => __('Text Field', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Best match', 'your-text-domain'), // Replace with your Best Seller
            ]
        );





        // End of Configuration Tab 3
        $this->end_controls_section();
    }





    // Render the widget output on the frontend
    protected function render()
    {

        wp_enqueue_style(
            'majestic-simple-card-style',
            plugin_dir_url(__FILE__) . '/css/majestic-simple-card.css'
        );



        wp_enqueue_script(
            'majestic-simple-card-script',
            plugin_dir_url(__FILE__) . '/js/majestic-simple-card.js',
            ['jquery'],
            '1.0.0',
            true
        );


        $settings = $this->get_settings_for_display();


        // Retrieve Configuration Tab 1 values
        $image_1 = $settings['image_1']['url'];
        $title_1 = $settings['title_1'];
        $description_1_1 = $settings['description_1_1'];
        $description_1_2 = $settings['description_1_2'];
        $description_1_3 = $settings['description_1_3'];


        // Retrieve Configuration Tab 2 values
        $image_2 = $settings['image_2']['url'];
        $title_2 = $settings['title_2'];
        $description_2_1 = $settings['description_2_1'];
        $description_2_2 = $settings['description_2_2'];
        $description_2_3 = $settings['description_2_3'];


        // Retrieve Configuration Tab 3 values
        $image_3 = $settings['image_3']['url'];
        $title_3 = $settings['title_3'];
        $description_3_1 = $settings['description_3_1'];
        $description_3_2 = $settings['description_3_2'];
        $description_3_3 = $settings['description_3_3'];



        $color_1 = $settings['color_1'];
        $color_2 = $settings['color_2'];
        $color_3 = $settings['color_3'];



        $toggle_1_value = $settings['toggle_1'];
        $toggle_2_value = $settings['toggle_2'];
        $toggle_3_value = $settings['toggle_3'];



        $text_field_1_value = $settings['text_field_1'];
        $text_field_2_value = $settings['text_field_2'];
        $text_field_3_value = $settings['text_field_3'];


        $templateContent =
        '<div class="majestic-simple-card">'
        . ' <div class="main">'
        . '<ul class="cards">'
        . '<li class="cards_item">'
        . '  <div class="card" style="background-color:' . esc_attr($color_1) . '" tabindex="0">'
        . '      <h2 class="card_title">' . esc_html($title_1) . '</h2>'
        . '    <div class="card_image"><img src="' . esc_url($image_1) . '" alt="' . esc_attr($image_1) . '"></div>'
        . '     <div class="card_content">'
        . '    <div class="card_text">';
    
    if ($toggle_1_value == true) {
        $templateContent .=
            ' <span class="note">' . esc_html($text_field_1_value) . '</span>';
    }
    
    $templateContent  .=
        '  <p> ' . esc_html($description_1_1) . ' </p>'
        . '     <p>' . esc_html($description_1_2) . ' </p>'
        . '     <p>' . esc_html($description_1_3) . ' </p>'
        . '    </div>'
        . '  </div>'
        . '  </div>'
        . '  </li>'
        . '  <li class="cards_item">'
        . '    <div class="card" style="background-color:' . esc_attr($color_2) . '" tabindex="0">'
        . '      <h2 class="card_title">' . esc_html($title_2) . '</h2>'
        . '    <div class="card_image"><img src="' . esc_url($image_2) . '" alt="' . esc_attr($image_2) . '"></div>'
        . '    <div class="card_content">'
        . '  <div class="   ">';
    if ($toggle_2_value == true) {
        $templateContent .=
            ' <span class="note">' . esc_html($text_field_2_value) . '</span>';
    }
    
    $templateContent  .=
        '  <p> ' . esc_html($description_2_1) . ' </p>'
        . '     <p>' . esc_html($description_2_2) . ' </p>'
        . '     <p>' . esc_html($description_2_3) . ' </p>'
        . '  </div>'
        . ' </div>'
        . '  </div>'
        . '  </li>'
        . '  <li class="cards_item">'
        . '  <div class="card" style="background-color:' . esc_attr($color_3) . '" tabindex="0">'
        . '      <h2 class="card_title">' . esc_html($title_3) . '</h2>'
        . '    <div class="card_image"><img src="' . esc_url($image_3) . '" alt="' . esc_attr($image_3) . '"></div>'
        . ' <div class="card_content">'
        . '  <div class="card_text">';
    if ($toggle_3_value == true) {
        $templateContent .=
            ' <span class="note">' . esc_html($text_field_3_value) . '</span>';
    }
    
    $templateContent  .=
    
        '  <p> ' . esc_html($description_3_1) . ' </p>'
        . '     <p>' . esc_html($description_3_2) . ' </p>'
        . '     <p>' . esc_html($description_3_3) . ' </p>'
        . '  </div>'
        . '  </div>'
        . ' </div>'
        . ' </div>'
        . '  </li>'
        . ' </ul>'
        . '</div>'
        . '</div>';
    
        echo wp_kses_post( $templateContent );
    
    }




    // Render the widget output in the editor
    protected function _content_template()
    { }
}

function majestic_simple_card_register_widget_styles()
{
    wp_enqueue_style(
        'majestic-simle-card-style',
        plugin_dir_url(__FILE__) . '/css/majestic-simple-card.css'
    );
}
add_action('elementor/frontend/before_enqueue_scripts', 'majestic_simple_card_register_widget_styles');





// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Majestic_simple_card());
