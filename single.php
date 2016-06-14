<?php get_header(); ?>
<div class="full-width desktop">
  <?php echo get_the_post_thumbnail(11,'full'); ?>
</div>

<div class="offset-cont blog">
  <div class="title">Blog</div>
  <div class="sidebar">
    <div class="categories">
      <?php wp_list_categories( array('hide_empty' => 0, 'child_of' => 65) ); ?>
    </div>
    <div class="instagram">
      <h6>Instagram</h6>
      <div id="instafeed"></div>
    </div>
  </div>
  <div class="main-cont pinterest">
    <div class="single blog-post">
      <?php while ( have_posts() ) : the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <h5><?php the_date(); ?></h5>
        <?php the_content(); ?>
        <hr class="desktop">
         <div class="view-comments mobile">
        	<?php $post_id = get_the_id();
	        $args = array( 'post_id' => $post_id, 'count' => true); ?>
        	<h3><?php echo get_comments($args); ?> Comments</h3>
        </div>
        <h3 class="add-a-comment mobile">Add a Comment</h3>
        <div class="form-wrapper comment">
          <?php
          $commenter = wp_get_current_commenter();
          $req = get_option( 'require_name_email' );
          $aria_req = ( $req ? " aria-required='true'" : '' );
          $fields =  array(
              'author' =>
                '<p class="comment-form-author"><label for="author">' . __( 'Full Name', 'domainreference' ) . '</label>
                <input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                '" size="30"' . $aria_req . ' /></p>',

              'email' =>
                '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label>
                <input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' /></p>');


          $args = array('fields' => $fields, 'label_submit' => 'Submit', 'comment_notes_after' => '', 'comment_notes_before' => '', 'title_reply' => '' );

          comment_form($args); ?>
        </div>
       
        <div class="comments">
          <?php
	      $post_id = get_the_id();
	      $comments = get_comments(array('post_id' => $post_id));
          foreach($comments as $comment) : ?>
          <div class="comment">
            <h2><?php echo($comment->comment_author); ?> said...</h2>
            <h5><?php echo get_comment_date( 'm/d/Y', $comment ); ?></h5>
            <p><?php echo($comment->comment_content); ?></p>
          </div>
          <?php endforeach;?>
        </div>
      <?php endwhile; wp_reset_query(); ?>
    </div>  
  </div>
</div>
<?php get_footer(); ?>
