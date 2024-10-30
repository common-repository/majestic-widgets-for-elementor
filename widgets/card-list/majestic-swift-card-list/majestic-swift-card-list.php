<?php
// Include the necessary Elementor classes
if (!defined('ABSPATH')) exit; // Exit if accessed directly      

class Majestic_swift_card_list extends \Elementor\Widget_Base
{



    // Widget ID and Name
    public function get_name()
    {
        return 'majestic-swift-card-list';
    }

    // Widget Title
    public function get_title()
    {
        return 'Majestic - Swift card list';
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



    // ...

    protected function _register_controls()
    {

        // Add a section for "Common Section"










        $this->start_controls_section(
            'common_section',
            [
                'label' => 'Common Section',
            ]
        );


        $this->add_control(
            'image_width',
            [
                'label' => __('Image Width', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '50' => '50%',
                    '75' => '75%',
                    '100' => '100%',
                ],
                'default' => '50', // Set the default value to 50%
            ]
        );
        

        // $this->add_control(
        //     'box_shadow',
        //     [
        //         'label' => 'Box Shadow',
        //         'type' => \Elementor\Controls_Manager::SELECT,
        //         'options' => [
        //             'none' => 'None',
        //             'type1' => 'Type #1 Shadow',
        //             'type2' => 'Type #2 Shadow',
        //             'type3' => 'Type #3 Shadow',
        //             'type4' => 'Type #4 Shadow',
        //             'type5' => 'Type #5 Shadow',
        //             'type6' => 'Type #6 Shadow',
        //             'type7' => 'Type #7 Shadow',
        //             'type8' => 'Type #8 Shadow',
        //             'type9' => 'Type #9 Shadow',
        //             'type10' => 'Type #10 Shadow',
        //             'type11' => 'Type #11 Shadow',

        //         ],
        //         'default' => 'none', // Set a default value
        //     ]
        // );

        $this->add_control(
            'border_radius',
            [
                'label' => __('Border Radius', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => 20, // Default border radius value (in pixels)
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .cards-wrapper' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );
        
    




        // Add control for button color
        $this->add_control(
            'button_color',
            [
                'label' => 'Button Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#007bff', // Set the default button color
            ]
        );

        // Add control for button text color
        $this->add_control(
            'button_text_color',
            [
                'label' => 'Button Text Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff', // Set the default button text color
            ]
        );


        // Add a control to adjust the image height using a progress bar
        // $this->add_control(
        //     'image_height',
        //     [
        //         'label' => 'Image Height (px)',
        //         'type' => \Elementor\Controls_Manager::SLIDER,
        //         'size_units' => ['px'],
        //         'range' => [
        //             'px' => [
        //                 'min' => 0,
        //                 'max' => 500, // Set the maximum height as needed
        //                 'step' => 1,
        //             ],
        //         ],
        //         'default' => [
        //             'unit' => 'px',
        //             'size' => 150, // Set the default image height
        //         ],
        //     ]
        // );

        // Add a control to adjust the card height using a progress bar
        // $this->add_control(
        //     'card_height',
        //     [
        //         'label' => 'Card Height (px)',
        //         'type' => \Elementor\Controls_Manager::SLIDER,
        //         'size_units' => ['px'],
        //         'range' => [
        //             'px' => [
        //                 'min' => 0,
        //                 'max' => 500, // Set the maximum card height as needed
        //                 'step' => 1,
        //             ],
        //         ],
        //         'default' => [
        //             'unit' => 'px',
        //             'size' => 300, // Set the default card height
        //         ],
        //     ]
        // );

        // Add a control to adjust the margin between cards
       
        // Add a control to set the background color of each card
        $this->add_control(
            'card_bg_color',
            [
                'label' => 'Card Background Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f9f9f9', // Set the default background color
            ]
        );



        $this->add_control(
            'hide_button',
            [
                'label' => 'Hide Button',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no', // Button is visible by default
            ]
        );

        $this->add_control(
            'hide_sub_description',
            [
                'label' => 'Hide Sub Description',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no', // Sub-description is visible by default
            ]
        );

        $this->add_control(
            'hide_description',
            [
                'label' => 'Hide Description',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no', // Description is visible by default
            ]
        );

        $this->add_control(
            'hide_title',
            [
                'label' => 'Hide Title',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no', // Title is visible by default
            ]
        );




        $this->end_controls_section();


        

        $this->start_controls_section(
            'title_Section',
            [
                'label' => 'Title Section',
            ]
        );


        // Add control for font size
        $this->add_control(
            'font_size',
            [
                'label' => 'Font Size (px)',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 12,
                        'max' => 36, // Adjust the min and max values as needed
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16, // Set the default font size
                ],
            ]
        );

        // Add control for font family
        $this->add_control(
            'font_family',
            [
                'label' => 'Description Font Family',
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'Arial, sans-serif', // Set the default font-family
                'options' => [
                    'Arial, sans-serif' => 'Arial, sans-serif',
                    'Verdana, sans-serif' => 'Verdana, sans-serif',
                    'Georgia, serif' => 'Georgia, serif',
                    // Add more font-family options as needed
                ],
            ]
        );

        // Add control for text color
        $this->add_control(
            'text_color',
            [
                'label' => 'Text Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333', // Set the default text color
            ]
        );






        $this->end_controls_section();



        $this->start_controls_section(
            'description_Section',
            [
                'label' => 'Description Section',
            ]
        );
        $this->add_control(
            'description_font_size',
            [
                'label' => 'Description Font Size (px)',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50, // Set the maximum font size as needed
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16, // Set the default font size for description
                ],
            ]
        );

        $this->add_control(
            'description_font_family',
            [
                'label' => 'Description Font Family',
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'Arial, sans-serif', // Set the default font-family
                'options' => [
                    'Arial, sans-serif' => 'Arial, sans-serif',
                    'Verdana, sans-serif' => 'Verdana, sans-serif',
                    'Georgia, serif' => 'Georgia, serif',
                    // Add more font-family options as needed
                ],
            ]
        );

        $this->add_control(
            'description_text_color',
            [
                'label' => 'Description Text Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333', // Set the default text color for description
            ]
        );

        $this->end_controls_section();













        $this->start_controls_section(
            'subdescription_Section',
            [
                'label' => 'Sub description Section',
            ]
        );


        $this->add_control(
            'custom_description_font_size',
            [
                'label' => 'Custom Description Font Size (px)',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50, // Set the maximum font size as needed
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16, // Set the default font size for custom description
                ],
            ]
        );

        $this->add_control(
            'custom_description_font_family',
            [
                'label' => 'Description Font Family',
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'Arial, sans-serif', // Set the default font-family
                'options' => [
                    'Arial, sans-serif' => 'Arial, sans-serif',
                    'Verdana, sans-serif' => 'Verdana, sans-serif',
                    'Georgia, serif' => 'Georgia, serif',
                    // Add more font-family options as needed
                ],
            ]
        );

        $this->add_control(
            'custom_description_text_color',
            [
                'label' => 'Custom Description Text Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#777', // Set the default text color for custom description
            ]
        );


        $this->end_controls_section();




        // Add a repeater control for cards
        $this->start_controls_section(
            'cards_section',
            [
                'label' => 'Cards',
            ]
        );

        $this->add_control(
            'cards',
            [
                'label' => 'Cards',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'card_image',
                        'label' => 'Card Image',
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => '', // Set a default image URL here
                        ],
                    ],
                    [
                        'name' => 'card_title',
                        'label' => 'Card Title',
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Card Title',
                    ],
                    [
                        'name' => 'card_description',
                        'label' => 'Card Description',
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => 'Card Description',
                    ],
                    [
                        'name' => 'card_subdescription',
                        'label' => 'Card Subdescription',
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Card Subdescription',
                    ],
                    [
                        'name' => 'card_button_text',
                        'label' => 'Button Text',
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Learn More',
                    ],
                    [
                        'name' => 'card_bg_color',
                        'label' => 'Card Background Color',
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '#f9f9f9', // Set the default background color for each card
                    ],
                ],
                'title_field' => '{{{ card_title }}}', // The field that will be used as the title for each card
                'default' => [
                    [

                        'card_title' => 'Default Title 1',
                        'card_description' => 'Default Description 1',
                        'card_subdescription' => 'Default Subdescription 1',
                        'card_button_text' => 'Learn More',
                        'card_bg_color' => '#e7e6e6'
                    ],
                    [

                        'card_title' => 'Default Title 2',
                        'card_description' => 'Default Description 2',
                        'card_subdescription' => 'Default Subdescription 2',
                        'card_button_text' => 'Learn More',
                        'card_bg_color' => 'e7dbdb'

                    ],
                    [

                        'card_title' => 'Default Title 3',
                        'card_description' => 'Default Description 3',
                        'card_subdescription' => 'Default Subdescription 3',
                        'card_button_text' => 'Learn More',
                        'card_bg_color' => '#afa1a1'

                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }


    protected function render() {
        $settings = $this->get_settings_for_display();
        $output = ''; // Initialize an empty string to store the HTML content
    
        // Get the image height, card height, card margin, and card background color values from the controls
        // $image_height = $settings['image_height']['size'] . $settings['image_height']['unit'];
        // $card_height = $settings['card_height']['size'] . $settings['card_height']['unit'];
        // $card_margin = $settings['card_margin']['size'] . $settings['card_margin']['unit'];
        $card_bg_color = $settings['card_bg_color'];
    
        $font_size = $settings['font_size']['size'] . $settings['font_size']['unit'];
        $font_family = $settings['font_family'];
        $text_color = $settings['text_color'];
        $button_color = $settings['button_color'];
        $button_text_color = $settings['button_text_color'];
    
        $description_font_size = $settings['description_font_size']['size'] . $settings['description_font_size']['unit'];
        $description_font_family = $settings['description_font_family'];
        $description_text_color = $settings['description_text_color'];
    
        $custom_description_font_size = $settings['custom_description_font_size']['size'] . $settings['custom_description_font_size']['unit'];
        $custom_description_font_family = $settings['custom_description_font_family'];
        $custom_description_text_color = $settings['custom_description_text_color'];
        $border_radius_value = $this->get_settings('border_radius');
        $border_radius = $border_radius_value['size'] . 'px';
        
        // $box_shadow = $settings['box_shadow'];
    
        // $box_shadow_styles = 'rgba(149, 157, 165, 0.2) 0px 8px 24px';
    
        // if ($box_shadow === 'type1') {
        //     $box_shadow_styles = 'rgba(149, 157, 165, 0.2) 0px 8px 24px';
        // } elseif ($box_shadow === 'type2') {
        //     $box_shadow_styles = 'rgba(100, 100, 111, 0.2) 0px 7px 29px 0px';
        // } elseif ($box_shadow === 'type3') {
        //     $box_shadow_styles = 'rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px';
        // } elseif ($box_shadow === 'type4') {
        //     $box_shadow_styles = 'rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px';
        // } elseif ($box_shadow === 'type5') {
        //     $box_shadow_styles = 'rgba(17, 12, 46, 0.15) 0px 48px 100px 0px';
        // } elseif ($box_shadow === 'type6') {
        //     $box_shadow_styles = 'rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset';
        // } elseif ($box_shadow === 'type7') {
        //     $box_shadow_styles = 'rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px';
        // } elseif ($box_shadow === 'type8') {
        //     $box_shadow_styles = 'rgba(0, 0, 0, 0.2) 0px 60px 40px -7px';
        // } elseif ($box_shadow === 'type9') {
        //     $box_shadow_styles = 'rgba(0, 0, 0, 0.05) 0px 1px 2px 0px';
        // } elseif ($box_shadow === 'type10') {
        //     $box_shadow_styles = 'rgba(0, 0, 0, 0.2) 0px 18px 50px -10px';
        // } elseif ($box_shadow === 'type11') {
        //     $box_shadow_styles = 'rgba(0, 0, 0, 0.45) 0px 25px 20px -20px';
        // }
    
        // Start building the HTML content
        $output .= '<div class="majestic-swift-card-list">';
    
        foreach ($settings['cards'] as $index => $card) {
            $card_bg_color = isset($card['card_bg_color']) ? $card['card_bg_color'] : '#f9f9f9';
    
            // Start building the card wrapper
            // $output .= '<div class="cards-wrapper"  style="background-color: ' . esc_attr($card_bg_color) . '; box-shadow: ' . esc_attr($box_shadow_styles) . '" >';
            // $output .= '<div class="cards-wrapper" style="background-color: ' . esc_attr($card_bg_color) . '; box-shadow: ' . esc_attr($box_shadow_styles) . '; border-radius: ' . esc_attr($border_radius) . ';">';
            // $output .= '<div class="cards-wrapper" style="box-shadow: rgba(0, 0, 0, 0.45) 0px 25px 20px -20px;background-color: ' . $card_bg_color . ';  border-radius: ' . esc_attr($border_radius) . ';">';
            $output .= '<div class="cards-wrapper" style="background-color: ' . esc_attr($card_bg_color) . ';  border-radius: ' . esc_attr($border_radius) . ';">';

            if (!empty($card['card_image']['url'])) {
                $image_width = $settings['image_width'];
    
                // Start building the card image div
                $output .= '<div class="card-image" style="width: ' . esc_attr($image_width) . '%;">';
                $output .= '<img src="' . esc_url($card['card_image']['url']) . '" alt="' . esc_attr($card['card_title']) . '">';
                $output .= '</div>'; // Close card-image div
            }
    
            // Start building the card details container
            $output .= '<div class="card-details">';
    
            if ($settings['hide_title'] !== 'yes') {
                $output .= '<h2 style="font-size: ' . esc_attr($font_size) . '; font-family: ' . esc_attr($font_family) . ', sans-serif; color: ' . esc_attr($text_color) . ';">' . esc_html($card['card_title']) . '</h2>';
            }
    
            if ($settings['hide_description'] !== 'yes') {
                $output .= '<p style="font-size: ' . esc_attr($description_font_size) . '; font-family: ' . esc_attr($description_font_family) . ', sans-serif; color: ' . esc_attr($description_text_color) . ';">' . esc_html($card['card_description']) . '</p>';
            }
    
            if ($settings['hide_sub_description'] !== 'yes') {
                $output .= '<p class="sub-description" style="font-size: ' . esc_attr($custom_description_font_size) . '; font-family: ' . esc_attr($custom_description_font_family) . ', sans-serif; color: ' . esc_attr($custom_description_text_color) . ';">' . esc_html($card['card_subdescription']) . '</p>';
            }
    
            if ($settings['hide_button'] !== 'yes') {
                $output .= '<a href="#" class="btn" style="background-color: ' . esc_attr($button_color) . '; color: ' . esc_attr($button_text_color) . ';">' . esc_html($card['card_button_text']) . '</a>';
            }
    
            $output .= '</div>';
    
            $output .= '</div>';
        }
    
        // Close majestic-swift-card-list div
        $output .= '</div>';
    
        // Output the sanitized and escaped HTML
        echo wp_kses_post($output);
    }
    

    


    // Render the widget output in the editor
    protected function _content_template()
    { }
}




// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Majestic_swift_card_list());
function majestic_swift_card_list_register_widget_styles()
{
    wp_enqueue_style(
        'majestic-swift-card-list-style',
        plugin_dir_url(__FILE__) . '/css/majestic-swift-card-list.css'
    );
}
add_action('elementor/frontend/before_enqueue_scripts', 'majestic_swift_card_list_register_widget_styles');

function majestic_swift_card_list_register_widget_scripts()
{
    wp_enqueue_script(
        'majestic-swift-card-list-script',
        plugin_dir_url(__FILE__) . '/js/majestic-swift-card-list.js', // Replace with your script file path
        ['jquery'], // You can specify jQuery as a dependency
        '1.0.0', // Replace with your script version
        true
    );
}
add_action('elementor/frontend/before_enqueue_scripts', 'majestic_swift_card_list_register_widget_scripts');
