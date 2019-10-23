<?php /* Template Name: About Us */ ?>
<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="about">
            <?php the_content(); ?>
        </div>
    </div>
<?php endwhile; ?>
<?php get_footer(); ?>