<?php get_header(); ?>

<?php get_template_part( 'mod-page-title' ); ?>


<?php while ( have_posts() ) : the_post(); ?>
<div class="bg-gs-3 pos-r">
<div class="bg-item-main"></div>
<div class="container">
<div class="row g-v text-gs-14">
<div class="col-xs-12 col-sm-6 col-sm-push-6 col-lg-5 col-lg-push-7 g-b-20">
<img src="<?php echo $site_url; ?>/img/common/placeholder_900x600.png" data-src="<?php echo get_field('item_image')['sizes']['large']; ?>" class="img-responsive lazyload border-1 border-w-4 border-gs-15 box-shadow-4" alt="">
</div>
<div class="col-xs-12 col-sm-6 col-sm-pull-6 col-lg-7 col-lg-pull-5 g-lg-t--30">
<h2 class="text-item-catchcopy"><span class="text-4 fz-150p"><?php the_title(); ?></span>なら<br>
<span class="text-4 fz-150p">寿永堂</span>にお任せください。<br>
本来の価値で<span class="text-4">高額</span>買取いたします。</h2>
<p><img src="<?php echo $site_url; ?>/img/common/placeholder_716x288.png" data-src="<?php echo $site_url; ?>/img/items/icons.png" class="img-responsive lazyload" alt="相談・鑑定・出張・査定 無料" width="543" height="117"></p>
</div>
</div>
</div>
</div>


<div class="bg-tx-3">
<div class="container">

<div class="box-text-1">
<h3 class="title-1"><span class="text-5 fz-50 fz-xs-32 g-r-3"><?php the_title(); ?></span>なら、<br class="visible-xs">”古美術 寿永堂”へ</h3>
<?php the_content(); ?>
</div>

</div>
</div>


<div class="container">

<div class="box">
<h3 class="title-1 g-b-30"><?php the_title(); ?>で”寿永堂”が選ばれる<span class="text-5 fz-50">3</span>つの理由</h3>
<div class="row">
<div class="col-xs-12 col-sm-4">
<div class="text-center">
<p><b class="fz-18">信頼</b></p>
<p><img src="<?php echo $site_url; ?>/img/common/placeholder_900x300.png" data-src="<?php echo $site_url; ?>/img/items/r_1.jpg" class="img-responsive lazyload" alt=""></p>
</div>
<p>ご縁があってご相談いただいたお客様の信頼を何より大切にしたいので、お客様がきちんとご納得された上で、買取をさせていただくことを第一に考えております。</p>
</div>
<div class="col-xs-12 col-sm-4">
<div class="text-center">
<p><b class="fz-18">実績</b></p>
<p><img src="<?php echo $site_url; ?>/img/common/placeholder_900x300.png" data-src="<?php echo $site_url; ?>/img/items/r_2.jpg" class="img-responsive lazyload" alt=""></p>
</div>
<p>寿永堂では、大阪、京都、兵庫、奈良、滋賀、和歌山の近畿全域はもちろん日本全国から年間1000件以上のご依頼を受け、50,000点以上のお品物を買受させていただいております。</p>
</div>
<div class="col-xs-12 col-sm-4">
<div class="text-center">
<p><b class="fz-18">高価買取</b></p>
<p><img src="<?php echo $site_url; ?>/img/common/placeholder_900x300.png" data-src="<?php echo $site_url; ?>/img/items/r_3.jpg" class="img-responsive lazyload" alt=""></p>
</div>
<p>お品物を一点一点丁寧に拝見し、ご説明・評価させていただいた上で、お値段のつけられるお品物に関しては、お客様にお喜びいただける査定額をご提示できるよう心がけています。</p>
</div>
</div>
</div>

</div>




<?php
// ACF のフィールド数を取得
$length_achievements = 0;
$length_review = 0;
$length_faq = 0;
$length_artists = 0;

$regex_achievements = '/^item_achievements_/';
$regex_review = '/^item_review_/';
$regex_faq = '/^item_faq_/';
$regex_artists = '/^item_artists_/';

$fields = get_fields();
$fields_array = [];

if ( $fields ) {
	foreach ( $fields as $name => $value ) {
		$fields_array[] = $name;
		// echo $name;
	}

	$length_achievements = count(preg_grep($regex_achievements, $fields_array));
	$length_review       = count(preg_grep($regex_review, $fields_array));
	$length_faq          = count(preg_grep($regex_faq, $fields_array));
	$length_artists      = count(preg_grep($regex_artists, $fields_array));
}
?>

<?php if ( $length_achievements > 0 && get_field('item_achievements_is_active') > 0 ) : ?>
<div class="container">
<div class="box">
<h3 class="title-1"><?php the_title(); ?>実績</h3>

