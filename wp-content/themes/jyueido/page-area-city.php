<?php
/*
 * Template Name: 市町村
 */
?>

<?php get_header(); ?>
<div class="title-main-container g-b-0">
  <p class="title-main-text">出張対応エリア</p>
</div>

<div class="bg-tx-4 border-b-1 border-b-c-000-010 g-b add_mb0 omakase-wrap">
  <div class="container">
    <div class="box add_mb20">
      <h1 class="title-1 add_mtb20"><?php the_title(); ?>での骨董品買取は寿永堂へおまかせください。</h1>
      <div class="text-lg-center">
        <?php echo $cfs->get('prefectures-text'); ?>
      </div>
    </div>
  </div>
</div>
<div class="home-reasons-1 add_mtb20 ">
  <img src="https://jyueidou.com/img/home/r_t_1.png" class="img-responsive home-reasons-1-1" alt="相談・鑑定・出張・査定 無料対応" width="650" height="88"><br>
  <img src="https://jyueidou.com/img/home/r_t_2.png" class="img-responsive home-reasons-1-2" alt="年間1,000件以上のご依頼、" width="508" height="80"><br>
  <img src="https://jyueidou.com/img/home/r_t_3.png" class="img-responsive home-reasons-1-3" alt="50,000点以上の買受実績" width="486" height="80">
</div>
<div class="main">
  <div class="fz-15 fz-xs-14">
    <p>寿永堂のWebサイトをご覧いただきありがとうございます。</p>
    <p>お客様の想いの詰まったお品物をお譲りいただくのは、たやすいことではありません。<br class="hidden-xs hidden-sm" />お品物の真価を正しく見極め、そこに込められた想いを<br class="hidden-xs hidden-sm" />大切に受け止めてもらえる譲り手に繋げる事が私達の使命であると考えております。</p>
    <p>ご縁があってご相談いただいたお客様の信頼を何より大切にしたい、<br class="hidden-xs" />そんな信念の元、買取を行わせていただいております。</p>
  </div>
</div>
<div class="bg-tx-3">
  <div class="container" id="home-contents">
    <h2 class="title-1 add_mtb30">骨董品買取品目・実績一覧</h2>
        <div class="row box-items-container">
      <?php
      $slugs = array(
        'kakejiku', // 1
        'painting/byobu', // 2
        'painting/nihonga', // 3
        'painting/ukiyo-e', // 4
        'document/rubbing', // 5
        'document', // 6
        'kougei/lacquer', // 7
        'earthenware/porcelain', // 8
        'earthenware/pottery', // 9
        'tea', // 10
        'tea/sencha-utensils', // 11
        'tea/iron-kettle', // 12
        'tea/silver-bottle', // 13
        'tea/senke-jisshoku', // 14
        'old-coin', // 15
        'inro', // 16
        'chinese', // 17
        'chinese/chinese-lacquerware', // 18
        'chinese/china-ceramics', // 19
        'chinese/censer', // 20
        'tikkon', // 21
        'chinese/china-bronzeware', // 22
        'chinese/jade', // 23
        'calligraphy-tools/brush-tube', // 24
        'painting/calligraphy-and-painting', // 25
        'chinese/chinese-hanging-scroll',
        'chinese/chinese-picture', // 26
        'kougei/zouge', // 27
        'calligraphy-tools', // 28
        'calligraphy-tools/old-ink-stick', // 29
        'netsuke', // 30
        'stamp-material', // 31
        '', // 32
        'jewelry/jade', // 33
        'kougei/coral', // 34
        'glass', // 35
        'chinese/fragrant-wood', // 36
        'painting', // 37
        'painting/contemporary-art', // 38
        'painting/western-painting', // 39
        'doll/bisque-doll', // 40
        'antique', // 41
        'kougei/sculpture', // 42
        'tableware', // 43
        'buddhism/statue', // 44
        'buddhism/painting', // 45
        'armor/kacchu', // 46
        'armor/tousougu', // 47
        'armor/tousougu/tsuba', // 48
        'armor/touken/katana', // 49
        'armor/touken',
        'kougei/takezaiku', // 50
        'antique/medal', // 49
        'antique/stamp', // 50
        'kougei/metalwork', // 49
        'musical-instrument', // 50
        '', // 49
        'kougei', // 50
      ); // ここに表示したいスラッグを指定

      $args = array(
        'posts_per_page' => -1,
        'post_type' => 'items',
        'meta_key' => 'sort_num',
        'orderby' => 'post__in', // スラッグの順に表示
        'order' => 'asc',
        // 'post_name__in' => $slugs, // スラッグでフィルタリング
        'post__in' => array_map(function ($slug) {
          $page = get_page_by_path($slug, OBJECT, 'items'); // スラッグに基づいてページを取得
          return $page ? $page->ID : null; // ページが存在する場合のみIDを返す
        }, $slugs)
      );

      $placeholder = $site_url . '/img/common/placeholder_900x600.png';
      $thumb_size = 'large';

      $query = new WP_Query($args);
      if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
          <div class="col-xs-6 col-sm-4 col-lg-3">
            <a href="<?php the_permalink(); ?>" class="box-item link-color-font">
              <img src="<?php echo $placeholder; ?>" data-src="<?php echo get_field('item_image')["sizes"][$thumb_size]; ?>" class="img-responsive img-hover lazyload" alt="">
              <span class="item-title"><b><?php the_title(); ?></b></span>
            </a>
          </div>

        <?php endwhile; ?>
      <?php else : // 記事が無い場合 
      ?>
        <div class="separator-1">
          <div class="box-7 p-20 text-center">記事はまだありません。</div>
        </div>
      <?php endif;
      wp_reset_postdata(); // クエリのリセット 
      ?>
      <script>
        $('.box-item').matchHeight();
      </script>

    <div class="btn-container-1 g-t-0 add_mb20">
      <a href="<?php echo $site_url; ?>/items/" class="btn-1-extended btn-arrow-circle-1"><b>その他の買取品目一覧</b></a>
    </div>
  </div>
