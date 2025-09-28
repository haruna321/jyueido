<?php
global $site_url;
$is_slick = 0;
$is_vgrid = 0;
$is_matchheight = 0;
$page_title = the_title("", "", false);

if (is_home()) {
	$description = '骨董品・古美術買取は寿永堂にご相談ください。無料出張買取・無料査定を全国で承ります。関西を中心に全国で買取実績がございます。「お客様の信頼」を最優先に、掛軸・茶道具・仏像・絵画・西洋アンティークなど骨董品全般の買取を行っております。古美術品、骨董品買取をご希望の方は寿永堂まで是非ご相談ください。';
	$is_slick = 1;
	$is_vgrid = 1;
	$is_matchheight = 1;

	// 高価買取作家一覧ページ
} else if (is_post_type_archive('artists') || is_tax('artist')) {
	$description =  '';

	// 高価買取作家詳細ページ
} else if (is_singular('artists')) {
	$description = $page_title . 'のご紹介。寿永堂では' . $page_title . 'の作品も高価で買取を行っております。' . $page_title . 'の作品をお持ちの方は是非、寿永堂にご相談ください。';

	// 買取品目一覧ページ
} else if (is_post_type_archive('items') || is_tax('item')) {
	$description = '';
	$is_matchheight = 1;

	// 買取品目
} else if (is_singular('items')) {
	$description = $page_title . 'なら寿永堂にお任せください。「お客様の信頼」を最優先に、買取を行っております。' . $page_title . 'をご希望の方は寿永堂まで是非ご相談ください。従業員一同心待ちにしております。';
	$is_matchheight = 1;

	// 出張対応エリア
} else if (is_post_type_archive('areas') || is_tax('area')) {
	$term = get_queried_object();
	$term_name   = $term->name;
	$description = $term_name . 'の骨董品買取なら寿永堂にお任せください。無料査定・無料出張買取を行っております。' . $term_name . 'で掛軸・茶道具・仏像・絵画・日本人形などアンティーク全般の買取をご希望の方は寿永堂まで是非ご相談ください。従業員一同心待ちにしております。';

	// ブログ
} else if (is_singular('staffblog')) {
	$description = $page_title . 'についてのブログです。骨董品買取なら寿永堂にお任せください。「お客様の信頼」を最優先に、買取を行っております。骨董品買取をご希望の方は寿永堂まで是非ご相談ください。従業員一同心待ちにしております。';
	$is_matchheight = 1;

	// 出張対応エリア
} else if (is_singular('areas')) {
	$description = $page_title . 'の買取を強化中。' . $page_title . 'で骨董品をお持ちの方、お家に眠っている' . $page_title . 'をお持ちの方は是非寿永堂にご相談ください。出張買取も積極的に行っております。';
} else {
	$description = '';
}
?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" dir="ltr" lang="ja" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 8]><html class="ie ie8" dir="ltr" lang="ja" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if IE 9]><html class="ie ie9" dir="ltr" lang="ja" prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8) | !(IE 9)  ]><!-->
<html dir="ltr" lang="ja" prefix="og: http://ogp.me/ns#">
<!--<![endif]-->

