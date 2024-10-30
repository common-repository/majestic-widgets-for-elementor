<?php
// Include the necessary Elementor classes
if (!defined('ABSPATH')) exit; // Exit if accessed directly      

class Majestic_elite_card_list extends \Elementor\Widget_Base
{



    // Widget ID and Name
    public function get_name()
    {
        return 'majestic-elite-card-list';
    }

    // Widget Title
    public function get_title()
    {
        return 'Majestic - Elite card list';
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
            'enable_card_highlight',
            [
                'label' => 'Enable Card Highlighting',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes', // Enable card highlighting by default
            ]
        );

        // Add a control to adjust the image height using a progress bar
        $this->add_control(
            'image_height',
            [
                'label' => 'Image Height (px)',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500, // Set the maximum height as needed
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 150, // Set the default image height
                ],
            ]
        );

        // Add a control to adjust the card height using a progress bar
        $this->add_control(
            'card_height',
            [
                'label' => 'Card Height (px)',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500, // Set the maximum card height as needed
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 300, // Set the default card height
                ],
            ]
        );

        // Add a control to adjust the margin between cards
        $this->add_control(
            'card_margin',
            [
                'label' => 'Card Margin (px)',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50, // Set the maximum margin as needed
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10, // Set the default card margin
                ],
            ]
        );

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
                            'url' => 'YOUR_DEFAULT_IMAGE_URL', // Set a default image URL here
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
                ],
                'title_field' => '{{{ card_title }}}', // The field that will be used as the title for each card
                'default' => [
                    [
                        'card_image' => [
                            'url' => 'YOUR_DEFAULT_IMAGE_URL',
                        ],
                        'card_title' => 'Default Title 1',
                        'card_description' => 'Default Description 1',
                        'card_subdescription' => 'Default Subdescription 1',
                        'card_button_text' => 'Learn More',
                    ],
                    [
                        'card_image' => [
                            'url' => 'YOUR_DEFAULT_IMAGE_URL',
                        ],
                        'card_title' => 'Default Title 2',
                        'card_description' => 'Default Description 2',
                        'card_subdescription' => 'Default Subdescription 2',
                        'card_button_text' => 'Learn More',
                    ],
                    [
                        'card_image' => [
                            'url' => 'YOUR_DEFAULT_IMAGE_URL',
                        ],
                        'card_title' => 'Default Title 3',
                        'card_description' => 'Default Description 3',
                        'card_subdescription' => 'Default Subdescription 3',
                        'card_button_text' => 'Learn More',
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Get the image height, card height, card margin, and card background color values from the controls
        $image_height = $settings['image_height']['size'] . $settings['image_height']['unit'];
        $card_height = $settings['card_height']['size'] . $settings['card_height']['unit'];
        $card_margin = $settings['card_margin']['size'] . $settings['card_margin']['unit'];
        $card_bg_color = $settings['card_bg_color'];
        $enable_card_highlight = $settings['enable_card_highlight'] === 'yes' ? true : false;

        // Output card HTML here using the adjusted values
        if (!empty($settings['cards'])) {
            echo '<div class="majestic-elite-card-list">';
            foreach ($settings['cards'] as $index => $card) {
                echo '<div class="cards'; // Start card div

                // ... Previous code ...

                echo '" style="height: ' . $card_height . '; margin: ' . $card_margin . '; background-color: ' . $card_bg_color . ';">'; // Apply card height, margin, and background color
                echo '<img src="' . $card['card_image']['url'] . '" alt="' . $card['card_title'] . '" style="height: ' . $image_height . ';">'; // Apply image height
                // echo '<h2>' . $card['card_title'] . '</h2>';

                if ($settings['hide_title'] !== 'yes') {
                    echo '<h2>' . $card['card_title'] . '</h2>';
                }

                // Conditionally display/hide elements based on control values
                if ($settings['hide_description'] !== 'yes') {
                    echo '<p>' . $card['card_description'] . '</p>';
                }

                if ($settings['hide_sub_description'] !== 'yes') {
                    echo '<p class="sub-description">' . $card['card_subdescription'] . '</p>';
                }

                if ($settings['hide_button'] !== 'yes') {
                    echo '<a href="#" class="btn">' . $card['card_button_text'] . '</a>';
                }

                echo '</div>'; // End card div
            }
            echo '</div>';
        }
    }

    // ...


    // Render the widget output in the editor
    protected function _content_template()
    { }
}




// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Majestic_elite_card_list());
function majestic_elite_card_list_register_widget_styles()
{
    wp_enqueue_style(
        'majestic-elite-card-list-style',
        plugin_dir_url(__FILE__) . '/css/majestic-elite-card-list.css'
    );
}
add_action('elementor/frontend/before_enqueue_scripts', 'majestic_elite_card_list_register_widget_styles');

function majestic_elite_card_list_register_widget_scripts()
{
    wp_enqueue_script(
        'majestic-elite-card-list-script',
        plugin_dir_url(__FILE__) . '/js/majestic-elite-card-list.js', // Replace with your script file path
        ['jquery'], // You can specify jQuery as a dependency
        '1.0.0', // Replace with your script version
        true
    );
}
add_action('elementor/frontend/before_enqueue_scripts', 'majestic_elite_card_list_register_widget_scripts');
