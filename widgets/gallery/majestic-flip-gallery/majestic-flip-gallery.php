<?php
// Include the necessary Elementor classes
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly      

class Majestic_flip_gallery extends \Elementor\Widget_Base
{



    // Widget ID and Name
    public function get_name()
    {
        return 'majestic-flip-gallery';
    }

    // Widget Title
    public function get_title()
    {
        return 'Majestic - Flip Gallery';
    }

    // Widget Icon (optional)
    public function get_icon()
    {
        return 'eicon-gallery-justified';
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
            'majestic-flip-gallery-style',
            plugin_dir_url(__FILE__) . '/css/majestic-flip-gallery.css'
        );



        wp_enqueue_script(
            'majestic-flip-gallery-script',
            plugin_dir_url(__FILE__) . '/js/majestic-flip-gallery.js',
            ['jquery'],
            '1.0.0',
            true
        );



      

        // require_once plugin_dir_path(__FILE__) . 'widget-template.php';

        $settings = $this->get_settings();
        $isDisplayTitle = $settings['isDisplayTitle'];

        $image_list = $settings['images'];

            // $selected_color = $settings['color_picker'];

            if (!empty($image_list) && is_array($image_list)) {
                $templateStart = '<div class="majestic-flip-gallery"><div class="gallery-grid">';
                $templateEnd = '</div></div>';
                $templateContent = '';
            
                foreach ($image_list as $image) {
                    $image_url = esc_url($image['url']); // Escaping the image URL
                    $image_id = absint($image['id']); // Escaping the image ID
                    $image_title = esc_html(get_the_title($image_id)); // Escaping the image title
                    $image_alt = esc_attr($image_title); // Escaping the image alt attribute
                    $Image_description = esc_html(get_post_field('post_content', $image_id)); // Escaping the image description
            
                    $templateContent .= '<div class="gallery-item">'
                        . '<img src="' . $image_url . '" alt="' . $image_alt . '">';
            
                    if ($isDisplayTitle == true) {
                        $templateContent .= ' <div class="overlay">'
                            . '<h3>' . $image_title . '</h3>'
                            . ' <p>' . $Image_description . '</p>'
                            . ' </div>';
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

function majestic_gallery_widget_register_widget_styles()
{
    wp_enqueue_style(
        'widget-gallery-style',
        plugin_dir_url(__FILE__) . '/css/majestic-flip-gallery.css'
    );
}
add_action( 'elementor/frontend/before_enqueue_scripts', 'majestic_gallery_widget_register_widget_styles' );




// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Majestic_flip_gallery());


// function majestic_hexagon_gallery_widget_init() {
//     \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Majestic_flip_gallery() );
// }
// add_action( 'elementor/widgets/widgets_registered', 'majestic_hexagon_gallery_widget_init' );