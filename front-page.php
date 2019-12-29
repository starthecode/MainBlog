<?php get_header(); ?>

<div class="site-section bg-light">

  <div class="container tranding__text" style="display: flex;">
    <h5>Tranding: </h5>

    <div class="slider text-left">


<?php $SlidePost = new WP_Query(array(

      'post_type' => 'post'

));

while($SlidePost->have_posts()) {

$SlidePost->the_post();
  ?>

      <a target="_blank" href="<?php the_permalink(); ?>"<p><?php the_title(); ?></p></a>

    <?php } ?>

    </div>
  </div>




  <div class="container">
    <div class="row align-items-stretch retro-layout-2">
      <div class="col-md-4">

        <?php $MostRecent = new WP_Query(array(

          'post_type' => 'post',
          'post_status' => 'publish',
          'post__not_in' => array( 25 ),
          'posts_per_page' => 2

        ));

        while($MostRecent->have_posts()) {

        $MostRecent->the_post(); ?>


        <a href="<?php the_permalink(); ?>" class="h-entry mb-30 v-height gradient" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">

          <div class="text">
            <h2><?php the_title(); ?></h2>
            <span class="date"><?php echo get_the_date('F j, Y'); ?></span>
          </div>
        </a>

      <?php } wp_reset_postdata(); ?>

      </div>
      <div class="col-md-4">

        <?php $Mainpost = new WP_Query(array(

         'post_category' => 'featured',
         'posts_per_page' => 1

        ));

        while($Mainpost->have_posts()) {

        $Mainpost->the_post(); ?>


        <a href="<?php the_permalink(); ?>" class="h-entry img-5 h-100 gradient" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">

          <div class="text">
            <div class="post-categories mb-3">
              <span class="post-category bg-danger">Travel</span>
              <span class="post-category bg-primary">Food</span>
            </div>
            <h2><?php the_title(); ?></h2>
            <span class="date"><?php echo get_the_date('F j, Y'); ?></span>
          </div>
        </a>

      <?php } ?>
      </div>
      <div class="col-md-4">

        <?php $NewPost = new WP_Query(array(

          'post_category' => 'post',
          'category_name' => 'tech',
          'post_status' => 'publish',
          'post__not_in' => array( 25 ),
          'posts_per_page' => 2

        ));

        while($NewPost->have_posts()) {

        $NewPost->the_post(); ?>


        <a href="<?php the_permalink(); ?>" class="h-entry mb-30 v-height gradient" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">

          <div class="text">
            <h2><?php the_title(); ?></h2>
            <span class="date"><?php echo get_the_date('F j, Y'); ?></span>
          </div>
        </a>
      <?php } ?>

      </div>
    </div>
  </div>
</div>


<!--Recent Post Section-->

<div class="site-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-12">
        <h2>Recent Posts</h2>
      </div>
    </div>
    <div class="row">

<?php  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'post__not_in' => array( 25 ),
    'posts_per_page' => 6,
    'paged' => get_query_var('paged')
  );
  $query = new WP_Query( $args );

while($query->have_posts()) {

$query->the_post(); ?>





      <div class="col-lg-4 mb-4">
        <div class="entry2">
          <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Image" class="img-fluid rounded"></a>
          <div class="excerpt">





              <span class="post-category text-white bg-warning mb-3"><?php if(has_tag()) { the_tags('', ', ', '<br />'); } else {echo 'Not Specified';} ?></span>


          <h2><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 8); ?></a></h2>
          <div class="post-meta align-items-center text-left clearfix">
            <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
            <span><?php echo get_the_date('F j, Y'); ?></span>
          </div>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
            <p><a target="_blank" href="<?php the_permalink(); ?>">Read More</a></p>
          </div>
        </div>
      </div>

    <?php } wp_reset_postdata(); ?>

    </div>


    <div class="row text-center pt-5 border-top">
    <!--  <div class="col-md-12">
        <div class="custom-pagination">


          <span>1</span>
          <a href="#">2</a>
          <a href="#">3</a>
          <a href="#">4</a>
          <span>...</span>
          <a href="#">15</a>
        </div>
      </div> -->
    </div>
  </div>


  <!--Subscriber Section-->

  <div class="bg-lightx">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-md-5">
          <div class="subscribe-1 ">
            <h2>Subscribe to our newsletter</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>

            <!-- Begin Mailchimp Signup Form -->
            <link href="//cdn-images.mailchimp.com/embedcode/slim-10_7.css" rel="stylesheet" type="text/css">
            <style type="text/css">
            	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
            	/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
            	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
            </style>

            <form action="https://artificialtopic.us4.list-manage.com/subscribe/post?u=d6c95a0de61b5de548612b8f9&amp;id=4673112280" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="d-flex" target="_blank" novalidate>

            	<input type="email" value="" name="EMAIL" class="form-control" id="mce-EMAIL" placeholder="email address" required>
                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true><input type="text" name="b_d6c95a0de61b5de548612b8f9_4673112280" tabindex="-1" value=""></div>

                <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary">

            </form>


            <!--End mc_embed_signup-->


          </div>
        </div>
      </div>
    </div>
  </div>

</div>






<?php get_footer(); ?>