</div>

<div class="about-wrap">
  <div class="votb">
    <h2 class="toha">骨董品とは</h2>
    <p>
    骨董品といえば壺やお皿・茶道具などの陶芸品をを連想される方が多いかと思います。<br>
    ただ実際、「骨董品」は希少価値のある、且つ古くに作られたものを指す言葉なので絵画や掛軸、陶芸など物品のジャンルを問わず、希少価値のある古くに作成されたものであれば「骨董品」と呼ばれ、種類は多岐にわたります。</p>
    <h3>骨董品の世界的な定義</h3>
    <p>
    骨董品は世界的に100年以上前の物とされています。<br>
    これは1934年にアメリカで制定された通商関税法が由来です。<br>
    現在この定義は、WTO（世界貿易機関）でも採用されています。<br>
    しかし、日本では数十年から100年以上経過した物を骨董品と呼んでおり、世界的には骨董品に含まれない戦後の作品も骨董品に含まれます。<br>
    <br>
    また、骨董品は「美術工芸品」「民芸品」の２つに大別されます。</p>
    <h3>「美術工芸品」（古美術品）</h3>
    <p>
    骨董品より美的鑑賞に重きを置いた作品のことをいい、<br>
    主に床の間に置く飾道具やお茶道具・書道具・煎茶道具・香道具・花道具があります。</p>

    <h3>「民芸品」（古道具）</h3>
    <p>
    机や椅子、箪笥などの家具や欄間などの建具のほか、生活に使われていたお皿や器、グラスなどの生活用品があります。
    </p>
  </div>
</div>


