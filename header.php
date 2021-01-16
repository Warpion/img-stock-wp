<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<meta name="wot-verification" content="18b14cb925cd29d40717"/>
	<title><?php bloginfo('name'); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/libs/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/media.css">
	<?php if(!is_home()) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/single-style.css">
	<?php } ?>	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="alternate" hreflang="ru" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-3.1.0.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>	
	<?php wp_head(); ?>
</head>
<body itemscope="itemscope" itemtype="http://schema.org/WebPage">
<header itemscope itemtype="http://schema.org/WPHeader">
	<div class="container-fluid main-image">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row menu-block">
				<div class="col-md-5 col-12 company">
					<div class="bars-block">
						<span></span>
						<span></span>
						<span></span>
					</div>
					<a href="<?php echo home_url(); ?>" class="company-name">
						Warpion
					</a>
				</div>
				<div class="col-md-5 col-12 menu-col">
					<?php wp_nav_menu(array('them_location'=>'menu', 'menu_class'=>'menu', 'container'=>'nav')); ?>
				</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-7 col-md-9 col-12 search">
				<?php if(is_home()) { ?>
				<h1>Бесплатные картинки и изображения</h1>
				<?php } ?>
				<form action="<?php bloginfo( 'url' ); ?>" method="get">
				<input type="text" placeholder="Поиск" class="search-input" name="s" value="<?php if(!empty($_GET['s'])){echo $_GET['s'];}?>">
				<button class="search-button" type="submit">
					<i class="fa fa-search"></i>
				</button>
				</form>
			</div>
			<div class="col-12">
				<div class="soc">
					<a href="https://vk.com/warpion_ru" target="_blank"><i class="fa fa-vk"></i></a>
					<a href="https://www.facebook.com/warpion/" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="https://twitter.com/Warpion_ru" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="https://www.instagram.com/warpion_ru/" target="_blank"><i class="fa fa-instagram"></i></a>
				</div>
			</div>
		</div>
	</div>
</header>