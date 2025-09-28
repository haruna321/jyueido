<?php get_header(); ?>

<?php get_template_part( 'mod-page-title' ); ?>


<?php // 出張対応エリア エリア（タクソノミー）表示
if ( is_singular( 'areas' ) ) : ?>
<div class="border-b-1 p-10 text-center">
<?php
$terms = get_the_terms( $post->ID, 'area' );
if ( $terms && ! is_wp_error( $terms ) ) : 
	$terms_array = array();
	foreach ( $terms as $term ) {
		$terms_array[] = $term->name;
	}
	$area_categories = join( ", ", $terms_array );
?>
<b class="fz-16"><?php echo $area_categories; ?></b>
<?php endif; ?></div>
<?php endif; ?>


<div class="container g-t">

<div class="row">
<div class="col-xs-12 col-md-9 g-b-30">

<?php while ( have_posts() ) : the_post(); ?>
<h2 class="title-1 text-left g-t-0 g-b-30"><?php the_title(); ?><br>
<small class="blog-date fz-14"><?php the_date('Y/m/d'); ?></small></h2>

<div class="blog-entry-body">
<?php if ( has_post_thumbnail() ) : ?>
<div class="blog-entry-eyecatch"><?php the_post_thumbnail('large'); ?></div>
<?php endif; ?>

<?php the_content(); ?>

</div>
<?php endwhile; ?>

<?php // スタッフブログ 定形コメント
if ( is_singular( 'staffblog' ) ) : ?>
<div class="box bg-tx-5 p-3p p-xs-5p">
私ども寿永堂は、古美術・骨董品を取り扱っており、
全国各地、無料出張鑑定、買取させていただいております。<br>

古美術・骨董品のご処分などをお考えの際は、どうぞお気軽にお声掛けください。
<br>
兵庫、大阪、京都、奈良、滋賀、和歌山などの近畿地方を中心に全国に無料出張いたします。
</div>
<?php endif; ?>

</div>


<?php get_template_part( 'mod-list-archives' ); ?>


</div>

</div>

<?php get_footer(); ?>
