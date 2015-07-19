<html>
<script>
function save_agent_meta_data($id) {
 
    /* --- security verification --- */
    if(!wp_verify_nonce($_POST['eventmeta_noncename'], plugin_basename(__FILE__))) {
      return $id;
    } // end if
       
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return $id;
    } // end if
       
    if('page' == $_POST['post_type']) {
      if(!current_user_can('edit_page', $id)) {
        return $id;
      } // end if
    } else {
        if(!current_user_can('edit_page', $id)) {
            return $id;
        } // end if
    } // end if
    /* - end security verification - */
     
    // Make sure the file array isn't empty
    if(!empty($_FILES['wpt_agent_details']['_upldpic'])) {
         
        // Setup the array of supported file types. In this case, it's just PDF.
        $supported_types = array('application/pdf');
         
        // Get the file type of the upload
        $arr_file_type = wp_check_filetype(basename($_FILES['wpt_agent_details']['_upldpic']));
        $uploaded_type = $arr_file_type['type'];
         
        // Check if the type is supported. If not, throw an error.
        if(in_array($uploaded_type, $supported_types)) {
 
            // Use the WordPress API to upload the file
            $upload = wp_upload_bits($_FILES['wpt_agent_details']['_upldpic'], null, file_get_contents($_FILES['wpt_agent_details']['tmp_name']));
     
            if(isset($upload['error']) && $upload['error'] != 0) {
                wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
            } else {
                add_post_meta($id, 'wpt_agent_details', $upload);
                update_post_meta($id, 'wpt_agent_details', $upload);    
            } // end if/else
 
        } else {
            wp_die("The file type that you've uploaded is not a PDF.");
        } // end if/else
         
    } // end if
     
} // end save_custom_meta_data
add_action('save_post', 'save_agent_meta_data');
</script>




// use Default Upload Media box

<script>
jQuery(document).ready(function() {
	
	var formfield;
	
		jQuery('#_upldpic').click(function() {
		jQuery('html').addClass('Image');
		formfield = jQuery('#_upldpic').attr('_upldpic');
		tb_show('', 'media-upload.php?type=image&TB_iframe=true');
		return false;
	});
	
	// user inserts file into post. only run custom if user started process using the above process
	// window.send_to_editor(html) is how wp would normally handle the received data

	window.original_send_to_editor = window.send_to_editor;
	window.send_to_editor = function(html){

		if (formfield) {
			fileurl = jQuery('img',html).attr('src');
			
			jQuery('#_upldpic').val(fileurl);

			tb_remove();
			
			jQuery('html').removeClass('Image');
			
		} else {
			window.original_send_to_editor(html);
		}
	};

});
</script>
</html>




//add new admin menu page
<?php
function SavvyIDX_init(){
?>
<div class="wrap">
<h2>SavvyIDX Plugin</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'my-cool-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'my-cool-plugin-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">New Option Name</th>
        <td><input type="text" name="new_option_name" value="<?php echo esc_attr( get_option('new_option_name') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Some Other Option</th>
        <td><input type="text" name="some_other_option" value="<?php echo esc_attr( get_option('some_other_option') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Options, Etc.</th>
        <td><input type="text" name="option_etc" value="<?php echo esc_attr( get_option('option_etc') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>
