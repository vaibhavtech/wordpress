<?php 
add_action('admin_menu','SavvyIDX_setup_menu');
function SavvyIDX_setup_menu()
{
add_menu_page('SavvyIDX Plugin Page', 'SavvyIDX Plugin', 'manage_options', 'SavvyIDX_Plugin', 'SavvyIDX_Plugin','',72); 
add_submenu_page('SavvyIDX_Plugin', 'Mortgage Calculator', 'Mortgage Calculator', 'manage_options', 'mortgage_calculator', 'mortgage_calc');
}
add_action( 'admin_init', 'SavvyIDX_init' );
//add_action( 'admin_init', 'mortgage_plugin');
function mortgage_calc()
{
if (isset($_POST['down_payment'])) {
        update_option('down_payment', $_POST['down_payment']);
         update_option('term_year', $_POST['term_year']);
          update_option('interest_rate', $_POST['interest_rate']);
          
        $value1 = $_POST['down_payment'];
         $value2 = $_POST['term_year'];
          $value3 = $_POST['interest_rate'];
    } 

    $value1 = get_option('down_payment','20%');
    $value2 = get_option('term_year','30');
    $value3 = get_option('interest_rate','5%');
    
    include 'mortgage_calc.php';
}
function SavvyIDX_init()
{
register_setting('SavvyIDX-plugin-settings-group', 'api_key');
register_setting('SavvyIDX-plugin-settings-group', 'map_key');	
}
function SavvyIDX_Plugin()
{
?>
<div class="wrap">
<h2>SavvyIDX Plugin</h2>
<form method="post" action="options.php">
<?php settings_fields('SavvyIDX-plugin-settings-group'); ?>
<?php do_settings_sections('SavvyIDX-plugin-settings-group'); ?>
<table class="form-table">
<tr valign="top">
<th scope="row">Enter API Key</th>
<td><input type="text" name="api_key" value="<?php echo get_option( 'api_key' ); ?>" /></td>
</tr>
<tr valign="top">
<th scope="row">Enter Google Map Key</th>
<td><input type="text" name="map_key" value="<?php echo get_option( 'map_key' ); ?>" /></td>
</tr>
</table>
<?php submit_button();?>
</form>
</div>
<?php } ?>
