<?php 
function register_cpt_agent() {
$labels = array(
        'name' => _x( 'Agent', 'agent' ),
        'singular_name' => _x( 'Agent', 'agent' ),
        'add_new' => _x( 'Add New', 'agent' ),
        'add_new_item' => _x( 'Add New Agent', 'agent' ),
        'edit_item' => _x( 'Edit Agent', 'agent' ),
        'new_item' => _x( 'New Agent', 'agent' ),
        'view_item' => _x( 'View Agent', 'agent' ),
        'search_items' => _x( 'Search Agent', 'agent' ),
        'not_found' => _x( 'No Agent found', 'agent' ),
        'not_found_in_trash' => _x( 'No Agent found in Trash', 'agent' ),
        'parent_item_colon' => _x( 'Agent:', 'agent' ),
        'menu_name' => _x( 'Agents', 'agent' ),
);
$args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Agents',
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'genres' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-universal-access-alt',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
);
register_post_type( 'agent', $args );
}
// Add the agent Meta Boxes
function add_agent_metaboxes() 
{
add_meta_box('wpt_agent_details', 'Agent Details', 'wpt_agent_details', 'agent', 'normal', 'high');
}
 // The agent Details Metabox
function wpt_agent_details() {    
global $post;
	// Noncename needed to verify where the data originated
echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' . 
wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	// Get the location data if its already been entered
$name = get_post_meta($post->ID, '_name', true);
$contact=get_post_meta($post->ID, '_contact', true);
$email=get_post_meta($post->ID, '_email', true);
$office=get_post_meta($post->ID, '_office', true);
$mlsid=get_post_meta($post->ID, '_mlsid', true);
$linkdin=get_post_meta($post->ID, '_linkdin', true);
$fb=get_post_meta($post->ID, '_fb', true);	
$twitt=get_post_meta($post->ID, '_twitt', true);
$googlpls=get_post_meta($post->ID, '_googlpls', true);
$savvycrd=get_post_meta($post->ID, '_savvycrd', true);
$upldpic=get_post_meta($post->ID, '_upldpic', true);
// Echo out the field
?>
<div>
<label><b>Agent's Name</b></label>
<input type="text"  name="_name" value="<?php echo $name ?> " class="widefat" required>
</div>
<div>
</br>
<label><b>Agent's Phone No.</b></label>
	<input type="text"  name="_contact" value="<?php echo $contact ?> " class="widefat" required>
</div>
<div>
</br>
<label><b>Agent's Email Address</b></label>
	<input type="email"  name="_email" value="<?php echo $email ?> " class="widefat" required>
</div>
<div>
</br>
<label><b>Agent's Office</b></label>
<span style="display:none;"><?php the_ID(); ?></span>
</br>
<select id="_office" name="_office"  required>
<?php $parent = $post->ID; ?>
<?php
query_posts('order=ASC&post_type=office');
while (have_posts()) : the_post();
$post_title = get_the_title();
?> 
<option <?php if($office == $post_title){echo "selected='selected'"; }?>  value="<?php  the_title(); ?>"><?php the_title(); ?></option>
<?php endwhile; ?>
</select>
</div>
<div>
</br>
<label><b>MLS ID</b></label>
	<input type="text"  name="_mlsid" value="<?php echo $mlsid ?> " class="widefat">
</div>
<div>
</br>
<label><b>Linkedin Profile URL</b></label>
	<input type="text"  name="_linkdin" value="<?php echo $linkdin ?> " class="widefat">
</div>
<div>
</br>
<label><b>Facebook Profile URL</b></label>
	<input type="text"  name="_fb" value="<?php echo $fb ?> " class="widefat">
</div>
<div>
</br>
<label><b>Twitter Profile URL</b></label>
	<input type="text"  name="_twitt" value="<?php echo $twitt ?> " class="widefat">
</div>
<div>
</br>
<label><b>Google+ Profile URL</b></label>
	<input type="text"  name="_googlpls" value="<?php echo $googlpls ?> " class="widefat">
</div>
<div>
</br>
<label><b>Savvy Card Profile</b></label>
	<input type="text"  name="_savvycrd" value="<?php echo $savvycrd ?> " class="widefat">
</div>
<div>
</br>
<label><b>Upload Picture URL</b></label>
	<input type="text" id="_upldpic" name="_upldpic" value="<?php echo $upldpic ?>" class="widefat">
</div>
<?php
}
function update_edit_form() {
    echo ' enctype="multipart/form-data"';
} // end update_edit_form
add_action('post_edit_form_tag', 'update_edit_form');
//save all text fields 
function wpt_save_agent_detail_meta($post_id, $post) {
// verify this came from the our screen and with proper authorization,
// because save_post can be triggered at other times
if(isset($_POST['eventmeta_noncename'])){
if(!wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__)))
{
return $post->ID;
}
}
// Is the user allowed to edit the post or page?
if(!current_user_can( 'edit_post', $post->ID ))
return $post->ID;
// OK, we're authenticated: we need to find and save the data
// We'll put it into an array to make it easier to loop though.
$events_meta = array();
if(isset($_POST['_email'])){
	$events_meta['_name'] = $_POST['_name'];
	$events_meta['_contact'] = $_POST['_contact'];	
	$events_meta['_email'] = $_POST['_email'];
	$events_meta['_office'] = $_POST['_office'];
	$events_meta['_mlsid'] = $_POST['_mlsid'];
	$events_meta['_linkdin'] = $_POST['_linkdin'];
	$events_meta['_fb'] = $_POST['_fb'];
	$events_meta['_twitt'] = $_POST['_twitt'];
	$events_meta['_googlpls'] = $_POST['_googlpls'];
	$events_meta['_savvycrd'] = $_POST['_savvycrd'];
	$events_meta['_upldpic'] = $_POST['_upldpic'];
} // Add values of $events_meta as custom fields
if(is_array($events_meta))
{
foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
	//	if( $post->post_type == 'revision' ) return; // Don't store custom data twice
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}
}
}
add_action('save_post', 'wpt_save_agent_detail_meta', 1, 2); // save the custom fields 
add_action( 'init', 'register_cpt_agent' );
add_action( 'add_meta_boxes', 'add_agent_metaboxes');
?>