<?php for ( $i = 1; $i < $length_achievements; $i++ ) : ?>
<?php
$group = get_field('item_achievements_' . ($i));
if ( $group['is_active'] ) : ?>
<div class="row separator-1">
<div class="col-xs-12 col-sm-5 col-lg-4 g-b-20">
	<?php if ( $group['image'] ) : ?>
		<img src="<?php echo $site_url; ?>/img/common/placeholder_900x600.png" data-src="<?php echo $group['image']['sizes']['large']; ?>" class="img-responsive lazyload <?php echo $i;?>" alt="">
	<?php else : ?>
		<div class="text-img-center bg-gs-15">
		<img src="<?php echo $site_url; ?>/img/common/placeholder_900x600.png" class="img-responsive" alt="">
		<div class="text w-50p op-3"><img src="<?php echo $site_url; ?>/img/common/logo_2.svg" alt=""></div>
		</div>
	<?php endif; ?>
</div>
<div class="col-xs-12 col-sm-7 col-lg-8">
<div class="g-b-20">
	<div class="pull-left pull-xs-none"><b class="fz-18"><?php echo $group['title']; ?></b></div>
	<div class="pull-right pull-xs-none"><b class="fz-16 text-2">買取額：<?php echo $group['price']; ?></b></div>
	<div class="clear"><small><?php echo $group['customer']; ?></small></div>
</div>
<?php echo $group['texts']; ?>
</div>
</div>
<?php endif; ?>
<?php endfor; ?>

</div>
</div>
<?php endif; ?>


<?php if ( $length_review > 0 && get_field('item_review_is_active') > 0 ) : ?>
<div class="bg-tx-2 g-t-1">
<div class="container">
<h2 class="title-1"><?php the_title(); ?>の依頼をされたお客様の声</h2>
<div class="row g-b-40">

<?php for ( $i = 0; $i < $length_review; $i++ ) : ?>
<?php
$group = get_field('item_review_' . ($i + 1));
if ( $group['is_active'] ) : ?>
<div class="col-xs-12 col-sm-6 g-b-50 g-xs-b-25">
<div class="bg-0 p-30 p-xs-20 height-achievements">
<p><b class="fz-18"><?php echo $group['title']; ?></b><br>
<small><?php echo $group['customer']; ?></small></p>
<?php echo $group['texts']; ?>
</div>
</div>
<?php endif; ?>
<?php endfor; ?>

</div>
</div>
</div>
<script>
$('.height-achievements').matchHeight();
</script>
<?php endif; ?>


<?php if ( $length_faq > 0 && get_field('item_faq_is_active') > 0 ) : ?>
<div class="container">
<h3 class="title-1">よくある質問</h3>
<div class="row d-f fxw-w g-b border-t-1 p-t-40">
<?php for ( $i = 0; $i < $length_faq; $i++ ) : ?>
<?php
$group = get_field('item_faq_' . ($i + 1));
if ( $group['is_active'] ) : ?>
<div class="col-xs-12 col-sm-6 border-b-1 p-b-40 g-b-40" id="q-1">
<p><b class="fz-16 text-2"><?php echo $group['question']; ?></b></p>
<?php echo $group['answer']; ?>
</div>
<?php endif; ?>
<?php endfor; ?>

