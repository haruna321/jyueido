<?php get_header(); ?>


<div class="sample-page">
  <h1><?php single_term_title(); ?></h1>

  <?php if (have_posts()) : ?>
  <ul>
    <?php while (have_posts()) : the_post(); ?>
    <li>
      <img src="<?php echo CFS()->get('image'); ?>" alt="">
      <p><?php echo CFS()->get('item'); ?></p>
      <p><?php echo CFS()->get('area'); ?></p>
      <p><?php echo CFS()->get('price'); ?></p>
      <?php echo CFS()->get('textarea'); ?>
    </li>
    <?php endwhile; ?>
  </ul>
  <?php else : ?>
  <p>投稿が見つかりませんでした。</p>
  <?php endif; ?>
</div>
<?php get_footer(); ?>