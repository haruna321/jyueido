<?php
/*
 * Template Name: 出張対応エリア
 */
?>

<?php get_header(); ?>

<div class="title-main-container g-b-0">
  <p class="title-main-text">出張対応エリア</p>
</div>


<div id="area-page">
  <div class="container">
    <div class="box-text-1 trip">
      <h1 class="title-1">骨董品買取は寿永堂へおまかせください。</h1>
      <div class="box">
        <p><span>全国どこでも</span>お客様のお住いの地域まで 買取・査定にお伺いさせて頂きます。遠方の方やお持ち込み頂くには大きすぎる、査定を依頼したいお品物がたくさんある方は出張買取がおすすめです。<br>
          <span>年中無休でお電話を受け付けておりますので</span>、お気軽にご連絡ください。
        </p>
        <img src="../img/home/map.png" alt="出張対応エリア">
      </div>
      <ul class="area-btn">
      <li><a href="#purchase" class="btn-arrow-circle-1">主要対応エリア</a></li>
      <li><a href="#nationwide" class="btn-arrow-circle-1">全国対応エリア</a></li>
    </ul>
    </div>
    
  </div>
  <div class="bg">
    <div class="container">
      <?php include("inc/area1.php"); ?>
      <?php include("inc/area2.php"); ?>
    </div>
  </div>
  
<script>
  const overlay = $("#js-overlay");
  const closeButtons = $(".modal-close");

  $(".modal-open").on('click', function() {
    const targetModalId = "#js-modal-" + $(this).attr("id").split("js-open")[1];
    $(targetModalId).addClass("open");
    overlay.addClass("open");
  });

  closeButtons.on('click', function() {
    $(".modal").removeClass("open");
    overlay.removeClass("open");
  });
</script>
<?php get_footer(); ?>

<style>
#kaitori-btn {
    margin: 60px auto 40px;
    font-size: 24px;
    background-color: #fff;
    color: #8c3b42;
    border: 3px solid #8c3b42;
    max-width: 600px;
    width: 90%;
    background-image: none;
    padding: 23px 10px;
    margin: 80px auto;
    transition: all 0.6s;
    text-align: center;
    text-decoration: none;
}
@media only screen and (max-width: 767px) {
    #kaitori-btn {
        margin: 30px auto;
        font-size: 16px;
        padding: 10px;
    }
  }
</style>