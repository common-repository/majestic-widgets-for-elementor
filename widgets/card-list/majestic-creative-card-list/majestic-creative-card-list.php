<?php
// Include the necessary Elementor classes
if (!defined('ABSPATH')) exit; // Exit if accessed directly      

class Majestic_creative_card_list extends \Elementor\Widget_Base
{



    // Widget ID and Name
    public function get_name()
    {
        return 'majestic-creative-card-list';
    }

    // Widget Title
    public function get_title()
    {
        return 'Majestic - Creative card list';
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

    protected function _register_controls()
    {
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
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'image_height',
            [
                'label' => 'Image Height (px)',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 200,
                ],
            ]
        );

        $this->add_control(
            'card_height',
            [
                'label' => 'Card Height (px)',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 230,
                ],
            ]
        );

        $this->add_control(
            'card_margin',
            [
                'label' => 'Card Margin (px)',
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
            ]
        );

        $this->add_control(
            'card_bg_color',
            [
                'label' => 'Card Background Color',
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f9f9f9',
            ]
        );

        $this->add_control(
            'hide_title',
            [
                'label' => 'Hide Title',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'hide_description',
            [
                'label' => 'Hide Description',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'hide_sub_description',
            [
                'label' => 'Hide Sub Description',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'hide_button',
            [
                'label' => 'Hide Button',
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->end_controls_section();

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
                            'url' => 'YOUR_DEFAULT_IMAGE_URL',
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
                        'name' => 'card_sub_description',
                        'label' => 'Card Sub Description',
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Card Sub Description',
                    ],
                    [
                        'name' => 'card_button_text',
                        'label' => 'Button Text',
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Learn More',
                    ],
                    [
                        'name' => 'card_button_link',
                        'label' => 'Button Link',
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => 'https://example.com',
                    ],
                    [
                        'name' => 'card_bg_color',
                        'label' => 'Card Background Color',
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => '#f9f9f9',
                    ],
        
                ],
                'title_field' => '{{{ card_title }}}',
                'default' => [
                    [
                        'card_image' => [
                            'url' => 'YOUR_DEFAULT_IMAGE_URL',
                        ],
                        'card_title' => 'Default Title 1',
                        'card_description' => 'Default Description 1',
                        'card_sub_description' => 'Default Sub Description 1',
                        'card_button_text' => 'Learn More',
                        'card_bg_color'=>'#f3f2f2'
                    ],
                    [
                        'card_image' => [
                            'url' => 'YOUR_DEFAULT_IMAGE_URL',
                        ],
                        'card_title' => 'Default Title 2',
                        'card_description' => 'Default Description 2',
                        'card_sub_description' => 'Default Sub Description 2',
                        'card_button_text' => 'Learn More',
                        'card_bg_color'=>'#d9f9f0'
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $image_height = $settings['image_height']['size'] . $settings['image_height']['unit'];
        $card_height = $settings['card_height']['size'] . $settings['card_height']['unit'];
        $card_margin = $settings['card_margin']['size'] . $settings['card_margin']['unit'];
        $card_bg_color = $settings['card_bg_color'];

        if (!empty($settings['cards'])) {
            echo '<div class="majestic-creative-card-list">';
            foreach ($settings['cards'] as $index => $card) {

                $card_bg_color = !empty($card['card_bg_color']) ? $card['card_bg_color'] : $settings['card_bg_color']; // Use individual card color or common color

                
                echo '<div class="creative-card" style="background-color: ' . $card_bg_color . '; margin: ' . $card_margin . '; height: ' . $card_height . ';">';
                // echo ' style="background-color: ' . $card_bg_color . '; height: ' . $card_height . '; margin: ' . $card_margin . ';">';
                echo '<div class="card-image" >';
                echo '<img style="width:100%; height: ' . $image_height . ';" src="' . $card['card_image']['url'] . '" alt="' . $card['card_title'] . '">';
                echo '</div>';
                echo '<div class="card-content">';
                if ($settings['hide_title'] !== 'yes') {
                    echo '<h2>' . $card['card_title'] . '</h2>';
                }
                if ($settings['hide_description'] !== 'yes') {
                    echo '<p>' . $card['card_description'] . '</p>';
                }
                if ($settings['hide_sub_description'] !== 'yes') {
                    echo '<p class="sub-description">' . $card['card_sub_description'] . '</p>';
                }
                if ($settings['hide_button'] !== 'yes') {
                    $button_link = !empty($card['card_button_link']['url']) ? $card['card_button_link']['url'] : '#';
                    echo '<a href="' . esc_url($button_link) . '" class="btn">' . $card['card_button_text'] . '</a>';
                }
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        }
    }


    // Render the widget output in the editor
    protected function _content_template()
    { }
}




// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Majestic_creative_card_list());
function majestic_creative_card_list_register_widget_styles()
{
    wp_enqueue_style(
        'majestic-creative-card-list-style',
        plugin_dir_url(__FILE__) . '/css/majestic-creative-card-list.css'
    );
}
add_action('elementor/frontend/before_enqueue_scripts', 'majestic_creative_card_list_register_widget_styles');

function majestic_creative_card_list_register_widget_scripts()
{
    wp_enqueue_script(
        'majestic-creative-card-list-script',
        plugin_dir_url(__FILE__) . '/js/majestic-creative-card-list.js', // Replace with your script file path
        ['jquery'], // You can specify jQuery as a dependency
        '1.0.0', // Replace with your script version
        true
    );
}
add_action('elementor/frontend/before_enqueue_scripts', 'majestic_creative_card_list_register_widget_scripts');
