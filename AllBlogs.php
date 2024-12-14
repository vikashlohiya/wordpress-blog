<?php
/* Template Name: Blogs */
?>


<?php get_header(); ?>

<main class="main">
    <div class="text-center py-5"><h1>Blogs</h1></div>
    <div class="container">

        <?php
           $posts_per_page = 10;
           $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        
        $args  = array(
            'post_type' => 'post',
            'posts_per_page' => $posts_per_page,
            'paged'          => $paged,  // Current page number for pagination

        );

        $query = new WP_Query($args);
        ?>
        <div class="row">
        <?php
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                ?>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
        <?php if (has_post_thumbnail()) { ?>
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
                            <?php } else { ?>

                                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Blog 1">
        <?php } ?>
                            <div class="card-body">
                                <h5 class="card-title"><?php the_title();  ?></h5>
                                <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 20, '...');   ?></p>
                                <a href="<?php  the_permalink(); ?>" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>


    <?php }
}  
  echo '<div class="pagination">';
        echo paginate_links(array(
            'total' => $query->max_num_pages,  // Total number of pages
            'current' => $paged,               // Current page
            'prev_text' => '« Prev',           // Text for previous page
            'next_text' => 'Next »',           // Text for next page
        ));

wp_reset_postdata();
?>
     <style>
    .pagination a, .pagination span{ padding: 10px; border: 2px solid;}
    </style>

        </div>
    </div>



</main>

<?php get_footer(); ?>

