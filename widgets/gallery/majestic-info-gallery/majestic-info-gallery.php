<?php
// Include the necessary Elementor classes
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly      

class Majestic_info_gallery extends \Elementor\Widget_Base
{



    // Widget ID and Name
    public function get_name()
    {
        return 'majestic-info-gallery';
    }

    // Widget Title
    public function get_title()
    {
        return 'Majestic - Grid Gallery with info';
    }

    // Widget Icon (optional)
    public function get_icon()
    {
        return 'eicon-info-circle-o';
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
            'isDisplayinfoSection',
            [
                'label' => __('Display the info section', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );


        // $this->add_control(
        //     'isDisplayDescription',
        //     [
        //         'label' => __('Display the description', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::SWITCHER,
        //         'default' => 'yes',
        //     ]
        // );


        $this->end_controls_section();
    }



    // Render the widget output on the frontend
    protected function render()
    {

        wp_enqueue_style(
            'majestic-info-gallery-style',
            plugin_dir_url(__FILE__) . '/css/majestic-info-gallery.css',
            array('elementor-frontend'),
            '1.0',
            'all'
        );



        wp_enqueue_script(
            'majestic-info-gallery-script',
            plugin_dir_url(__FILE__) . '/js/majestic-info-gallery.js',
            ['jquery'],
            '1.0.0',
            true
        );


        // require_once plugin_dir_path(__FILE__) . 'widget-template.php';





        $settings = $this->get_settings_for_display();

        $image_list = $settings['images'];

        if (!empty($image_list) && is_array($image_list)) {
            $templateStart = '<div class="majestic-info-gallery"><main ontouchstart> <section class="photo-grid"> <ul class="grid-isotope">            ';
            $templateEnd =  '</ul></section></main></div>';
            $isDisplayinfoSection = $settings['isDisplayinfoSection'];
        
            $templateContent = '';
            foreach ($image_list as  $index => $image) {
                $image_url = esc_url($image['url']);
                $image_id = absint($image['id']); // Escaping the image ID
                $image_title = esc_html(get_the_title($image_id)); // Escaping the image title
                $Image_description = esc_html(get_post_field('post_content', $image_id)); // Escaping the image description
        
                $classContent = 'option';
                if ($index == 0) {
                    $classContent = $classContent . ' active';
                }
                $templateContent .= '<li class="photo-grid-item">'
                    . '<figure>'
                    . '<picture>'
                    . '  <source media="(max-width: 3000px)" srcset="' . $image_url . ', ' . $image_url . ' 2x">'
                    . '  <img alt="' . $image_title . '" src="' . $image_url . '">'
                    . '</picture>';
        
                if ($isDisplayinfoSection == true) {
                    $templateContent .= '<figcaption>'
                        . '  <fieldset>'
                        . '    <input id="' . esc_attr($image_url) . '" type="checkbox">'
                        . '    <label class="photo-close" for="' . esc_attr($image_url) . '"></label>'
                        . '    <label class="photo-link" for="' . esc_attr($image_url) . '">'
                        . '      <svg class="icon" viewBox="0 0 100 100">'
                        . '        <circle cx="49" cy="49" r="36"></circle>'
                        . '        <path d="M45,69 L55,69 M45,39 L50,39 L50,69 M49.5,29 L50,29"></path>'
                        . '      </svg>'
                        . '    </label>'
                        . '    <dl>'
                        . '      <label for="' . esc_attr($image_url) . '">'
                        . '        <svg class="icon" viewBox="0 0 100 100">'
                        . '          <polyline points="14 32 50 68 86 32"></polyline>'
                        . '        </svg>'
                        . '      </label>'
                        . '    <div>'
                        . '      <dt>Title</dt>'
                        . '      <dd>' . $image_title . '</dd>'
                        . '    </div>'
                        . '    <div>'
                        . '      <dt>Description</dt>'
                        . '      <dd>' . $Image_description . '</dd>'
                        . '    </div>'
                        . '  </dl>'
                        . '</fieldset>'
                        . '</figcaption>';
                }
                $templateContent .= '</figure>'
                    . '</li>';
            }
        
            echo wp_kses_post( $templateStart . $templateContent . $templateEnd );
        }
        
    }

    // Render the widget output in the editor
    protected function _content_template()
    { }
}


function majestic_info_gallery_register_widget_styles()
{
    wp_enqueue_style(
        'majestic-info-gallery-style',
        plugin_dir_url(__FILE__) . '/css/majestic-info-gallery.css'
    );
}
add_action('elementor/frontend/before_enqueue_scripts', 'majestic_info_gallery_register_widget_styles');


// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Majestic_info_gallery());
