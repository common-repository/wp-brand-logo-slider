<?php
function register_wpbls_page() {
	add_submenu_page( 
	'edit.php?post_type=brand', 
	'Brand Settings', 
	'Brand Settings', 
	'manage_options', 
	'wp-brand-slider', 
	'wpbls_admin_settings' ); 
}
add_action('admin_menu', 'register_wpbls_page');

function wpbls_admin_settings() {
	
	echo '<div class="wpbls_warp">';
		echo '<h1>Brand Slider Configuration</h1>';
?>

<div id="wpbls_left">
  <form method="post" action="options.php">
    <?php wp_nonce_field('update-options'); ?>
    <div class="inside">
      <h3><?php echo esc_attr(__('Set your desired brand options')); ?></h3>
      <table class="form-table">
        <tr>
          <th><label for="wpbls_order"><?php echo esc_attr(__('Display Order')); ?></label></th>
          <td><select name="wpbls_order" id="wpbls_order">
              <option value="DESC" <?php if( get_option('wpbls_order') == 'DESC'){ echo 'selected="selected"'; } ?>>Descending</option>
              <option value="ASC" <?php if( get_option('wpbls_order') == 'ASC'){ echo 'selected="selected"'; } ?>>Ascending</option>
            </select></td>
        </tr>
        <tr>
          <th><label for="wpbls_border"><?php echo esc_attr(__('Area Border')); ?></label></th>
          <td><input type="text" name="wpbls_border" value="<?php $wpbls_border = get_option('wpbls_border'); if(!empty($wpbls_border)) {echo $wpbls_border;} else {echo "1";}?>">
            px;</td>
        </tr>
        <tr>
          <th><label for="wpbls_border_radius"><?php echo esc_attr(__('Border Radius')); ?></label></th>
          <td><input type="text" name="wpbls_border_radius" value="<?php $wpbls_border_radius = get_option('wpbls_border_radius'); if(!empty($wpbls_border_radius)) {echo $wpbls_border_radius;} else {echo "5";}?>">
            px;</td>
        </tr>
        <tr>
          <th><label for="wpbls_border_color"><?php echo esc_attr(__('Border Color')); ?><span>*</span></label></th>
          <td><input type="text" name="wpbls_border_color" id="scrollbar_color" value="<?php $wpbls_border_color = get_option('wpbls_border_color'); if(!empty($wpbls_border_color)) {echo $wpbls_border_color;} else {echo "#ccc";}?>" class="color-picker wpbls_border_color" /></td>
        </tr>
        <tr>
          <th><label for="wpbls_bg_color"><?php echo esc_attr(__('Background Color')); ?><span>*</span></label></th>
          <td><input type="text" name="wpbls_bg_color" id="scrollbar_color" value="<?php $wpbls_bg_color = get_option('wpbls_bg_color'); if(!empty($wpbls_bg_color)) {echo $wpbls_bg_color;} else {echo "#2d81c8";}?>" class="color-picker wpbls_bg_color" /></td>
        </tr>
        <tr>
          <th><label for="wpbls_auto_play"><?php echo esc_attr(__('Auto Play')); ?></label></th>
          <td><select name="wpbls_auto_play" id="wpbls_auto_play">
              <option value="true" <?php if( get_option('wpbls_auto_play') == 'true'){ echo 'selected="selected"'; } ?>>On</option>
              <option value="false" <?php if( get_option('wpbls_auto_play') == 'false'){ echo 'selected="selected"'; } ?>>Off</option>
            </select></td>
        </tr>
        <tr>
          <th><label for="wpbls_visible_items"><?php echo esc_attr(__('Display/Visible Items')); ?></label></th>
          <td><select name="wpbls_visible_items" id="wpbls_visible_items">
              <option value="1" <?php if( get_option('wpbls_visible_items') == '1'){ echo 'selected="selected"'; } ?>>1</option>
              <option value="2" <?php if( get_option('wpbls_visible_items') == '2'){ echo 'selected="selected"'; } ?>>2</option>
              <option value="3" <?php if( get_option('wpbls_visible_items') == '3'){ echo 'selected="selected"'; } ?>>3</option>
              <option value="4" <?php if( get_option('wpbls_visible_items') == '4'){ echo 'selected="selected"'; } ?>>4</option>
              <option value="5" <?php if( get_option('wpbls_visible_items') == '5'){ echo 'selected="selected"'; } ?>>5</option>
              <option value="6" <?php if( get_option('wpbls_visible_items') == '6'){ echo 'selected="selected"'; } ?>>6</option>
              <option value="7" <?php if( get_option('wpbls_visible_items') == '7'){ echo 'selected="selected"'; } ?>>7</option>
              <option value="8" <?php if( get_option('wpbls_visible_items') == '8'){ echo 'selected="selected"'; } ?>>8</option>
              <option value="9" <?php if( get_option('wpbls_visible_items') == '9'){ echo 'selected="selected"'; } ?>>9</option>
              <option value="10" <?php if( get_option('wpbls_visible_items') == '10'){ echo 'selected="selected"'; } ?>>10</option>
            </select></td>
        </tr>
        <tr>
          <th><label for="wpbls_item_scrol"><?php echo esc_attr(__('Items Scroll')); ?></label></th>
          <td><select name="wpbls_item_scrol" id="wpbls_item_scrol">
              <option value="1" <?php if( get_option('wpbls_item_scrol') == '1'){ echo 'selected="selected"'; } ?>>1</option>
              <option value="2" <?php if( get_option('wpbls_item_scrol') == '2'){ echo 'selected="selected"'; } ?>>2</option>
              <option value="3" <?php if( get_option('wpbls_item_scrol') == '3'){ echo 'selected="selected"'; } ?>>3</option>
              <option value="4" <?php if( get_option('wpbls_item_scrol') == '4'){ echo 'selected="selected"'; } ?>>4</option>
              <option value="5" <?php if( get_option('wpbls_item_scrol') == '5'){ echo 'selected="selected"'; } ?>>5</option>
            </select></td>
        </tr>
        <tr>
          <th><label for="wpbls_puse_hover"><?php echo esc_attr(__('Pause on Hover')); ?></label></th>
          <td><select name="wpbls_puse_hover" id="wpbls_puse_hover">
              <option value="true" <?php if( get_option('wpbls_puse_hover') == 'true'){ echo 'selected="selected"'; } ?>>Yes</option>
              <option value="false" <?php if( get_option('wpbls_puse_hover') == 'false'){ echo 'selected="selected"'; } ?>>No</option>
            </select></td>
        </tr>
      </table>
      <input type="hidden" name="action" value="update" />
      <input type="hidden" name="page_options" value="wpbls_order, wpbls_border, wpbls_border_radius, wpbls_border_color, wpbls_gradient_bg, wpbls_bg_color, wpbls_auto_play, wpbls_visible_items, wpbls_item_scrol, wpbls_puse_hover" />
      <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" class="button button-primary" />
      </p>
    </div>
  </form>
</div>
<div id="wpbls_right">
  <div class="wpbls_widget">
    <h3>
      <?php _e('Donate and support the development.','nht') ?>
    </h3>
    <p>
      <?php _e('With your help I can make simple fields even better! $5, $10, $20 – any amount is fine! <a href="https://www.paypal.me/csehasib/10">Donate Now</a>','nht') ?>
    </p>
  </div>
  <div class="wpbls_widget">
    <h3><?php echo esc_attr(__('About the Plugin')); ?></h3>
    <p>Just copy and paste <strong>if(function_exists('wpbls_brand_loop_slider')){wpbls_brand_loop();}</strong> in template code or  <strong>[WPBLS-SLIDER]</strong> in the post/page" where you want to display brand logo or client logo.</p>
    <p>You can make my day by submitting a positive review on <a href="https://wordpress.org/plugins/wp-brand-logo-slider/#reviews" target="_blank"><strong>WordPress.org!</strong> <img src="<?php plugins_url( 'img/review.png', __FILE__ ); ?>" alt="review" class="review"/></a></p>
    <p><strong>View live demo & support of <a href="http://www.e2soft.com/blog/wp-brand-logo-slider/" target="_blank">WP Brand Logo Slider.</a><br></strong><br><iframe width="560" height="315" src="https://www.youtube.com/embed/zKviSYb4_SQ" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></p>
    <div class="clrFix"></div>
  </div>
  <div class="wpbls_widget">
    <div class="clrFix"></div>
    <h3>About the Author</h3>
    <p>My name is <strong>Hasibul Islam Badsha</strong> and I am a <strong>Web Developer, Expert WordPress Developer</strong>. I am regularly available for interesting freelance projects. If you ever need my help, do not hesitate to get in touch me.<br />
      <strong>Skype:</strong> cse.hasib<br />
      <strong>Email:</strong> cse.hasib@gmail.com<br />
    <div class="clrFix"></div>
  </div>
</div>
<div class="clrFix"></div>
<?php		
	echo '</div>';
}