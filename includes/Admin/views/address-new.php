<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e('New Address', 'dev-academy'); ?></h1>

    <form action="" method="post">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="name"><?php _e('Name', 'dev-academy'); ?></label>
                    </th>
                    <td>
                        <input type="text" name="name" id="name" class="regular-text" value="" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="phone"><?php _e('Phone', 'dev-academy'); ?></label>
                    </th>
                    <td>
                        <input type="number" name="phone" id="phone" class="regular-text" value="" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="address"><?php _e('Address', 'dev-academy'); ?></label>
                    </th>
                    <td>
                        <textarea name="address" id="address" class="regular-text" required></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <?php wp_nonce_field('new-address'); ?>
        <?php submit_button(__('Add Address', 'dev-academy'), 'primary', 'submit_address'); ?>
    </form>
</div>