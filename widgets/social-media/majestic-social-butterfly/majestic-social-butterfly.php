<?php
// Include the necessary Elementor classes
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly      

class Majestic_social_butterfly extends \Elementor\Widget_Base
{



    // Widget ID and Name
    public function get_name()
    {
        return 'majestic-social-butterfly';
    }

    // Widget Title
    public function get_title()
    {
        return 'Majestic - Social butterfly';
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
                'label' => __('Configuration', 'your-text-domain'),
            ]
        );

        $this->add_control(
            'custom_color',
            [
                'label' => __('Choose background color', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'pink',
                'selectors' => [
                    '{{WRAPPER}} .your-widget-class' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'select_option',
            [
                'label' => __('Select Option', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    // 'small' => __('Small', 'your-text-domain'),
                    'meduim' => __('Meduim', 'your-text-domain'),
                    'big' => __('Big', 'your-text-domain'),
                ],
                'default' => 'meduim',
            ]
        );


        $this->add_control(
            'toggle_1',
            [
                'label' => __('Display Twitter', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'your-text-domain'),
                'label_off' => __('Hide', 'your-text-domain'),
                'default' => 'yes',
            ]
        );



        $this->add_control(
            'twitterUrl',
            [
                'label' => __('Twitter Link URL', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::URL,
                'input_type' => 'url',
                'placeholder' => __('https://twitter.com/', 'your-text-domain'),
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        // Toggle Control 2
        $this->add_control(
            'toggle_2',
            [
                'label' => __('Display Instagram', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'your-text-domain'),
                'label_off' => __('Hide', 'your-text-domain'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'instagram_url',
            [
                'label' => __('Instagram Link URL', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::URL,
                'input_type' => 'url',
                'placeholder' => __('https://www.instagram.com/', 'your-text-domain'),
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );


       

        // Toggle Control 3
        $this->add_control(
            'toggle_3',
            [
                'label' => __('Display Youtube', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'your-text-domain'),
                'label_off' => __('Hide', 'your-text-domain'),
                'default' => 'yes',
            ]
        );
        

        $this->add_control(
            'youtube_url',
            [
                'label' => __('Youtube Link URL', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::URL,
                'input_type' => 'url',
                'placeholder' => __('https://youtube.com/', 'your-text-domain'),
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );



        // Toggle Control 4
        $this->add_control(
            'toggle_4',
            [
                'label' => __('Display Facebook', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'your-text-domain'),
                'label_off' => __('Hide', 'your-text-domain'),
                'default' => 'yes',
            ]
        );

        // $this->add_control(
        //     'follow_me_text',
        //     [
        //         'label' => __('Rename the ', 'your-text-domain'),
        //         'type' => \Elementor\Controls_Manager::TEXT,
        //         'default' => __('Default Text', 'your-text-domain'),
        //     ]
        // );


        


        $this->add_control(
            'facebook_url',
            [
                'label' => __('Facebook Link URL', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::URL,
                'input_type' => 'url',
                'placeholder' => __('https://facebooks.com/', 'your-text-domain'),
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        
        


     
        $this->end_controls_section();
    }




    // Render the widget output on the frontend
    protected function render()
    {

        wp_enqueue_style(
            'majestic-social-butterfly-style',
            plugin_dir_url(__FILE__) . '/css/majestic-social-butterfly.css'
        );



        wp_enqueue_script(
            'majestic-social-butterfly-script',
            plugin_dir_url(__FILE__) . '/js/majestic-social-butterfly.js',
            ['jquery'],
            '1.0.0',
            true
        );



        $settings = $this->get_settings();
        $twitterUrl = $settings['twitterUrl']['url'];
        $instagram_url = $settings['instagram_url']['url'];
        $youtube_url = $settings['youtube_url']['url'];
        $facebook_url = $settings['facebook_url']['url'];
        // $follow_me_text = $settings['follow_me_text'];
        $selected_option = $settings['select_option'];
        $selectedClass = 'hexagon-wrapper';
        $color_value = $settings['custom_color'];


        if ($selected_option == 'meduim') {
            $selectedClass = 'hexagon-wrapper-meduim';
        }
        if ($selected_option == 'big') {
            $selectedClass = 'hexagon-wrapper-big';
        }

        $isShowTwitter = $settings['toggle_1'];
        $isHideinstgramUrl = $settings['toggle_2'];
        $isHideyoutubeUrl = $settings['toggle_3'];
        $isHideFacebookeUrl = $settings['toggle_4'];

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



function majestic_social_butterfly_register_widget_styles()
{
    wp_enqueue_style(
        'majestic-social-butterfly-style',
        plugin_dir_url(__FILE__) . '/css/majestic-social-butterfly.css'
    );
}
add_action('elementor/frontend/before_enqueue_scripts', 'majestic_social_butterfly_register_widget_styles');




// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Majestic_social_butterfly());
