<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta name="charset" content="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Main Blog</title>


		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <?php wp_head(); ?>

    </head>
		<body>

	  <div class="site-wrap">

	    <div class="site-mobile-menu">
	      <div class="site-mobile-menu-header">
	        <div class="site-mobile-menu-close mt-3">
	          <span class="icon-close2 js-menu-toggle"></span>
	        </div>
	      </div>
	      <div class="site-mobile-menu-body"></div>
	    </div>

	    <header class="site-navbar" role="banner">
	      <div class="container-fluid">
	        <div class="row align-items-center">

	          <div class="col-12 search-form-wrap js-search-form">
	            <form method="get" action="#">
	              <input type="text" id="s" class="form-control" placeholder="Search...">
	              <button class="search-btn" type="submit"><span class="icon-close"></span></button>
	            </form>
	          </div>

	          <div class="col-3 site-logo">

						<?php	if ( function_exists( 'the_custom_logo' ) ) {
 echo get_custom_logo('custom-logo');
} ?>

	          </div>

	          <div class="col-8 text-right">
	            <nav class="site-navigation" role="navigation">
	               <?php

								 $Menu = array(

                   'container' => 'ul',
									 'container_class' => 'hjjhjhjh',
									 'menu_class' => 'site-menu js-clone-nav mr-auto d-none d-lg-block mb-0'



								 );


								  wp_nav_menu($Menu); ?>

	            </nav>
	            <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a></div>

							<div class="col-1 site-logo">

							<div class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span class="icon-search"></span></a></div> </div>

	          </div>



	      </div>
	    </header>
