<?php
/**
 * Created by PhpStorm.
 * User: chutienphuc
 * Date: 18/02/2017
 * Time: 00:48
 */

function create_video() {
    $args = array(
        'labels' => array(
            'name' => __('Video'),
            'singular_name' => __('Video'),
            'all_items' => __('All videos'),
            'add_new_item' => __('Add New video'),
            'edit_item' => __('Edit video'),
            'view_item' => __('View video')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'video'),
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'capability_type' => 'page',
        'supports' => array('title', 'editor', 'thumbnail'),
        'exclude_from_search' => true,
        'menu_position' => 80,
        'has_archive' => true,
        'menu_icon' => 'dashicons-format-status'
    );
    register_post_type('video', $args);
}
add_action( 'init', 'create_video');

function video_add_meta_box(){
    add_meta_box( 'video-details', 'video Details', 'video_meta_box_cb', 'video', 'normal', 'default');
}
function video_meta_box_cb($post){
    $values = get_post_custom( $post->ID );
    $video_url = isset( $values['video_url'] ) ? esc_attr( $values['video_url'][0] ) : "";
    wp_nonce_field( 'video_details_nonce_action', 'video_details_nonce' );
    $html = '';
    $html .= '<label>Video Url</label>';
    $html .= '<input type="text" name="video_url" id="video_url" style="margin-top:15px; margin-left:9px; margin-bottom:10px;" value="'. $video_url .'" /><br/>';
    echo $html;
}
function video_save_meta_box($post_id){
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['video_details_nonce'] ) || !wp_verify_nonce( $_POST['video_details_nonce'], 'video_details_nonce_action' ) ) return;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;

    if(isset( $_POST['video_url'] ) )
        update_post_meta( $post_id, 'video_url', $_POST['video_url']);
}
add_action( 'add_meta_boxes', 'video_add_meta_box' );
add_action( 'save_post', 'video_save_meta_box' );