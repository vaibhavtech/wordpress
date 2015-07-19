<?php 
function register_cpt_office(){
$labels = array(
        'name' => _x( 'Office', 'office' ),
        'singular_name' => _x( 'Office', 'office' ),
        'add_new' => _x( 'Add New', 'office' ),
        'add_new_item' => _x( 'Add New Office', 'office' ),
        'edit_item' => _x( 'Edit Office', 'office' ),
        'new_item' => _x( 'New Office', 'office' ),
        'view_item' => _x( 'View Office', 'office' ),
        'search_items' => _x( 'Search Office', 'office' ),
        'not_found' => _x( 'No office found', 'office' ),
        'not_found_in_trash' => _x( 'No Office found in Trash', 'office' ),
        'parent_item_colon' => _x( 'Office:', 'office' ),
        'menu_name' => _x( 'Offices', 'office' ),
    );
$args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Office ',
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'genres' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-exerpt-view',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
register_post_type( 'office', $args );
}
// Add the office address Meta Boxes
function add_office_metaboxes() {
add_meta_box('wpt_office_address', 'Office Details', 'wpt_office_address', 'office', 'normal', 'high');
}
// Add the office phone number Meta Boxes
// The office Address Metabox
function wpt_office_address() {    
global $post;
	// Noncename needed to verify where the data originated
echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' . 
wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	// Get the location data if its already been entered
$location = get_post_meta($post->ID, '_location', true);
$offc_city = get_post_meta($post->ID, 'offc_city', true);
$offc_state = get_post_meta($post->ID, 'offc_state', true);
$offc_contry = get_post_meta($post->ID, 'offc_contry', true);
$phn = get_post_meta($post->ID, '_phn', true);
$fax = get_post_meta($post->ID, '_fax', true);
$gnemail = get_post_meta($post->ID, '_genemail', true);
$alogo = get_post_meta($post->ID, '_alogo', true);
// Echo out the field
?>
<div>
<label><b>Office Address</b></label>
<textarea  name="_location" value="<?php $location ?>" class="widefat" required> <?php echo $location?></textarea>
</div>
<div>
</br>
<label><b>City</b></label>
	<input type="text"  name="offc_city" value="<?php echo $offc_city ?> " class="widefat" required>
</div>
<div>
</br>
<label><b>State</b></label>
	<input type="text"  name="offc_state" value="<?php echo $offc_state ?> " class="widefat">
</div>
<div>
</br>
<label><b>Countery</b></label>
	<input type="text"  name="offc_contry" value="<?php echo $offc_contry ?> " class="widefat" required>
</div>
<div>
</br>
<label><b>Office Phone No.</b></label>
	<input type="text"  name="_phn" value="<?php echo $phn ?> " class="widefat" required>
</div>
<div>
</br>
<label><b>Office FAX No.</b></label>
	<input type="text"  name="_fax" value="<?php echo $fax ?> " class="widefat">
</div>
<div>
</br>
<label><b>Office Email Address</b></label>
	<input type="email"  name="_genemail" value="<?php echo $gnemail ?> " class="widefat" required>
</div>
<div>
</br>
<label><b>Agent Logo URL</b></label>
	<input type="text"  name="_alogo" value="<?php echo $alogo?>" class="widefat">
</div>
<?php
}
// Save the Metabox Address
function wpt_save_office_address_meta($post_id, $post) {
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
if(isset($_POST['eventmeta_noncename'])){
if( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) ) )
{
return $post->ID;
}
}
	// Is the user allowed to edit the post or page?
if ( !current_user_can( 'edit_post', $post->ID ))
return $post->ID;
	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.
$events_meta = array();
if(isset($_POST['_genemail'])){
$events_meta['_location'] = $_POST['_location'];
$events_meta['offc_city'] = $_POST['offc_city'];
$events_meta['offc_state'] = $_POST['offc_state'];
$events_meta['offc_contry'] = $_POST['offc_contry'];
$events_meta['_phn'] = $_POST['_phn'];
$events_meta['_fax'] = $_POST['_fax'];
$events_meta['_genemail'] = $_POST['_genemail'];
$events_meta['_alogo'] = $_POST['_alogo'];
}
// Add values of $events_meta as custom fields
if(is_array($events_meta))
{
foreach($events_meta as $key => $value) { // Cycle through the $events_meta array!
	//if( $post->post_type == 'revision' ) return; // Don't store custom data twice
$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
update_post_meta($post->ID, $key, $value);
}
else
{ // If the custom field doesn't have a value
add_post_meta($post->ID, $key, $value);
}
}
if(isset($value)) {
if(!$value)delete_post_meta($post->ID, $key); // Delete if blank
}
}
}
add_action('save_post', 'wpt_save_office_address_meta', 1, 2); // save the custom fields 
//add_action('save_post', 'wpt_save_office_phone_meta', 1, 2); // save the custom fields 
add_action( 'init', 'register_cpt_office' );
add_action( 'add_meta_boxes', 'add_office_metaboxes' );
?>
