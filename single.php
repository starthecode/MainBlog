<?php get_header();

while(have_posts()) {

  the_post();

?>


<?php
$get_author_id = get_the_author_meta('ID');
$get_author_gravatar = get_avatar_url($get_author_id, array('size' => 450));


?>


<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
  <div class="container">
    <div class="row same-height justify-content-center">
      <div class="col-md-12 col-lg-10">
        <div class="post-entry text-center">
          <span class="post-category text-white bg-success mb-3"><?php if(has_tag()) { the_tags('', ', ', '<br />'); } else {echo 'Not Specified';} ?></span>
          <h1 class="mb-4"><a href="#"><?php the_title(); ?></a></h1>
          <div class="post-meta align-items-center text-center">
            <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="<?php echo $get_author_gravatar ?>" alt="Image" class="img-fluid"></figure>
            <span class="d-inline-block mt-1"><?php the_author(); ?></span>
            <span> - <?php echo get_the_date('F j, Y'); ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="site-section py-lg">
  <div class="container">

    <div class="row blog-entries element-animate">

      <div class="col-md-12 col-lg-8 main-content">

        <div class="post-content-body">
          <p><?php the_content(); ?></p>
        
        </div>


        <div class="pt-5">
          <p>Categories:  <a href="#">Food</a>, <a href="#">Travel</a>  Tags: <a href="#">#manila</a>, <a href="#">#asia</a></p>
        </div>



<?php } ?>

<div class="pt-5">
  <h3 class="mb-5">6 Comments</h3>

<?php


//Get only the approved comments
$args = array(
    'status' => 'approve',
    'short_ping'  => true,
     'avatar_size' => 74
);

// The comment Query
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query( $args );

// Comment Loop
if ( $comments ) {
 foreach ( $comments as $comment ) {

   //print_r($comment);
   ?>


   <ul class="comment-list">
     <li class="comment">
       <div class="vcard">
        <?php echo get_avatar( get_the_author_meta( $comment->comment_post_ID ) , 50 ); ?>
       </div>
       <div class="comment-body">
         <h3><?php echo $comment->comment_author; ?></h3>
         <div class="meta"><?php echo $comment->comment_date; ?></div>
        <?php echo '<p>' . $comment->comment_content . '</p>'; ?>
         <p><a href="#" class="reply rounded">Reply</a></p>
       </div>
     </li>

   </ul>

 <?php }
}   else {
   echo 'No comments found.';
 } ?>
          <!-- END comment-list -->

          <div class="comment-form-wrap pt-5">

        <?php    $comments_args = array(
                    // Change the title of send button
                    'label_submit' => __( 'Send', 'textdomain' ),

                    'class_submit' => 'btn',
                    // Change the title of the reply section
                    'title_reply' => __( 'Leave a comment', 'textdomain' ),
                    // Remove "Text or HTML to be displayed after the set of comment fields".
                    'comment_notes_after' => '',
                    // Redefine your own textarea (the comment body).
                    'comment_field' => '<p class="comment-form-comment p-4 bg-light"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br />
                    <textarea class="form-control" id="comment" name="comment" aria-required="true"></textarea></p>',

                    'fields' => array(

                       'author' => '<div class="p-4 bg-light mb-3" style="display:flex;"> <p class="comment-form-author"><label for="author">Name <span class="required">*</span></label>
                        <input id="author" name="author" type="text" value="" size="20" maxlength="245" required="required"></p>',

                        'email' => '<p class="comment-form-email"><label for="email">Email <span class="required">*</span></label>
                         <input id="email" name="email" type="text" value="" size="20" maxlength="100" aria-describedby="email-notes" required="required"></p>',

                         'url' => '<p class="comment-form-url">
                         <label for="url">Website</label> <input id="url" name="url" type="text" value="" size="20" maxlength="200"></p></div>',

                    ),
            );
            comment_form( $comments_args ); ?>

          </div>
        </div>

      </div>

      <!-- END main-content -->

      <div class="col-md-12 col-lg-4 sidebar">
        <!--
        <div class="sidebar-box search-form-wrap">
          <form action="#" class="search-form">
            <div class="form-group">
              <span class="icon fa fa-search"></span>
              <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
            </div>
          </form>
        </div> -->
        <!-- END sidebar-box -->
        <!--
        <div class="sidebar-box">
          <div class="bio text-center">
            <img src="images/person_2.jpg" alt="Image Placeholder" class="img-fluid mb-5">
            <div class="bio-body">
              <h2>Craig David</h2>
              <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p>
              <p><a href="#" class="btn btn-primary btn-sm rounded px-4 py-2">Read my bio</a></p>
              <p class="social">
                <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
              </p>
            </div>
          </div>
        </div> -->
        <!-- END sidebar-box -->
        <div class="sidebar-box">
          <h3 class="heading">Popular Posts</h3>
          <div class="post-entry-sidebar">
            <ul>

 <?php $PopArgs = new WP_Query(array(

'posts_per_page' => 3,
'post_type' => 'post'


 ));


     while($PopArgs->have_posts()) {

       $PopArgs->the_post(); ?>


              <li><div class="bio">
                <a href="<?php the_permalink(); ?>">
                  <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Image placeholder" class="img-fluid mr-4">
                  <div class="text">
                    <h4><?php the_title(); ?></h4>
                    <div class="post-meta">
                      <span class="mr-2"><?php echo get_the_date('F j, Y'); ?></span>
                    </div>
                  </div>
                </a></div>
              </li>

 <?php } ?>

            </ul>
          </div>
        </div>
        <!-- END sidebar-box -->


        <!-- END sidebar-box -->


      </div>
      <!-- END sidebar -->

    </div>
  </div>
</section>




<?php get_footer(); ?>
