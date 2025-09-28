<?php get_header(); ?>
<div class="achievements-page-single">
  <h1><?php the_title(); ?> 買取実績</h1>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div>
    <?php the_content(); ?>
    <div class="image">
      <img src="<?php echo CFS()->get('image'); ?>" alt="">
    </div>
    <div class="box">
      <dl>
        <dt>買取品名</dt>
        <dd><?php echo CFS()->get('item'); ?></dd>
      </dl>
      <dl>
        <dt>買取エリア</dt>
        <dd><?php echo CFS()->get('area'); ?></dd>
      </dl>
      <dl>
        <dt>買取額</dt>
        <dd><?php echo CFS()->get('price'); ?></dd>
        </p>
      </dl>
      <dl>
        <dt>コメント</dt>
        <dd><?php echo CFS()->get('textarea'); ?></dd>
      </dl>
    </div>
  </div>
  <?php endwhile; else : ?>
  <p>投稿が見つかりませんでした。</p>
  <?php endif; ?>
</div>
<?php get_footer(); ?>