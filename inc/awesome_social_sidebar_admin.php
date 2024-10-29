<?php
/*---------------------------------------------------
add settings page to menu
----------------------------------------------------*/

// Getting square icons image for Admin Settings

$awesome_sq_icon = "Square Icons  <img src='" . plugin_dir_url(__FILE__) . "img/square_logo.png' /> &nbsp;  &nbsp;  &nbsp; ";

// Getting round icons image for Admin Settings

$awesome_ro_icon = "Round Icons  <img src='" . plugin_dir_url(__FILE__) . "img/round_logo.png' />";
$style_options = array(
	'square' => array(
		'value' => 'square',
		'label' => __($awesome_sq_icon, 'awesome_social')
	) ,
	'round' => array(
		'value' => 'round',
		'label' => __($awesome_ro_icon, 'awesome_social')
	)
);
$size_options = array(
	'48' => array(
		'value' => '48',
		'label' => __('Large', 'awesome_social')
	) ,
	'32' => array(
		'value' => '32',
		'label' => __('Medium', 'awesome_social')
	) ,
	'24' => array(
		'value' => '24',
		'label' => __('Small', 'awesome_social')
	)
);
$pos_options = array(
	'left' => array(
		'value' => 'left',
		'label' => __('Left', 'awesome_social')
	) ,
	'right' => array(
		'value' => 'right',
		'label' => __('Right', 'awesome_social')
	)
);

// Awesome Social  call back for Admin Settings

