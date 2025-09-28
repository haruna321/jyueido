<div class="row g-xs-h--15">
	<?php
	//タームの取得
	$t = 'area';
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
			<div class="col-xs-6 col-sm-4 g-b-30 p-xs-h-10">
				<a href="<?php echo get_term_link($term->slug, $t); ?>" class="btn-7-extended btn-arrow-circle-1 min-w-init max-w-100p"><? echo $term->name; ?></a>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>