<head>
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1"><![endif]-->
	<meta charset="UTF-8">

	<?php if (is_post_type_archive('staffblog')) : ?>
		<title>骨董品ブログ | 古美術買取の寿永堂</title>
	<?php elseif (is_singular('artists')) : ?>
		<title><?php the_title() ?>の買取査定 | <?php bloginfo('name'); ?></title>
	<?php else : ?>
		<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<?php endif; ?>
	<meta name="description" content="<?php echo $description; ?>">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">

	<?php if (is_post_type_archive('areastest') || is_tax('areatest')) : ?>
		<meta name=”robots” content=”noindex” />

		<?php elseif (is_singular('areastest')) : ?>
		<meta name=”robots” content=”noindex” />
	<?php endif; ?>

		<?php if (is_post_type_archive('kaitori-list')) : ?>
		<meta name=”robots” content=”noindex” />
		<?php elseif (is_singular('kaitori-list')) : ?>
		<meta name=”robots” content=”noindex” />
	<?php endif; ?>

	<link rel="stylesheet" href="<?php echo $site_url; ?>/lib/simplelightbox/simplelightbox.min.css">
	<?php if ($is_slick) : ?>
		<link rel="stylesheet" href="<?php echo $site_url; ?>/lib/slick/slick.css">
		<link rel="stylesheet" href="<?php echo $site_url; ?>/lib/slick/slick-theme.css">
	<?php endif; ?>
	<link rel="stylesheet" href="<?php echo $site_url; ?>/css/styles.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/css/add_style.css">
	<link rel="stylesheet" href="<?php echo $site_url; ?>/sass/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
	<script src="<?php echo $site_url; ?>/lib/bootstrap/javascripts/bootstrap.min.js"></script>
	<script src="<?php echo $site_url; ?>/lib/jquery.easing.1.3.js"></script>
	<script src="<?php echo $site_url; ?>/lib/lazysizes.min.js" async></script>
	<script src="https://unpkg.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<?php if ($is_vgrid) : ?>
		<script src="<?php echo $site_url; ?>/lib/vgrid/jquery.vgrid.js"></script>
	<?php endif; ?>
	<script src="<?php echo $site_url; ?>/lib/simplelightbox/simple-lightbox.min.js"></script>
	<?php if ($is_slick) : ?>
		<script src="<?php echo $site_url; ?>/lib/slick/slick.min.js"></script>
	<?php endif; ?>
	<?php if ($is_matchheight) : ?>
		<script src="<?php echo $site_url; ?>/lib/jquery.matchHeight-min.js"></script>
	<?php endif; ?>
	<script src="<?php echo $site_url; ?>/js/common.js"></script>
	<script src="<?php echo $site_url; ?>/js/utils.js"></script>
	<?php if (is_home()) : ?>
		<script src="<?php echo $site_url; ?>/js/home.js"></script>
	<?php endif; ?>
	<?php if (is_home()) : ?>
		<script src="<?php echo $site_url; ?>/js/jquery.magnific-popup.min.js"></script>
	<?php endif; ?>
	<script type="text/javascript">
		(function($) {

			$(function() {
				var display = function() {
					if ($(this).scrollTop() > 250) { //scroll量
						$(".Bnr").fadeIn();
					} else {
						$(".Bnr").fadeOut();
					}
				};
				$(window).on("scroll", display);
				//click
				$(".Bnr p.close a").click(function() {
					$(".Bnr").fadeOut();
					$(window).off("scroll", display);
				});
			});

		})(jQuery);
	</script>
	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-K9VKVGR');
	</script>
	<!-- End Google Tag Manager -->
	<meta name="google-site-verification" content="wrxPkWG2DX41bOkONk85WlFNxBasGdBgAlHKbPWXZ_U" />
	<?php wp_head() ?>
	<link href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" rel="stylesheet">



	<?php
  // 親スラッグ取得
  function get_parent_slug() {
    global $post;
    if (is_page() && $post->post_parent) {
      $post_data = get_post($post->post_parent);
      return $post_data->post_name;
    }
  }
  if ( is_front_page() ) {
  //top
    $body_id = 'topPage';
	}
?>
</head>

