<?php

/* =========================
   Enqueue CSS & JS
========================= */
if ( ! function_exists('mycompany_theme_assets') ) {
    function mycompany_theme_assets() {

        wp_enqueue_style(
            'mycompany-style',
            get_template_directory_uri() . '/assets/css/styles.css'
        );

        wp_enqueue_style(
            'mycompany-main',
            get_stylesheet_uri()
        );

        wp_enqueue_script(
            'mycompany-script',
            get_template_directory_uri() . '/assets/js/main.js',
            array(),
            '1.0',
            true
        );
    }
}
add_action( 'wp_enqueue_scripts', 'mycompany_theme_assets' );


/* =========================
   Register Menu
========================= */
if ( ! function_exists('add_Main_Nav') ) {
    function add_Main_Nav() {
        register_nav_menu('header-menu', __('Huvudmeny', 'mycompany'));
    }
}
add_action( 'init', 'add_Main_Nav' );


/* =========================
   Theme Supports
========================= */
add_theme_support('post-thumbnails');


/* =========================
   Widgets
========================= */
if ( ! function_exists('mytheme_widgets_init') ) {
    function mytheme_widgets_init() {
        register_sidebar(array(
            'name'          => __('Main Sidebar', 'mycompany'),
            'id'            => 'main-sidebar',
            'before_widget' => '<div class="widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
        ));
    }
}
add_action('widgets_init', 'mytheme_widgets_init');