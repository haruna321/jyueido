<?php get_header(); ?>

<?php get_template_part( 'mod-page-title' ); ?>
<div class="bg-tx-3" id="kaitori">
  <h3>骨董品買取品目・実績一覧</h3>
<div class="container p-t">

 <?php get_template_part( 'mod-items-categories' ); ?>

<!-- <div class="row box-items-container">
<?php
$slugs = array(
  'kabin', 'netsuke', 'old-coin', 'stamp-material', 'kakejiku', 
  'document', 'buddhism', 'antique', 'glass', 'tableware', 
  'calligraphy-tools', 'earthenware', 'kougei', 'korea', 'chinese', 
  'gold', 'jewelry', 'doll', 'armor', 'painting', 'tea', 
  'musical-instrument'
); // ここに表示したいスラッグを指定

$args = array(
	'posts_per_page' => -1,
	'post_type' => 'items',
	'meta_key' => 'sort_num',
	'orderby' => 'post__in', // スラッグの順に表示
	'order' => 'asc',
  'post_name__in' => $slugs, // スラッグでフィルタリング
  'post__in' => array_map(function($slug) {
    return get_page_by_path($slug, OBJECT, 'items')->ID;
  }, $slugs)
);

$placeholder = $site_url . '/img/common/placeholder_900x600.png';
$thumb_size = 'large';

$query = new WP_Query( $args );
if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
<div class="col-xs-6 col-sm-4 col-lg-3">
<a href="<?php the_permalink(); ?>" class="box-item link-color-font">
<img src="<?php echo $placeholder; ?>" data-src="<?php echo get_field('item_image')["sizes"][$thumb_size]; ?>" class="img-responsive img-hover lazyload" alt="">
<span class="item-title"><b><?php the_title(); ?></b></span>
<span class="item-desc"><?php the_field('desc'); ?></span>
</a>
</div>

<?php endwhile; ?>
<?php else : // 記事が無い場合 ?>
<div class="separator-1">
<div class="box-7 p-20 text-center">記事はまだありません。</div>
</div>
<?php endif;
wp_reset_postdata(); // クエリのリセット ?>

</div> -->
</div>


<?php get_footer(); ?>
