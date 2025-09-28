<?php get_header(); ?>
<div class="achievements-page">
  <h1>買取実績一覧</h1>

  <ul>
    <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1; //pagedの設定
            $args = array(
                'post_type' => 'achievements',
                'posts_per_page' => 15,
                'paged' => $paged
            );
            $my_query = new WP_Query($args);
            $max_num_pages = $my_query->max_num_pages;  //max_num_pagesの設定　my_queryを使う
            ?>
    <?php
   if ($my_query->have_posts()) :
   while ($my_query->have_posts()) : $my_query->the_post();   //my_queryを使う                    
?>
    <li>
      <a href="<?php the_permalink(); ?>">
        <img src="<?php echo CFS()->get('image'); ?>" alt="">
        <div class="achievements-right">
          <p class="achievements-item"><span class="green">買取品名：</span><?php echo CFS()->get('item'); ?></p>
          <p class="achievements-area"><span class="green">エリア：</span><?php echo CFS()->get('area'); ?></p>
          <p class="achievements-price"><span class="green">買取額：</span><?php echo CFS()->get('price'); ?></p>
          <!-- <p class="achievements-text">
          <?php echo CFS()->get('textarea'); ?>
        </p> -->
        </div>
      </a>
    </li>
    <?php endwhile; ?>
    <?php else : ?>
    <p>まだ投稿はありません。</p>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </ul>
  <div class="pagination">
    <?php
                            if ($my_query->max_num_pages > 1) {    //max_num_pagesの設定　my_queryを使う
                                echo paginate_links(array(
                                    'base' => get_pagenum_link(1) . '%_%',
                                    'format' => '?paged=%#%',
                                    'current' => max(1, $paged),
                                    'total' => $my_query->max_num_pages,  //max_num_pagesの設定
                                    'prev_text' => '<',
                                    'next_text' => '>'
                                ));
                            }
                            ?>
  </div>
</div>
<?php get_footer(); ?>