<?php

/**
 * custom title for title-tag.
 */
function _archive_sample_wp_title()
{
  $post_type_obj = get_queried_object();
  return $post_type_obj->name . 'での';
}
add_filter('wp_title', '_archive_sample_wp_title');

get_header(); ?>
<?php get_template_part('mod-page-title'); ?>

<?php
$term = get_queried_object();   // タームオブジェクトを取得
$term_slug   = $term->slug;     // タームスラッグ
$term_name   = $term->name;     // ターム名
$term_id     = $term->term_id;  // タームID
$tax         = $term->taxonomy; // タクソノミー名
$tax_slug_id = $tax . '_' . $term_id; // 'タクソノミースラッグ_タームID' (ACF get_field()用)
$areatitle_img = get_field('tax_image_url_areatitle', $tax_slug_id);
?>
<p class="title-5 g-b-0"><img src="<?php echo $areatitle_img; ?>" alt=""></p>


<?php
$placeholder = $site_url . '/img/common/placeholder_900x600.png';
$thumb_size = 'large';
$eyecatch = get_field('tax_image_url', $tax_slug_id);
?>
<div class="bg-tx-4 border-b-1 border-b-c-000-010 g-b add_mb0">
  <div class="container">

    <div class="box add_mb20">
      <h1 class="title-1 add_mtb20"><?php echo $term_name; ?>での骨董品買取は寿永堂へおまかせください。</h1>
      <?php if ($eyecatch) : ?>
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-lg-5 g-b-20">
            <img src="<?php echo $placeholder; ?>" data-src="<? echo $eyecatch["sizes"][$thumb_size]; ?>" class="img-responsive lazyload" alt="">
          </div>
          <div class="col-xs-12 col-sm-6 col-lg-7">
            <?php echo get_field('area_desc', $tax_slug_id); ?>
          </div>
        </div>
      <?php else : ?>
        <div class="text-lg-center">
          <?php echo get_field('area_desc', $tax_slug_id); ?>
        </div>
      <?php endif; ?>
    </div>

  </div>
</div>

<?php the_field('original_txt'); ?>
<div class="container">
  <div class="bg-gs-15 p-20 p-xs-0 g-b">

    <div class="box-a">
      <h3 class="box-a-title"><?php echo $term_name; ?>の買取対応エリア</h3>
      <div class="box-a-contents">
        <?php echo get_field('area_service', $tax_slug_id); ?>
        <p><?php echo $term_name; ?>は上記記載地域以外も、<b>全域対応可能</b>です。<br>
          ※内容によっては、お伺いできない場合もございますが、まずは一度お気軽にご相談ください。</p>
      </div>
    </div>

    <div class="box-a">
      <h3 class="box-a-title"><?php echo $term_name; ?>の主要買取品目</h3>
      <div class="box-a-contents">
        <?php echo get_field('area_item', $tax_slug_id); ?>
        <p>※骨董品・美術品なのかどうかもわからないといった場合でも、まずは一度お電話でお問い合わせください。</p>
      </div>
    </div>

<?php if( get_field('area_station') ):?>
    <div class="box-a">
      <!-- <h3 class="box-a-title"><?php echo $term_name; ?>の駅周辺への出張も可能です</h3> -->
      <div class="box-a-contents">
        <?php echo get_field('area_station', $tax_slug_id); ?>
        <p></p>
      </div>
    </div>
<?php endif; ?>

  </div>
</div>
<div class="container p-xs-h-0 g-b">
  <div class="bg-tx-3 p-15 text-center">
    <div class="bg-0 p-v-2p p-h-5p p-xs-h-7p">
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <p class="title-3"><b class="text-2 fz-18">お電話でのご相談・鑑定依頼</b></p>
          <p class="fz-12">電話買取簡易査定が可能ですので、まずはご相談ください。</p>
          <p><a href="tel:0120-13-6767"><img src="<?php echo $site_url; ?>/img/common/tel-000.svg" class="img-responsive" alt="0120-13-6767"></a></p>
        </div>
        <div class="col-xs-12 col-sm-6">
          <p class="title-3"><b class="text-2 fz-18">鑑定依頼メールフォーム</b></p>
          <p class="fz-12">出張鑑定や持ち込み鑑定のご依頼はメールフォームからも<br class="hidden-xs">受け付けております。お気軽にご連絡ください。</p>
          <p><a href="/contact/" class="btn-1 btn-arrow-circle-1 box-shadow-5 w-100p max-w-450 fw-500">メールフォームはこちら</a></p>
        </div>
      </div>
    </div>
  </div>
</div>




<!-- <div class="container g-b">

<h3 class="title-1">出張実績</h3>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="row d-f fxw-w">
<div class="col-xs-12 col-sm-6">
<div class="border-t-1 border-w-2 border-c-2 p-t-20">
<p class="g-b-0"><a href="<?php the_permalink(); ?>" class="fz-16 fw-b"><?php the_title(); ?></a></p>
<div class="blog-date fz-12 text-gs-9"><?php the_date('Y/m/d'); ?></div>
<?php echo mb_substr(strip_tags(get_the_content()), 0, 104); ?>…
[ <a href="<?php the_permalink(); ?>">続きを読む</a> ]
</div>
</div>
</div>

<?php endwhile; ?>
<?php else : ?>
<p class="box-text-1 w-100p">現在、投稿されている記事はございません。</p>
<?php endif; ?>

</div> -->
<script>
  document.querySelector('.home-reasons-1').classList.add('add_mtb0');
  document.querySelector('.btn-container-1.g-t-0').classList.add('add_mb0');
  document.querySelector('h2.title-1').classList.add('add_mtb20');
</script>
<?php get_footer(); ?>