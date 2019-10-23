<?php /* Template Name: Page */ ?>
<?php get_header() ?>
<?php
while ( have_posts() ) :the_post(); ?>
    <div class="container">
	    <h1 class="line-title page-title"><?php the_title() ?></h1>
	    <div class="page-content"><?php the_content(); ?></div>
    </div>
<?php endwhile;?>
<?php get_footer() ?>