</div>
</div>
<div class="bg-tx-1">
<div class="container">
<div class="text-center text-fff g-t-50">
<p><b class="text-serif fz-24 fz-xs-21 fw-400">鑑定のご相談、<br class="visible-xs">お待ちしております！</b></p>
<div class="row">
<div class="col-xs-12 col-sm-6 g-b">
<div class="border-b-1 border-b-c-fff-040">
<p class="title-3-fff"><b class="text-6 fz-16 fw-400">お電話でのご相談・鑑定依頼</b></p>
<p class="fz-12">電話買取簡易査定が可能ですので、まずはご相談ください。</p>
<p><a href="tel:0120-13-6767"><img src="<?php echo $site_url; ?>/img/common/tel-fff.svg" class="img-responsive" alt="0120-13-6767"></a></p>
</div>
</div>
<div class="col-xs-12 col-sm-6 g-b">
<div class="border-b-1 border-b-c-fff-040">
<p class="title-3-fff"><b class="text-6 fz-16 fw-400">鑑定依頼メールフォーム</b></p>
<p class="fz-12">出張鑑定や持ち込み鑑定のご依頼はメールフォームからも<br class="hidden-xs">受け付けております。お気軽にご連絡ください。</p>
<p><a href="<?php echo $site_url; ?>/contact/" class="btn-1 btn-arrow-circle-1 box-shadow-5 w-100p max-w-450 fw-500">メールフォームはこちら</a></p>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="border-b-1">
<div class="container">
<h2 class="title-1"><?php the_title(); ?>までの流れ</h2>
<div class="row text-center">
<div class="col-xs-12 col-sm-3 g-b-30">
<p><img src="<?php echo $site_url; ?>/img/common/placeholder_900x900.png" data-src="<?php echo $site_url; ?>/img/home/f_1.jpg" class="img-responsive img-circle lazyload" alt="" width="222" height="222"></p>
<p class="g-xs-b-0"><b class="fz-18">お問い合わせ</b></p>
<p>「お電話」または「<a href="<?php echo $site_url; ?>/contact/">お問い合わせフォーム</a>」よりご連絡ください。</p>
</div>
<div class="col-xs-12 col-sm-3 g-b-30">
<p class="icon-arrow-double-1"><img src="<?php echo $site_url; ?>/img/common/placeholder_900x900.png" data-src="<?php echo $site_url; ?>/img/home/f_2.jpg" class="img-responsive img-circle lazyload" alt="" width="222" height="222"></p>
<p class="g-xs-b-0"><b class="fz-18">訪問</b></p>
<p>日程を調整させていただきました上でお伺い致します。</p>
</div>
<div class="col-xs-12 col-sm-3 g-b-30">
<p class="icon-arrow-double-1"><img src="<?php echo $site_url; ?>/img/common/placeholder_900x900.png" data-src="<?php echo $site_url; ?>/img/home/f_3.jpg" class="img-responsive img-circle lazyload" alt="" width="222" height="222"></p>
<p class="g-xs-b-0"><b class="fz-18">鑑定・査定</b></p>
<p>無料にて査定いたします。もちろん、出張費も無料です。</p>
</div>
<div class="col-xs-12 col-sm-3 g-b-30">
<p class="icon-arrow-double-1"><img src="<?php echo $site_url; ?>/img/common/placeholder_900x900.png" data-src="<?php echo $site_url; ?>/img/home/f_4.jpg" class="img-responsive img-circle lazyload" alt="" width="222" height="222"></p>
<p class="g-xs-b-0"><b class="fz-18">買取</b></p>
<p>ご成約となります。その場で現金にて買取させていただきます。</p>
</div>
</div>
<div class="btn-container-1">
<a href="<?php echo $site_url; ?>/flow/" class="btn-1-extended btn-arrow-circle-1 g-t--20"><b>詳しくはこちら</b></a>
</div>
</div>
</div>


<?php endif; ?>
<?php if ( $length_artists > 0 && get_field('item_artists_is_active') > 0 ) : ?>

<?php if(get_field('about_contents')): ?>
<?php
	$str = get_the_title();
	$search = "買取";
	$re_title = str_replace($search, "", $str);
?>
<div class="container">
    <h3 class="title-1"><?php print $re_title; ?>について</h3>
    <p><?php the_field('about_contents'); ?></p>
</div>
<?php endif; ?>

<div class="container">
<h2 class="title-1"><?php the_title(); ?>強化中の代表作家</h2>
<div class="row d-f fxw-w g-b border-t-1 p-t-40">
<?php for ( $i = 0; $i < $length_artists; $i++ ) : ?>
<?php
$group = get_field('item_artists_' . ($i + 1));
if ( $group['is_active'] ) : ?>
<div class="col-xs-12 col-sm-6 border-b-1 p-b-40 g-b-40">
<h4><b class="fz-16 text-2"><?php echo $group['a_name']; ?></b></h4>
	<a href="<?php echo $group['link_url']; ?>">作家詳細はこちら</a>
</div>
<?php endif; ?>
<?php endfor; ?>

</div>
</div>
<div class="bg-gs-15 p-30">
<div class="row text-lh-1_5">
<div class="col-xs-12 col-md-6">
<h2 class="title-1"><b><?php the_title(); ?>主要対応エリア</b></h2>
<p>兵庫、大阪、京都、奈良、滋賀、和歌山などの近畿地方を中心に全国に無料出張いたします。</p>
<p class="fz-12">※遠方でも出張買取いたしますので、まずは一度ご相談ください。</p>
<p>北海道エリア:<br>
北海道/<br>
東北エリア:<br>
青森県/秋田県/岩手県/宮城県/山形県/福島県/<br>
関東エリア:<br>
東京都/神奈川県/埼玉県/千葉県/茨城県/群馬県/栃木県/<br>
北陸・甲信越<br>
東海エリア:<br>
富山県/石川県/福井県/新潟県/山梨県/長野県/岐阜県/静岡県/愛知県/<br>
関西エリア:<br>
大阪府/滋賀県/京都府/和歌山県/奈良県/兵庫県/三重県/<br>
中国エリア:<br>
岡山県/鳥取県/広島県/島根県/山口県/<br>
四国エリア:<br>
香川県/徳島県/愛媛県/高知県/<br>
九州・沖縄エリア:<br>
福岡県/大分県/宮崎県/熊本県/佐賀県/長崎県/鹿児島県/沖縄県/<br></p>
</div>
<div class="col-xs-12 col-md-6">
<p><img src="https://jyueidou.com/img/common/areamap.png" data-src="https://jyueidou.com/img/common/areamap.png" class="img-responsive lazyloaded" alt=""></p>
</div>
</div>

</div>

<?php endif; ?>


<?php endwhile; ?>



<?php get_footer(); ?>
