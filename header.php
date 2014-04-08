<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>

		<meta charset="utf-8">

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>

			<?php
				if ( $wp_query->post->ID == 2 ) {
					bloginfo('name'); echo " | "; bloginfo('description');
				} else {
					wp_title("",true); echo " | "; bloginfo('name'); echo " | "; bloginfo('description');
				}
			?>

		</title>

		<!-- mobile meta -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- actual meta data -->
		<meta name="description" content=""/>
		<meta name="keywords" content=""/>
		<meta name="author" content=""/>
		<meta property="og:title" content="<?php bloginfo('name'); ?>"/>
		<meta property="og:url" content="<?php echo get_permalink(); ?>"/>
		<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/library/images/logo-social.jpg"/>
		<meta property="og:locale" content="en_US"/>
		<meta property="og:description" content=""/>

		<!-- google webfonts -->

		<!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

		<!-- google analytics -->


	</head>

	<?php

		// Get page slug for class in <body>
		if(is_page()) {
			$page_slug = $post->post_name;
		}

	?>

	<body <?php body_class($page_slug); ?>>

		<div id="container">

			<div class="ie_alert" style="display: none;">
				<div class="wrap">
					<p>You appear to be using an out-dated web browser. Microsoft no longer supports Internet Explorer 7 or Internet Explorer 6. It is recommended for security reasons that you update your browser to at least Internet Explorer 9. Update Internet Explorer to its latest version through <a href="http://www.update.microsoft.com/windowsupdate/v6/vistadefault.aspx?ln=en-us" target="_blank">Windows Update</a>. By updating your browser today you will ensure that you get the correct user experience for this website.</p>
				</div>
			</div>

			<header class="header" role="banner">

				<div id="inner-header" class="wrap clearfix">

					<!-- Text based logo. NO IMAGE! Remove if not needed. -->
					<a href="<?php echo home_url(); ?>" rel="nofollow" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>

					<!-- Image based logo. Remove if not needed. -->
					<!-- <a class="logo-desktop desktop" href="<?php echo home_url(); ?>" rel="nofollow" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/FILENAMEHERE.JPG" alt="<?php bloginfo('name'); ?>"></a> -->

					<!-- 2X Image based logo for mobile devices. Remove if not needed. -->
					<!-- <a class="logo-mobile mobile" href="<?php echo home_url(); ?>" rel="nofollow" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/FILENAMEHERE@2X.JPG" alt="<?php bloginfo('name'); ?>"></a> -->

					<nav class="main-nav" role="navigation">
						<?php bones_main_nav(); ?>
					</nav>

					<nav class="mobile-nav mobile" role="navigation">
						<button class="collapse">Navigation</button>
						<?php bones_main_nav(); ?>
					</nav>

				</div>

			</header>

			<!-- UNCOMMENT FOR ORBIT SLIDER ON SPECIFIC/HOMEPAGE
			<div class="showcase">

				<div class="wrap">

					<?php
						// if (is_page( '2' )) {
						// 	echo do_shortcode("[orbit-slider]");
						// }
					?>

				</div>

			</div>
			-->