<body id="<?php echo $body_id; ?>">

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K9VKVGR" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<header class="site-header" id="site-header">
		<div class="header-inner">
			<p class="header-logo"><a href="<?php echo $site_url; ?>/"><img src="<?php echo $site_url; ?>/img/common/logo.svg" alt="古美術 寿永堂（じゅえいどう）"></a>
				<span class="header-logo-text">骨董品・美術品の<span class="st">高価買取</span></span>
			</p>
			<div class="header-contact-container">
				<div class="header-contact">
					<a href="/contact/#form_box" class="btn-2-saturate btn-arrow-circle-1"><i class="fa fa-envelope">メールで無料査定</i></a>
				</div>
				<div class="header-tel">
					<a href="tel:0120-13-6767" class="btn-1 tel_bt"><i class="fas fa-phone-alt fa-2s">今すぐ買取相談をする<br>0120-13-6767</i></a>
				</div>
			</div>
		</div>
	</header>

	<nav class="global-nav-pc" id="top"> 
		<ul class="container">
			<li><a href="<?php echo $site_url; ?>/">ホーム</a></li>
			<li><a href="<?php echo $site_url; ?>/reasons/">寿永堂が<br>選ばれる理由</a></li>
			<li><a href="<?php echo $site_url; ?>/flow/">買取の流れ</a></li>
			<li><a href="<?php echo $site_url; ?>/items/">買取品目・実績</a></li>
			<li><a href="<?php echo $site_url; ?>/artists/">高価買取作家</a></li>
			<li><a href="<?php echo $site_url; ?>/memento/">遺品整理の<br>お手伝い</a></li>
			<li><a href="<?php echo $site_url; ?>/faq/">よくあるご質問</a></li>
			<li><a href="<?php echo $site_url; ?>/areas/">主要買取エリア</a></li>
		</ul>
	</nav>

	<!-- <div class="header-alternation-fixed" id="top"></div> -->
	<?php if (is_home()) : ?>
		<div class="home-main-wrap">
			<h1 class="home-main-texts">
				<span class="home-main-texts-inner">
					<img src="./img/home/main_texts_sp.png" class="visible-xs" alt="骨董品に魅せられて40年。芦屋で培った目利きで満足価格の骨董品買取">
					<img src="./img/home/main_texts_pc.png" class="hidden-xs" alt="骨董品・美術品の高価買取 | 古美術寿永堂">
				</span>
			</h1>

			<div class="home-main-container-2 hidden-xs text-center bg-gs-3">
				<img src="./img/common/placeholder_1200x680.png" data-src="./img/home/main/main.jpg" class="img-responsive lazyload" alt="">
			</div>

			<div class="home-main-container-sp visible-xs text-center">
				<div class="home-main-1-sp"><img src="./img/common/placeholder_908x720.png" data-src="./img/home/main/1.jpg" class="img-responsive lazyload" alt=""></div>
			</div>
		</div>

		<!-- <div class="grid-container g-4 visible-xs text-center">
<div class="home-main-2-sp w-50p p-4"><img src="./img/common/placeholder_348x240.png" data-src="./img/home/main/2.jpg" class="img-responsive lazyload" alt=""></div>
<div class="home-main-3-sp w-50p p-4"><img src="./img/common/placeholder_348x468.png" data-src="./img/home/main/3.jpg" class="img-responsive lazyload" alt=""></div>
<div class="home-main-4-sp w-50p p-4"><img src="./img/common/placeholder_348x468.png" data-src="./img/home/main/4.jpg" class="img-responsive lazyload" alt=""></div>
<div class="home-main-5-sp w-50p p-4"><img src="./img/common/placeholder_348x240.png" data-src="./img/home/main/5.jpg" class="img-responsive lazyload" alt=""></div>
<div class="home-main-6-sp w-50p p-4"><img src="./img/common/placeholder_348x240.png" data-src="./img/home/main/6.jpg" class="img-responsive lazyload" alt=""></div> -->
		<!-- <div class="home-main-7-sp w-50p p-4"><img src="./img/common/placeholder_348x468.png" data-src="./img/home/main/7.jpg" class="img-responsive lazyload" alt=""></div> -->
		</div>
	<?php endif; ?>




	<div class="global-nav-container">
		<div class="global-nav-inner">
			<p class="text-center g-t-20"><b class="fz-17">Menu</b></p>
			<nav class="global-nav">
				<div class="global-nav-sp" id="global-nav-sp"></div>
				<div class="global-nav-sp text-center">
					<a href="/contact/" class="btn-2-extended btn-2-saturate btn-arrow-circle-1 p-l-8 w-100p g-t-20">無料査定のご依頼</a>
					<a href="tel:0120-13-6767" class="tel g-t-20"><img src="<?php echo $site_url; ?>/img/common/tel.svg" alt=""></a>
					<a href="https://lin.ee/NlNE9Ia" class="global-nav-sp-line">友達追加</a>
				</div>
			</nav>
		</div>
	</div>


	<div class="sp-header-link">
		<div class="menu-trigger">
			<span></span><span></span><span></span>
		</div>
	</div>