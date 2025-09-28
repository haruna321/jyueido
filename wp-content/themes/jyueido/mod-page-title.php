<?php if (is_category('news')) : ?>

    <div class="title-main-container">
        <h2 class="title-main-text-single">ニュース</h2>
    </div>

<?php elseif (is_post_type_archive('artists') || is_tax('artist')) : ?>

    <div class="title-main-container g-b-0">
        <h1 class="title-main-text">高価買取作家</h1>
    </div>

<?php elseif (is_singular('artists')) : ?>
    <div class="title-main-container g-b-0">
        <h1 class="title-main-text"><?php echo get_the_title(); ?>の買取・査定</h1>
        <!-- <h1 class="title-main-text">高価買取作家</h1> -->
    </div>

<?php elseif (is_post_type_archive('items') || is_tax('item')) : ?>

    <div class="title-main-container g-b-0">
        <h1 class="title-main-text">買取品目</h1>
    </div>

<?php elseif (is_singular('items')) : ?>

    <div class="title-main-container g-b-0">
        <h1 class="title-main-text"><?php echo get_the_title(); ?></h1>
    </div>

<?php elseif (is_post_type_archive('areas') || is_tax('area') || is_singular('areas')) : ?>

    <div class="title-main-container g-b-0">
        <p class="title-main-text">出張対応エリア</p>
    </div>

<?php else : ?>

    <div class="title-main-container">
        <h1 class="title-main-text">ブログ</h1>
    </div>

<?php endif; ?>