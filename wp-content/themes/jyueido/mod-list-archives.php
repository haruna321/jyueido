<?php $posttype = get_post_type(); ?>

<?php if ( is_post_type_archive( 'artists' ) || is_singular( 'artists' ) ) : ?>

<?php else : ?>

<div class="col-xs-12 col-md-3 blog-sidebar" id="blog-sidebar">

<?php if ( is_singular( 'areas' ) ) : ?>
<?php
//タームの取得
$t = 'area';
$args = array(
	'get' => 'all',
	'meta_key' => 'sort_num',
	'orderby' => (int)'meta_value_num',
	'order' => 'asc'
);
$terms = get_terms( $t, $args );
//タームを出力
if ( !empty($terms) && !is_wp_error($terms) ) : ?>
<div class="blog-archives">
<h3 class="blog-archives-title">出張対応エリア</h3>
<ul class="blog-archives-list">
<?php foreach ( $terms as $term ) : ?>
<li><a href="<?php echo get_term_link( $term->slug, $t ); ?>"><? echo $term->name; ?></a></li>
<?php endforeach; ?>
</ul>
</div>
<?php endif; ?>
<?php endif; ?>

<div class="blog-archives">
<h3 class="blog-archives-title">アーカイブ</h3>
<ul class="blog-archives-list">
<?php wp_get_archives('type=monthly&post_type=' . $posttype); ?>
</ul>
</div>

</div>

<?php endif; ?>

