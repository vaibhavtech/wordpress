<div>
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
