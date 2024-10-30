<?php
// Include the necessary Elementor classes
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly      

class Majestic_social_flip extends \Elementor\Widget_Base
{



    // Widget ID and Name
    public function get_name()
    {
        return 'majestic-social-flip';
    }

    // Widget Title
    public function get_title()
    {
        return 'Majestic - Social Media 2';
    }

    // Widget Icon (optional)
    public function get_icon()
    {
        return 'eicon-social-icons';
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
            'follow_me_text',
            [
                'label' => __('Rename the button', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Follow us', 'your-text-domain'),
                'placeholder' => __('Enter your text', 'your-text-domain'),
            ]
        );


        // $this->add_control(
        //     'select_option',
        //     [
        //         'label' => __('Select Option', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::SELECT,
        //         'options' => [
        //             'small' => __('Small', 'your-text-domain'),
        //             'meduim' => __('Meduim', 'your-text-domain'),
        //             'big' => __('Big', 'your-text-domain'),
        //         ],
        //         'default' => 'meduim',
        //     ]
        // );



        $this->add_control(
            'twitterUrl',
            [
                'label' => __('Twitter url', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('https://twitter.com/', 'your-text-domain'),
                'placeholder' => __('Enter your text', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'isHidetwitterUrl',
            [
                'label' => __('Hide Twitter link', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );


        $this->add_control(
            'instagram_url',
            [
                'label' => __('Instagram url', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('https://www.instagram.com/', 'your-text-domain'),
                'placeholder' => __('Enter your text', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'isHideinstgramUrl',
            [
                'label' => __('Hide Instagram link', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );


        $this->add_control(
            'youtube_url',
            [
                'label' => __('Youtube url', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('https://youtube.com/', 'your-text-domain'),
                'placeholder' => __('Enter your text', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'isHideyoutubeUrl',
            [
                'label' => __('Hide Youtube link', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'facebook_url',
            [
                'label' => __('Facebook url', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('https://facebook.com/', 'your-text-domain'),
                'placeholder' => __('Enter your text', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'isHideFacebookeUrl',
            [
                'label' => __('Hide Facebook link', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->end_controls_section();
    }




    // Render the widget output on the frontend
    protected function render()
    {

        wp_enqueue_style(
            'majestic-social-flip-style',
            plugin_dir_url(__FILE__) . '/css/majestic-social-flip.css'
        );



        wp_enqueue_script(
            'majestic-social-flip-script',
            plugin_dir_url(__FILE__) . '/js/majestic-social-flip.js',
            ['jquery'],
            '1.0.0',
            true
        );


        // require_once plugin_dir_path(__FILE__) . 'widget-template.php';

        $settings = $this->get_settings();
        $twitterUrl = $settings['twitterUrl'];
        $instagram_url = $settings['instagram_url'];
        $youtube_url = $settings['youtube_url'];
        $facebook_url = $settings['facebook_url'];
        $follow_me_text = $settings['follow_me_text'];
        // $selected_option = $settings['select_option'];
        $selectedClass = 'hexagon-wrapper';

        $isHidetwitterUrl = $settings['isHidetwitterUrl'];
        $isHideinstgramUrl = $settings['isHideinstgramUrl'];
        $isHideyoutubeUrl = $settings['isHideyoutubeUrl'];
        $isHideFacebookeUrl = $settings['isHideFacebookeUrl'];

        $templateContent =
        ' <div class="majestic-social-butterfly">';
    
    if ($isShowTwitter == 'yes') {
        $templateContent .=
            ' 	<div class="' . esc_attr($selectedClass) . '">'
            . ' 	    <div class="hexagon" style="background: linear-gradient(-180deg, white, ' . esc_attr($color_value) . ')">'
            . '                     <a class="fab fa-2x fa-twitter" target="_blank" href="' . esc_url($twitterUrl) . '"></a>'
            . ' 	    </div>'
            . '     </div>';
    }
    if ($isHideinstgramUrl == 'yes') {
        $templateContent .=
            '     <div class="' . esc_attr($selectedClass) . '">'
            . ' 	    <div class="hexagon" style="background: linear-gradient(-180deg, white, ' . esc_attr($color_value) . ')">'
            . '                     <a class="fab fa-2x fa-instagram" target="_blank" href="' . esc_url($instagram_url) . '"></a>'
            . ' 	    </div>'
            . ' 	</div>';
    }
    if ($isHideyoutubeUrl == 'yes') {
        $templateContent .=
            ' 	<div class="' . esc_attr($selectedClass) . '">'
            . ' 	    <div class="hexagon" style="background: linear-gradient(-180deg, white, ' . esc_attr($color_value) . ')">'
            . '                     <a class="fab fa-2x fa-youtube" target="_blank" href="' . esc_url($youtube_url) . '"></a>'
            . ' 	    </div>'
            . ' 	</div>';
    }
    if ($isHideFacebookeUrl == 'yes') {
        $templateContent .=
            ' 	<div class="' . esc_attr($selectedClass) . '">'
            . ' 	    <div class="hexagon" style="background: linear-gradient(-180deg, white, ' . esc_attr($color_value) . ')">'
            . '                     <a class="fab fa-2x fa-facebook" target="_blank" href="' . esc_url($facebook_url) . '"></a>'
            . ' 	    </div>'
            . ' 	</div>';
    }
    
    $templateContent .=
        '  </div>';
    
        echo wp_kses_post( $templateContent );
    
    }



    // Render the widget output in the editor
    protected function _content_template()
    { }
}
function majestic_social_flip_register_widget_styles()
{
    wp_enqueue_style(
        'majestic-social-flip-style',
        plugin_dir_url(__FILE__) . '/css/majestic-social-flip.css'
    );
}
add_action('elementor/frontend/before_enqueue_scripts', 'majestic_social_flip_register_widget_styles');






// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Majestic_social_flip());
