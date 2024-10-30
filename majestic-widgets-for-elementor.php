<?php

/**
 * Plugin Name: Majestic Cards Addons for ELementor
 * Plugin URI: https://wordpress.org/plugins/majestic-widgets-for-elementor/
 * Description: This Majestic widget plugin offers a set of cards widgets and addons for Elementor. 
 * Version:     1.0.9
 * Author:      the_majestic_widgets
 *    License: GPLv3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly      



function majestic_register_list_widget($widgets_manager)
{


    //image
    // require_once(__DIR__ . '/widgets/image/majestic-mosaic-gallery/majestic-mosaic-gallery.php');
    // $widgets_manager->register(new \Majestic_mosaic_gallery());


    // image gallery

    require_once(__DIR__ . '/widgets/gallery/majestic-flip-gallery/majestic-flip-gallery.php');
    // require_once(__DIR__ . '/widgets/gallery/majestic-hexagon-gallery/majestic-hexagon-gallery.php');
    require_once(__DIR__ . '/widgets/gallery/majestic-accordionzoom-gallery/majestic-accordionzoom-gallery.php');
    require_once(__DIR__ . '/widgets/gallery/majestic-info-gallery/majestic-info-gallery.php');
    require_once(__DIR__ . '/widgets/gallery/majestic-slider-gallery/majestic-slider-gallery.php');

   


    // Social media
    require_once(__DIR__ . '/widgets/social-media/majestic-follow-social-media/majestic-follow-social-media.php');
    require_once(__DIR__ . '/widgets/social-media/majestic-social-butterfly/majestic-social-butterfly.php');
    require_once(__DIR__ . '/widgets/social-media/majestic-social-scale/majestic-social-scale.php');
    // require_once(__DIR__ . '/widgets/social-media/majestic-social-flip/majestic-social-flip.php');

   
    // $widgets_manager->register(new \Majestic_social_flip());


  

    // Card
    // require_once(__DIR__ . '/widgets/card/majestic-single-card/majestic-single-card.php');
    require_once(__DIR__ . '/widgets/card/majestic-single-card-2/majestic-single-card-2.php');

    // $widgets_manager->register(new \Majestic_single_card());


    // Majestic_timeline_vertical

    require_once(__DIR__ . '/widgets/timeline/majestic-timeline-vertical/majestic-timeline-vertical.php');
    require_once(__DIR__ . '/widgets/timeline/majestic-timeline-image/majestic-timeline-image.php');
    
    //Quiz
    require_once(__DIR__ . '/widgets/majestic-quiz/majestic-quiz.php');


    // Card Lit
    require_once(__DIR__ . '/widgets/card-list/majestic-simple-card/majestic-simple-card.php');
    require_once(__DIR__ . '/widgets/card-list/majestic-modern-card-list/majestic-modern-card-list.php');
    require_once(__DIR__ . '/widgets/card-list/majestic-elite-card-list/majestic-elite-card-list.php');
    require_once(__DIR__ . '/widgets/card-list/majestic-creative-card-list/majestic-creative-card-list.php');
    require_once(__DIR__ . '/widgets/card-list/majestic-prime-card-list/majestic-prime-card-list.php');
    require_once(__DIR__ . '/widgets/card-list/majestic-icon-card-list/majestic-icon-card-list.php');

    require_once(__DIR__ . '/widgets/card-list/majestic-swift-card-list/majestic-swift-card-list.php');

    require_once(__DIR__ . '/widgets/card-list/majestic-trend-card-list/majestic-trend-card-list.php');
    require_once(__DIR__ . '/widgets/card-list/majestic-smart-card/majestic-smart-card.php');


      
    $widgets_manager->register(new \Majestic_follow_social_media());
    $widgets_manager->register(new \Majestic_social_butterfly());
    $widgets_manager->register(new \Majestic_social_scale());

    // Card List

    $widgets_manager->register(new \Majestic_single_card_2());


    $widgets_manager->register(new \Majestic_simple_card());
    $widgets_manager->register(new \Majestic_modern_card_list());
    $widgets_manager->register(new \Majestic_elite_card_list());
    $widgets_manager->register(new \Majestic_prime_card_list());
    $widgets_manager->register(new \Majestic_icon_card_list());

    $widgets_manager->register(new \Majestic_swift_card_list());
    $widgets_manager->register(new \Majestic_creative_card_list());

    
    $widgets_manager->register(new \Majestic_trend_card_list());
    
    $widgets_manager->register(new \Majestic_timeline_vertical());
    $widgets_manager->register(new \Majestic_timeline_image());
    $widgets_manager->register(new \Majestic_quiz());
    $widgets_manager->register(new \Majestic_smart_card());


    $widgets_manager->register(new \Majestic_flip_gallery());
    $widgets_manager->register(new \Majestic_accordionzoom_gallery());
    $widgets_manager->register(new \Majestic_info_gallery());
    $widgets_manager->register(new \Majestic_slider_gallery());



    // require_once(__DIR__ . '/widgets/testimonial/majestic-testimonial-simple/majestic-testimonial-simple.php');
    // $widgets_manager->register(new \Majestic_testimonial_simple());


    // require_once(__DIR__ . '/widgets/testimonial/majestic-testimonial-simple-2/majestic-testimonial-simple-2.php');
    // $widgets_manager->register(new \Majestic_testimonial_multiple());



    
}
add_action('elementor/widgets/register', 'majestic_register_list_widget');

function majestic_add_elementor_widget_categories($elements_manager)
{

    $elements_manager->add_category(
        'majestic',
        [
            'title' => esc_html__('Majestic Widgets', 'textdomain'),
            'icon' => 'fa fa-plug',
        ]
    );
    // $elements_manager->add_category(
    // 	'second-category',
    // 	[
    // 		'title' => esc_html__( 'Second Category', 'textdomain' ),
    // 		'icon' => 'fa fa-plug',
    // 	]
    // );

}
add_action('elementor/elements/categories_registered', 'majestic_add_elementor_widget_categories');




// 1. Professional and Clean:
// PrimeCard
// EliteCard
// ProWidgetCard
// CorpCard
// BizCard
// SlickCard
// SmartCardWidget
// CleanViewCard
// ClassyCard
// ModernCard
// 2. Minimalistic and Sleek:
// MinimalCard
// SlimCard
// LightCard
// FeatherCard
// BreezeCard
// AiryCard
// SleekCard
// SoftCard
// ThinCard
// SimpleCardWidget
// 3. Creative and Colorful:
// FunkyCard
// VibrantCard
// ArtCard
// DazzleCard
// SplashCard
// CreativeCard
// WildCardWidget
// ZestyCard
// RainbowCard
// CanvasCard
// 4. Elegant and Sophisticated:
// LuxeCard
// OpulentCard
// VelvetCard
// SilkCard
// MajesticCard
// GraceCard
// ElegantWidgetCard
// RegalCard
// PoshCard
// LavishCard
// 5. Trendy and Modern:
// HipCard
// TrendCard
// NowCard
// FlashCard
// SnapCard
// BuzzCard
// FreshCardWidget
// WaveCard
// BlazeCard
// SwiftCard
// 6. Nature and Eco-Friendly:
// GreenCard
// EcoCard
// LeafCard
// EarthCard
// BloomCard
// NatureCardWidget
// FreshAirCard
// WildFlowerCard
// OasisCard
// GroveCard
// 7. Technology and Innovation:
// TechCard
// CodeCard
// PixelCard
// CyberCard
// QuantumCard
// NeoCard
// InnovateCardWidget
// ByteCard
// DataCard
// CircuitCard
// 8. Fun and Quirky:
// WhizCard
// ZippyCard
// QuirkCard
// BounceCard
// JollyCard
// SnazzyCardWidget
// GleeCard
// FizzCard
// WackyCard
// ZingCard
// Feel free to mix and match words or add additional descriptors to better suit your plugin's functionality and aesthetic.