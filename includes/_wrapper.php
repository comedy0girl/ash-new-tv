<!doctype html>
<!--[if IE 8]><html <?php language_attributes(); ?> class="ie8"><![endif]-->
<!--[if lte IE 9]><html <?php language_attributes(); ?> class="ie9"><![endif]-->
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="<?php bloginfo('template_url') ?>/dist/all.min.js"></script>
	<script src="https://use.fontawesome.com/59ab048164.js"></script>


	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/style.min.css" type="text/css" media="screen" />

	<?php wp_head(); ?>

		<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-84702774-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-84702774-1');
	</script>
</head>

<body <?php body_class(); ?>>