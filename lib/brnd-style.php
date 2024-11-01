<?php function wpbls_dynamicCSS()
{ ?>
<style type="text/css">
.nbs-flexisel-inner {
    background:#fcfcfc;
    border:<?php $wpbls_border = get_option('wpbls_border'); if(!empty($wpbls_border)) {echo $wpbls_border;} else {echo "1";}?>px solid <?php $wpbls_border_color = get_option('wpbls_border_color'); if(!empty($wpbls_border_color)) {echo $wpbls_border_color;} else {echo "#ccc";}?>;
    border-radius:<?php $wpbls_border_radius = get_option('wpbls_border_radius'); if(!empty($wpbls_border_radius)) {echo $wpbls_border_radius;} else {echo "5";}?>px;
    -moz-border-radius:<?php $wpbls_border_radius = get_option('wpbls_border_radius'); if(!empty($wpbls_border_radius)) {echo $wpbls_border_radius;} else {echo "5";}?>px;
    -webkit-border-radius:<?php $wpbls_border_radius = get_option('wpbls_border_radius'); if(!empty($wpbls_border_radius)) {echo $wpbls_border_radius;} else {echo "5";}?>px;
}

</style>
<?php 
}
add_action('wp_footer','wpbls_dynamicCSS', 100);
?>