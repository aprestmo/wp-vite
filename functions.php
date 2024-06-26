<?php
    function my_vite_theme_setup() {
        add_theme_support( 'title-tag' );
    }
    add_action( 'after_setup_theme', 'my_vite_theme_setup' );

    function my_vite_enqueue_scripts() {
        if ( WP_ENV === 'development' ) {
            // Vite HMR connection in development
            echo '<script type="module" src="http://localhost:5173/@vite/client"></script>';
            echo '<script type="module" src="http://localhost:5173/src/main.js"></script>';
        } else {
            // Production assets
            wp_enqueue_style( 'my-vite-theme-style', get_template_directory_uri() . '/dist/assets/main.css', [], '1.0.0' );
            wp_enqueue_script( 'my-vite-theme-script', get_template_directory_uri() . '/dist/assets/main.js', [], '1.0.0', true );
        }
    }
    add_action( 'wp_enqueue_scripts', 'my_vite_enqueue_scripts' );