<?php
// Include the necessary Elementor classes
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly      

class Majestic_slider_gallery extends \Elementor\Widget_Base
{



    // Widget ID and Name
    public function get_name()
    {
        return 'majestic-slider-gallery';
    }

    // Widget Title
    public function get_title()
    {
        return 'Majestic - Slider Gallery';
    }

    // Widget Icon (optional)
    public function get_icon()
    {
        return 'eicon-slider-album';
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
            'images',
            [
                'label' => __('Select Images', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'multiple' => true,
                'default' => [],
            ]
        );

        $this->add_control(
            'isDisplayTitle',
            [
                'label' => __('Display the title', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );


        $this->end_controls_section();
    }



    // Render the widget output on the frontend
    protected function render()
    {

        wp_enqueue_style(
            'majestic-slider-gallery-style',
            plugin_dir_url(__FILE__) . '/css/majestic-slider-gallery.css',
            array('elementor-frontend'),
            '1.0',
            'all'
        );



        wp_enqueue_script(
            'majestic-slider-gallery-script',
            plugin_dir_url(__FILE__) . '/js/majestic-slider-gallery.js',
            ['jquery'],
            '1.0.0',
            true
        );


        // require_once plugin_dir_path(__FILE__) . 'widget-template.php';




        $settings = $this->get_settings();

        $image_list = $settings['images'];

        if (!empty($image_list) && is_array($image_list)) {
            $templateStart = '<div class="majestic-slider-gallery"><div class="options">';
            $templateEnd =  '</div></div>';
            $isDisplayTitle = $settings['isDisplayTitle'];
        
            $templateContent = '';
            foreach ($image_list as  $index => $image) {
                $image_url = esc_url($image['url']);
                $image_alt = isset($image['title']) ? esc_attr($image['title']) : '';
                $Image_title = isset($image['title']) ? esc_html($image['title']) : '';
                $image_id = absint($image['id']); // Escaping the image ID
                $image_title = esc_html(get_the_title($image_id)); // Escaping the image title
        
                $classContent = 'option';
                if ($index == 0) {
                    $classContent = $classContent . ' active';
                }
                $templateContent .= '<div class="' . esc_attr($classContent) . '" style="--optionBackground:url(' . esc_url($image_url) . ');">'
                    . '<div class="shadow"></div>'
                    . '<div class="label">';
        
                if ($isDisplayTitle == true) {
                    $templateContent .= '<div class="info">'
                        . '<div class="main">' . $image_title . '</div>'
                        . '</div>';
                }
                $templateContent .= '</div>'
                    . ' </div>';
            }
        
            echo wp_kses_post( $templateStart . $templateContent . $templateEnd );
        }
        
    }

    // Render the widget output in the editor
    protected function _content_template()
    { }
}


function majestic_register_widget_styles()
{

    wp_enqueue_style(
        'majestic-slider-gallery-style',
        plugin_dir_url(__FILE__) . '/css/majestic-slider-gallery.css'
    );
}
add_action('elementor/frontend/before_enqueue_scripts', 'majestic_register_widget_styles');


// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Majestic_slider_gallery());
