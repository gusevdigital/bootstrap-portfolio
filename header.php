<?php
/*
# ===================================================
# header.php
#
# The theme header.
# ===================================================
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="ltr">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="author" content="Denis Gusev">
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">

  <!-- Favicon & Apple Touc Icon -->
  <?php
    $favicon = IMAGES . '/icons/favicon.ico';
    $touchicon = IMAGES . '/icons/apple-touch-icon.png';
   ?>

   <link rel="shortcut icon" href="<?php echo $favicon; ?>">
   <link rel="apple-touch-icon-precomposed" href="<?php echo $touchicon; ?>" size="180x180">

	 <!-- Load font -->
	 <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700;900&family=Roboto:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body class="text-white" <?php body_class(); ?>>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark ">
			<div class="container-fluid">
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <?php bloginfo ('name'); ?>
        </a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<?php
					  wp_nav_menu( array(
							'menu_class' => 'navbar-nav ml-auto',
							'theme_location' => 'main-menu',
							'container' => false,
							'container_aria_label' => 'Website Navigation',

						) );
					?>
				</div>
			</div>
		</nav>
	</header>
