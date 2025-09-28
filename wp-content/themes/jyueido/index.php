<?php get_header(); ?>

<?php get_template_part( 'mod-page-title' ); ?>


<div class="container content-wrap">

<?php if (is_date()) : ?>
<div class="text-3 text-center fz-21"><b><?php echo get_archive_title(); ?></b></div>
<?php endif; ?>


<div class="row g-b g-xs-b-0">

<div class="col-xs-12 col-md-9">

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

<div class="blog-archive-container clearfix">

<?php /*if ( has_post_thumbnail() ) {
	$bgurl = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' )[0];
} else {
	$bgurl = '/img/common/dummy_1.png';
}*/ ?>
<!-- <div class="blog-entry-thumbnail">
<a href="<?php the_permalink(); ?>" style="background-image: url(<?php echo $bgurl; ?>);"></a>
</div> -->

<div class="blog-entry-headings">
<h2 class="blog-entry-title">
<small class="blog-date"><?php the_time('Y/m/d'); ?></small><br>
<a href="<?php the_permalink(); ?>" class="link-color-font"><b><?php the_title(); ?></b></a>
</h2>
<?php echo mb_substr( strip_tags(get_the_content()), 0, 210 ); ?>…
[ <a href="<?php the_permalink(); ?>">続きを読む</a> ]
<!-- <div class="blog-entry-category">カテゴリ：<?php the_category(', '); ?></div> -->
</div>

</div>

<?php endwhile; ?>
<?php else : ?>
<p>現在、投稿されている記事はございません。</p>
<?php endif; ?>


<?php the_posts_pagination(array(
	// 'show_all' => true,
	'mid_size' => 2
)); ?>

</div>


<?php get_template_part( 'mod-list-archives' ); ?>

</div><!-- row -->

</div><!-- container -->

<?php get_footer(); ?>
