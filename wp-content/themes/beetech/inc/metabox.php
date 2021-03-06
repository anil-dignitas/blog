<?php
/**
 * Create a metabox to added some custom filed in posts.
 *
 * @package beetech
 */

 add_action( 'add_meta_boxes', 'beetech_post_meta_options' );
 
 if( ! function_exists( 'beetech_post_meta_options' ) ):
 function  beetech_post_meta_options() {
    add_meta_box(
                'beetech_post_meta',
                esc_html__( 'Post Options', 'beetech' ),
                'beetech_post_meta_callback',
                'post', 
                'normal', 
                'high'
            );
            add_meta_box(
                'beetech_page_meta',
                esc_html__( 'Sidebar', 'beetech' ),
                'beetech_post_meta_callback',
                'page',
                'normal', 
                'high'
            ); 
 }
 endif;

 $beetech_post_sidebar_options = array(
        'left-sidebar' => array(
                        'id'		=> 'post-right-sidebar',
                        'value'     => 'left_sidebar',
                        'label'     => esc_html__( 'Left sidebar', 'beetech' ),
                        'thumbnail' => get_template_directory_uri() . '/images/left-sidebar.png'
                    ), 
        'right-sidebar' => array(
                        'id'		=> 'post-left-sidebar',
                        'value' => 'right_sidebar',
                        'label' => esc_html__( 'Right sidebar', 'beetech' ),
                        'thumbnail' => get_template_directory_uri() . '/images/right-sidebar.png'
                    ),
        'no-sidebar' => array(
                        'id'		=> 'post-no-sidebar',
                        'value'     => 'no_sidebar',
                        'label'     => esc_html__( 'No sidebar', 'beetech' ),
                        'thumbnail' => get_template_directory_uri() . '/images/no-sidebar.png'
                    ),        
        'both-sidebar' => array(
                        'id'		=> 'both-sidebar',
                        'value'     => 'both_sidebar',
                        'label'     => esc_html__( 'Both sidebar', 'beetech' ),
                        'thumbnail' => get_template_directory_uri() . '/images/both-sidebar.png'
                    )
    );

/**
 * Callback function for post option
 */
if( ! function_exists( 'beetech_post_meta_callback' ) ):
	function beetech_post_meta_callback() {
		global $post, $beetech_post_sidebar_options;
		wp_nonce_field( basename( __FILE__ ), 'beetech_post_meta_nonce' );
?>
		<table class="form-table">
<tr>
    <td colspan="4"><em class="f13"><?php _e('Choose Sidebar Template','beetech'); ?></em></td>
</tr>

<tr>
    <td>
    <?php  
       foreach ($beetech_post_sidebar_options as $beetech_post_sidebar_option) {
        
                    $beetech_post_sidebar = get_post_meta( $post->ID, 'beetech_post_sidebar_layout', true ); ?>
    
                    <div class="radio-image-wrapper" style="float:left; margin-right:30px;">
                        <label class="description">
                            <span><img src="<?php echo esc_url( $beetech_post_sidebar_option['thumbnail'] ); ?>" alt="" /></span></br>
                            <input type="radio" name="beetech_post_sidebar_layout" value="<?php echo esc_html($beetech_post_sidebar_option['value']); ?>" <?php checked( $beetech_post_sidebar_option['value'], $beetech_post_sidebar ); if(empty($beetech_post_sidebar) && $beetech_post_sidebar_option['value']=='right-sidebar'){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html($beetech_post_sidebar_option['label']); ?>
                        </label>
                    </div>
                    <?php } // end foreach 
                    ?>
                    <div class="clear"></div>
    </td>
</tr>
</table>
<?php		
	}
endif;

/*--------------------------------------------------------------------------------------------------------------*/
/**
 * Function for save value of meta opitons
 *
 * @since 1.0.0
 */
add_action( 'save_post', 'beetech_save_post_meta' );

if( ! function_exists( 'beetech_save_post_meta' ) ):

function beetech_save_post_meta( $post_id ) {

    global $post, $beetech_post_sidebar_options;

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'beetech_post_meta_nonce' ] ) || !wp_verify_nonce( wp_unslash($_POST['beetech_post_meta_nonce'] ), basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )  
        return;
        
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
    }

    /*Page sidebar*/
    foreach ( $beetech_post_sidebar_options as $field ) {  
        //Execute this saving function
        $old = get_post_meta( $post_id, 'beetech_post_sidebar_layout', true ); 
        $new = sanitize_text_field( wp_unslash( $_POST['beetech_post_sidebar_layout'] ));
        if ( $new && $new != $old ) {  
            update_post_meta ( $post_id, 'beetech_post_sidebar_layout', $new );  
        } elseif ( '' == $new && $old ) {  
            delete_post_meta( $post_id,'beetech_post_sidebar_layout', $old );  
        }
    } // end foreach
}
endif;  