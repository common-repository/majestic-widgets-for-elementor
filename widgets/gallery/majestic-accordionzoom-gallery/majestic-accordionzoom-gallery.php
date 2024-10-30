<?php
// Include the necessary Elementor classes
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly      

class Majestic_accordionzoom_gallery extends \Elementor\Widget_Base
{



    // Widget ID and Name
    public function get_name()
    {
        return 'majestic-accordionzoom-gallery';
    }

    // Widget Title
    public function get_title()
    {
        return 'Majestic - Accordion Gallery';
    }

    // Widget Icon (optional)
    public function get_icon()
    {
        return 'eicon-posts-masonry';
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
        // add_filter('elementor/elements/categories_registered', function ($categories) {
        //     $categories['majestic'] = [
        //         'title' => __('Majestic Category', 'your-text-domain'), // Replace with your own text domain
        //         'icon' => 'fa fa-folder', // Replace with an appropriate Font Awesome icon class
        //     ];
        //     return $categories;
        // });

        $this->start_controls_section(
            'section_images',
            [
                'label' => __('Images', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'images',
            [
                'label' => __('Select Images', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'multiple' => true,
                'default' => [],
            ]
        );

        $this->add_control(
            'isDisplayTitleforAccordion',
            [
                'label' => __('Display the title', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'color_picker',
            [
                'label' => __('Title Color Picker', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(255, 30, 173, 0.75)', // Set a default color value if needed
                'selectors' => [
                    '{{WRAPPER}} .your-element-class' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();
    }



    // Render the widget output on the frontend
    protected function render()
    {

        wp_enqueue_style(
            'majestic-accordionzoom-gallery-style',
            plugin_dir_url(__FILE__) . '/css/majestic-accordionzoom-gallery.css',
            array('elementor-frontend'),
            '1.0',
            'all'
        );



        wp_enqueue_script(
            'majestic-accordionzoom-gallery-script',
            plugin_dir_url(__FILE__) . '/js/majestic-accordionzoom-gallery.js',
            ['jquery'],
            '1.0.0',
            true
        );







        // require_once plugin_dir_path(__FILE__) . 'widget-template.php';





        $settings = $this->get_settings_for_display();

        $image_list = $settings['images'];

        $isDisplayTitleforAccordion = $settings['isDisplayTitleforAccordion'];
        $selected_color = $settings['color_picker'];


        if (!empty($image_list) && is_array($image_list)) {
            $templateStart = '<div class="majestic-accordionzoom-gallery"><div class="container">';
            $templateEnd = '</div></div>';
            $templateContent = '';
        
            foreach ($image_list as $index => $image) {
                $image_url = esc_url($image['url']); // Escaping the image URL
                $image_id = absint($image['id']); // Escaping the image ID
                $image_title = esc_html(get_the_title($image_id)); // Escaping the image title
        
                $templateContent .= '<div class="card">'
                    . ' <img src="' . $image_url . '">';
        
                if ($isDisplayTitleforAccordion == true) {
                    $templateContent .= ' <div style="background-color:' . esc_attr($selected_color) . '" class="card__head">' . $image_title . '</div>';
                }
                $templateContent .= '</div>';
            }
        
            echo wp_kses_post( $templateStart . $templateContent . $templateEnd );
        }
        
    }

    // Render the widget output in the editor
    protected function _content_template()
    { }
}


function majestic_accordionzoom_gallery_register_widget_styles()
{
    wp_enqueue_style(
        'majestic-accordionzoom-gallery-style',
        plugin_dir_url(__FILE__) . '/css/majestic-accordionzoom-gallery.css'
    );
}
add_action('elementor/frontend/before_enqueue_scripts', 'majestic_accordionzoom_gallery_register_widget_styles');


// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Majestic_accordionzoom_gallery());
