<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="wrapper-navbar">
		<nav>
			<div class="container">
				<div class="row">
					<div class="brand">
						<?php $logo_id = get_theme_mod('custom_logo');
						echo wp_get_attachment_image($logo_id, 'full'); ?>
					</div>
					<button id="navbar-toggler">
						<span></span><span></span><span></span>
					</button>
					<?php wp_nav_menu(array('theme_location' => 'my_main_menu')); ?>
				</div>
			</div>
		</nav>
	</div>