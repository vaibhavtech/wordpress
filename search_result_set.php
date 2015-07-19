<?php 
function search_result(){
$labels = array(
        'name' => _x( 'Search Result', 'search_result' ),
        'singular_name' => _x( 'Search Result', 'search_result' ),
        'add_new' => _x( 'Add New', 'search_result' ),
        'add_new_item' => _x( 'Add New Search Result', 'search_result' ),
        'edit_item' => _x( 'Edit Search Result', 'search_result' ),
        'new_item' => _x( 'New Search Result', 'search_result' ),
        'view_item' => _x( 'View Search Result', 'search_result' ),
        'search_items' => _x( 'Search Search Result', 'search_result' ),
        'not_found' => _x( 'No Search Result found', 'search_result' ),
        'not_found_in_trash' => _x( 'No Search Result found in Trash', 'search_result' ),
        'parent_item_colon' => _x( 'Search Result:', 'search_result' ),
        'menu_name' => _x( 'Search Results', 'search_result' ),
    );
$args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Search Result ',
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'genres' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 9,
        'menu_icon' => 'dashicons-screenoptions',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
register_post_type( 'search_result', $args );
}
// Add the office address Meta Boxes
function add_search_result_metaboxes() {
add_meta_box('wpt_search_result_set', 'Search Results', 'wpt_search_result_set', 'search_result', 'normal', 'high');
}
// Add the office phone number Meta Boxes
// The office Address Metabox
function wpt_search_result_set() {    
global $post;
	// Noncename needed to verify where the data originated
echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' . 
wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

$reslt_search_name = get_post_meta($post->ID, 'reslt_search_name', true);
$reslt_agent = get_post_meta($post->ID, 'reslt_agent', true);
$reslt_offc_loc = get_post_meta($post->ID, 'reslt_offc_loc', true);
$geo_area = get_post_meta($post->ID, 'geo_area', true);
$reslt_property_typ = get_post_meta($post->ID, 'reslt_property_typ', true);
$reslt_property_style = get_post_meta($post->ID, 'reslt_property_style', true);
$reslt_property_status = get_post_meta($post->ID, 'reslt_property_status', true);
$reslt_min_price = get_post_meta($post->ID, 'reslt_min_price', true);
$reslt_max_price = get_post_meta($post->ID, 'reslt_max_price', true);
$reslt_min_square = get_post_meta($post->ID, 'reslt_min_square', true);
$reslt_max_square = get_post_meta($post->ID, 'reslt_max_square', true);
$reslt_beds = get_post_meta($post->ID, 'reslt_beds', true);
$reslt_baths = get_post_meta($post->ID, 'reslt_baths', true);
$reslt_waterfront = get_post_meta($post->ID, 'reslt_waterfront', true);
$reslt_features = get_post_meta($post->ID, 'reslt_features', true);
$reslt_gallery = get_post_meta($post->ID, 'reslt_gallery', true);
$reslt_list = get_post_meta($post->ID, 'reslt_list', true);
$reslt_carousel = get_post_meta($post->ID, 'reslt_carousel', true);
$reslt_peg_width = get_post_meta($post->ID, 'reslt_peg_width', true);
$reslt_sidebar_width = get_post_meta($post->ID, 'reslt_sidebar_width', true);
$reslt_bgcolor = get_post_meta($post->ID, 'reslt_bgcolor', true);
$reslt_map = get_post_meta($post->ID, 'reslt_map', true);
$reslt_sort_order = get_post_meta($post->ID, 'reslt_sort_order', true);
$reslt_featur_list = get_post_meta($post->ID, 'reslt_featur_list', true);
?>
<div>
<label><b>Name of Search</b></label>
<input type="text"  name="reslt_search_name" value="<?php echo $reslt_search_name ?>"class="widefat" required />
</div>
<div>
</br>
<label><b>Agent/Agents</b></label>
<select id="reslt_agent" name="reslt_agent"  required>
<?php $parent = $post->ID; ?>
<?php
query_posts('order=ASC&post_type=agent');
while (have_posts()) : the_post();
$post_title = get_the_title();
?> 
<option <?php if($reslt_agent == $post_title){echo "selected='selected'"; }?>  value="<?php  the_title(); ?>"><?php the_title(); ?></option>
<?php endwhile; ?>
</select>
</div>
<div>
</br>
<label><b>Office Locations</b></label>
<select id="reslt_offc_loc" name="reslt_offc_loc">
<?php
function get_meta_values( $key = '', $type = 'post', $status = 'publish' ){
			global $wpdb;
			if( empty( $key ) )
				return;
			$r = $wpdb->get_col( $wpdb->prepare( "
				SELECT pm.meta_value FROM {$wpdb->postmeta} pm
				LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
				WHERE pm.meta_key = '%s' 
				AND p.post_status = '%s' 
				AND p.post_type = '%s'
			", $key, $status, $type ) );
			return $r;
		}
		 $city = get_meta_values( 'offc_city', 'office' );
		 //print_r($movie_ratings);
foreach($city as $citty){ ?>
<option <?php if($reslt_offc_loc == $citty){echo "selected='selected'"; }?> value="<?php echo $citty; ?>"><?php echo $citty; ?></option>
<?php }
?>
</select>
</div>
<div>
</br>
<label><b>Geographic Areas &nbsp; &nbsp;</b></label>
<select id="geo_area" name="geo_area"  >
<option <?php if($geo_area=="ZIP Codes") {echo "selected='selected'";}?>value="ZIP Codes">ZIP Codes</option>
<option <?php if($geo_area=="Countries") {echo "selected='selected'";}?>value="Countries">Countries</option>
<option <?php if($geo_area=="Cities") {echo "selected='selected'";}?>value="Cities">Cities</option>
<option <?php if($geo_area=="Neighbourhood") {echo "selected='selected'";}?>value="Neighbourhood">Neighbourhood</option>
<option <?php if($geo_area=="Map Boundaries") {echo "selected='selected'";}?>value="Map Boundaries">Map Boundaries</option>
<option <?php if($geo_area=="GPS") {echo "selected='selected'";}?>value="GPS">GPS</option>
</select>
</div>
<div>
</br>
<label><b>Property Type &nbsp;</b></label>
<select id="reslt_property_typ" name="reslt_property_typ"  required>
<option <?php if($reslt_property_typ=="Commercial") {echo "selected='selected'";}?>value="Commercial">Commercial</option>
<option <?php if($reslt_property_typ=="Income") {echo "selected='selected'";}?>value="Income">Income</option>
<option <?php if($reslt_property_typ=="Lot & Land") {echo "selected='selected'";}?>value="Lot & Land">Lot & Land</option>
<option <?php if($reslt_property_typ=="Rental") {echo "selected='selected'";}?>value="Rental">Rental</option>
<option <?php if($reslt_property_typ=="Residential") {echo "selected='selected'";}?>value="Residential">Residential</option>
<option <?php if($reslt_property_typ=="Residential Rental") {echo "selected='selected'";}?>value="Residential Rental">Residential Rental</option>
<option <?php if($reslt_property_typ=="Residential Income") {echo "selected='selected'";}?>value="Residential Income">Residential Income</option>
<option <?php if($reslt_property_typ=="Vacant Land") {echo "selected='selected'";}?>value="Vacant Land">Vacant Land</option>
</select>
</div>
<div>
</br>
<label><b>Property Style</b></label>
	<select id="reslt_property_style" name="reslt_property_style"  required>
<option <?php if($reslt_property_style=="1/2 Duplex") {echo "selected='selected'";}?>value="1/2 Duplex" >1/2 Duplex</option>
<option <?php if($reslt_property_style=="Condo") {echo "selected='selected'";}?>value="Condo">Condo</option>
<option <?php if($reslt_property_style=="Manufactured/Mobile House") {echo "selected='selected'";}?>value="Manufactured/Mobile House">Manufactured/Mobile House</option>
<option <?php if($reslt_property_style=="Modular") {echo "selected='selected'";}?>value="Modular">Modular</option>
<option <?php if($reslt_property_style=="Single Family House") {echo "selected='selected'";}?>value="Single Family House">Single Family House</option>
<option <?php if($reslt_property_style=="Townhouse") {echo "selected='selected'";}?>value="Townhouse">Townhouse</option>
<option <?php if($reslt_property_style=="Villa") {echo "selected='selected'";}?>value="Villa">Villa</option>
</select>
</div>
<div>
</br>
<label><b>Property Status</b></label>
<select id="reslt_property_status" name="reslt_property_status"  required>
<option <?php if($reslt_property_status=="All") {echo "selected='selected'";}?>value="All">All</option>
<option <?php if($reslt_property_status=="Available") {echo "selected='selected'";}?>value="Available" >Available</option>
<option <?php if($reslt_property_status=="Sold") {echo "selected='selected'";}?>value="Sold">Sold</option>
</select>
</div>
</br>
<label><b>Additional Features</b></label>
<div>
</br>
<label><b>Min Price</b></label>
	<input type="text"  name="reslt_min_price" value="<?php echo $reslt_min_price?>"class="widefat" required>
</div>
<div>
</br>
<label><b>Max Price</b></label>
	<input type="text" name="reslt_max_price" value="<?php echo $reslt_max_price?>"class="widefat" required>
</div>
<div>
</br>
<label><b>Min Square Footage</b></label>
	<input type="text"  name="reslt_min_square" value="<?php echo $reslt_min_square?>"class="widefat">
</div>
<div>
</br>
<label><b>Max Square Footage</b></label>
	<input type="text"  name="reslt_max_square" value="<?php echo $reslt_max_square?>"class="widefat">
</div>
<div>
</br>
<label><b>Number Bedrooms</b></label>
<select id="reslt_beds" name="reslt_beds"  >
<option  <?php if($reslt_beds=="0") {echo "selected='selected'";}?>value="0">0</option>
<option <?php if($reslt_beds=="1+") {echo "selected='selected'";}?>value="1+">1+</option>
<option <?php if($reslt_beds=="2+") {echo "selected='selected'";}?>value="2+">2+</option>
<option <?php if($reslt_beds=="3+") {echo "selected='selected'";}?>value="3+">3+</option>
<option <?php if($reslt_beds=="4+") {echo "selected='selected'";}?>value="4+">4+</option>
</select>
</div>
<div>
</br>
<label><b>Number Bathrooms</b></label>
<select id="reslt_baths" name="reslt_baths">
<option <?php if($reslt_baths=="0") {echo "selected='selected'";}?>value="0">0</option>
<option <?php if($reslt_baths=="1+") {echo "selected='selected'";}?>value="1+">1+</option>
<option <?php if($reslt_baths=="2+") {echo "selected='selected'";}?>value="2+">2+</option>
<option <?php if($reslt_baths=="3+") {echo "selected='selected'";}?>value="3+">3+</option>
<option <?php if($reslt_baths=="4+") {echo "selected='selected'";}?>value="4+">4+</option>
</select>
</div>
<div>
</br>
<label><b>Waterfront</b></label>
<select id="reslt_waterfront" name="reslt_waterfront" >
<option <?php if($reslt_waterfront=="Yes") {echo "selected='selected'";}?>value="Yes">Yes</option>
<option <?php if($reslt_waterfront=="No") {echo "selected='selected'";}?>value="No">No</option>
</select>
</div>
<div>
</br>
<label><b>Features</b></label>
<select id="reslt_features" name="reslt_features" >
<option <?php if($reslt_features=="Single Story") {echo "selected='selected'";}?>value="Single Story">Single Story</option>
<option <?php if($reslt_features=="Fireplace") {echo "selected='selected'";}?>value="Fireplace">Fireplace</option>
<option <?php if($reslt_features=="Basement") {echo "selected='selected'";}?>value="Basement">Basement</option>
</select>
</div>
</br>
<label><h3>Display Options</h3></label>
</br>
<label><b>Display Type</b></label>
<div>
</br>
<label><b>Gallery</b></label>
<select id="reslt_gallery" name="reslt_gallery" >
<option <?php if($reslt_gallery=="1") {echo "selected='selected'";}?>value="1">1</option>
<option <?php if($reslt_gallery=="2") {echo "selected='selected'";}?>value="2">2</option>
<option <?php if($reslt_gallery=="3") {echo "selected='selected'";}?>value="3">3</option>
<option <?php if($reslt_gallery=="4") {echo "selected='selected'";}?>value="4">4</option>
<option <?php if($reslt_gallery=="5") {echo "selected='selected'";}?>value="5">5</option>
</select><label><b>Result Per Page</b></label>
</div>
<div>
</br>
<label><b>List</b></label>
<select id="reslt_list" name="reslt_list" >
<option <?php if($reslt_list=="1") {echo "selected='selected'";}?>value="1">1</option>
<option <?php if($reslt_list=="2") {echo "selected='selected'";}?>value="2">2</option>
<option <?php if($reslt_list=="3") {echo "selected='selected'";}?>value="3">3</option>
<option <?php if($reslt_list=="4") {echo "selected='selected'";}?>value="4">4</option>
<option <?php if($reslt_list=="5") {echo "selected='selected'";}?>value="5">5</option>
</select><label><b>Result Per Page</b></label>
</div>
<div>
</br>
<label><b>Carousel</b></label>
<select id="reslt_carousel" name="reslt_carousel" >
<option <?php if($reslt_carousel=="1") {echo "selected='selected'";}?>value="1">1</option>
<option <?php if($reslt_carousel=="2") {echo "selected='selected'";}?>value="2">2</option>
<option <?php if($reslt_carousel=="3") {echo "selected='selected'";}?>value="3">3</option>
<option <?php if($reslt_carousel=="4") {echo "selected='selected'";}?>value="4">4</option>
<option <?php if($reslt_carousel=="5") {echo "selected='selected'";}?>value="5">5</option>
</select><label><b>Result Per Page</b></label>
</div>
<div>
</br>
<label><b>Page Width</b></label>
	<input type="text"  name="reslt_peg_width" value="<?php echo $reslt_peg_width ?>"class="widefat">
</div>
<div>
</br>
<label><b>Sidebar Width</b></label>
	<input type="text"  name="reslt_sidebar_width" value="<?php echo $reslt_sidebar_width ?>"class="widefat">
</div>
<div>
</br>
<label><b>Background</b></label>
<script type="text/javascript" <?php echo '<script src="' . plugins_url( 'js/jscolor.js', __FILE__ ) . '" > ';?></script>
<input class="color" name="reslt_bgcolor" value="<?php if($reslt_bgcolor != "66ff00"){echo $reslt_bgcolor;} else { echo "66ff00";} ?>">
</div>
<!-- # Visible Results (1-3?) Not Include here need to implement  -->
<div>
</br>
<label><b>Map</b></label>
	<input type="checkbox" name="reslt_map" value="active" class="widefat" <?php if($reslt_map == 'active'){echo 'checked';} ?> />
</div>
<div>
</br>
<label><b>Sort Order</b></label>
	<input type="checkbox" name="reslt_sort_order" value="active" class="widefat" <?php if($reslt_sort_order == 'active'){echo 'checked';} ?> />
</div>
<div>
</br>
<label><b>Featured Listings first</b></label>
	<input type="checkbox" name="reslt_featur_list" value="active" class="widefat" <?php if($reslt_featur_list == 'active'){echo 'checked';} ?> />
</div>
<?php
}
// Save the Metabox Address
function wpt_save_result_set_meta($post_id, $post) {
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
if(isset($_POST['reslt_search_name'])){
$events_meta['reslt_search_name'] = $_POST['reslt_search_name'];
$events_meta['reslt_agent'] = $_POST['reslt_agent'];
$events_meta['reslt_offc_loc'] = $_POST['reslt_offc_loc'];
$events_meta['geo_area'] = $_POST['geo_area'];
$events_meta['reslt_property_typ'] = $_POST['reslt_property_typ'];
$events_meta['reslt_property_style'] = $_POST['reslt_property_style'];
$events_meta['reslt_property_status'] = $_POST['reslt_property_status'];
$events_meta['reslt_min_price'] = $_POST['reslt_min_price'];
$events_meta['reslt_max_price'] = $_POST['reslt_max_price'];
$events_meta['reslt_min_square'] = $_POST['reslt_min_square'];
$events_meta['reslt_max_square'] = $_POST['reslt_max_square'];
$events_meta['reslt_beds'] = $_POST['reslt_beds'];
$events_meta['reslt_baths'] = $_POST['reslt_baths'];
$events_meta['reslt_waterfront'] = $_POST['reslt_waterfront'];
$events_meta['reslt_features'] = $_POST['reslt_features'];
$events_meta['reslt_gallery'] = $_POST['reslt_gallery'];
$events_meta['reslt_list'] = $_POST['reslt_list'];
$events_meta['reslt_carousel'] = $_POST['reslt_carousel'];
$events_meta['reslt_peg_width'] = $_POST['reslt_peg_width'];
$events_meta['reslt_sidebar_width'] = $_POST['reslt_sidebar_width'];
$events_meta['reslt_bgcolor'] = $_POST['reslt_bgcolor'];
if(isset($_POST['reslt_map'])){
$events_meta['reslt_map'] = $_POST['reslt_map'];
}else{
$events_meta['reslt_map'] = '';	
}
if(isset($_POST['reslt_sort_order'])){
$events_meta['reslt_sort_order'] = $_POST['reslt_sort_order'];
}else{
$events_meta['reslt_sort_order'] = '';	
}
if(isset($_POST['reslt_featur_list'])){
$events_meta['reslt_featur_list'] = $_POST['reslt_featur_list'];
}else{
	$events_meta['reslt_featur_list'] = '';
}
}
// Add values of $events_meta as custom fields
if(is_array($events_meta))
{
foreach($events_meta as $key => $value)
{// Cycle through the $events_meta array!
//if( $post->post_type == 'revision' ) return; // Don't store custom data twice
$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
if(get_post_meta($post->ID, $key, FALSE))
{ // If the custom field already has a value
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
add_action('save_post', 'wpt_save_result_set_meta', 1, 2); // save the custom fields 
add_action( 'init', 'search_result' );
add_action( 'add_meta_boxes', 'add_search_result_metaboxes' );
?>
