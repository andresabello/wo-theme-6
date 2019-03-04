<?php
/*
 *  Add support for WP 3.0 features, thumbnails etc
 */
add_theme_support( 'post-thumbnails' );
add_theme_support('nav-menus');
add_theme_support('custom-background');
/*
 *  Required files for theme
 */
require_once('includes/wp_bootstrap_navwalker.php');
require_once('includes/theme-options.php');
require_once('includes/update.php');
require_once('includes/form.php');
require_once('includes/contact-widget.php');
require_once('includes/footer-widget.php'); 
/*
*   Define Javascript Files
*/
function ac_scripts()
{   
    //Get Options
    $ac_options = get_option('ac_general_settings');
    $home_options = get_option('ac_homepage_settings');
    $page_options = get_option('ac_page_settings');
    $footer_options = get_option('ac_footer_settings');
    $form_options = get_option('ac_form_settings');

    $font = $ac_options['ac_font_family'];
    // Add jquery library
    wp_enqueue_script('jquery');    
    // Include script file
    wp_enqueue_script( 'ac-script', get_template_directory_uri() . '/assets/js/ac-script.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'ac_forms_js', get_template_directory_uri() . '/assets/js/form-script.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '1.0.0', true );
    // Localize script file
    wp_localize_script( 'ac_forms_js', 'acajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce('ac_form_nonce') ) );
    // Include normalize styles and bottstrap cdn
    wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.2', 'all' );
    wp_register_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
    wp_register_style( 'ac-custom', get_template_directory_uri() . '/assets/css/custom.css', array('bootstrap-css', 'font-awesome') );
    wp_enqueue_style( 'ac-custom');

    if( $font === 'Droid Sans'){
        wp_enqueue_style( 'droid-sans', 'http://fonts.googleapis.com/css?family=Droid+Sans:400,700' );
    }elseif( $font === 'Open Sans'){
        wp_enqueue_style( 'open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,700' );
    }elseif( $font === 'Lato'){
        wp_enqueue_style( 'lato', 'http://fonts.googleapis.com/css?family=Lato:400,700' );
    }elseif( $font === 'Bitter'){
        wp_enqueue_style( 'Bitter', 'http://fonts.googleapis.com/css?family=Bitter:400,700' );
    }
    // , array(), '4.3.0', 'all'

    //Custom Styles Dynamic
    $main_color = $ac_options['ac_main_color_picker']; 
    $second_color = $ac_options['ac_second_color_picker']; 
    $main_cta = $home_options['ac_main_image']; 
    $form_bg = $ac_options['ac_form_image'];
    $body_color = $ac_options['ac_font_color'];
    $contact_page = $home_options['contact_page_cta'];
    $menu_bg = $ac_options['ac_menu_picker'];
    $footer_bg = $footer_options['footer_background'];
    $lower_footer_bg = $footer_options['lower_footer_background'];
    $footer_color = $footer_options['footer_color'];
    $title_bg = $page_options['title_background']; 
    $contact_bg = $page_options['contact_ribbon'];
    $content_bg = $ac_options['ac_main_image_bg'];
    $home_form_bg = $form_options['home_form_background'];
    $home_form_bg_color = $form_options['home_form_background_color'];
    $regular_form_bg = $form_options['regular_form_background_color'];

    $custom_css = "
        body{
            color: {$body_color};
            font-family: '{$font}', sans-serif;
        }
        h2{
            color: {$main_color};
        }
        a{ color: {$main_color} ;}
        a:hover{ color: {$second_color} ;}
        a, .header-action{
            color: {$main_color};
        }
        .btn.btn-primary{
            background: {$main_color};
        }
        .btn.btn-primary:hover{
            background: {$second_color};
        }
        .home-content{
            background: url({$content_bg}) no-repeat;
            background-size: cover; 
        }
        .main-color, .ac-content h1{
            color: {$main_color};
        }
        .second-color, .header-action a{
            color: {$second_color};
        }
        .main-cta{
            background-image: url({$main_cta});
        }
        .main-nav{
            background: {$menu_bg};
        }
        .main-nav ul .active a{
            color: {$main_color};
            background-color: transparent;
        }
        .main-nav ul li a:hover{
            color: {$main_color};
        }
        .navbar-toggle {
            background-color: {$main_color};
        }
        .navbar-toggle .icon-bar {
            background-color: {$second_color};
        }
        .navbar-toggle:focus, .navbar-toggle:hover {
            background-color: {$second_color};
        }
        .navbar-toggle:focus .icon-bar, .navbar-toggle:hover .icon-bar{
            background-color: {$main_color};
        }
        .contact-cta-small{
            background: {$second_color};
        }
        .ac-caption, .footer-icon{
            background: {$main_color};            
        }
        .features h3{
            color: {$main_color};  
        }
        .features a{
            color: {$second_color};
        }
        .phone-number, .main-color{
            color: {$main_color};
        }
        .page-header{
            background-image: url({$title_bg});
            background-color: {$second_color};
            background-size: cover;
            background-repeat: no-repeat;   
        }
        .sidebar h2{ color: {$main_color}; }
        .sidebar .ac-form{
            background-color: {$regular_form_bg};
        }
        .ac-form form .ac-submit{
            background: {$second_color};
        }
        .ac-form form .ac-submit:hover{
            background: {$main_color};
        }
        .home-form{
            background: url({$home_form_bg}) no-repeat;
            background-size: cover; 
        }
        .home-form .ac-form form{
            background-color: {$home_form_bg_color};
        }
        .main-title{
            color: {$main_color};
        }
        a{
            color: {$main_color};
        }
        .footer{
            background: {$footer_bg};
            color: {$footer_color};
        }
        .footer h3{
            color: {$footer_color};
        }
        .footer h2{
            color: {$footer_color};
            border-bottom: 5px solid {$second_color};
        }
        .footer ul li a{
            color: {$footer_color};
        }
        .footer .copyright .copyright-text{
            color: {$footer_color} !important;
        }
        .footer .chat-wrap .fa-weixin{
            color: {$second_color};
        }
        .footer .chat-wrap .fa-weixin:hover{
            color: {$main_color};
        }
        .footer .contact-wrap .fa-phone{
            color: {$second_color};
        }
        .footer .contact-wrap .fa-phone:hover{
            color: {$main_color};
        }
        .copyright{
            background: {$lower_footer_background};
        }
        ";
    wp_add_inline_style( 'ac-custom', $custom_css );
}
add_action('wp_enqueue_scripts' , 'ac_scripts');
/*
*   Define Javascript Files for admin panel or Dashboard
*/
function ac_admin_assets() 
{
    //Only work if the user is admin
    if( is_admin() ) {                
        // Include Styles for admin options
        wp_enqueue_style( 'ac_admin_css', get_template_directory_uri() . '/assets/css/admin-styles.css', false, '1.0.0' );
    }
}
add_action( 'admin_enqueue_scripts', 'ac_admin_assets' );
/*
 *  Register Sidebar. If Sidebar is not registered use default in sidebar.php
 */
function ac_widgets_init() 
{
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'acframework' ),
        'id'            => 'sidebar',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'acframework' ),
        'before_widget' => '<div class="widget" id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => __('Form Container', 'acframework'),
        'id'            => 'ac-form-container',
        'description'   => __('Homepage form widget position.', 'acframework'),
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="main-color">',
        'after_title'   => '</h2>'
    ) );
    register_sidebar(array(
        'name'          => __('Footer Left', 'acframework'),
        'id'            => 'ac-footer-left',
        'description'   => __('Left footer widget position.', 'acframework'),
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="main-color">',
        'after_title'   => '</h2>'
    ));
    register_sidebar(array(
        'name'          => __('Footer Left Center', 'acframework'),
        'id'            => 'ac-footer-center-left',
        'description'   => __('Center-left footer widget position.', 'acframework'),
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="main-color">',
        'after_title'   => '</h2>'
    ));
    register_sidebar(array(
        'name'          => __('Footer Right Center', 'acframework'),
        'id'            => 'ac-footer-center-right',
        'description'   => __('Center-Right footer widget position.', 'acframework'),
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="main-color">',
        'after_title'   => '</h2>'
    ));
    register_sidebar( array(
        'name'          => __('Footer Right', 'acframework'),
        'id'            => 'ac-footer-right',
        'description'   => __('Right footer widget position.', 'acframework'),
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="main-color">',
        'after_title'   => '</h2>'
    ) );   
}
add_action( 'widgets_init', 'ac_widgets_init' );
/*
 *  Register navigation menus
 */
function register_ac_menu() 
{
  register_nav_menu( 'primary', 'Primary Menu' );
}
add_action( 'after_setup_theme', 'register_ac_menu' );
/*
 *  Remove Comments
 */
function ac_remove_comment_fields($fields) 
{
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields','ac_remove_comment_fields');
/**
*   Get Image ID using URL
*/
function ac_get_image_id($image_url) {
    
    global $wpdb;
    
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
    
    return $attachment[0]; 
}


 
function display_custom_css() {
    $css_setting = get_option( 'ac_css_settings' );
    $custom_css = $css_setting['css_value'];

    if ( ! empty( $custom_css ) ) { ?>
        <style type="text/css">
            <?php
            echo '/* Custom CSS */' . "\n";
            echo $custom_css . "\n";
            ?>
        </style>
        <?php
    }
}
add_action( 'wp_head', 'display_custom_css' );