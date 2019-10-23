<?php /* Template Name: Contact */ ?>
<?php get_header(); ?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGRmetX4WY5a7m1YvqNhix_o6oL6LX0Ss"></script>
<?php while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="contact___content">
            <div class="container">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<div class="contact__mapping">
    <div class="container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.3365755738773!2d106.74579456479353!3d10.785512992315306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317525dfec79e4e1%3A0x77b53e09e96c8eee!2zTm92YWxhbmQgVGhlIFN1biBBdmVudWUsIDI4IMSQxrDhu51uZyBNYWkgQ2jDrSBUaOG7jSwgQW4gUGjDuiwgUXXhuq1uIDIsIEjhu5MgQ2jDrSBNaW5oLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1555265998578!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>
<?php get_footer(); ?>