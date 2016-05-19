<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head <?php do_action( 'add_head_attributes' ); ?>>

    <!-- Title -->
    <!-- =================================== -->
		<title><?php wp_title(''); ?></title>
    
    <!-- Styles -->
    <!-- =================================== -->
    <link href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon.png" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/icons/touch.png" rel="apple-touch-icon-precomposed">

    <!-- Meta -->
    <!-- =================================== -->
    <meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Webfont -->
    <!-- =================================== -->
    

    <!-- Wordpress Generated -->
    <!-- =================================== -->
		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>
    <!-- Google Analytics -->
    <!-- =================================== -->
    <?php get_template_part( 'includes/analyticstracking' ); ?>

    <div class="container">
			<div class="error-message">
				<h1>404</h1>
				<h2>Page not found</h2>
				<p>Unfortunately, we were unable to find that page or it does not exist.<br />Please <a href="/">return</a> to the home page.</p>
			</div>
			<div class="site-logo-wrapper">
				<!-- ==== Site Logo ==== -->
				<div class="site-logo">
					<a href="/">
            Advancing WebRTC
          </a>
				</div>
			</div>
		</div>

		<?php wp_footer(); ?>

	</body>
</html>