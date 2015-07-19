<?php 
function search_control(){
$labels = array(
        'name' => _x( 'Search Control', 'search_control' ),
        'singular_name' => _x( 'Search Control', 'search_control' ),
        'add_new' => _x( 'Add New', 'search_control' ),
        'add_new_item' => _x( 'Add New Search Control', 'search_control' ),
        'edit_item' => _x( 'Edit Search Control', 'search_control' ),
        'new_item' => _x( 'New Search Control', 'search_control' ),
        'view_item' => _x( 'View Search Control', 'search_control' ),
        'search_items' => _x( 'Search Search Control', 'search_control' ),
        'not_found' => _x( 'No Search Control found', 'search_control' ),
        'not_found_in_trash' => _x( 'No Search Control found in Trash', 'search_control' ),
        'parent_item_colon' => _x( 'Search Control:', 'search_control' ),
        'menu_name' => _x( 'Search Controls', 'search_control' ),
    );
$args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Search Control ',
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'genres' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 7,
        'menu_icon' => 'dashicons-hammer',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
register_post_type( 'search_control', $args );
}
// Add the office address Meta Boxes
function add_search_control_metaboxes() {
add_meta_box('wpt_search_control_set', 'Search Controls', 'wpt_search_control_set', 'search_control', 'normal', 'high');
}
// Add the office phone number Meta Boxes
// The office Address Metabox
function wpt_search_control_set() {    
global $post;
	// Noncename needed to verify where the data originated
echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' . 
wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
// Get the location data if its already been entered
$search_name = get_post_meta($post->ID, 'search_name', true);
$search_type = get_post_meta($post->ID, 'search_type', true);
$size_location = get_post_meta($post->ID, 'size_location', true);
$sc_address = get_post_meta($post->ID, 'sc_address', true);
$sc_city = get_post_meta($post->ID, 'sc_city', true);
$zip_mls = get_post_meta($post->ID, 'zip_mls', true);
$beds = get_post_meta($post->ID, 'beds', true);
$baths = get_post_meta($post->ID, 'baths', true);
$min_square = get_post_meta($post->ID, 'min_square', true);
$max_square = get_post_meta($post->ID, 'max_square', true);
$property_typ = get_post_meta($post->ID, 'property_typ', true);
$min_price = get_post_meta($post->ID, 'min_price', true);
$max_price = get_post_meta($post->ID, 'max_price', true);
$property_status = get_post_meta($post->ID, 'property_status', true);
$ad_property_style = get_post_meta($post->ID, 'ad_property_style', true);
$ad_country = get_post_meta($post->ID, 'ad_country', true);
$ad_city = get_post_meta($post->ID, 'ad_city', true);
$ad_pool = get_post_meta($post->ID, 'ad_pool', true);
$ad_waterfront = get_post_meta($post->ID, 'ad_waterfront', true);
$ad_bgcolor = get_post_meta($post->ID, 'ad_bgcolor', true);
$ad_font = get_post_meta($post->ID, 'ad_font', true);
$ad_fieldlbl = get_post_meta($post->ID, 'ad_fieldlbl', true);
$ad_other = get_post_meta($post->ID, 'ad_other', true);
// Echo out the field
?>
<div>
<label><b>Name of Search</b></label>
<input type="text"  name="search_name" value="<?php echo $search_name ?>"class="widefat" required />
</div>
<div>
</br>
<label><b>Search Type</b></label>
<select id="search_type" name="search_type"  required>
<option <?php if($search_type=="MAP") {echo "selected='selected'";}?>value="MAP" >MAP </option>
<option <?php if($search_type=="GPS") {echo "selected='selected'";}?>value="GPS" >GPS</option>
<option <?php if($search_type=="TEXT") {echo "selected='selected'";}?>value="TEXT">TEXT</option>
</select>
</div>
<div>
</br>
<label><b>Size Location</b></label>
	<input type="text"  name="size_location" value="<?php echo $size_location ?>"class="widefat">
</div>
<div>
</br>
<label><b>Address</b></label>
	<textarea  name="sc_address" value="<?php $sc_address ?>" class="widefat" required> <?php echo $sc_address ?></textarea>
</div>
<div>
</br>
<label><b>City</b></label>
	<input type="text"  name="sc_city" value="<?php echo $sc_city ?>"class="widefat">
</div>
<div>
</br>
<label><b>Zip or MLS</b></label>
	<input type="text"  name="zip_mls" value="<?php echo $zip_mls ?>"class="widefat">
</div>
<div>
</br>
<label><b>Beds &nbsp; &nbsp;</b></label>
<select id="beds" name="beds"  >
<option  <?php if($beds=="0") {echo "selected='selected'";}?>value="0">0</option>
<option <?php if($beds=="1+") {echo "selected='selected'";}?>value="1+">1+</option>
<option <?php if($beds=="2+") {echo "selected='selected'";}?>value="2+">2+</option>
<option <?php if($beds=="3+") {echo "selected='selected'";}?>value="3+">3+</option>
<option <?php if($beds=="4+") {echo "selected='selected'";}?>value="4+">4+</option>
</select>
</div>
<div>
</br>
<label><b>Baths &nbsp;</b></label>
<select id="baths" name="baths">
<option <?php if($baths=="0") {echo "selected='selected'";}?>value="0">0</option>
<option <?php if($baths=="1+") {echo "selected='selected'";}?>value="1+">1+</option>
<option <?php if($baths=="2+") {echo "selected='selected'";}?>value="2+">2+</option>
<option <?php if($baths=="3+") {echo "selected='selected'";}?>value="3+">3+</option>
<option <?php if($baths=="4+") {echo "selected='selected'";}?>value="4+">4+</option>
</select>
</div>
<div>
</br>
<label><b>Min Square Footage</b></label>
	<input type="text"  name="min_square" value="<?php echo $min_square?>"class="widefat">
</div>
<div>
</br>
<label><b>Max Square Footage</b></label>
	<input type="text"  name="max_square" value="<?php echo $max_square?>"class="widefat">
</div>
<div>
</br>
<label><b>Property Type &nbsp;</b></label>
<select id="property_typ" name="property_typ"  required>
<option <?php if($property_typ=="Residential/Rental") {echo "selected='selected'";}?>value="Residential/Rental">Residential/Rental</option>
<option <?php if($property_typ=="Residential") {echo "selected='selected'";}?>value="Residential">Residential</option>
<option <?php if($property_typ=="Rental") {echo "selected='selected'";}?>value="Rental">Rental</option>
<option <?php if($property_typ=="Commercial") {echo "selected='selected'";}?>value="Commercial">Commercial</option>
<option <?php if($property_typ=="Income") {echo "selected='selected'";}?>value="Income">Income</option>
<option <?php if($property_typ=="Vacant Land") {echo "selected='selected'";}?>value="Vacant Land">Vacant Land</option>
</select>
</div>
<div>
</br>
<label><b>Min Price</b></label>
	<input type="text"  name="min_price" value="<?php echo $min_price?>"class="widefat" required>
</div>
<div>
</br>
<label><b>Max Price</b></label>
	<input type="text" name="max_price" value="<?php echo $max_price?>"class="widefat" required>
</div>
<div>
</br>
<label><b>Property Status</b></label>
<select id="property_status" name="property_status"  required>
<option <?php if($property_status=="Available") {echo "selected='selected'";}?>value="Available" >Available</option>
<option <?php if($property_status=="Sold") {echo "selected='selected'";}?>value="Sold">Sold</option>
</select>
</div>
<div>
</br>
<label><b>Show Advance</b></label>
<input type="checkbox" id="show_advance" name="show_advance" value="First">
</div>
<div id="sa_fields" name="sa_fields">
<div>
</br>
<label><b>Property Style</b></label>
	<select id="ad_property_style" name="ad_property_style"  required>
<option <?php if($ad_property_style=="1/2 Duplex") {echo "selected='selected'";}?>value="1/2 Duplex" >1/2 Duplex</option>
<option <?php if($ad_property_style=="Condo") {echo "selected='selected'";}?>value="Condo">Condo</option>
<option <?php if($ad_property_style=="Manufactured/Mobile House") {echo "selected='selected'";}?>value="Manufactured/Mobile House">Manufactured/Mobile House</option>
<option <?php if($ad_property_style=="Modular") {echo "selected='selected'";}?>value="Modular">Modular</option>
<option <?php if($ad_property_style=="Single Family House") {echo "selected='selected'";}?>value="Single Family House">Single Family House</option>
<option <?php if($ad_property_style=="Townhouse") {echo "selected='selected'";}?>value="Townhouse">Townhouse</option>
<option <?php if($ad_property_style=="Villa") {echo "selected='selected'";}?>value="Villa">Villa</option>
</select>
</div>
<div>
</br>
<label><b>Country</b></label>
	<input type="text" name="ad_country" value="<?php echo $ad_country?>"class="widefat">
</div>
<div>
</br>
<label><b>City</b></label>
	<input type="text" name="ad_city" value="<?php echo $ad_city?>"class="widefat">
</div>
<div>
</br>
<label><b>Pool</b></label>
	<input type="text" name="ad_pool" value="<?php echo $ad_pool?>"class="widefat">
</div>
<div>
</br>
<label><b>Waterfront</b></label>
<select id="ad_waterfront" name="ad_waterfront" >
<option <?php if($ad_waterfront=="Yes") {echo "selected='selected'";}?>value="Yes">Yes</option>
<option <?php if($ad_waterfront=="No") {echo "selected='selected'";}?>value="No">No</option>
</select>
</div>
</br>
<label><b>Design Option</b></label>
<div>
</br>
<label><b>Background</b></label>
<script type="text/javascript" <?php echo '<img src="' . plugins_url( 'js/jscolor.js', __FILE__ ) . '" > ';?></script>
<input class="color" name="ad_bgcolor" value="<?php if($ad_bgcolor != "66ff00"){echo $ad_bgcolor;} else { echo "66ff00";} ?>">
</div>
<div>
</br>
<label><b>Font</b></label>
<select id="ad_font" name="ad_font">
<option <?php if($ad_font=="verdana") {echo "selected='selected'";}?>value="verdana">Verdana</option>
<option <?php if($ad_font=="Courier") {echo "selected='selected'";}?>value="Courier">Courier</option>
<option <?php if($ad_font=="Times New Roman") {echo "selected='selected'";}?>value="Times New Roman">Times New Roman</option>
<option <?php if($ad_font=="Comic Sans MS") {echo "selected='selected'";}?>value="Comic Sans MS">Comic Sans MS</option>
<option <?php if($ad_font=="WildWest") {echo "selected='selected'";}?>value="WildWest">WildWest</option>
<option <?php if($ad_font=="Bedrock") {echo "selected='selected'";}?>value="Bedrock">Bedrock</option>
</select>
</div>
<div>
</br>
<label><b>Field Labels</b></label>
	<input type="text" name="ad_fieldlbl" value="<?php echo $ad_fieldlbl?>"class="widefat">
</div>
<div>
</br>
<label><b>Others ?</b></label>
	<input type="text" name="ad_other" value="<?php echo $ad_other?>"class="widefat">
</div>
</div>
<script>    
jQuery(document).ready(function() {
//Uncheck the CheckBox initially
jQuery('#show_advance').removeAttr('checked');
// Initially, Hide the SSN textbox when Web Form is loaded
jQuery('#sa_fields').hide();
jQuery('#show_advance').change(function () {
if (this.checked) {
jQuery('#sa_fields').show();
}
else {
jQuery('#sa_fields').hide();
}
});
});
</script>
<?php
}
// Save the Metabox Address
function wpt_save_search_control_meta($post_id, $post) {
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
if(isset($_POST['search_name'])){
$events_meta['search_name'] = $_POST['search_name'];
$events_meta['search_type'] = $_POST['search_type'];
$events_meta['size_location'] = $_POST['size_location'];
$events_meta['sc_address'] = $_POST['sc_address'];
$events_meta['sc_city'] = $_POST['sc_city'];
$events_meta['zip_mls'] = $_POST['zip_mls'];
$events_meta['beds'] = $_POST['beds'];
$events_meta['baths'] = $_POST['baths'];
$events_meta['min_square'] = $_POST['min_square'];
$events_meta['max_square'] = $_POST['max_square'];
$events_meta['property_typ'] = $_POST['property_typ'];
$events_meta['min_price'] = $_POST['min_price'];
$events_meta['max_price'] = $_POST['max_price'];
$events_meta['property_status'] = $_POST['property_status'];
$events_meta['ad_property_style'] = $_POST['ad_property_style'];
$events_meta['ad_country'] = $_POST['ad_country'];
$events_meta['ad_city'] = $_POST['ad_city'];
$events_meta['ad_pool'] = $_POST['ad_pool'];
$events_meta['ad_waterfront'] = $_POST['ad_waterfront'];
$events_meta['ad_bgcolor'] = $_POST['ad_bgcolor'];
$events_meta['ad_font'] = $_POST['ad_font'];
$events_meta['ad_fieldlbl'] = $_POST['ad_fieldlbl'];
$events_meta['ad_other'] = $_POST['ad_other'];
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
add_action('save_post', 'wpt_save_search_control_meta', 1, 2); // save the custom fields 
add_action( 'init', 'search_control' );
add_action( 'add_meta_boxes', 'add_search_control_metaboxes' );
?>
