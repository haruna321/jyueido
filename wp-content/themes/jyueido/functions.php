<?php

/**
 * vars
 */
$site_url = esc_url(home_url());
// $site_url = "//achroma.jp/temporary/linkers/official";

/**
 * ウィジェットの有効化
 */
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'before_widget' => '<div id="%1$s" class="blog-hot-entries">',
		'after_widget' => '</div>',
		'id' => 'sidebar-1'
	));
}

/**
 * RSSフィード
 */
add_theme_support('automatic-feed-links');


/**
 * アイキャッチ画像の有効化
 */
add_theme_support('post-thumbnails');

add_image_size('thumbnail_320x320', 320, 320, true);

/**
 * アーカイブページのタイトル
 * @see https://wemo.tech/1161
 */
function get_archive_title()
{
	//アーカイブページじゃない場合、 false を返す
	if (!is_archive()) return false;

	//日付アーカイブページなら
	if (is_date()) {
		if (is_year()) {
			$date_name = get_query_var('year') . '年';
		} elseif (is_month()) {
			$date_name = get_query_var('year') . '年' . get_query_var('monthnum') . '月';
		} else {
			$date_name = get_query_var('year') . '年' . get_query_var('monthnum') . '月' . get_query_var('day') . '日';
		}

		//日付アーカイブページかつ、投稿タイプアーカイブページでもある場合
		if (is_post_type_archive()) {
			return $date_name;
		}
		return $date_name;
	}

	//投稿タイプのアーカイブページなら
	if (is_post_type_archive()) {
		return post_type_archive_title('', false);
	}

	//投稿者アーカイブページなら
	if (is_author()) {
		return "投稿者" . get_queried_object()->data->display_name;
	}

	//それ以外(カテゴリ・タグ・タクソノミーアーカイブページ)
	return single_term_title('', false);
}

/**
 * タクソノミーページでループの
 * 1. 表示件数変更
 * 2. 並び順変更
 */
add_action('pre_get_posts', 'my_pre_get_posts');
function my_pre_get_posts($query)
{
	if (!is_admin() && $query->is_main_query()) {
		if (is_tax('achievements-item') || is_tax('achievements-area')) {
			$query->set('posts_per_page', 15); // 表示件数を3に設定
			$query->set('orderby', 'date'); // 日付で並び替え
			$query->set('order', 'DESC'); // 降順
		} elseif (is_tax()) {
			$query->set('posts_per_page', -1);
			$query->set('meta_key', 'artists_kana');
			$query->set('orderby', 'meta_value');
			$query->set('order', 'asc');
		}
	}
}
/**
 * 記事内の最初の画像をアイキャッチ代わりに使う
 */
function catch_that_image()
{
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches[1][0];

	// if (empty($first_img)) {
	// 	// 記事内で画像がなかったときのためのデフォルト画像を指定
	// 	$first_img = "/images/default.jpg";
	// }
	return $first_img;
}
//カスタム投稿にタグを設定する
add_action('init', function () {
	register_taxonomy(
		'post_tag',
		['post', 'areas'],
		[
			'hierarchical' => false,
			'query_var'    => 'tag',
		]
	);
});
add_action('pre_get_posts', function ($query) {
	if (is_admin() && !$query->is_main_query()) {
		return;
	}
	if ($query->is_category() || $query->is_tag()) {
		$query->set('post_type', ['post', 'areas']);
	}
});

// canonical
add_action('wp_head', 'add_canonical_to_category_pages');
function add_canonical_to_category_pages()
{
	if (is_tax('area')) {
		global $term;
		echo '<link rel="canonical" href="' . get_term_link($term, 'area') . '">';
	}
}

function is_mobile()
{
	$useragents = array(
		'iPhone', // iPhone
		'iPod', // iPod touch
		'Android.*Mobile', // 1.5+ Android *** Only mobile
		'Windows.*Phone', // *** Windows Phone
		'dream', // Pre 1.5 Android
		'CUPCAKE', // 1.5+ Android
		'blackberry9500', // Storm
		'blackberry9530', // Storm
		'blackberry9520', // Storm v2
		'blackberry9550', // Storm v2
		'blackberry9800', // Torch
		'webOS', // Palm Pre Experimental
		'incognito', // Other iPhone browser
		'webmate' // Other iPhone browser
	);
	$pattern = '/' . implode('|', $useragents) . '/i';
	return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}


add_action( 'init', 'create_posttype' );

// カスタム投稿タイプとタクソノミーの登録
function create_posttype() {
	register_post_type('achievements', array(
			'labels' => array(
					'name' => '買取実績一覧',
					'all_items' => '買取実績一覧'
			),
			'public' => true,
			'has_archive' => true,
			'hierarchical' => false,
			'menu_position' => 5,
			'show_in_rest' => true,
			'supports' => array('title', 'editor', 'thumbnail', 'category'),
			'rewrite' => array('slug' => 'achievements', 'with_front' => false)
	));

	register_taxonomy('achievements-item', 'achievements', array(
			'label' => '買取品目',
			'labels' => array('add_new_item' => '新規カテゴリーを追加'),
			'public' => true,
			'hierarchical' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'rewrite' => array('slug' => 'achievements-item', 'hierarchical' => true)
	));

	register_taxonomy('achievements-area', 'achievements', array(
			'label' => 'エリア',
			'labels' => array('add_new_item' => '新規カテゴリーを追加'),
			'public' => true,
			'hierarchical' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'rewrite' => array('slug' => 'achievements-area', 'hierarchical' => true)
	));
}

add_action('init', 'create_posttype');

function disable_redirect_canonical( $redirect_url ) {
	if ( is_tax( 'achievements-item' ) ) {
		$redirect_url = false;
	}
	return $redirect_url;
}
add_filter('redirect_canonical', 'disable_redirect_canonical');