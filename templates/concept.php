<?php /* Template Name: Concept */ ?>
<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="concept">
    <?php the_content(); ?>
</div>

<?php endwhile; ?>
<?php get_footer(); ?>