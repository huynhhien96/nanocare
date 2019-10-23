<?php /* Template Name: Single Blog  */ ?>
<?php get_header(); ?>
<div class="blog__content">
  <?php if(have_posts()): the_post();
        $title = get_the_title();
        $permalink = get_the_permalink();
	    $stickyPostRelated = get_field('blog_related_blogs');
    ?>
  <div class="blog__content--text row w-1440 justify-content-end">
    <div class="blog__content--text-left col-md-5 col-xs-12">
      <h1 class="c-title"><?php echo $title ?></h1>
      <?php nano_render_partial('partials/nav-seemore', array('permalink' => $permalink, 'title' => $title)) ?>
      <?php if(has_excerpt()): ?>
      <div class="blog__content--text-left-detail text-uppercase"><?php the_excerpt() ?></div>
      <?php endif; ?>
    </div>
    <div class="blog__content--img-right col-md-5 col-xs-12">
      <?php the_post_thumbnail('thumbnail') ?>
    </div>
  </div>
    <div class="blog__content--container w-880">
    <?php the_content() ?>
  </div>
  <div class="form__comment">
    <div class="w-700">
      <div class="fb-comments" data-href="<?php echo $permalink ?>" data-numposts="5" data-width="100%"></div>
    </div>
  </div>

  <?php if(!empty($stickyPostRelated)){ ?>
  <h2 class="c-title">Bài viết khác</h2>
  <div class="blog__single row justify-content-between">
    <?php foreach ($stickyPostRelated as $related){
      nano_render_partial('partials/content-single', array('blog' => $related, 'cls' => ''));
    } ?>
  </div>
  <?php } ?>
  <?php endif; ?>
</div>
<?php get_footer(); ?>