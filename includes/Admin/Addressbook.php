<?php

namespace Dev\Academy\Admin;

/**
 * Addressbook handler class
 */

class Addressbook {
    public function plugin_page() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'list';

        switch($action){
            case 'new':
                $template = __DIR__ . '/views/address-new.php';
                break;
            case 'edit':
                $template = __DIR__ . '/views/address-edit.php';
                break;
            case 'view':
                $template = __DIR__ . '/views/address-view.php';
                break;
            default:
                $template = __DIR__ . '/views/address-list.php';
        }

        if(file_exists($template)){
            include $template;
        }
    }

    public function form_handler() {

        if( !isset($_POST['submit_address']) ){
            return;
        }

        if( !wp_verify_nonce($_POST['_wpnonce'], 'new-address') ){
            wp_die('Are you cheating?');
        }

        if( !current_user_can('manage_options') ){
            wp_die('Are you cheating?');
        }

        

        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
        $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
        $address = isset($_POST['address']) ? sanitize_textarea_field($_POST['address']) : '';

        dev_ac_insert_address( [
            'id' => $id,
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
        ] );
    }
}