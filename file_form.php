<div class="wrap1">
<h2>Mortgage Calculator</h2>
<form method="post" action="options.php">
<?php settings_fields('SavvyIDX_mortgage_calc_group'); ?>
<?php do_settings_sections('SavvyIDX_mortgage_calc_group'); ?>
<table class="form-mc">
<tr valign="top">
<th scope="row">Enter Down Payment %</th>
<td><input type="text" name="down_payment" value="<?php if(get_option( "down_payment" ) =='') {echo '20%';}else { echo get_option( 'down_payment' );} ?>" /></td>
</tr>
<tr valign="top">
<th scope="row">Enter Term Year</th>
<td><input type="text" name="term_yeay" value="<?php echo get_option( 'term_yeay' ); ?>" /></td>
</tr>
<tr valign="top">
<th scope="row">Enter Interest Rate %</th>
<td><input type="text" name="interest_rate"  value="<?php echo get_option( 'interest_rate' ); ?>" /></td>
</tr>
</table>
<?php submit_button();?>
</form>
</div>
