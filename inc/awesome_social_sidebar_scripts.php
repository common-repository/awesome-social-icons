<?php
/*---------------------------------------------------
Styling for social icons
----------------------------------------------------*/

function awesome_social_styles_enqueue($hook) {
	if(!empty($_GET['page'])){
		if($_GET['page'] == "AwesomeSoicalFloatingSidebar"){
	    	wp_enqueue_style( 'my_custom_script', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
		}
	}
}
add_action( 'admin_enqueue_scripts', 'awesome_social_styles_enqueue' );


function awesome_social_add_scripts_method() {
    wp_enqueue_script( 'awesome-social-script', plugin_dir_url( __FILE__ ) . '/js/awesome_script.js', array( 'jquery' ), rand() );

    wp_localize_script( 'awesome-social-script', 'awesome_social',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}
add_action( 'wp_enqueue_scripts', 'awesome_social_add_scripts_method' );




function awesome_social_scripts() {
    $options = get_option('awesome_social_options');
    $options = get_option('awesome');
    global $awesome_social_style;
    echo '<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">';
?>

			<style>
			.facebook-awesome-social::before {
			    content: "\f09a" !important;
			}
				
			.awesome_social_icons_links {
			    display: block;
			}
			.awesome-social-img img {
			    position: absolute;
			    top: 50%;
			    left: 50%;
			    transform: translate(-50%,-50%);
			}

			.awesome-social-img {
			    position: relative;
			}			
			#icon_wrapper .awesome-social {
			    font-family: 'FontAwesome' !important;
			}			
			div#icon_wrapper a {
			    display: inline-block;
			    margin-right: 4px;
			}
			<?php if($options['verticalpos']){ ?>
			div#icon_wrapper a {
			    display: inline-block;
			    margin-right: <?php echo $options['verticalpos']; ?>px;
			}
			<?php } ?>


			.awesome-social

			{

            margin-top:2px;

			color: #fff;

			text-align: center !important;

			display: block;

			<?php
    // Checking size if its large then set it
    if ($options['size'] == "48") {
?>

			line-height: 51px !important;

			width: 48px !important;

			height: 48px !important;

			font-size: 28px !important;

			<?php
    }
    if ($options['size'] == "32") {
        // Checking size if its medium then set it
        
?>

			line-height: 34px !important;

			width: 32px !important;

			height: 32px !important;

			font-size:16px !important;

			<?php
    }
    if ($options['size'] == "24") {
        // Checking size if its small then set it
        
?>

			line-height: 25px !important;

			width: 24px !important;

			height: 24px !important;

			font-size: 14px !important;

			<?php
    }

    // If there is shadow settings
    if ($options['shadow'] == 1) {
    } 
    else {
        echo "text-shadow: 2px 2px 4px #000000;";
    }
    $desiflag = false;
    if(!empty($options['design-section'] )){
    if ($options['design-section'] == "3") {
    	$desiflag = true;
    	?>
		    background: transparent !important;
		   	border-width: 1px;
    		border-style: solid;
		    border-radius: 50px;

    	<?php
    }
	}
	if(!empty($options['design-section'] )){
    // If there is round social icon settings
	    if ($options['design-section'] == "2") {
	?>

				border-radius:50% !important;

				<?php
	    }
	 }
	    // If animation setting then use CSS3 for animation
	    if ($options['animation_on_hover']) {
	?>

				-moz-transition: width <?php echo $options['animate_sec']; ?>s, height <?php echo $options['animate_sec']; ?>s, -webkit-transform <?php echo $options['animate_sec']; ?>s; /* For Safari 3.1 to 6.0 */



				-webkit-transition: width <?php echo $options['animate_sec']; ?>s, height <?php echo $options['animate_sec']; ?>s, -webkit-transform <?php echo $options['animate_sec']; ?>s; /* For Safari 3.1 to 6.0 */

				transition: width <?php echo $options['animate_sec']; ?>s, height <?php echo $options['animate_sec']; ?>s, transform <?php echo $options['animate_sec']; ?>s;



				<?php
    }
?>



			}

			<?php
    // Again if animation settings
    if ($options['animation_on_hover']) {
?>

			.awesome-social:hover

			{



			-webkit-transform: rotate(360deg); /* Chrome, Safari, Opera */

				transform: rotate(360deg);

					-moz-transform: rotate(360deg); /* Chrome, Safari, Opera */

							-ms-transform: rotate(360deg); /* Chrome, Safari, Opera */



			}

				<?php
    }
