<?php get_header(); ?>
<div class="achievements-page">
  <h1><?php single_term_title(); ?></h1>
  <ul>
    <?php
    $term_object = get_queried_object(); // タームオブジェクトを取得
	$term_slug   = $term_object->slug; // タームスラッグ
	$args = array(
	'post_type' => 'achievements', // カスタム投稿タイプ名を指定
	'taxonomy' => 'achievements-area', // カスタムタクソノミー名を指定
	'term' => $term_slug,
  'paged' => get_query_var('paged') ? get_query_var('paged') : 1, // ページネーションの追加
	'posts_per_page' => 15 // -1にすると全件表示
	);
	$custom_query = new WP_Query( $args ); ?> <ul>
      <?php
		/* Start the Loop */
		if ( $custom_query->have_posts() ) :
		while ( $custom_query->have_posts() ) :
		$custom_query->the_post();
	?>
      <li>
        <a href="<?php the_permalink(); ?>">
          <img src="<?php echo CFS()->get('image'); ?>" alt="">
          <div class="achievements-right">
            <p class="achievements-item"><span class="green">買取品名：</span><?php echo CFS()->get('item'); ?></p>
            <p class="achievements-area"><span class="green">エリア：</span><?php echo CFS()->get('area'); ?></p>
            <p class="achievements-price"><span class="green">買取額：</span><?php echo CFS()->get('price'); ?></p>
            <!-- <p class="achievements-text">
            <?php echo CFS()->get('textarea'); ?>
          </p> -->
          </div>
        </a>
      </li>
      <?php endwhile; ?>
    </ul>
    <?php endif; ?>
    <div class="pagination">
      <?php
    echo paginate_links( array(
      'total' => $custom_query->max_num_pages,
      'prev_text' => __('＜'),
      'next_text' => __('＞'),
    ) );
  ?>
    </div>
</div>
<?php get_footer(); ?>