<div class="bo">
  <div class="reason-wrap">
    <h2 class="title-1">寿永堂が選ばれる理由</h2>
    <div class="row text-center">
      <div class="col-xs-4 p-xs-l-5 p-xs-r-5"><img class="img-responsive g-t--30 g-b--30" src="https://jyueidou.com/img/home/r_b_1.png" alt="信用" width="212" height="178" /></div>
      <div class="col-xs-4 p-xs-l-5 p-xs-r-5"><img class="img-responsive g-t--30 g-b--30" src="https://jyueidou.com/img/home/r_b_2.png" alt="実績" width="212" height="178" /></div>
      <div class="col-xs-4 p-xs-l-5 p-xs-r-5"><img class="img-responsive g-t--30 g-b--30" src="https://jyueidou.com//img/home/r_b_3.png" alt="高価買取" width="212" height="178" /></div>
    </div>
  </div>
  <div class="works-wrap">
    <h2 class="title-1"><?php the_title(); ?>での買取実績</h2>
    <?php
    $fields = $cfs->get('work-loop');
    foreach ($fields as $field) :
    ?>
      <div class="row separator-1">
        <div class="col-xs-12 col-sm-5 col-lg-4 g-b-20"><img class="img-responsive lazyloaded" src="<?php echo $field['img']; ?>" alt="<?php echo $field['title']; ?>" data-src="<?php echo $field['img']; ?>" /></div>
        <div class="col-xs-12 col-sm-7 col-lg-8">
          <div class="g-b-20">
            <div class="pull-left pull-xs-none"><b class="fz-18"><?php echo $field['title']; ?></b></div>
            <div class="pull-right pull-xs-none"><b class="fz-16 text-2">買取額：<?php echo $field['price']; ?></b></div>
            <div class="clear"><small><?php echo $field['place']; ?></small></div>
          </div>
          <?php echo $field['text']; ?>
        </div>
      </div>
    <?php endforeach; ?>
    <div class="btn-container-1 g-t-0 add_mb20">
      <a href="<?php echo $site_url; ?>/achievements-area/<?php echo $cfs->get('achievements-link'); ?>" class="btn-1-extended btn-arrow-circle-1"><b><?php the_title(); ?>での買取実績一覧</b></a>
    </div>
  </div>
  <!-- <div class="voice-wrap">
    <h2 class="title-1"><?php the_title(); ?>のお客様の声</h2>
    <?php
    $fields = $cfs->get('voice-loop');
    foreach ($fields as $field) :
    ?>
      <div class="vot">

        <p class="name"><?php echo $field['voice-title']; ?></p>
        <p class="text">
          <?php echo $field['voice-text']; ?>
        </p>
      </div>
    <?php endforeach; ?>
  </div> -->

  <div class="flow-wrap">
    <div class="vot">
      <h2 class="toha">買取の流れ</h2>
      <h3 class="point">①お問い合わせ</h3>
      まずはお電話又はメールでご連絡ください。査定を依頼したい骨董品・古美術をわかる範囲で結構ですので
      種類、作家等お品物の情報をお伝えください。
      <h3 class="point">②買取の際にご用意いただくもの</h3>
      お買取の際に必要となりますので、下記のご準備をお願い致します。
      <h4 class="flow">店頭買取の場合</h4>
      ・本人確認書類
      運転免許証、マイナンバーカード、健康保険証、住民基本台帳カード、
      在留カード、特別永住者証明書　等　本人確認のできるもの

      その他法人・未成年・本人様の所有物でない場合や特殊な場合は一度ご相談ください。

      &nbsp;
      <h4 class="flow">出張買取の場合</h4>
      弊社所有の確認書類にお名前・住所・年齢・職業等のをご記入ください。
      ご自宅以外でのお打ち合わせ・買取の場合は本人確認書類をお願いします。

      ・本人確認書類
      運転免許証、マイナンバーカード、健康保険証、住民基本台帳カード、
      在留カード、特別永住者証明書　等　本人確認のできるもの
      <h4 class="flow">郵送買取の場合</h4>
      商品を送る際に、免許証のコピー裏表もしくは本人確認書類のコピーを添えて郵送をお願いします.

      口座振り込みの場合、振込口座の番号を記入　口座の届け出住所と免許証等、本人確認書類の住所が同じものをご準備ください。

      上記対応が難しい場合はご相談ください。
      <h3 class="point">③査定</h3>
      出張買取の場合、日程を調整させていただきました上でお伺い致します。
      もちろん無料にて査定いたします。出張費も無料です。
      できる限り品物のご説明をさせていただきながら、ご納得のいく値段をつけさせていただきます。

    </div>

  </div>
  <div class="more-wrap">
    <div class="vot">
      <h2 class="toha"><?php the_title(); ?>での骨董品買取について</h2>
      <p>
        <?php echo $cfs->get('place-text'); ?>
      </p>
    </div>
  </div>

  <div class="takaku-wrap">
    <div class="bg-gs-15 p-20 p-xs-0 g-b">
      <div class="box-a">
        <h2 class="box-a-title">骨董品を高く買取ってもらうには</h2>
        <div class="box-a-contents">

          ご家庭で大切に扱ってきた骨董品を買い取ってもらう際は、
          やはり少しでも高く買い取ってもらいたいと考えますよね。
          少しでも高価に買い取ってもらうためのコツを少し紹介致します。
          <h3 class="point">①骨董品買取業者に依頼する</h3>
          骨董品と一言で言っても様々な種類があります。
          幅広い知識と経験が無いと、ポイントを見逃してしまったり
          本来の価格よりもかなり低い値段で査定額が出てしまう可能性があります。
          骨董品の知識のある、専門の骨董品買取業者に依頼しましょう。
          <h3 class="point">②付属品をつける</h3>
          骨董品そのものだけでなく、付属品が残っているかどうかも査定に影響があります。
          購入した際に入っていた箱や説明書・鑑定書があると査定が高くなる可能性があります。
          <h3 class="point">③無理に綺麗にしない</h3>
          骨董品の保存状態が良く、傷の無い綺麗な状態で残っているもの程
          高い値段がつくのは間違いありません。
          ただ少しでも綺麗に見せようと、磨いたり、掃除をされる方がおられますが
          無理に綺麗に見せようとするのはやめましょう。
          かえって傷や汚れがついてしまう可能性が高く、古いものであればあるほど
          傷がつきやすいものです。査定金額に悪影響を及ぼす可能性が高いため
          保存場所が悪い場合は、湿気の少ない場所に移動させるくらいにとどめておきましょう。
          <h3 class="point">④売却を検討したら、すぐに査定に出す</h3>
          売却を検討したら、なるべく早めに専門の業者者に相談するのがおすすめです。
          骨董品は日が経つにつれて、劣化が進みやすく、価値が下がる可能性が非常に高くなります
          査定の依頼をすると必ず売却しなければいけないわけではありませんので、
          まずは査定を依頼することをおすすめします。
          <h3 class="point">⑤出張買取を依頼する</h3>
          骨董品は非常に繊細な物が多いため、ちょっとした衝撃などで傷がついたり最悪の場合割れたり、かけたりすることも
          考えられます。出張買取であれば、骨董品を移動させる必要がないため、傷がついてしまうリスクが軽減されます。

        </div>
      </div>
    </div>
  </div>
