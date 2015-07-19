<div class="wrap1">
<h2>Mortgage Calculator</h2>
<form method="post">
<?php settings_fields('SavvyIDX_mortgage_calc_group'); ?>
<?php do_settings_sections('SavvyIDX_mortgage_calc_group'); ?>
<table class="form-mc">
<tr valign="top">
<th scope="row">Enter Down Payment %</th>
<td><input type="text" id="down_payment" name="down_payment" value="<?php if($value1  =='') {echo '20%';}else { echo $value1;} ?>" /></td>
</tr>
<tr valign="top">
<th scope="row">Enter Term Year</th>
<td><input type="text" id="term_year" name="term_year" value="<?php if($value2  =='') {echo '30';}else { echo $value2;} ?>" /></td>
</tr>
<tr valign="top">
<th scope="row">Enter Interest Rate %</th>
<td><input type="text" id="interest_rate" name="interest_rate"  value="<?php if($value3  =='') {echo '05%';}else { echo $value3;} ?>" /></td>
</tr>
</table>
<?php submit_button();?>
</form>
</div>
