<?php get_header(); ?>

<?php get_template_part( 'mod-page-title' ); ?>


<div class="container content-wrap">

<div class="row">
<div class="col-xs-12 col-md-9 g-b-30">

<?php while ( have_posts() ) : the_post(); ?>
<div class="blog-entry-heading">
<h2 class="blog-entry-title">
<small class="blog-date"><?php the_date('Y-m-d'); ?></small><br>
<?php the_title(); ?></h2>
</div>

<div class="blog-entry-body">

<div class="blog-entry-eyecatch"><?php the_post_thumbnail('large'); ?></div>
<?php the_content(); ?>

</div>
<?php endwhile; ?>

</div>

<div class="col-xs-12 col-md-3 blog-sidebar">
<?php
// dynamic_sidebar();
?>
<?php get_template_part( 'mod-list-archives' ); ?>
</div>

</div>

</div>

<?php get_footer(); ?>
