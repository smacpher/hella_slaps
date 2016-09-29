<?php

get_header(); ?>

<div class="site-content clearfix">

    <div class="main-column">
    <?php if (have_posts()){

    //retrieve all posts
    while (have_posts()) {
        the_post(); ?>

    <article class="post">

        <div class="post-header">
            <!--  TITLE  -->
            <h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>

            <!-- CATEGORY -->
            <h3 class="post-category"><?php the_category(); ?></h3>
            <!-- DATE -->

            <h2 class="post-info">Slapped on <?php the_time('F jS, Y'); ?> at <?php the_time('g:i a'); ?> by <a class="author-tag" href="<?php get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></h2>
        </div>

            <!--  CONTENT  --> 
            <p><?php the_content(); ?></p>

    </article>


        <?php
            };
        } else {
            echo '<p>no posts yet</p>';
        };?>
      <div class="posts-link"><?php posts_nav_link(' | ','&laquo; Fresher Slaps','Older Slaps &raquo;'); ?></div>
    </div>

    <div class="side-bar">
        <?php dynamic_sidebar('sidebar1'); ?>
    </div>

</div>



<?php 
get_footer();
?>