<?php
// Include the necessary Elementor classes
if (!defined('ABSPATH')) exit; // Exit if accessed directly      

class Majestic_quiz extends \Elementor\Widget_Base
{



    // Widget ID and Name
    public function get_name()
    {
        return 'majestic-quiz';
    }

    // Widget Title
    public function get_title()
    {
        return 'Majestic - Education Quiz';
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
        $this->start_controls_section(
            'quiz_section',
            [
                'label' => __('Quiz Questions', 'your-plugin-text-domain'),
            ]
        );

        // $this->add_control(
        //     'questions',
        //     [
        //         'label' => __('Questions', 'your-plugin-text-domain'),
        //         'type' => \Elementor\Controls_Manager::REPEATER,
        //         'fields' => [
        //             [
        //                 'name' => 'question',
        //                 'label' => __('Question', 'your-plugin-text-domain'),
        //                 'type' => \Elementor\Controls_Manager::TEXT,
        //                 'default' => __('Question text goes here', 'your-plugin-text-domain'),
        //                 'label_block' => true,
        //             ],
        //             [
        //                 'name' => 'answers',
        //                 'label' => __('Answers', 'your-plugin-text-domain'),
        //                 'type' => \Elementor\Controls_Manager::REPEATER,
        //                 'fields' => [
        //                     [
        //                         'name' => 'answer',
        //                         'label' => __('Answer', 'your-plugin-text-domain'),
        //                         'type' => \Elementor\Controls_Manager::TEXT,
        //                         'default' => __('Answer text goes here', 'your-plugin-text-domain'),
        //                         'label_block' => true,
        //                     ],
        //                     [
        //                         'name' => 'is_correct',
        //                         'label' => __('Correct Answer', 'your-plugin-text-domain'),
        //                         'type' => \Elementor\Controls_Manager::SWITCHER,
        //                         'label_on' => __('Yes', 'your-plugin-text-domain'),
        //                         'label_off' => __('No', 'your-plugin-text-domain'),
        //                         'default' => 'no',
        //                         'return_value' => 'yes',
        //                     ],
        //                     [
        //                         'name' => 'answer_type',
        //                         'label' => __('Answer Type', 'your-plugin-text-domain'),
        //                         'type' => \Elementor\Controls_Manager::SELECT,
        //                         'default' => 'radio',
        //                         'options' => [
        //                             'radio' => __('Radio Button', 'your-plugin-text-domain'),
        //                             'checkbox' => __('Checkbox', 'your-plugin-text-domain'),
        //                         ],
        //                     ],
        //                 ],
        //                 'default' => [
        //                     [
        //                         'answer' => __('Option 1', 'your-plugin-text-domain'),
        //                         'is_correct' => 'no',
        //                         'answer_type' => 'radio',
        //                     ],
        //                     [
        //                         'answer' => __('Option 2', 'your-plugin-text-domain'),
        //                         'is_correct' => 'no',
        //                         'answer_type' => 'radio',
        //                     ],
        //                 ],
        //                 'title_field' => '{{{ answer }}}',
        //             ],
        //         ],
        //         'default' => [
        //             [
        //                 'question' => __('What is your question?', 'your-plugin-text-domain'),
        //                 'answers' => [
        //                     [
        //                         'answer' => __('Option 1', 'your-plugin-text-domain'),
        //                         'is_correct' => 'no',
        //                         'answer_type' => 'radio',
        //                     ],
        //                     [
        //                         'answer' => __('Option 2', 'your-plugin-text-domain'),
        //                         'is_correct' => 'no',
        //                         'answer_type' => 'radio',
        //                     ],
        //                 ],
        //             ],
        //         ],
        //         'title_field' => '{{{ question }}}',
        //     ]
        // );


        $this->add_control(
            'questions',
            [
                'label' => __('Questions', 'your-plugin-text-domain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $this->get_question_fields(),
                'title_field' => '{{{ question }}}',
            ]
        );



        $this->end_controls_section();




        $this->start_controls_section(
            'custom_section',
            [
                'label' => __('Text & Color Options', 'your-plugin-text-domain'),
                // 'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'enable_contact_details',
            [
                'label' => __('Require Contact Details', 'your-plugin-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'your-plugin-text-domain'),
                'label_off' => __('No', 'your-plugin-text-domain'),
                'default' => 'no',
                'return_value' => 'yes',
            ]
        );


        $this->add_control(
            'quiz_title',
            [
                'label' => __('Quiz Title', 'your-plugin-text-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Quiz Title', 'your-plugin-text-domain'),
                'label_block' => true,
            ]
        );

        // Show/Hide Title
        $this->add_control(
            'show_title',
            [
                'label' => __('Show Title', 'your-plugin-text-domain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'your-plugin-text-domain'),
                'label_off' => __('No', 'your-plugin-text-domain'),
                'default' => 'yes',
                'return_value' => 'yes',
            ]
        );



        $this->add_control(
            'question_color',
            [
                'label' => __('Question Color', 'your-plugin-text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quiz-question h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'answer_color',
            [
                'label' => __('Answer Color', 'your-plugin-text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quiz-answer label' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'question_font_family',
            [
                'label' => __('Question Font Family', 'your-plugin-text-domain'),
                'type' => \Elementor\Controls_Manager::FONT,
                'default' => '', // Default font family
            ]
        );

        $this->add_control(
            'answer_font_family',
            [
                'label' => __('Answer Font Family', 'your-plugin-text-domain'),
                'type' => \Elementor\Controls_Manager::FONT,
                'default' => '', // Default font family
            ]
        );

        // Font Size Control
        $this->add_control(
            'question_font_size',
            [
                'label' => __('Question Font Size', 'your-plugin-text-domain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'default' => ['unit' => 'px', 'size' => 16], // Default font size
                'range' => [
                    'px' => ['min' => 10, 'max' => 100],
                    'em' => ['min' => 1, 'max' => 10],
                    '%' => ['min' => 50, 'max' => 200],
                ],
                'selectors' => [
                    '{{WRAPPER}} .quiz-question' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'answer_font_size',
            [
                'label' => __('Answer Font Size', 'your-plugin-text-domain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'default' => ['unit' => 'px', 'size' => 14], // Default font size
                'range' => [
                    'px' => ['min' => 10, 'max' => 50],
                    'em' => ['min' => 1, 'max' => 5],
                    '%' => ['min' => 50, 'max' => 200],
                ],
                'selectors' => [
                    '{{WRAPPER}} .quiz-answer-label' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );




        // Add more color controls as needed

        // $this->end_controls_section();



        $this->end_controls_section();


        $this->start_controls_section(
            'quiz_style_section',
            [
                'label' => __('Quiz Customization', 'your-plugin-text-domain'),
                // 'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'quiz_text_alignment',
            [
                'label' => __('Quiz Text Alignment', 'your-plugin-text-domain'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'your-plugin-text-domain'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'your-plugin-text-domain'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'your-plugin-text-domain'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'left'
            ]
        );


        $this->add_responsive_control(
            'button_margin',
            [
                'label' => __( 'Button Margin', 'your-plugin-text-domain' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .quiz-submit-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        
        


        $this->add_control(
            'quiz_background_color',
            [
                'label' => __('Background Color', 'your-plugin-text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .interactive-quiz-widget' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'quiz_border_color',
            [
                'label' => __('Border Color', 'your-plugin-text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .interactive-quiz-widget' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'quiz_border_thickness',
            [
                'label' => __('Border Thickness', 'your-plugin-text-domain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .interactive-quiz-widget' => 'border-width: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'quiz_border_style',
            [
                'label' => __('Border Style', 'your-plugin-text-domain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'solid' => __('Solid', 'your-plugin-text-domain'),
                    'dotted' => __('Dotted', 'your-plugin-text-domain'),
                    'dashed' => __('Dashed', 'your-plugin-text-domain'),
                ],
                'default' => 'solid',
                'selectors' => [
                    '{{WRAPPER}} .interactive-quiz-widget' => 'border-style: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'quiz_border_radius',
            [
                'label' => __('Border Radius', 'your-plugin-text-domain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .interactive-quiz-widget' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();



        // 
        // 
        // 
        // 

        $this->start_controls_section(
            'progress_bar_section',
            [
                'label' => __('Progress Bar', 'your-plugin-text-domain'),
            ]
        );

        $this->add_control(
            'progress_bar_color',
            [
                'label' => __('Progress Bar Color', 'your-plugin-text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0073e6', // Default progress bar color
            ]
        );

        $this->add_control(
            'progress_bar_height',
            [
                'label' => __('Progress Bar Height (px)', 'your-plugin-text-domain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'], // Allow users to specify the height in pixels
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 5, // Default progress bar height
                ],
            ]
        );

        $this->end_controls_section();
    }



    protected function get_question_fields() {
        $fields = [];
    
        // Add the question field
        $fields[] = [
            'name' => 'question',
            'label' => __('Question', 'your-plugin-text-domain'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Question text goes here', 'your-plugin-text-domain'),
            'label_block' => true,
        ];
    
        // Dynamically add a fixed number of answer fields, say 3 for illustration purposes
        $num_answers = 5;
        for ($i = 1; $i <= $num_answers; $i++) {
            $fields[] = [
                'name' => 'answer_separator_' . $i,
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ];
            $fields[] = [
                'name' => 'answer_' . $i,
                'label' => sprintf(__('Answer %d', 'your-plugin-text-domain'), $i),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => sprintf(__('Answer %d text goes here', 'your-plugin-text-domain'), $i),
                'label_block' => true,
            ];
            $fields[] = [
                'name' => 'is_correct_' . $i,
                'label' => sprintf(__('Correct Answer %d', 'your-plugin-text-domain'), $i),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'your-plugin-text-domain'),
                'label_off' => __('No', 'your-plugin-text-domain'),
                'default' => 'no',
                'return_value' => 'yes',
            ];
            $fields[] = [
                'name' => 'answer_type_' . $i,
                'label' => sprintf(__('Answer Type %d', 'your-plugin-text-domain'), $i),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'radio',
                'options' => [
                    'radio' => __('Radio Button', 'your-plugin-text-domain'),
                    'checkbox' => __('Checkbox', 'your-plugin-text-domain'),
                ],
            ];
            $fields[] = [
                'name' => 'enable_answer_' . $i,
                'label' => sprintf(__('Enable Answer %d', 'your-plugin-text-domain'), $i),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'your-plugin-text-domain'),
                'label_off' => __('No', 'your-plugin-text-domain'),
                'default' => 'yes',
                'return_value' => 'yes',
            ];
        }
    
        return $fields;
    }





    protected function render()
{

    
    $settings = $this->get_settings_for_display();
    // echo(print_r($settings, true));

    if (empty($settings['questions'])) {
        echo __('No questions added.', 'your-plugin-text-domain');
        return;
    }

    // Prepare the HTML content as a variable
    $output = '';

    $quiz_background_color = $settings['quiz_background_color'];
    $alignment = $settings['quiz_text_alignment'];
    $button_margin = $settings['button_margin'];

    $quiz_border_color = $settings['quiz_border_color'];
    $quiz_border_thickness = $settings['quiz_border_thickness']['size'];
    $quiz_border_style = $settings['quiz_border_style'];
    $quiz_border_radius = $settings['quiz_border_radius'];
    $quiz_title = $settings['quiz_title'];
    $show_title = $settings['show_title'] === 'yes';
    $enable_contact_details = $settings['enable_contact_details'] === 'yes';

    $output .= '<div class="majestic-quiz">';

    if ($show_title) {
        $output .= '<h2 class="quiz-title" style="text-align: ' . esc_attr($alignment) . ';">' . esc_html($quiz_title) . '</h2>';
    }

    $output .= '<div class="interactive-quiz-widget" style="padding:15px; ';

    if (!empty($quiz_background_color)) {
        $output .= 'background-color: ' . esc_attr($quiz_background_color) . ';';
    }

    // Apply border styles
    if (!empty($quiz_border_color)) {
        $output .= 'border-color: ' . esc_attr($quiz_border_color) . ';';
    }
    if ($quiz_border_thickness > 0) {
        $output .= 'border-width: ' . esc_attr($quiz_border_thickness) . 'px;';
    }
    if (!empty($quiz_border_style)) {
        $output .= 'border-style: ' . esc_attr($quiz_border_style) . ';';
    }
    if (!empty($quiz_border_radius['top'])) {
        $output .= 'border-radius: ' . esc_attr($quiz_border_radius['top']) . $quiz_border_radius['unit'];
    }

    $output .= '">';

    if (empty($settings['questions'])) {
        echo __('No questions added.', 'your-plugin-text-domain');
        return;
    }

    if (!is_array($settings['questions'])) {
        echo __('Invalid question data.', 'your-plugin-text-domain');
        return;
    }

        echo '<div class="quiz-progress-bar" style="margin-top:10px; margin-bottom:10px">';
        echo '<div class="quiz-progress-bar-inner" style="background-color: ' . esc_attr($settings['progress_bar_color']) . '; height: ' . esc_attr($settings['progress_bar_height']['size']) . $settings['progress_bar_height']['unit'] . '; "></div>';
        echo '</div>';


    if (is_array($settings['questions'])) {

        foreach ($settings['questions'] as $index => $question) {
            $question_correct_answers = [];
    
            if ($question !== null) {
                $question_text = $question['question'];
                $output .= '<div class="quiz-question">';
                $output .= '<h3 style="font-family: ' . esc_attr($settings['question_font_family']) . '; font-size: ' . esc_attr($settings['question_font_size']['size'] . $settings['question_font_size']['unit']) . ';color: ' . $settings['question_color'] . ';">' . esc_html($question_text) . '</h3>';
                $output .= '<ul class="quiz-answers">';
    
                // Dynamically loop through each of the answer fields
                $num_answers = 5;  // Adjust this according to your needs.
                for ($i = 1; $i <= $num_answers; $i++) {
                    if (!isset($question['enable_answer_' . $i]) || $question['enable_answer_' . $i] !== 'yes') {
                        continue;
                    }
    
                    $answer_text = $question['answer_' . $i];
                    $is_correct = $question['is_correct_' . $i] === 'yes';
                    $answer_type = $question['answer_type_' . $i];
                    $input_type = ($answer_type === 'checkbox') ? 'checkbox' : 'radio';
    
                    $output .= '<li class="quiz-answer">';
                    $output .= '<label class="quiz-answer-label" style="color: ' . $settings['answer_color'] . '; font-family: ' . esc_attr($settings['answer_font_family']) . '; font-size: ' . esc_attr($settings['answer_font_size']['size'] . $settings['answer_font_size']['unit']) . ';">';
                    $output .= '<input style="margin-right:10px" type="' . $input_type . '" name="quiz-answer-' . $index . '" value="' . esc_attr($answer_text) . '">';
                    $output .= esc_html($answer_text);
                    $output .= '</label>';
                    $output .= '</li>';
                    if ($is_correct) {
                        $question_correct_answers[] = $answer_text;
                    }
                }
    
                $correct_answers_data[] = $question_correct_answers;
                $output .= '</ul>';
                $output .= '</div>';
            }
        }


        // foreach ($settings['questions'] as $index => $question) {
        //     $question_correct_answers = [];

        //     if ($question !== null) {
        //         $question_text = $question['question'];
        //         $answers = $question['answers'];
        //     //    echo (serialize($settings['questions']));
        //         $output .= '<div class="quiz-question">';
        //         $output .= '<h3 style="font-family: ' . esc_attr($settings['question_font_family']) . '; font-size: ' . esc_attr($settings['question_font_size']['size'] . $settings['question_font_size']['unit']) . ';color: ' . $settings['question_color'] . ';">' . esc_html($question_text) . '</h3>';
        //         $output .= '<ul class="quiz-answers">';
                
                
        //         // if (is_array($answers)) {
        //             foreach ($answers as $indexAnswer => $answer) {
        //                 $answer_text = $answer['answer'];
        //                 // $is_correct = $answer['is_correct'] === 'yes';
        //                 $answer_type = $answer['answer_type'];

        //                 $input_type = ($answer_type === 'checkbox') ? 'checkbox' : 'radio';

        //                 $output .= '<li class="quiz-answer">';
        //                 $output .= '<label class="quiz-answer-label" style="color: ' . $settings['answer_color'] . '; font-family: ' . esc_attr($settings['answer_font_family']) . '; font-size: ' . esc_attr($settings['answer_font_size']['size'] . $settings['answer_font_size']['unit']) . ';">';
        //                 $output .= '<input style="margin-right:10px" type="' . $input_type . '" name="quiz-answer-' . $index . '" value="' . esc_attr($answer_text) . '">';
        //                 $output .= esc_html($answer_text);
        //                 $output .= '</label>';
        //                 $output .= '</li>';
        //                 if ($answer['is_correct'] === 'yes') {
        //                     $question_correct_answers[] = $answer['answer'];
        //                 }
        //             }
        //         // }
        //         $correct_answers_data[] = $question_correct_answers;

        //         $output .= '</ul>';
        //         $output .= '</div>';
        //     }
        // }
    }

    $output .= '<input type="hidden" id="quiz_completed" name="quiz_completed" value="false">';
    $margin_style = sprintf('margin: %spx %spx %spx %spx;', esc_attr($button_margin['top']), esc_attr($button_margin['right']), esc_attr($button_margin['bottom']), esc_attr($button_margin['left']));

    $output .= '<button class="quiz-submit-button" style="' . $margin_style . '">' . __('Next Question', 'your-plugin-text-domain') . '</button>';
    $output .= '<div class="quiz-results" style="display:none; text-align: center;">'; // Hide results by default
    $output .= '<h2>' . __('Quiz Results', 'your-plugin-text-domain') . '</h2>';
    $output .= '<div class="quiz-results-content" style="text-align:center">';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';

    // Output the HTML content
    $allowed_html = array(
        'div' => array(
            'class' => array(),
            'style' => array(),
        ),
        'h2' => array(),
        'h3' => array(
            'style' => array(),
        ),
        'ul' => array(
            'class' => array(),
        ),
        'li' => array(
            'class' => array(),
        ),
        'label' => array(
            'class' => array(),
            'style' => array(),
        ),
        'input' => array(
            'style' => array(),
            'type' => array(),
            'name' => array(),
            'value' => array(),
        ),
        'button' => array(
            'class' => array(),
            'style' => array(),
        ),
    );
    
    echo "<script>
        var correctAnswers = " . json_encode($correct_answers_data) . ";
      </script>";
      
    echo wp_kses($output, $allowed_html);
    
}










    // Render the widget output in the editor
    protected function _content_template()
    { }
}

function majestic_quiz_register_widget_styles()
{
    wp_enqueue_style(
        'majestic-quiz-style',
        plugin_dir_url(__FILE__) . '/css/majestic-quiz.css'
    );


    wp_enqueue_script(
        'majestic-quiz-script',
        plugin_dir_url(__FILE__) . '/js/majestic-quiz.js',
        ['jquery'],
        '1.0.0',
        true
    );
}
add_action('elementor/frontend/before_enqueue_scripts', 'majestic_quiz_register_widget_styles');


// Register the widget
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Majestic_quiz());