?>

			.awesome_social_icons_links

			{

			outline:0 !important;



			}

			.awesome_social_icons_links:hover{

			text-decoration:none !important;

			}

			<?php // Social icons background settings
     ?>

			.fb-awesome-social

			{

			background: #3b5998;
			border-color: #3b5998;
			<?php if($desiflag) { echo 'color: #3b5998'; } ?>

			}
			.facebook-awesome-social

			{

			background: #3b5998;
			border-color: #3b5998;
			<?php if($desiflag) { echo 'color: #3b5998 !important;'; } ?>
			}


			.tw-awesome-social

			{

			background:#00aced;
			border-color: #00aced;
			<?php if($desiflag) { echo 'color: #00aced !important;'; } ?>

			}
			.twitter-awesome-social

			{

			background:#00aced;
			border-color: #00aced;
			<?php if($desiflag) { echo 'color: #00aced !important;'; } ?>

			}
			.rss-awesome-social

			{

			background:#FA9B39;
			border-color: #FA9B39;
			<?php if($desiflag) { echo 'color: #FA9B39 !important;'; } ?>

			}

			.linkedin-awesome-social

			{

			background:#007bb6;
			border-color: #007bb6;
			<?php if($desiflag) { echo 'color: #007bb6 !important;'; } ?>
			}

			.youtube-awesome-social

			{

			background:#bb0000;
			border-color: #bb0000;
			<?php if($desiflag) { echo 'color: #bb0000 !important;'; } ?>
			}

			.flickr-awesome-social

			{

			background: #ff0084;
			border-color: #ff0084;
			<?php if($desiflag) { echo 'color: #ff0084 !important;'; } ?>
			}

			.pinterest-awesome-social

			{

			background:#cb2027;
			border-color: #cb2027;
			<?php if($desiflag) { echo 'color: #cb2027 !important;'; } ?>
			}

			.stumbleupon-awesome-social

			{

			background:#f74425 ;
			border-color: #f74425;
			<?php if($desiflag) { echo 'color: #f74425 !important;'; } ?>
			}

			.google-plus-awesome-social

			{

			background:#f74425 ;
			border-color: #f74425;
			<?php if($desiflag) { echo 'color: #f74425 !important;'; } ?>
			}

			.instagram-awesome-social

			{

			    background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
			    background: -webkit-linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
			    background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
			    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f09433', endColorstr='#bc1888',GradientType=1 );
			    border-color: #f09433;
				<?php if($desiflag) { echo 'color: #f09433 !important;'; } ?>	    

			}

			.tumblr-awesome-social

			{

			background: #32506d ;
			border-color: #32506d;
			<?php if($desiflag) { echo 'color: #32506d !important;'; } ?>
			}

			.vine-awesome-social

			{

			background: #00bf8f ;
			border-color: #00bf8f;
			<?php if($desiflag) { echo 'color: #00bf8f !important;'; } ?>
			}

            .vk-awesome-social {



            background: #45668e ;
            border-color: #45668e;
            <?php if($desiflag) { echo 'color: #45668e !important;'; } ?>

            }

            .soundcloud-awesome-social

                {

            background: #ff3300 ;
            border-color: #ff3300;
            <?php if($desiflag) { echo 'color: #ff3300 !important;'; } ?>

                }

                .reddit-awesome-social{



            background: #ff4500 ;
            border-color: #ff4500;

            <?php if($desiflag) { echo 'color: #ff4500 !important;'; } ?>
                }

                .stack-awesome-social{



            background: #fe7a15 ;
            border-color: #fe7a15;
            <?php if($desiflag) { echo 'color: #fe7a15 !important;'; } ?>

                }

                .behance-awesome-social{

            background: #1769ff ;
            border-color: #1769ff;
            <?php if($desiflag) { echo 'color: #1769ff !important;'; } ?>

                }

                .github-awesome-social{

            background: #999999 ;
            border-color: #999999;
            <?php if($desiflag) { echo 'color: #999999 !important;'; } ?>



                }

                .envelope-awesome-social{

                  background: #ccc ;
 				  border-color: #ccc;                 
 				  <?php if($desiflag) { echo 'color: #ccc !important;'; } ?>
                }

/*  Mobile */



<?php
    if ($options['mobile']) {

?>
@media(max-width:768px){
#icon_wrapper{



	display: none;

}

}

<?php
    }
?>



/* Custom Background */

<?php
    if ($options['change_color']) {
?>



                .awesome-social {

            background:<?php echo $options['change_color'] ?>;

                }



                <?php
    }
?>

             <?php
    if ($options['animation_on_hover']) {
?>

             .awesome-social{


-webkit-transition-property: color, text;
    -webkit-transition-duration: 0.25s, 0.25s;
    -webkit-transition-timing-function: linear, ease-in;
    -moz-transition-property: color, text;
    -moz-transition-duration: 0.25s;
    -moz-transition-timing-function: linear, ease-in;
    -o-transition-property: color, text;
    -o-transition-duration: 0.25s;
    -o-transition-timing-function: linear, ease-in;
    transition-property: color, text;
    transition: 0.25s, 0.25s;
    transition-timing-function: linear, ease-in;

             }

                 <?php
    }
    
    $colorsettings = '';

	if(!empty($options['color_main'])){
		$colorsettings = $options['color_main'];
	}

	foreach ($colorsettings['social_select'] as $key => $value) {
		if(!empty($colorsettings)){
			if(!empty($value)){
			?>
				.awesome_social_hv_<?php echo strtolower($value); ?>:hover i{
					background:<?php echo $colorsettings['hover_bg_color'][$key]; ?> !important;
					color:<?php echo $colorsettings['hover_icon_m_color'][$key]; ?> !important;
				   
				}
			<?php
			}
		}
	}

	if(!empty($options['awesome-custom-icons'])){
		$customcolsettings = $options['awesome-custom-icons'];
	}

    for ( $i=0; $i < count( $customcolsettings ); $i++ ) {
		if(!empty($customcolsettings)){
				$icon_settings = $customcolsettings['social_icon_url'][$i];
				if($icon_settings){
				$hover_css_class = "awesome_".str_replace(" ","_",$customcolsettings['select_font_icon'][$i]);
			?>
					.<?php echo $hover_css_class; ?>:hover i{
						<?php if(!empty($customcolsettings['icon__hbg_m_color'])){ ?>
							background:<?php echo $customcolsettings['icon__hbg_m_color'][$i]; ?> !important;
						<?php } ?>
						<?php if(!empty($customcolsettings['icon__hv_m_color'])){ ?>
							color:<?php echo $customcolsettings['icon__hv_m_color'][$i]; ?> !important;
						<?php } ?>
					   
					}
			<?php
				}
		}
	}


?>





			</style>

<?php
}
add_action('wp_enqueue_scripts', 'awesome_social_scripts');
?>