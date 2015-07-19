<html>
<link rel="stylesheet" type="text/css" href="plugins_url( 'style/style.css', __FILE__ )">
<div >
<h2>Property Details </h2>
<form method="post">
<table width="50%" >
<th>Select Action</th>
<tr >
<td >E-mail Listing</td>
<td ><input type="checkbox" id="email_listing" name="email_listing" value= "active" <?php if($email_listing1 == 'active'){echo 'checked';} ?> /></td>
</tr>
<tr >
<td >Request Info</td>
<td><input type="checkbox" id="rqst_info" name="rqst_info" value= "active" <?php if($rqst_info1 == 'active'){echo 'checked';} ?> /></td>
</tr>
<tr>
<td>Notify Me</td>
<td><input type="checkbox" id="notify_me" name="notify_me" value= "active" <?php if($notify_me1 == 'active'){echo 'checked';} ?> /></td>
</tr>
<tr>
<td>Add To Favorite</td>
<td><input type="checkbox" id="add_fvrt" name="add_fvrt" value= "active" <?php if($add_fvrt1 == 'active'){echo 'checked';} ?> /></td>
</tr>
<tr>
<td>Share By Social Media</td>
<td><input type="checkbox" id="share_social" name="share_social" value= "active" <?php if($share_social1 == 'active'){echo 'checked';} ?> /></td>
</tr>
<tr >
<td>Print Brouuchre</td>
<td><input type="checkbox" id="prnt_brocher" name="prnt_brocher" value= "active" <?php if($prnt_brocher1 == 'active'){echo 'checked';} ?> /></td>
</tr>
<th>Select Content</th>
<tr>
<td >Contact Us</td>
<td><input type="checkbox" id="contact" name="contact" value= "active" <?php if($contact1 == 'active'){echo 'checked';} ?> /></td>
</tr>
<tr>
<td>Additional Info</td>
<td><input type="checkbox" id="additional_info" name="additional_info" value= "active" <?php if($additional_info1 == 'active'){echo 'checked';} ?> /></td>
</tr>
<tr >
<td >Mortgage Calculator</td>
<td><input type="checkbox" id="mortagege_calc" name="mortagege_calc" value= "active" <?php if($mortagege_calc1 == 'active'){echo 'checked';} ?> /></td>
</tr>
<tr >
<td>MAP</td>
<td><input type="checkbox" id="contnt_map" name="contnt_map" value= "active" <?php if($contnt_map1 == 'active'){echo 'checked';} ?> /></td>
</tr>
<tr >
<td >Flood Map</td>
<td><input type="checkbox" id="flood_map" name="flood_map" value= "active" <?php if($flood_map1 == 'active'){echo 'checked';} ?> /></td>
</tr>
<tr >
<td>Neighbrhood Info</td>
<td><input type="checkbox" id="neighbr_hood" name="neighbr_hood" value= "active" <?php if($neighbr_hood1 == 'active'){echo 'checked';} ?> /></td>
</tr>
<tr >
<td>Street View</td>
<td><input type="checkbox" id="street_view" name="street_view" value= "active" <?php if($street_view1 == 'active'){echo 'checked';} ?> /></td>
</tr>
<tr >
<td>School Data</td>
<td><input type="checkbox" id="school_data" name="school_data" value= "active" <?php if($school_data1 == 'active'){echo 'checked';} ?> /></td>
</tr>
</table>
<?php submit_button();?>
</form>
</div>
</html>
