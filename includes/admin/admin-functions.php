<?php
// create custom plugin settings menu
add_action('admin_menu', 'tlb_plugin_create_menu');
function tlb_plugin_create_menu() {
	add_submenu_page( 'options-general.php', 'Time Left To Post', 'Time Left To Post', 'administrator', 'wp_tlbm_settings_page' , 'wp_tlbm_settings_page'  );
    add_action( 'admin_init', 'register_tlb_plugin_settings' );
}
function register_tlb_plugin_settings() {
	//register our settings
    register_setting( 'tlb-plugin-settings-group', WP_TLBM_PRE_FIX.'color' );
	register_setting( 'tlb-plugin-settings-group', WP_TLBM_PRE_FIX.'color_bg' );
    register_setting( 'tlb-plugin-settings-group', WP_TLBM_PRE_FIX.'thanks_text' );
    register_setting( 'tlb-plugin-settings-group', WP_TLBM_PRE_FIX.'minutes_left_text' );
    register_setting( 'tlb-plugin-settings-group', WP_TLBM_PRE_FIX.'border_radius' );
    register_setting( 'tlb-plugin-settings-group', WP_TLBM_PRE_FIX.'text_color' );
}

function wp_tlbm_settings_page() {
?>
<div class="wrap">
    <h1><?php echo __('Time left to post options','wp_tlbm'); ?> </h1>
    <div class="welcome-panel">
        <form method="post" action="options.php">
            <?php settings_fields( 'tlb-plugin-settings-group' ); ?>
            <?php do_settings_sections( 'tlb-plugin-settings-group' ); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><?php echo __('Color #1','wp_tlbm'); ?></th>
                    <td><input class="tlb-color-picker" id="color" type="text" name="<?php echo WP_TLBM_PRE_FIX.'color'; ?>" value="<?php echo esc_attr( get_option(WP_TLBM_PRE_FIX.'color') ); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php echo __('Background Color','wp_tlbm'); ?></th>
                    <td><input class="tlb-color-picker" id="color_bg" type="text" name="<?php echo WP_TLBM_PRE_FIX.'color_bg'; ?>" value="<?php echo esc_attr( get_option(WP_TLBM_PRE_FIX.'color_bg') ); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php echo __('Title Color','wp_tlbm'); ?></th>
                    <td><input class="tlb-color-picker" id="color_bg" type="text" name="<?php echo WP_TLBM_PRE_FIX.'text_color'; ?>" value="<?php echo esc_attr( get_option(WP_TLBM_PRE_FIX.'text_color','#fff') ); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php echo __('Thanks text','wp_tlbm'); ?></th>
                    <td><input type="text" name="<?php echo WP_TLBM_PRE_FIX.'thanks_text'; ?>" value="<?php echo esc_attr( get_option(WP_TLBM_PRE_FIX.'thanks_text') ); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php echo __('Minutes left text','wp_tlbm'); ?></th>
                    <td><input type="text" name="<?php echo WP_TLBM_PRE_FIX.'minutes_left_text'; ?>" value="<?php echo esc_attr( get_option(WP_TLBM_PRE_FIX.'minutes_left_text') ); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php echo __('Border Radius','wp_tlbm'); ?></th>
                    <td>
                        <input type="text" name="<?php echo WP_TLBM_PRE_FIX.'border_radius'; ?>" value="<?php echo esc_attr( get_option(WP_TLBM_PRE_FIX.'border_radius'),45 ); ?>" />
                        <p><?php echo __('Border Radius in px. Default: 45','wp_tlbm'); ?></p>
                    </td>

                </tr>
                <tr valign="top">
                    <th scope="row"><?php echo __('Preview','wp_tlbm'); ?></th>
                    <td>
                        <?php echo get_time_left_bar_html(50); ?>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
</div>
<?php 
}
function wp_tlbm_color_picker_assets($hook_suffix) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp_tlbm_admin-js', plugins_url('js/admin.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
    $arg_script_obj = array(
                            'color' => esc_attr( get_option( WP_TLBM_PRE_FIX.'color') ),
                        );
    wp_localize_script('wp_tlbm_admin-js','tlb_data',$arg_script_obj);

    wp_enqueue_style( 'wp_tlbm_admin-css', plugins_url('css/admin.css', __FILE__ ) );

}
add_action( 'admin_enqueue_scripts', 'wp_tlbm_color_picker_assets' );