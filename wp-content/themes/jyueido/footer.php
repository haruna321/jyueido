<?php
global $site_url;
?>

<?php get_template_part('mod-footer-contact'); ?>


<?php if (is_mobile()) : ?>
<?php else : ?>
<div id="footer-banner">
  <div id="goTop">
    <a href="#">
      <img src="<?php echo $site_url; ?>/img/common/icon_pagetop.svg" alt="トップへ戻る">
    </a>
  </div>
  <div class="Bnr" id="footer-contact">
    <div class="Bnr__img">
      <p class="close c_button"><a href="javascript:void(0)"><span>閉じる</span><i aria-hidden="true"
            class="fa fa-times"></i></a></p>
      <div class="Bnr__img__inner">
        <div class="frame noneSp noneTab">
          <div class="mail"><a href="https://jyueidou.com/contact/#form_box">メールで無料査定</a></div>
          <div class="phone"><a href="tel:0120-13-6767">電話で無料買取相談<br>0120-13-6767</a></div>
          <div class="line"><a href="https://lin.ee/NlNE9Ia">LINE査定</a></div>
        </div>
        <!-- /.Bnr__img__inner -->
      </div>
      <!-- /.Bnr__img -->
    </div>
    <!-- /.Bnr -->
  </div>

</div>


<?php endif; ?>

<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
  <div class="container">
    <?php if (function_exists('bcn_display')) {
            bcn_display();
        } ?>
  </div>
</div>
<div class="container pos-r">
  <div class="header-alternation-fixed bg-transparent hidden-xs hidden-sm"></div>
  <p class="footer-logo"><a href="<?php echo $site_url; ?>/"><img src="<?php echo $site_url; ?>/img/common/logo.svg"
        alt="古美術 寿永堂（じゅえいどう）"></a>
    <span class="footer-logo-text">骨董品・美術品の買取</span>
  </p>
  <div class="footer-contact-container">
    <div class="footer-contact">
      <a href="<?php echo $site_url; ?>/contact/" class="btn-2-saturate btn-arrow-circle-1">無料査定のご依頼</a>
    </div>
    <div class="footer-tel">
      <a href="tel:0120-13-6767" class="btn-1">お電話でのお問い合わせ</a>
    </div>
  </div>
  <p class="footer-info" id="sugi"><span>所在地 ： 兵庫県芦屋市打出町2-12</span>
    <span>TEL：0797-22-8388 / FAX：0797-22-8345</span>
  </p>
</div>

<div class="container">
  <div class="row">

    <div class="col-xs-12 col-sm-6 g-b">
      <div class="row text-center g-b-25">
        <div class="col-xs-12 col-md-6"><a href="<?php echo $site_url; ?>/staffblog/"
            class="btn-100 btn-arrow-circle-2 min-w-init w-100p g-b-10 fz-13">寿永堂 Blog</a></div>
        <div class="col-xs-12 col-md-6"><a href="http://www.jewelry-jyueidou.com/"
            class="btn-100 btn-arrow-circle-2 min-w-init w-100p g-b-10 fz-13" target="_blank">Jewelry Jyueido</a></div>
      </div>
      <div class="row footer-links">
        <div class="col-xs-6"><a href="<?php echo $site_url; ?>/">トップページ</a></div>
        <div class="col-xs-6"><a href="<?php echo $site_url; ?>/memento/">遺産・遺品整理のお手伝い</a></div>
        <div class="col-xs-6"><a href="<?php echo $site_url; ?>/reasons/">寿永堂が選ばれる理由</a></div>
        <div class="col-xs-6"><a href="<?php echo $site_url; ?>/faq/">よくあるご質問 </a></div>
        <div class="col-xs-6"><a href="<?php echo $site_url; ?>/flow/">査定・買取の流れ </a></div>
        <div class="col-xs-6"><a href="<?php echo $site_url; ?>/company/">会社案内</a></div>
        <div class="col-xs-6"><a href="<?php echo $site_url; ?>/artists/">高価買取作家</a></div>
        <div class="col-xs-6"><a href="<?php echo $site_url; ?>/areas/">出張対応エリア</a></div>
        <div class="col-xs-6"><a href="<?php echo $site_url; ?>/items/">買取品目・実績</a></div>
        <div class="col-xs-6"><a href="<?php echo $site_url; ?>/privacypolicy/">プライバシーポリシー</a></div>
      </div>
    </div>

    <div class="col-xs-12 col-sm-6 g-b g-xs-b-0 p-xs-0" id="footer-area">
      <div class="bg-gs-15 p-30">
        <div class="row text-lh-1_5">
          <div class="col-xs-12 col-md-6">
            <p><b class="fz-16">主要対応エリア</b></p>
            <p>兵庫、大阪、京都、奈良、滋賀、和歌山などの近畿地方を中心に全国に無料出張いたします。</p>
            <p class="fz-12">※遠方でも出張買取いたしますので、まずは一度ご相談ください。</p>
          </div>
          <div class="col-xs-12 col-md-6">
            <p><img src="<?php echo $site_url; ?>/img/common/placeholder_872x612.png"
                data-src="<?php echo $site_url; ?>/img/common/areamap.png" class="img-responsive lazyload" alt=""></p>
          </div>
        </div>
        <a href="<?php echo $site_url; ?>/contact/" class="btn-2 btn-arrow-circle-1 w-100p" id="red-btn">お問い合わせ・ご相談</a>
      </div>
    </div>

  </div>
</div>


<div class="copyright-container">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 text-left text-xs-center"><a
          href="http://www.police.pref.hyogo.lg.jp/sc/second.htm" target="_blank">兵庫県公安委員会許可 第631100700042号</a></div>
      <div class="col-xs-12 col-sm-6 text-right text-xs-center">Copyright 2022 寿永堂 All Rights Reserved.</div>
    </div>
  </div>
</div>


</footer>
<!-- <div id="leave-banner" class="hidden">
  <div class="banner-content">
    <a href="https://lin.ee/NlNE9Ia" id="continueButton">
      <img src="./img/common/leave-banner.png" alt="友だち追加しておけがお気軽に相談できます　LINE友だち追加
      ">
    </a>
    <div id="closeButton">✕</div>
  </div>
</div> -->
<?php wp_footer(); ?>


</body>

</html>