function awesome_social_callback()
	{
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-form');
	wp_enqueue_style('wp-color-picker');
	wp_enqueue_script('wp-color-picker');
	wp_enqueue_script('wp-color-picker-script-handle', plugins_url('wp-color-picker-script.js', __FILE__) , array(
		'wp-color-picker'
	) , false, true);
?>

<link href="<?php
	echo plugin_dir_url(__FILE__); ?>css/admin_style.css" rel="stylesheet">

<link href="<?php
	echo plugin_dir_url(__FILE__); ?>css/font-awesome.min.css" rel="stylesheet">

<?php
	settings_fields('awesome_social');
	$options = get_option('awesome_social_options');
	_e('<div class="wrap"><div id="icon-tools" class="icon32"></div>', "awesome_social");
	_e('<div class="version_awesome_top_head"><h2 class="top_header_awesome">awesome Social Sidebar</h2><div class="ver-numb">Version 4.0</div></div>', "awesome_social");
?>



		<script>




		// Activating tabs for Admin Settings


(function( $ ) {




    // Add Color Picker to all inputs that have 'color-field' class


    $(function() {

        $('.color-field').wpColorPicker();

    });



})( jQuery );

            (function( $ ) {

    $(function() {




        // Add Color Picker to all inputs that have 'color-field' class


        $( '.cpa-color-picker' ).wpColorPicker();



    });

})( jQuery );



		$j=jQuery.noConflict();



		$j(document).ready(function(){



		$j("#awesome_social_options_anim_sec").hide();



		$j("#awesome_social_options_anim_s").hide();



		$j('#awesome_social_animate').change(function() {



		if($j(this).is(":checked")) {



		$j("#awesome_social_options_anim_sec").fadeIn();



		$j("#awesome_social_options_anim_s").fadeIn();



		}



		else{



		$j("#awesome_social_options_anim_s").hide();



		$j("#awesome_social_options_anim_sec").fadeOut();



		}



		});



		$j("#awesome_settings").hide();



		$j("#tab_awsome_settings").click(function(){



		$j("#awesome_links").fadeOut();



		$j("#awesome_settings").fadeIn();



		});



		$j("#tab_awsome_links").click(function(){



		$j("#awesome_links").fadeIn();



		$j("#awesome_settings").fadeOut();



		});



		<?php

	// If animation checked, then show corresponding text box for seconds

	if ($options['animations'] == 1)
		{
?>



			   $j("#awesome_social_options_anim_sec").show();



			   $j("#awesome_social_options_anim_s").show(100);



		<?php
		}

?>







		});



		</script>



		<div class="awesome_spacer"></div>



		<div class="awesome_social_tabs">



		<a href="javascript:void(0);" id="tab_awsome_links"><span class="awesome_tabs">Links</span></a>



		<a href="javascript:void(0);"  id="tab_awsome_settings"><span class="awesome_tabs">Settings</span></a>



		</div>



		<div class="awesome_spacer"></div>



		<form method="post" action="options.php" id="awesome_social_form">



			<?php
	settings_fields('awesome_social');
	$options = get_option('awesome_social_options');
?>



			<div id="awesome_settings">



			<?php

	// Getting social icons style type i.e Round or Sqaure for Admin Settings

	global $style_options, $size_options, $pos_options;
	$awesome_social_style = "";
	if (!isset($checked)) $checked = '';
	foreach($style_options as $option)
		{
		$radio_setting = $options['style_input'];
		if ('' != $radio_setting)
			{
			if ($options['style_input'] == $option['value'])
				{
				$awesome_social_style = $options['style_input'];
				$checked = "checked=\"checked\"";
				}
			  else
				{
				$checked = '';
				}
			}

?>



											<label class="awesome_description"><input type="radio" name="awesome_social_options[style_input]" value="<?php
		esc_attr_e($option['value']);
?>" <?php
		echo $checked;
?> /> <?php
		echo $option['label'];
?></label>



											<?php
		}

?>



									<br />

<div id="other_settings">

				<h3><?php
	_e("Other Settings", "awesome_social"); ?></h3>



					<hr />



					<table>



					<tr style="height:45px;">



					<td style="width: 300px;">



		<?php // Open Links in new tab setting
	 ?>



						<input id="awesome_social_options[linksnewtab]" name="awesome_social_options[linksnewtab]" type="checkbox" value="1" <?php
	checked('1', $options['linksnewtab']);
?>  />







						<label class="awesome_description" for="awesome_social_options[linksnewtab]"><strong><?php
	_e("Open links new tab.", "awesome_social"); ?></strong></label>



						</td>



			<?php // Animation Settings
	 ?>



									<td>



									<input id="awesome_social_animate" name="awesome_social_options[animations]" type="checkbox" value="1" <?php
	checked('1', $options['animations']);
?>  />







						<label class="awesome_description" for="awesome_social_animate"><strong><?php
	_e("Animation on hover", "awesome_social"); ?> </strong></label>



			<?php // Animation time settings
	 ?>



						<input  id="awesome_social_options_anim_sec" value="<?php
	esc_attr_e($options['animate_sec']);
?>" name="awesome_social_options[animate_sec]" type="text" placeholder="Delay in Seconds" style="width:250px;" />



			<span id="awesome_social_options_anim_s"><em><?php
	_e("Animation delay in seconds. For-example 0.5", "awesome_social") ?></em></span>







						</td>



						<td style="padding-top:8px;">



						<hr />



						<select name="awesome_social_options[position]">



												<?php

	// Setting size of Social icons.

	$selected = $options['position'];
	$p = '';
	$r = '';
	foreach($pos_options as $option)
		{
		$label = $option['label'];
		if ($selected == $option['value']) // Make default first in list
		$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr($option['value']) . "'>$label</option>";
		  else $r.= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr($option['value']) . "'>$label</option>";
		}

	echo $p . $r;
?>



								</select>



								<label class="description" for="awesome_social_options[position]"><?php
	_e('<strong>Position</strong>', 'awesome_social'); ?></label>



										</td>



						</tr>



			<tr style="height:45px;">



			<td>



			<hr />



			<?php // Font Shadow settings
	 ?>



						<input id="awesome_social_options[shadow]" name="awesome_social_options[shadow]" type="checkbox" value="1" <?php
	checked('1', $options['shadow']);
?>  />











						<label class="awesome_description" for="awesome_social_options[shadow]"><strong><?php
	_e("Don't use shadow in icons.", "awesome_social"); ?></strong></label>



				</td>

	<td>



			<hr />



			<?php // Mobile settings
	 ?>



						<input id="awesome_social_options[mobile]" name="awesome_social_options[mobile]" type="checkbox" value="1" <?php
	checked('1', $options['mobile']);
?>  />











						<label class="awesome_description" for="awesome_social_options[mobile]"><strong><?php
	_e("Don't show in Mobile Version", "awesome_social"); ?></strong></label>



				</td>

				<td style="padding-top:8px;">



				<hr />



				<select name="awesome_social_options[size]">



										<?php

	// Setting size of Social icons.

	$selected = $options['size'];
	$p = '';
	$r = '';
	foreach($size_options as $option)
		{
		$label = $option['label'];
		if ($selected == $option['value']) // Make default first in list
		$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr($option['value']) . "'>$label</option>";
		  else $r.= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr($option['value']) . "'>$label</option>";
		}

	echo $p . $r;
?>



						</select>



						<label class="description" for="awesome_social_options[size]"><?php
	_e('<strong>Size</strong>', 'awesome_social'); ?></label>



								</td>

                </tr>

                        <tr>

                		<td>



			<hr />

<?php
	add_action('admin_enqueue_scripts', 'awesome_color_picker');
	function awesome_color_picker($hook)
		{
		if (is_admin())
			{

			// Add the color picker css file

			wp_enqueue_style('wp-color-picker');

			// Include our custom jQuery file with WordPress Color Picker dependency

			wp_enqueue_script('custom-script-handle', plugins_url('custom-script.js', __FILE__) , array(
				'wp-color-picker'
			) , false, true);
			}
		}

?>





						<label class="samecolor" for="awesome_social_options[colorpicker]"><strong><?php
	_e("Use custom background color for all icons.", "awesome_social"); ?></strong></label>

<input class="cpa-color-picker"  id="awesome_social_options[colorpicker]" value="<?php
	esc_attr_e($options['colorpicker']);
?>" name="awesome_social_options[colorpicker]" type="text"  />

				</td>

                            			<td>





			<?php // on hover color settings
	 ?>



						<input id="awesome_social_options[hover]" name="awesome_social_options[hover]" type="checkbox" value="1" <?php
	checked('1', $options['hover']);
?>  />











						<label class="awesome_description" for="awesome_social_options[hover]"><strong><?php
	_e("Change icon color on hover - For Custom Background", "awesome_social"); ?></strong></label>



				</td>



                        </tr>











							</table>





                </div>

									</div>



			<div id="awesome_links">



<?php // Setting links for social icons from Admin Settings
	 ?>



				<strong><?php
	_e("Enter the URL(s) for your various social profiles below. If you leave a profile URL field blank, it will not be used.", "awesome_social") ?> </strong>





				<div class="awesome_spacer"></div>



							<table id="icons">



				<tr>



					<td>



					<i class="fa fa-facebook"></i><label for="awesome_social_options[facebook]" > Facebook</label><br /><input  id="awesome_social_options[facebook]" value="<?php
	esc_attr_e($options['facebook']);
?>" name="awesome_social_options[facebook]" type="text" placeholder="Facebook URL" />



					</td>



					<td>



					<i class="fa fa-twitter"></i><label for="awesome_social_options[twitter]" > Twitter</label><br /><input  id="awesome_social_options[twitter]" value="<?php
	esc_attr_e($options['twitter']);
?>" name="awesome_social_options[twitter]" type="text" placeholder="Twitter URL" />











					</td>



					<td>



					<i class="fa fa-rss"></i><label for="awesome_social_options[rss]" > Rss</label><br /><input  id="awesome_social_options[rss]" value="<?php
	esc_attr_e($options['rss']);
?>" name="awesome_social_options[rss]" type="text" placeholder="Rss URL" />











					</td>



				</tr>



				<tr>







					<td>



						<hr />



					<i class="fa fa-linkedin"></i><label for="awesome_social_options[linkedin]" > Linkedin</label><br /><input  id="awesome_social_options[linkedin]" value="<?php
	esc_attr_e($options['linkedin']);
?>" name="awesome_social_options[linkedin]" type="text" placeholder="Linkedin URL" />











					</td>



					<td>



						<hr />



					<i class="fa fa-youtube"></i><label for="awesome_social_options[youtube]" > Youtube</label><br /><input  id="awesome_social_options[youtube]" value="<?php
	esc_attr_e($options['youtube']);
?>" name="awesome_social_options[youtube]" type="text" placeholder="Youtube URL" />



					</td>



					<td>



						<hr />



						<i class="fa fa-flickr"></i><label for="awesome_social_options[flickr]" > Flickr</label><br /><input  id="awesome_social_options[flickr]" value="<?php
	esc_attr_e($options['flickr']);
?>" name="awesome_social_options[flickr]" type="text" placeholder="Flickr URL" />











					</td>



				</tr>







					<tr>



					<td>



						<hr />



											<i class="fa fa-pinterest"></i><label for="awesome_social_options[pinterest]" > Pinterest</label><br /><input  id="awesome_social_options[pinterest]" value="<?php
	esc_attr_e($options['pinterest']);
?>" name="awesome_social_options[pinterest]" type="text" placeholder="Pinterest URL" />







						</td>



					<td>



						<hr />



												<i class="fa fa-stumbleupon"></i><label for="awesome_social_options[stumbleupon]" > Stumbleupon</label><br /><input  id="awesome_social_options[stumbleupon]" value="<?php
	esc_attr_e($options['stumbleupon']);
?>" name="awesome_social_options[stumbleupon]" type="text" placeholder="Stumbleupon URL" />











				</td>



					<td>



						<hr />







															<i class="fa fa-google-plus"></i><label for="awesome_social_options[google-plus]" > Google Plus</label><br /><input  id="awesome_social_options[google-plus]" value="<?php
	esc_attr_e($options['google-plus']);
?>" name="awesome_social_options[google-plus]" type="text" placeholder="Google Plus URL" />











					</td>



				</tr>







						<tr>



					<td>



						<hr />







					<i class="fa fa-instagram"></i><label for="awesome_social_options[instagram]" > Instagram</label><br /><input  id="awesome_social_options[instagram]" value="<?php
	esc_attr_e($options['instagram']);
?>" name="awesome_social_options[instagram]" type="text" placeholder="Instagram URL" />











					</td>



					<td>



						<hr />



							<i class="fa fa-tumblr"></i><label for="awesome_social_options[tumblr]" > Tumblr</label><br /><input  id="awesome_social_options[tumblr]" value="<?php
	esc_attr_e($options['tumblr']);
?>" name="awesome_social_options[tumblr]" type="text" placeholder="Tumblr URL" />











					</td>



					<td>



						<hr />







									<i class="fa fa-vine"></i><label for="awesome_social_options[vine]" > Vine</label><br /><input  id="awesome_social_options[vine]" value="<?php
	esc_attr_e($options['vine']);
?>" name="awesome_social_options[vine]" type="text" placeholder="Vine URL" />







				</td>



				</tr>





						<tr>



					<td>



						<hr />







					<i class="fa fa-vk"></i><label for="awesome_social_options[vk]" > VK</label><br /><input  id="awesome_social_options[vk]" value="<?php
	esc_attr_e($options['vk']);
?>" name="awesome_social_options[vk]" type="text" placeholder="VK URL" />











					</td>



					<td>



						<hr />



							<i class="fa fa-soundcloud"></i><label for="awesome_social_options[soundcloud]" > Sound Cloud</label><br /><input  id="awesome_social_options[soundcloud]" value="<?php
	esc_attr_e($options['soundcloud']);
?>" name="awesome_social_options[soundcloud]" type="text" placeholder="Sound Cloud URL" />











					</td>



					<td>



						<hr />







									<i class="fa fa-reddit"></i><label for="awesome_social_options[reddit]" > Reddit</label><br /><input  id="awesome_social_options[reddit]" value="<?php
	esc_attr_e($options['reddit']);
?>" name="awesome_social_options[reddit]" type="text" placeholder="Reddit URL" />







				</td>



				</tr>







						<tr>



					<td>



						<hr />







					<i class="fa fa-stack-overflow"></i><label for="awesome_social_options[stack]" > Stack OverFLow</label><br /><input  id="awesome_social_options[stack]" value="<?php
	esc_attr_e($options['stack']);
?>" name="awesome_social_options[stack]" type="text" placeholder="Stack OverFlow URL" />











					</td>



					<td>



						<hr />



							<i class="fa fa-behance"></i><label for="awesome_social_options[behance]" > Behance</label><br /><input  id="awesome_social_options[behance]" value="<?php
	esc_attr_e($options['behance']);
?>" name="awesome_social_options[behance]" type="text" placeholder="Behance URL" />











					</td>



					<td>



						<hr />







									<i class="fa fa-github"></i><label for="awesome_social_options[github]" > Github</label><br /><input  id="awesome_social_options[github]" value="<?php
	esc_attr_e($options['github']);
?>" name="awesome_social_options[github]" type="text" placeholder="Github URL" />







				</td>



				</tr>

                 <tr>



					<td>



						<hr />







									<i class="fa fa-envelope-o"></i><label for="awesome_social_options[envelope]" > Email</label><br /><input  id="awesome_social_options[envelope]" value="<?php
	esc_attr_e($options['envelope']);
?>" name="awesome_social_options[envelope]" type="text" placeholder="mailto:someone@example.com" />







				</td>

                 </tr>



			</table>


			<?php if ( fs_fs()->is__premium_only() ) { ?>

			<div  class="custom_fileds">
				<table class="tab-cus">
					<tr class="single-table-head">
						<th>Icon</th>
						<th>URL</th>
						<th>Background</th>
						<th></th>
					</tr>
					<?php
	$countiner = 20;
	$pass = 0;
	for ($i = 1; $i < 20; $i++)
		{
		$temps = 'icon_sec_' . $i;
		if (!empty($options[$temps]))
			{
			$pass++;
?>
					<tr class="single-row">
					
						<td>
							 <input type="text" value="<?php
			echo $options['icon_sec_' . $i]; ?>"  name="awesome_social_options[icon_sec_<?php
			echo $i; ?>]" class="icon_image" />
						</td>
						<td>
							<input type="text" value="<?php
			echo $options['url_sec_' . $i]; ?>" name="awesome_social_options[url_sec_<?php
			echo $i; ?>]" class="url_ico_img" />
						</td>
						<td>
							<input type="text" value="<?php
			echo $options['bg_color_ico_' . $i]; ?>" name="awesome_social_options[bg_color_ico_<?php
			echo $i; ?>]" class="url_ico_img" />
						</td>
						<td class="add_an">
							<a href="javascript:void(0);" class="add_anoth_link">+</a>
							<a href="javascript:void(0);" class="minus_anoth_link">-</a>
						</td>
					</tr>
					<?php
			}
		}

	if ($pass == 0)
		{
?>
					<tr class="single-row">
					
						<td>
							 <input type="text" value=""  name="awesome_social_options[icon_sec_1]" class="icon_image" />
						</td>
						<td>
							<input type="text" value="" name="awesome_social_options[url_sec_1]" class="url_ico_img" />
						</td>
						<td>
							<input type="text" value="" name="awesome_social_options[bg_color_ico_1]" class="url_ico_img" />
						</td>
						<td class="add_an">
							<a href="javascript:void(0);" class="add_anoth_link">+</a>
							<a href="javascript:void(0);" class="minus_anoth_link">-</a>
						</td>
					</tr>
						<?php
		}

?>
			
				</table>
			</div>
			<?php } else {
				?>
				<div class='add_custom_icon' >Can't find the icon that you want to add? or want add more customized icons? <a href="<?php echo fs_fs()->get_upgrade_url(); ?>">Upgrade Now</a></div>
				<?php

			} ?>



<style type="text/css">
.add_custom_icon {
    background: #F44336;
    color: #fff;
    text-align: center;
    padding: 18px;
    font-size: 16px;
    margin-top: 15px;
}

.add_custom_icon a {
    background: #fff;
    padding: 11px 20px;
    color: #f7412d;
    border-radius: 5px;
    text-decoration: none;
}

.add_custom_icon::after {
    content: "";
    display: block;
    clear: both;
}

.add_custom_icon {
}
	table.tab-cus {
    width: 100%;
    text-align: center;
    background: #eee;
    padding: 10px;
    margin-top: 15px;
}
a.add_anoth_link, .minus_anoth_link {
    display: inline-block;
    width: 24px;
    height: 24px;
    background: #fc5c3c;
    color: #fff;
    border-radius: 50%;
    text-decoration: none;
    line-height: 22px;
    text-align: center;
}
.fb_icon_link {
    background: #F44336;
    color: #fff;
    font-size: 15px;
    font-weight: 500;
    line-height: 21px;
    padding: 15px;
    box-shadow: 1px 1px 10px #ccc;
    margin-bottom: 25px;
    border-radius: 17px;
}

.fb_icon_link img {
    max-width: 50px;
}
</style>

			</div>

			<div class="my-social-connections">


				<div class="facebook_prof">
					<div class="fb_icon_link"> 
					Need help in something? Inbox us here <br />
					<a href="https://www.facebook.com/messages/t/mewoooooo" target="_blank"><img src="https://png.icons8.com/color/100/000000/facebook-messenger.png"></a>

				</div>
					<!-- Facebook Badge START --><a href="https://www.facebook.com/mewoooooo" target="_blank" title="Daniyal Ahmad" style="font-family: &quot;lucida grande&quot;,tahoma,verdana,arial,sans-serif; font-size: 11px; font-variant: normal; font-style: normal; font-weight: normal; color: #3B5998; text-decoration: none;" target="_TOP">Daniyal Ahmad</a><br /><a href="https://www.facebook.com/mewoooooo" target="_blank" title="Daniyal Ahmad" ><img class="img" src="https://badge.facebook.com/badge/100000485113612.1956.488944817.png" style="border: 0px;" alt="" /></a><!-- Facebook Badge END -->

				</div>

				<div class="twitter">

				<h4>FOLLOW ME ON TWITTER</h4>

					<a href="https://twitter.com/mewooooooooo" class="twitter-follow-button" data-size="large" data-show-screen-name="false" data-show-count="false">Follow @mewooooooooo</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

				</div>

			</div>

			<div class="clear-scale">

			</div>

					<p class="submit">



							<input type="submit" class="button-primary awesome-social-submit" value="<?php
	_e('Save Options', 'awesomesocial');
?>" />



						<?php
	echo "<div class='loading-cover-pi'><img src='" . plugin_dir_url(__FILE__) . "img/loader.gif' id='awesome_social_load'/></div>";
?>



						</p>





							<div class="awesome_spacer"></div>



								<div class="awesome_spacer"></div>



									<div class="awesome_spacer"></div>



									<p>Made With Love - By  (<a href="https://www.facebook.com/mewoooooo" target="_blank" >Daniyal Ahmed</a>). If you love this plugin don't forget to review <a href="https://wordpress.org/support/view/plugin-reviews/awesome-social-floating-sidebar" target="_blank"> Review Now!</a></p><br />



					</form>



				<div id="saveResult"></div>



			<script type="text/javascript">



					jQuery(document).ready(function($) {
						$(".minus_anoth_link").live("click",function(){
							var $tr    = $(this).closest('.single-row');
							$tr.find(':text').val('');
							$(this).closest('.single-row').hide();
						});
						$("a.add_anoth_link").live("click",function(){
							   var $tr    = $(this).closest('.single-row');
							    var $clone = $tr.clone();
							    $clone.find(':text').val('');
							     var self = $(this),
						         row = self.closest('tr'),
						         rowIndex = row.index();
						      
						         $clone.find('.icon_image').attr("name","awesome_social_options[icon_sec_"+(rowIndex+1)+"]");
						         $clone.find('.url_ico_img').attr("name","awesome_social_options[url_sec_"+(rowIndex+1)+"]");
						         $clone.find('.type_select').attr("name","awesome_social_options[select_type_"+(rowIndex+1)+"]");

						         
							    $tr.after($clone);

						});

					jQuery("#awesome_social_load").hide();

					jQuery(".loading-cover-pi").hide();



					jQuery('#awesome_social_form').submit(function() {

					jQuery(".loading-cover-pi").show();

					jQuery("#awesome_social_load").show();



					jQuery(this).ajaxSubmit({





					success: function(){



					jQuery("#awesome_social_load").hide();


					jQuery(".loading-cover-pi").hide();
					jQuery('#saveResult').html("<div id='saveMessage' class='successModal'></div>");



					jQuery('#saveMessage').append("<p><?php
	echo htmlentities(__('Settings Saved Successfully', 'wp') , ENT_QUOTES);
?></p>").show();

					jQuery(".loading-cover-pi").hide();

							 },



							 timeout:5000,

                error: function(data){

                 		jQuery("#awesome_social_load").hide();

                 		jQuery(".loading-cover-pi").hide();

					jQuery('#saveResult').html("<div id='saveMessage' class='successModal'></div>");



					jQuery('#saveMessage').append("<p><?php
	echo htmlentities(__('Settings Saved Successfully', 'wp') , ENT_QUOTES);
?></p>").show();

                    }

						  });



						  setTimeout("jQuery('#saveMessage').hide('slow');", 5000);



						  return false;



					   });



					});



			</script>



			<?php
	echo '</div>';
	}

add_action('admin_init', 'awesome_social_options_init');
/**
 * Init plugin options to white list our options
 */

function awesome_social_options_init()
	{
	register_setting('awesome_social', 'awesome_social_options', 'awesome_social_icon_validate');
	}

function awesome_social_icon_validate($input)
	{
	global $size_options, $style_options, $pos_options;

	// Link new tab checkbox value is either 0 or 1

	if (!isset($input['linksnewtab'])) $input['linksnewtab'] = null;
	$input['linksnewtab'] = ($input['linksnewtab'] == 1 ? 1 : 0);
	if (!isset($input['animations']))

	// Animation checkbox value is either 0 or 1

	$input['animations'] = null;
	$input['animations'] = ($input['animations'] == 1 ? 1 : 0);

	// Shadow checkbox value is either 0 or 1

	if (!isset($input['shadow'])) $input['shadow'] = null;
	$input['shadow'] = ($input['shadow'] == 1 ? 1 : 0);

	// Our style option must actually be in our array of style options

	if (!isset($input['style_input'])) $input['style_input'] = null;
	if (!array_key_exists($input['style_input'], $style_options)) $input['style_input'] = null;

	// Social profiles links must be safe links with no HTML tags

	$input['facebook'] = wp_filter_nohtml_kses($input['facebook']);
	$input['twitter'] = wp_filter_nohtml_kses($input['twitter']);
	$input['rss'] = wp_filter_nohtml_kses($input['rss']);
	$input['linkedin'] = wp_filter_nohtml_kses($input['linkedin']);
	$input['youtube'] = wp_filter_nohtml_kses($input['youtube']);
	$input['flickr'] = wp_filter_nohtml_kses($input['flickr']);
	$input['pinterest'] = wp_filter_nohtml_kses($input['pinterest']);
	$input['stumbleupon'] = wp_filter_nohtml_kses($input['stumbleupon']);
	$input['google-plus'] = wp_filter_nohtml_kses($input['google-plus']);
	$input['instagram'] = wp_filter_nohtml_kses($input['instagram']);
	$input['tumblr'] = wp_filter_nohtml_kses($input['tumblr']);
	$input['vine'] = wp_filter_nohtml_kses($input['vine']);
	$input['url_sec'] = wp_filter_nohtml_kses($input['url_sec']);
	$input['icon_sec'] = wp_filter_nohtml_kses($input['icon_sec']);

	// Our size option must actually be in our array of size options

	if (!array_key_exists($input['size'], $size_options)) $input['size'] = null;

	// Our size option must actually be in our array of size options

	if (!array_key_exists($input['position'], $pos_options)) $input['position'] = null;
	return $input;
	}
?>