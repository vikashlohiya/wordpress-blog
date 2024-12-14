<?php
/**
 * Template Name:Single Blog
 * Template Post Type: post
 */

?>


<?php get_header(); ?>

<main class="main">
   
    <div class="container">

        <div class="row">
    <?php
    if (have_posts()) {
        while (have_posts()) { the_post();
            ?>
            <div class="headings">
            <div class="text-blue fw-bold fs-3 pb-5 text-center"><?php the_title(); ?></div>
            </div>
            
             <div class="post-featured-image text-center">
                <?php 
                if (has_post_thumbnail()) { ?>
                   <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" >
                <?php }
                ?>
            </div>
            
           <!-- Display the Content -->
            <div class="post-content">
                <?php the_content(); ?>
            </div>



            
    <?php }} ?>
           
    <div class="comment-section">
        <?php
        // Check if comments are open or there are comments to display
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
    </div>

     </div>
    </div>



</main>

<?php get_footer(); ?>

