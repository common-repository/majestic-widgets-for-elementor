<?php
// Include the necessary Elementor classes
if (!defined('ABSPATH')) exit; // Exit if accessed directly      

class Majestic_smart_card extends \Elementor\Widget_Base
{



    // Widget ID and Name
    public function get_name()
    {
        return 'majestic-smart-card';
    }

    // Widget Title
    public function get_title()
    {
        return 'Majestic - Smart card';
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


    protected function _register_controls()
    {
        // Repeater control for multiple cards

        $this->start_controls_section(
            'global_button_config',
            [
                'label' => __('Button configuration', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'button_link_target',
            [
                'label' => __('Button Link Target', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '_self' => __('Same Tab', 'plugin-name'),
                    '_blank' => __('New Tab', 'plugin-name'),
                ],
                'default' => '_self', // Default link target
            ]
        );

        // Add control for button font size
        $this->add_control(
            'button_font_size',
            [
                'label' => __('Button Font Size', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .card-button' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16, // Default font size in pixels
                ],
            ]
        );

        //         $this->add_control(
        //     'button_position',
        //     [
        //         'label' => __('Button Position', 'plugin-name'),
        //         'type' => \Elementor\Controls_Manager::SELECT,
        //         'options' => [
        //             'inside' => __('Inside Card', 'plugin-name'),
        //             'outside' => __('Outside Card', 'plugin-name'),
        //         ],
        //         'default' => 'inside', // Default to display the button inside the card
        //     ]
        // );


        // Add controls for button customization
        $this->add_control(
            'button_text_color',
            [
                'label' => __('Button Text Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card-button' => 'color: {{VALUE}};',
                ],
                'default' => '#0073e6', // Default button text color
            ]
        );




        $this->add_control(
            'button_background_color',
            [
                'label' => __('Button Background Color', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card-button' => 'background-color: {{VALUE}};',
                ],
                'default' => '#ffffff', // Default button background color
            ]
        );



        $this->add_control(
            'button_margin',
            [
                'label' => __('Button Margin', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .card-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );



        $this->add_control(
            'button_border',
            [
                'label' => __('Button Border', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .card-button' => 'border: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '1',
                    'right' => '1',
                    'bottom' => '1',
                    'left' => '1',
                    'unit' => 'px',
                ],
                'condition' => [
                    'display_button' => 'yes', // Show this control if "Display Button" is set to "yes"
                ],
            ]
        );



        $this->end_controls_section();




        $this->start_controls_section(
            'global_styling_section',
            [
                'label' => __('Global Style', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );



        $this->add_control(
            'center_title',
            [
                'label' => __('Center Title', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no', // Default to not center the title
            ]
        );

        $this->add_control(
            'center_description',
            [
                'label' => __('Center Description', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no', // Default to not center the description
            ]
        );

        $this->add_control(
            'display_sub_description',
            [
                'label' => __('Display Sub-Description', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes', // Default to display the sub-description
            ]
        );

        // $this->add_control(
        //     'enable_card_padding',
        //     [
        //         'label' => __('Enable Card Padding', 'plugin-name'),
        //         'type' => \Elementor\Controls_Manager::SWITCHER,
        //         'default' => 'yes', // Default to enable card padding
        //     ]
        // );


        $this->add_control(
            'title_font_size',
            [
                'label' => __('Title Font Size', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .card-heading' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 24, // Default title font size in pixels
                ],
            ]
        );

        $this->add_control(
            'description_font_size',
            [
                'label' => __('Description Font Size', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .card-description' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16, // Default description font size in pixels
                ],
            ]
        );




        $this->add_control(
            'sub_description_font_size',
            [
                'label' => __('Sub-Description Font Size', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .card-sub-description' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 14, // Default sub-description font size in pixels
                ],
                'condition' => [
                    'display_sub_description' => 'yes', // Show this control if "Display Sub-Description" is set to "yes"
                ],
            ]
        );




        $this->add_control(
            'full_width_image',
            [
                'label' => __('Full Width Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no', // Default to not displaying the image full width
            ]
        );


        $this->end_controls_section();


        // 
        // 
        // 
        // 
        // 
        // 
        // 
        // 
        // 
        // 
        // 
        // 


        $this->start_controls_section(
            'global_config_section',
            [
                'label' => __('Global Configuration', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'enable_card_shadow',
            [
                'label' => __('Enable Card Shadow', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes', // Default to enable card shadow

            ]
        );


        $this->add_control(
            'cards_per_row',
            [
                'label' => __('Cards Per Row', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => '1 Card Per Row',
                    '2' => '2 Cards Per Row',
                    '3' => '3 Cards Per Row',
                    '4' => '4 Cards Per Row',
                    '5' => '5 Cards Per Row',

                ],
                'default' => '3', // Default number of cards per row
            ]
        );

        $this->add_control(
            'card_width',
            [
                'label' => __('Card Width', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .smart-card' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 800, // Adjust the max width as needed
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 300, // Default card width in pixels
                ],
            ]
        );

        $this->add_control(
            'card_height',
            [
                'label' => __('Card Height', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .smart-card' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 800, // Adjust the max height as needed
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 200, // Default card height in pixels
                ],
            ]
        );


        $this->add_control(
            'image_width',
            [
                'label' => __('Image Width', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .smart-card .card-image' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 800, // Adjust the max width as needed
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 150, // Default image width in pixels
                ],
            ]
        );

        $this->add_control(
            'image_height',
            [
                'label' => __('Image Height', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .smart-card .card-image' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 800, // Adjust the max height as needed
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 150, // Default image height in pixels
                ],
            ]
        );








        // // Add control for button border radius
        // $this->add_control(
        //     'button_border_radius',
        //     [
        //         'label' => __('Button Border Radius', 'plugin-name'),
        //         'type' => \Elementor\Controls_Manager::DIMENSIONS,
        //         'size_units' => ['px', 'em', '%', 'rem'],
        //         'selectors' => [
        //             '{{WRAPPER}} .card-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        //         ],
        //     ]
        // );

        // Add control for button padding
        // $this->add_control(
        //     'button_padding',
        //     [
        //         'label' => __('Button Padding', 'plugin-name'),
        //         'type' => \Elementor\Controls_Manager::DIMENSIONS,
        //         'size_units' => ['px', 'em', '%', 'rem'],
        //         'selectors' => [
        //             '{{WRAPPER}} .card-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        //         ],
        //     ]
        // );



        // Add more controls for additional button customizations as needed

        $this->end_controls_section();



        $this->start_controls_section(
            'cards_section',
            [
                'label' => __('Cards', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );



        $repeater = new \Elementor\Repeater();

        // Toggle control for displaying/hiding the image
        $repeater->add_control(
            'display_image',
            [
                'label' => __('Display Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes', // Default to display the image
            ]
        );

        $repeater->add_control(
            'card_image',
            [
                'label' => __('Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'display_image' => 'yes', // Show this control if "Display Image" is set to "yes"
                ],
            ]
        );






        // Toggle control for displaying/hiding the button
        $repeater->add_control(
            'display_button',
            [
                'label' => __('Display Button', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes', // Default to display the button
            ]
        );

        $repeater->add_control(
            'card_button_text',
            [
                'label' => __('Button Text', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Read More',
                'condition' => [
                    'display_button' => 'yes', // Show this control if "Display Button" is set to "yes"
                ],
            ]
        );

        $repeater->add_control(
            'card_button_link',
            [
                'label' => __('Button Link', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',
                'default' => [
                    'url' => '',
                ],
                'condition' => [
                    'display_button' => 'yes', // Show this control if "Display Button" is set to "yes"
                ],
            ]
        );

        // Toggle control for displaying/hiding the title
        $repeater->add_control(
            'display_title',
            [
                'label' => __('Display Title', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes', // Default to display the title
            ]
        );

        $repeater->add_control(
            'card_heading',
            [
                'label' => __('Heading', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Card Heading',
                'condition' => [
                    'display_title' => 'yes', // Show this control if "Display Title" is set to "yes"
                ],
            ]
        );

        // Toggle control for displaying/hiding the description
        $repeater->add_control(
            'display_description',
            [
                'label' => __('Display Description', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes', // Default to display the description
            ]
        );

        $repeater->add_control(
            'card_description',
            [
                'label' => __('Description', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Card Description',
                'condition' => [
                    'display_description' => 'yes', // Show this control if "Display Description" is set to "yes"
                ],
            ]
        );

        $repeater->add_control(
            'display_sub_description',
            [
                'label' => __('Display Sub-Description', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes', // Default to display the sub-description
            ]
        );

        $repeater->add_control(
            'card_sub_description',
            [
                'label' => __('Sub-Description', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Card Sub-Description',
                'condition' => [
                    'display_sub_description' => 'yes', // Show this control if "Display Sub-Description" is set to "yes"
                ],
            ]
        );


        // ... Other controls for each card ...

        $this->add_control(
            'cards',
            [
                'label' => __('Card Items', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [],
                'title_field' => '{{{ card_heading }}}',
            ]
        );

        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $cards_per_row = $settings['cards_per_row'];

        // Open a container div for the cards
        echo '<div class="' . esc_attr( 'smart-card-widget-container' ) . '">';

        // Output cards based on the selected "Cards Per Row" value
        if (!empty($settings['cards'])) {
            $cards_count = count($settings['cards']);
            $cards_in_current_row = 0;

            foreach ($settings['cards'] as $index => $card) {
                $this->render_card($card, $index, $settings);
                $cards_in_current_row++;

                // Close and open a new row div after the specified number of cards per row
                if ($cards_in_current_row >= $cards_per_row || $index === $cards_count - 1) {
                    $cards_in_current_row = 0;
                    echo '</div><div class="smart-card-widget-container">';
                }
            }
        }

        // Close the container div
        echo '</div>';
    }





    private function render_card($card, $index, $settings)
    {
        $button_link_target = $settings['button_link_target'];
        // $enable_card_padding = $settings['enable_card_padding'];
        $enable_card_shadow = $settings['enable_card_shadow'];

        // Render individual card content here using $card settings
        ?>
        <div class="smart-card smart-card <?php echo esc_attr($enable_card_shadow === 'yes' ? 'with-shadow' : ''); ?>">


            <?php if ('yes' === $card['display_title']) : ?>
                <?php
                            // Check if centering the title is enabled
                            $title_alignment = ('yes' === $settings['center_title']) ? 'text-center' : '';
                            // Get the title font size from settings
                            $title_font_size = $settings['title_font_size'];
                            ?>
                <div class="card-heading <?php echo esc_attr($title_alignment); ?>" style="font-size: <?php echo esc_attr($title_font_size['size'] . $title_font_size['unit']); ?>;">
                    <?php echo esc_html($card['card_heading']); ?>
                </div>
            <?php endif; ?>

            <!-- Description -->
            <?php if ('yes' === $card['display_description']) : ?>
                <?php
                            // Check if centering the description is enabled
                            $description_alignment = ('yes' === $settings['center_description']) ? 'text-center' : '';
                            // Get the description font size from settings
                            $description_font_size = $settings['description_font_size'];
                            ?>
                <div class="card-description <?php echo esc_attr($description_alignment); ?>" style="font-size: <?php echo esc_attr($description_font_size['size'] . $description_font_size['unit']); ?>;">
                    <?php echo esc_html($card['card_description']); ?>
                </div>
            <?php endif; ?>



            <?php if ('yes' === $card['display_image']) : ?>
                <?php
                            $image_classes = 'card-image';

                            // Check if the "Full Width Image" toggle is enabled
                            if ('yes' === $settings['full_width_image']) {
                                $image_classes .= ' full-width'; // Add a CSS class for full width
                            }
                            ?>


                <img class="<?php echo esc_attr($image_classes); ?>" src="<?php echo esc_url($card['card_image']['url']); ?>" alt="<?php echo esc_attr($card['card_heading']); ?>">



            <?php endif; ?>

            <!-- Sub-Description -->
            <?php if (isset($card['display_sub_description']) && 'yes' === $card['display_sub_description']) : ?>
                <?php
                            // Get the sub-description font size from settings
                            $sub_description_font_size = $settings['sub_description_font_size'];
                            ?>
                <div class="card-sub-description" style="font-size: <?php echo esc_attr($sub_description_font_size['size'] . $sub_description_font_size['unit']); ?>;">
                    <?php echo esc_html($card['card_sub_description']); ?>
                </div>
            <?php endif; ?>


            <?php if ('yes' === $card['display_button']) : ?>
                <?php
                            // Define button styles as inline CSS
                            $button_styles = array();

                            // Add button text color
                            $button_styles[] = 'color:' . $settings['button_text_color'];

                            // Add button background color
                            $button_styles[] = 'background-color:' . $settings['button_background_color'];

                            // Add button border radius
                            // $button_styles[] = 'border-radius:' . $settings['button_border_radius']['top'] . $settings['button_border_radius']['unit'] . ' ' . $settings['button_border_radius']['right'] . $settings['button_border_radius']['unit'] . ' ' . $settings['button_border_radius']['bottom'] . $settings['button_border_radius']['unit'] . ' ' . $settings['button_border_radius']['left'] . $settings['button_border_radius']['unit'];

                            // Add button padding
                            // $button_styles[] = 'padding:' . $settings['button_padding']['top'] . $settings['button_padding']['unit'] . ' ' . $settings['button_padding']['right'] . $settings['button_padding']['unit'] . ' ' . $settings['button_padding']['bottom'] . $settings['button_padding']['unit'] . ' ' . $settings['button_padding']['left'] . $settings['button_padding']['unit'];

                            // Add button font size
                            $button_styles[] = 'font-size:' . $settings['button_font_size']['size'] . $settings['button_font_size']['unit'];

                            // Add button margin
                            $button_styles[] = 'margin:' . $settings['button_margin']['top'] . $settings['button_margin']['unit'] . ' ' . $settings['button_margin']['right'] . $settings['button_margin']['unit'] . ' ' . $settings['button_margin']['bottom'] . $settings['button_margin']['unit'] . ' ' . $settings['button_margin']['left'] . $settings['button_margin']['unit'];

                            $button_styles[] = 'width: 100%';

                            // Combine the button styles into a single string
                            $button_style_string = implode(';', $button_styles);
                            $link_target_attr = '';
                            if ($button_link_target === '_blank') {
                                $link_target_attr = 'target="_blank"';
                            }
                            ?>

                <a href="<?php echo esc_url($card['card_button_link']['url']); ?>" class="card-button" style="text-align: center;display: block; <?php echo esc_attr($button_style_string); ?>" <?php echo $link_target_attr; ?>>
                    <?php echo esc_html($card['card_button_text']); ?>
                </a>
            <?php endif; ?>
        </div>
<?php
    }
















    // Render the widget output in the editor
    protected function _content_template()
    { }
}

function majestic_smart_card_register_widget_styles()
{
    wp_enqueue_style(
        'majestic-smart-card-style',
        plugin_dir_url(__FILE__) . '/css/majestic-smart-card.css'
    );


    wp_enqueue_script(
        'majestic-smart-card-script',
        plugin_dir_url(__FILE__) . '/js/majestic-smart-card.js',
        ['jquery'],
        '1.0.0',
        true
    );
}
add_action('elementor/frontend/before_enqueue_scripts', 'majestic_smart_card_register_widget_styles');


// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Majestic_smart_card());
