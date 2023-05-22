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

    /**
     * Register admin menu
     * 
     * @return void
     */

    public function admin_menu() {
        $parent_slug = 'dev-academy';
        $capability = 'manage_options';

        add_menu_page( __( 'Dev Academy', 'dev-academy' ), __( 'Dev Academy', 'dev-academy' ), $capability, $parent_slug, [$this, 'address_book_pages'], 'dashicons-welcome-learn-more', 30 );
        add_submenu_page( $parent_slug, __( 'Address Book', 'dev-academy' ), __( 'Address Book', 'dev-academy' ), $capability, $parent_slug, [$this, 'address_book_pages'] );
        add_submenu_page( $parent_slug, __( 'Settings', 'dev-academy' ), __( 'Settings', 'dev-academy' ), $capability,'dev-academy-settings', [$this, 'dev_academy_settings'] );
    }

    /**
     * Render Address Book page
     * 
     * @return void
     */
    public function address_book_pages() {
        $addressbook = new Addressbook();
        $addressbook->plugin_page();
    }

    /**
     * Render Settings page
     * 
     * @return void
     */
    public function dev_academy_settings() {
        echo 'Settings';
    }

 }