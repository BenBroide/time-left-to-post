<?php
function tlb_plugin_scripts(){
    wp_enqueue_script('wp_tlbm_progress-bar', plugins_url( 'js/progress-bar.js', __FILE__ ),array( 'jquery' ),'', true);
    wp_enqueue_script('wp_tlbm_reading-time',plugins_url( 'js/readingTime.js', __FILE__ ),array( 'jquery' ),'',true );
    $wp_tlbm_arg_data = array(
                            'color' => (get_option('color') ? esc_attr( get_option(WP_TLBM_PRE_FIX.'color') ) : '#sdsds' ),
                            'thanks_text' => (get_option('thanks_text') ? esc_attr( get_option(WP_TLBM_PRE_FIX.'thanks_text') ) : ' Thank you for reading' ),
                            'minutes_left_text' => (get_option('thanks_text') ? esc_attr( get_option(WP_TLBM_PRE_FIX.'minutes_left_text') ) : ' Minutes left')
                        );
    wp_localize_script('wp_tlbm_progress-bar','tlb_data',$wp_tlbm_arg_data);

}
add_action( 'wp_enqueue_scripts', 'tlb_plugin_scripts' );

function tlb_plugin_styles(){
    wp_enqueue_style('wp_tlbm_style_css',plugins_url( 'css/style.css', __FILE__ ));
}
add_action( 'wp_enqueue_scripts', 'tlb_plugin_styles' );
add_filter( 'the_content', 'print_time_left_bar');

function get_time_left_bar_html($precentage){
    $html = '<div class="meter wp_time_left_bar_master">
        <div id="time-left">

        </div>
        <span id="progressbar" style="width:
        '. $precentage.'%"></span>
    </div>';
    return $html;
}

function print_time_left_bar( $content ) {
    if( ! is_single()):
        return $content;
    endif;
    $content = $content . get_time_left_bar_html(1);

    return $content;
}

add_action('wp_head','wp_time_left_bar_color_variation');
add_action('admin_head','wp_time_left_bar_color_variation');
function wp_time_left_bar_color_variation(){
      ?>
    <style type="text/css">
        .wp_time_left_bar_master{
            background-color: <?php echo get_option(WP_TLBM_PRE_FIX.'color_bg'); ?>;
            -webkit-border-radius: <?php echo get_option(WP_TLBM_PRE_FIX.'border_radius'); ?>px;
            -moz-border-radius: <?php echo get_option(WP_TLBM_PRE_FIX.'border_radius'); ?>px;
            -o-border-radius: <?php echo get_option(WP_TLBM_PRE_FIX.'border_radius'); ?>px;
            -ms-border-radius: <?php echo get_option(WP_TLBM_PRE_FIX.'border_radius'); ?>px;
            border-radius: <?php echo get_option(WP_TLBM_PRE_FIX.'border_radius'); ?>px;
            color: <?php echo get_option(WP_TLBM_PRE_FIX.'text_color'); ?>;
        }
    </style>
    <?php
}
