<?php

function EnqStyles () {

  // CSS Styles

  wp_enqueue_style('GoogleFonts', '//fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600');

  wp_enqueue_style('BootStrap', get_template_directory_uri(). '/assets/css/bootstrap.min.css');

  wp_enqueue_style('FontAwe', get_template_directory_uri(). '/assets/css/font-awesome.min.css');

  wp_enqueue_style('style', get_stylesheet_uri(), NULL, mt_rand(0,9));


// Js Files

wp_enqueue_script('JqueryJs', get_template_directory_uri(). '/assets/js/jquery.min.js', NULL, mt_rand(0,9), true);

wp_enqueue_script('BootJs', get_template_directory_uri(). '/assets/js/bootstrap.min.js', NULL, mt_rand(0,9), true);

wp_enqueue_script('MainJs', get_template_directory_uri(). '/assets/js/main.js', NULL, mt_rand(0,9), true);




}

add_action('wp_enqueue_scripts', 'EnqStyles');
