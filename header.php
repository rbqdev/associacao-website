<!doctype html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo URL_TEMPLATE . '/assets/img/fav/favicon.ico'?>" type="image/icon"/>
	<meta name="theme-color" content="#2f65c2">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<h1 class="font-none">AEESP</h1>

<div id="page" class="site loading">
	<header id="masthead" class="site-header">

		<div class="section-wrapper flex flex-center">
			<a href="<?php echo URL_SITE; ?>" class="logo">
                <?php echo file_get_contents( URL_TEMPLATE . '/assets/img/logo.svg'); ?>
			</a>

			<nav id="site-navigation" class="main-navigation">
				<h2 class="font-none">Menu Principal</h2>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_id' => 'main-navigation'
					));
				?>
            </nav>

            <div id="toggle-menu-mobile" class="toggle-menu-mobile no-desktop"></div>
            <div class="main-navigation-overlay nav-overlay no-desktop"></div>
		</div>
		<!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
