<?php

namespace Dev\Academy\Admin;

/**
 * The Menu handler class
 */

 class Menu {

    /**
     * Class constructor
     */
    function __construct(){
        add_action( 'admin_menu', [$this, 'admin_menu'] );
    }

    public function admin_menu() {
        $parent_slug = 'dev-academy';
        $capability = 'manage_options';

        add_menu_page( __( 'Dev Academy', 'dev-academy' ), __( 'Dev Academy', 'dev-academy' ), $capability, $parent_slug, [$this, 'plugin_page'], 'dashicons-welcome-learn-more', 30 );
    }

    public function plugin_page() {
        echo 'Hello World';
    }

 }