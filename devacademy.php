<?php

/*
Plugin Name: Dev Academy
Plugin URI: https://masudrana.me/devacademy/
Description: This plugin adds amazing functionality to your WordPress site.
Version: 1.0
Author: Masud Rana
Author URI: https://masudrana.me/
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain: dev-academy
Domain Path: /languages
*/


if( !defined('ABSPATH') ){
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */

final class Dev_Academy {


    /**
     * Plugin version
     * 
     * @var string
     */
    const VERSION = '1.0';

    /**
     * Class constructor
     * 
     */
    private function __construct(){
        $this->define_constants();

        register_activation_hook( __FILE__, [$this, 'activate'] );

        add_action( 'plugins_loaded', [$this, 'init_plugin'] );
    }




    /**
     * Initialize the plugin
     * @return \Dev_Academy
     */
    public static function init() {
        static $instance = false;

        if(!$instance){
            $instance = new self();
        }

        return $instance;
    }


    /**
     * Initialize the plugin after plugins_loaded
     * 
     * @return void
     */
    public function define_constants() {
        define('DEV_ACADEMY_VERSION', self::VERSION);
        define('DEV_ACADEMY_FILE', __FILE__);
        define('DEV_ACADEMY_PATH', __DIR__);
        define('DEV_ACADEMY_URL', plugins_url('', DEV_ACADEMY_FILE));
        define('DEV_ACADEMY_ASSETS', DEV_ACADEMY_URL . '/assets');
    }


    /**
     * Initialize the plugin
     * 
     * @return void
     */
    public function init_plugin() {
        if(is_admin()){
            new Dev\Academy\Admin();
        } else{
            new Dev\Academy\Frontend();
        }
    }


    /**
     * Initialize the plugin
     * 
     * @return void
     */
    public function activate() {
        $installed = get_option('dev_academy_installed');

        if(!$installed){
            update_option('dev_academy_installed', time());
        }

        update_option('dev_academy_version', DEV_ACADEMY_VERSION);
    }

}

/**
 * Initialize the plugin
 * 
 * @return \Dev_Academy
 */

function dev_academy(){
    return Dev_Academy::init();
}

// kick-off the plugin
dev_academy();