<?php get_header(); ?>

<?php get_template_part('mod-page-title'); ?>


<h2 class="title-5">
	<?php
	$term_object = get_queried_object(); // タームオブジェクトを取得
	$term_slug   = $term_object->slug;   // タームスラッグ
	$term_name   = $term_object->name;   // ターム名
	?>
	<span><?php echo $term_name; ?></span>
</h2>

<div class="container">

	<div class="row d-f fxw-w text-xs-center">

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<div class="col-xs-6 col-sm-4 g-b-50">
					<a href="<?php the_permalink(); ?>" class="link-box-1 row d-f fxw-w ai-c">
						<span class="col-xs-12 col-sm-4 col-lg-3 p-sm-r-0 p-md-r-0 p-lg-r-0">
							<?php if (get_field('artists_thumbnail')) :
								$thumbnail = get_field('artists_thumbnail');
							?>
								<img src="<?php echo $site_url; ?>/img/common/placeholder_900x900.png" data-src="<?php echo $thumbnail['sizes']['thumbnail_320x320']; ?>" class="img-responsive img-hover g-xs-b-10 lazyload" width="160" height="160" alt="">
							<?php else : ?>
								<img src="https://placehold.it/160x160" class="img-responsive img-hover g-xs-b-10" alt="">
							<?php endif; ?>
						</span>
						<span class="col-xs-12 col-sm-8 col-lg-9"><?php the_title(); ?></span></a>
				</div>
			<?php endwhile; ?>
		<?php else : ?>
			<p class="box-text-1 w-100p">現在、投稿されている記事はございません。</p>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>