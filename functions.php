<?php

function EnqStyles () {

  // CSS Styles

  wp_enqueue_style('GoogleFonts', '//fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600');

  wp_enqueue_style('BootStrap', get_template_directory_uri(). '/assets/css/bootstrap.min.css');

  wp_enqueue_style('FontAwe', get_template_directory_uri(). '/assets/css/font-awesome.min.css');

  wp_enqueue_style('BdatePicker', get_template_directory_uri(). '/assets/css/bootstrap-datepicker.css');

  wp_enqueue_style('JqueryUi', get_template_directory_uri(). '/assets/css/jquery-ui.css');

  wp_enqueue_style('Aos', get_template_directory_uri(). '/assets/css/magnific-popup.css');

  wp_enqueue_style('MediaElementPlayer', get_template_directory_uri(). '/assets/css/mediaelementplayer.css');

  wp_enqueue_style('OwlCarousel', get_template_directory_uri(). '/assets/css/owl.carousel.min.css');

  wp_enqueue_style('OwlTheme', get_template_directory_uri(). '/assets/css/owl.theme.default.min.css');

  wp_enqueue_style('Aos', get_template_directory_uri(). '/assets/css/aos.css');

  wp_enqueue_style('IcoMoon', get_template_directory_uri(). '/assets/fonts/icomoon/style.css');

  wp_enqueue_style('FlatCon', get_template_directory_uri(). '/assets/fonts/flaticon/font/flaticon.css');

  wp_enqueue_style('SilckTheme', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css');

  wp_enqueue_style('SlickCss', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css');

  wp_enqueue_style('SearchBox', get_template_directory_uri(). '/assets/css/search_box.css');









  wp_enqueue_style('style', get_stylesheet_uri(), NULL, mt_rand(0,9));


// Js Files

wp_enqueue_script('CountDownJs',  get_template_directory_uri(). '/assets/js/jquery.countdown.min.js', array( 'jquery' ), mt_rand(0,9), true);

wp_enqueue_script('StellarJs',  get_template_directory_uri(). '/assets/js/jquery.stellar.min.js', array( 'jquery' ), mt_rand(0,9), true);

wp_enqueue_script('OwlCarJs',  get_template_directory_uri(). '/assets/js/owl.carousel.min.js', array( 'jquery' ), mt_rand(0,9), true);

wp_enqueue_script('MagnificJs',  get_template_directory_uri(). '/assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), mt_rand(0,9), true);

wp_enqueue_script('BootJs', get_template_directory_uri(). '/assets/js/bootstrap.min.js', NULL, mt_rand(0,9), true);

wp_enqueue_script('SlickJs', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array( 'jquery' ), mt_rand(0,9), true);

wp_enqueue_script('MainJs', get_template_directory_uri(). '/assets/js/main.js', array( 'jquery' ), mt_rand(0,9), true);

wp_enqueue_script('BundledJs', get_template_directory_uri(). '/assets/js/scripts-bundled.js', NULL, mt_rand(0,9), true);
wp_localize_script('BundledJs', 'BlogUrl', array(

'root_url' => get_site_url()

));







}

add_action('wp_enqueue_scripts', 'EnqStyles');


function RegisterImage () {

  register_nav_menu('HeaderLocation', 'Header Menu');
  register_nav_menu('FooterLocation', 'Footer Menu');

  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('PageBanner', 1500, 330);
  add_image_size('portrait', 500,600, true);
  add_image_size('landscape', 580,600, true);


}

add_action('after_setup_theme', 'RegisterImage');


function themename_custom_logo_setup() {
 $defaultLogo = array(
 'height'      => 100,
 'width'       => 400,
 'flex-height' => true,
 'flex-width'  => true,
 'header-text' => array( 'site-title', 'site-description' ),
 );
 add_theme_support( 'custom-logo', $defaultLogo );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );




//Modify WP Rest API
add_action('rest_api_init', 'blogRest');

function blogRest() {

  register_rest_route('artificial_topic/v3', 'search', array(

  'methods' => WP_REST_SERVER::READABLE,
  'callback' => 'blogSearchResults'

  ));

}

function blogSearchResults ($searchData) {

$cPosts = new WP_Query(array(

'post_type' => 'post',
's' => sanitize_text_field($searchData['term'])

));

$postResults = array();

while($cPosts->have_posts()) {

$cPosts->the_post();

array_push($postResults, array(

'title' => get_the_title(),
'url' => get_the_permalink(),
'image' => get_the_post_thumbnail_url()

));

}

return $postResults;

}


?>