</div>
<div id="area-city">
<div class="container">
  <div class="bg-gs-15 p-20 p-xs-0 g-b">
    <div class="box-a">
      <h3 class="box-a-title"><?php the_title(); ?>の主要買取品目</h3>
      <div class="box-a-contents">
        <p><?php echo $cfs->get('kaitori'); ?></p>
        <p>※骨董品・美術品なのかどうかもわからないといった場合でも、まずは一度お電話でお問い合わせください。</p>
      </div>
    </div>

    <div class="box-a">
      <h3 class="box-a-title"><?php the_title(); ?>の買取対応エリア</h3>
      <div class="box-a-contents">
        <p><?php echo $cfs->get('area-text'); ?></p>
        <p><?php the_title(); ?>は上記記載地域以外も、<b>全域対応可能</b>です。<br>
          ※内容によっては、お伺いできない場合もございますが、まずは一度お気軽にご相談ください。</p>
      </div>
    </div>

    <div class="box-a">
      <h3 class="box-a-title"><?php the_title(); ?>の特徴</h3>
      <div class="box-a-contents">
        <p><?php echo $cfs->get('tokucho-text'); ?></p>
      </div>
    </div>

    <div class="box-a">
      <h3 class="box-a-title">駅周辺への出張も可能です</h3>
      <div class="box-a-contents">
        <p><?php echo $cfs->get('station'); ?></p>
      </div>
    </div>

  </div>
</div>

<div class="bo">
  <div class="bijyutsu">
    <div class="vot">
      <h2><?php the_title(); ?>の美術・骨董関連情報</h2>
      <ul>
        <?php
        $fields = $cfs->get('info-loop');
        if ($fields) :
          foreach ($fields as $field) :
            $iffield = $field['link'];
            if ($iffield) : ?>
              <li><a href="<?php echo $field['link']; ?>"><?php echo $field['info-title']; ?></a></li>
            <?php endif; ?>
        <?php endforeach;
        endif; ?>
      </ul>
    </div>
  </div>
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

<?php get_footer(); ?>