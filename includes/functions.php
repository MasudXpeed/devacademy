<?php


/**
 * Insert address
 * 
 * @param array $args
 * 
 * @return int|\WP_Error
 */

function dev_ac_insert_address($args = []) {
    global $wpdb;

    if( empty($args['name']) ){
        return new \WP_Error('no-name', __('You must provide a name', 'dev-academy'));
    }

    $defaults = [
        'name' => '',
        'address' => '',
        'phone' => '',
        'created_by' => get_current_user_id(),
        'created_at' => current_time('mysql')
    ];

    $data = wp_parse_args($args, $defaults);

    if(isset($data['id'])){

        $id = $data['id'];
        unset($data['id']);

        $updated = $wpdb->update(
            $wpdb->prefix . 'ac_addresses',
            $data,
            ['id' => $id],
            [
                '%s',
                '%s',
                '%s'
            ],
            ['%d']
        );

        return $updated;
    } else {
        $inserted = $wpdb->insert(
            $wpdb->prefix . 'ac_addresses',
            $data,
            [
                '%s',
                '%s',
                '%s',
                '%d',
                '%s'
            ]
        );

        if( !$inserted ){
            return new \WP_Error('failed-to-insert', __('Failed to insert data', 'dev-academy'));
        }

        return $wpdb->insert_id;
    }
}