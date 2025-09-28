<?php global $site_url; ?>

<div class="row box-items-container">

<?php $args = array(
	'posts_per_page' => -1,
	'post_type' => 'items',
	'meta_key' => 'sort_num',
	'orderby' => 'meta_value',
	'order' => 'asc'
);

$placeholder = $site_url . '/img/common/placeholder_900x600.png';
$thumb_size = 'large';

$posts = get_posts( $args );
if( $posts ) : foreach( $posts as $post) : setup_postdata( $post ); ?>
<div class="col-xs-6 col-sm-4 col-lg-3">
<a href="<?php the_permalink(); ?>" class="box-item link-color-font">
<img src="<?php echo $placeholder; ?>" data-src="<? echo get_field('item_image')["sizes"][$thumb_size]; ?>" class="img-responsive img-hover lazyload" alt="">
<span class="item-title"><b><?php the_title(); ?></b></span>
<span class="item-desc"><?php the_field('desc'); ?></span>
</a>
</div>

<?php endforeach; ?>
<?php else : //記事が無い場合 ?>
<div class="separator-1">
<div class="box-7 p-20 text-center">記事はまだありません。</div>
</div>
<?php endif;
wp_reset_postdata(); //クエリのリセット ?>

<script>
$('.box-item').matchHeight();
</script>
</div>
