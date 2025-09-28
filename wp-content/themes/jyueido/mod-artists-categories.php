<?php global $site_url; ?>

<div id="artists-wrap">
	<ul>
		<?php
		$placeholder = $site_url . '/img/common/placeholder_900x900.png';
		$thumb_size = 'thumbnail_320x320';
		//タームの取得
		$t = 'artist';
		$args = array(
			'get' => 'all',
			'meta_key' => 'sort_num',
			'orderby' => (int)'meta_value_num',
			'order' => 'asc'
		);
		$terms = get_terms($t, $args);
		//タームを出力
		if (!empty($terms) && !is_wp_error($terms)) : ?>
			<?php foreach ($terms as $term) : ?>
				<li>
					<a href="<?php echo get_term_link($term->slug, $t); ?>" class="">
						<img src="<?php echo $placeholder; ?>" data-src="<? echo get_field('tax_image_url', $t . '_' . $term->term_id)["sizes"][$thumb_size]; ?>" class="img-responsive img-hover lazyload" alt="">
						<h3><? echo $term->name; ?></h3>
						<p><? echo $term->description; ?></p>
						<!-- 投稿数：<?= $term->count ?> -->
					</a>
				</li>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>
</div>