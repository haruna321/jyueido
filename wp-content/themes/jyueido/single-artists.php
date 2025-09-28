<?php get_header(); ?>
<div id="single-artists-page">
<div class="border-b-1 text-center">
	<?php
	$terms = get_the_terms($post->ID, 'artist');
	if ($terms && !is_wp_error($terms)) :
		$terms_array = array();
		foreach ($terms as $term) {
			$terms_array[] = $term->name;
		}
		$artist_categories = join(", ", $terms_array);
	?>
		<!-- <b class="fz-16"><?php echo $artist_categories; ?></b> -->
	<?php endif; ?>
</div>



	<?php while (have_posts()) : the_post(); ?>
		<div class="title-main-container g-b-0">
        <h1 class="title-main-text"><?php the_title(); ?><br>
				<small class="fz-14"><?php the_field('artists_kana'); ?></small>
			</h1>
    </div>
		<div class="p-20 p-xs-0 g-b add_mt0 container">

			<?php for ($i = 0; $i < 5; $i++) : ?>
				<?php
				$group = get_field('artists_block_' . ($i + 1));
				if (!empty($group['title']) || !empty($group['contents'])) : ?>
					<?php if ($group['image']) : ?>
						<div class="box-a box-a-has-image">
							<?php if (!empty($group['title'])) : ?>
								<h3 class="box-a-title"><?php echo $group['title']; ?></h3>
							<?php endif; ?>
							<div class="box-a-image">
								<img src="<?php echo $site_url; ?>/img/common/placeholder_900x600.png" data-src="<?php echo $group['image']['sizes']['large']; ?>" class="img-responsive g-xs-b-30 lazyload" alt="">
							</div>
							<?php if (!empty($group['contents'])) : ?>
								<div class="box-a-contents">
									<?php echo $group['contents']; ?>
								</div>
							<?php endif; ?>
						</div>

					<?php else : ?>
						<div class="box-a">
							<!--<?php if (!empty($group['title'])) : ?>
								<h3 class="box-a-title"><?php echo $group['title']; ?></h3>-->
						<?php endif; ?>
						<?php if (!empty($group['contents'])) : ?>
							<div class="box-a-contents">
								<?php echo $group['contents']; ?>
							</div>
						<?php endif; ?>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			<?php endfor; ?>
		</div>
	<?php endwhile; ?>
	<div class="tac pc_none btn-cv">
		<a href="/contact/#form_box" class="btn-2-saturate btn-arrow-circle-1">無料査定のご依頼はこちら</a>
	</div>
	</div>
<?php get_footer(); ?>
