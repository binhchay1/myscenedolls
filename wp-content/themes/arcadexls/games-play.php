<?php echo arcadexls_breadcumb($type = 1); ?>

<header class="title title-play bg bgco1 rnd5">
  <h1><?php the_title(); ?></h1>
  <span class="iconb-prev" data-tooltip="tooltip" data-placement="top" title="<?php _e('Prev game', 'arcadexls'); ?>"><?php previous_post_link('%link', __('Prev game', 'arcadexls')); ?></span>
  <span class="iconb-next" data-tooltip="tooltip" data-placement="top" title="<?php _e('Next game', 'arcadexls'); ?>"><?php next_post_link('%link', __('Next game', 'arcadexls')); ?></span>
</header>

<section class="game-brcn bgdg1 clfl rnd5 shdw1">
  <?php if (function_exists('the_ratings')) { ?>
    <div class="flol">
      <span class="iconb-rate"><?php printf(__('%sRATE%s THIS GAME:', 'arcadexls'), '<strong>', '</strong>'); ?></span>
      <div class="votcnt">
        <?php the_ratings(); ?>
      </div>
    </div>
  <?php } ?>
  <div class="flor">
    <?php if (function_exists('wpfp_link')) {
      echo arcadexls_countfav();
    } ?><?php if (function_exists('the_views')) { ?><span class="iconb-game"><?php the_views(); ?></span><?php } ?>
  </div>
</section>

<section class="game">
  <?php get_template_part('games', 'buttons'); ?>
  <div class="gamecnt">
    <div class="game_play" id="object_juego" <?php if (arcadexls_get_option('progress-bar', 1) == 1) { ?> style="display:none<?php } ?>">
      <?php
      if (function_exists('get_game')) { ?>
        <?php
        $embedcode = get_game($post->ID);
        global $mypostid;
        $mypostid = $post->ID;
        echo myarcade_get_leaderboard_code();
        echo $embedcode;
        ?>
      <?php } ?>
    </div>
    <?php
    if (arcadexls_get_option('progress-bar', 1) == 1) {
    ?>
      <div class="game_load gameload">
        <?php
        if (arcadexls_get_option('mtgameprebanner-switch', 1) == '1') {
          $mtgameprebanner = stripslashes(arcadexls_get_option('mtgameprebanner'));
        ?>
          <div class="bnr300">
            <?php echo $mtgameprebanner; ?>
          </div>
        <?php } ?>
        <div id="progressbar">
          <div class="progress" style="width: 0%;"><span>0 %</span></div>
        </div>
      </div>
    <?php } ?>
  </div>
  <div class="lgtbxbg-pofi"></div>
</section>

<?php $countscreen = myarcade_count_screenshots(); ?>
<section class="blkcnt bgco2">
  <ul class="bltitl lstabs lstli">
    <li class="active"><a href="#gamtab1" data-toggle="tab"><strong>1</strong> <span>
          <h2><?php _e('DETAILED DESCRIPTION OF THE', 'arcadexls'); ?> <?php the_title() ?></h2>
        </span></a></li>
    <li><a href="#gamtab2" data-toggle="tab"><strong>2</strong> <span><?php _e('INSTRUCTIONS', 'arcadexls'); ?></span></a></li><?php if (function_exists("myarcadecontrols_output")) {
                                                                                                                                  $controls = myarcadecontrols_output(); ?>
      <?php if (!empty($controls)) { ?>
        <li><a href="#myarcadecontrolstab" data-toggle="tab"><strong>3</strong> <span><?php _e('CONTROLS', 'arcadexls'); ?></span></a></li>
      <?php } ?>
    <?php } ?>
    <?php $countcomments = get_comments_number(); ?>
    <li><a href="#commentstab" data-toggle="tab"><strong>4</strong> <span><?php _e('COMMENTS', 'arcadexls'); ?> <strong><?php echo $countcomments; ?></strong></span></a></li>
    <?php if ($countscreen > 0) { ?>
      <li class="screenclk"><a href="#gamtab4" data-toggle="tab"><strong>5</strong> <span><?php _e('SCREENSHOTS', 'arcadexls'); ?> <strong><?php echo $countscreen; ?></strong></span></a></li>
    <?php } ?>
    <?php $video = myarcade_video(); ?>
    <?php if (arcadexls_get_option('display-game-video', 1) == 1 && $video) { ?>
      <li><a href="#videotab" data-toggle="tab"><strong>6</strong> <span><?php _e('Video', 'arcadexls'); ?></span></a></li>
    <?php } ?>
  </ul>
  <div class="lstabcn_cn">
    <ul class="lstabcn tab-content">
      <li class="tab-pane fade in active" id="gamtab1">
        <article class="game-info">
          <section class="blcnbx">
            <figure class="imgcnt"><?php myarcade_thumbnail(array('width' => 130, 'height' => 130, 'lazy_load' => arcadexls_get_option('lazy_load'), 'show_loading' => arcadexls_get_option('lazy_load_animation'))); ?></figure>
            <section>
              <p><strong><?php _e('Description:', 'arcadexls'); ?></strong></p>
              <p><?php myarcade_description(); ?></p>
            </section>
          </section>
          <footer>
            <span class="iconb-date"><?php _e('Uploaded on:', 'arcadexls'); ?> <strong><?php echo get_the_date('d'); ?> <?php echo get_the_date('M'); ?> , <?php echo get_the_date('Y'); ?></strong></span> <span class="iconb-user"><?php _e('Uploader:', 'arcadexls'); ?> <a href="<?php echo get_author_posts_url($post->post_author); ?>"><?php the_author_meta('display_name', $post->post_author); ?></a></span> <span class="iconb-cate"><?php _e('Categories:', 'arcadexls'); ?> <?php echo get_the_category_list(', '); ?></span> <span class="iconb-comt"><?php printf(__('Comments: <strong>%s</strong>', 'arcadexls'), get_comments_number()); ?></span> <?php echo get_the_tag_list('<span class="iconb-tags">' . __('Tags:', 'arcadexls') . ' ', ', ', '</span>'); ?>
          </footer>
        </article>
      </li>
      <li class="tab-pane fade" id="gamtab2">
        <article class="game-info">
          <section class="blcnbx">
            <section>
              <p><strong><?php _e('Instructions:', 'arcadexls'); ?></strong></p>
              <p><?php myarcade_instructions(); ?></p>
            </section>
          </section>
        </article>
      </li>

      <?php if (function_exists("myarcadecontrols_output")) { ?>
        <?php if (!empty($controls)) { ?>
          <li class="tab-pane fade" id="myarcadecontrolstab">
            <article class="game-info">
              <section class="blcnbx">
                <section>
                  <?php echo $controls; ?>
                </section>
              </section>
            </article>
          </li>
        <?php } ?>
      <?php } ?>

      <li class="tab-pane fade" id="commentstab">
        <?php comments_template(); ?>
      </li>
      <?php if ($countscreen > 0) { ?>
        <li class="tab-pane fade" id="gamtab4">
          <div class="blcnbx scrlbr">
            <ul class="pstgms lstli">
              <?php myarcade_all_screenshots(130, 130, 'screen_thumb'); ?>
            </ul>
          </div>
        </li>
      <?php } ?>
      <?php if (arcadexls_get_option('display-game-video', 1) == 1 && $video) { ?>
        <li class="tab-pane fade" id="videotab">
          <div class="blcnbx scrlbr">
            <?php echo $video; ?>
          </div>
        </li>
      <?php } ?>
    </ul>
  </div>
</section>
<section>
  <h3 style="font-size: 20px; font-weight: bold; margin-bottom: 10px;">Related post</h3>
  <?php
  $related = get_posts(array('category__in' => wp_get_post_categories($post->ID), 'numberposts' => 10, 'post__not_in' => array($post->ID))); ?>
  <ul class="pstgms lstli">
    <?php if ($related) foreach ($related as $post) { ?>
      <li class="post">
        <article class="pstcnt bgco1 rnd5">
          <figure class="rnd5"><a href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail($post->ID) ?></a></figure>
          <header>
            <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
            <p><a href="<?php get_category_link(get_the_category()) ?>" rel="category tag"><?php get_the_category()[0]->cat_name ?></a></p>
            <a class="iconb-game" href="<?php the_permalink() ?>" title="Play"><span>Play</span></a>
          </header>
        </article>
      </li>
    <?php } ?>
  </ul>
</section>


<section>
  <h3 style="font-size: 20px; font-weight: bold; margin-bottom: 10px;">Related category</h3>
  <div class="top-cate-homepage">
    <ul class="pstgms lstli" style="margin-top: 20px;">
      <?php
      $cat_id = get_the_category()[0]->term_id;
      $exclude = array($cat_id);
      $cat_list = array();

      foreach (get_categories() as $cat) {
        if (!in_array($cat->term_id, $exclude) and $cat->name != 'TOP DOWNLOAD') {
          $cat_list[] = '<li class="post"><a href="' . esc_url(get_category_link($cat->term_id)) .
            '"><div class="in-list-top-cate">' . $cat->name . '</li></a>';
        }
      }

      echo implode(' ', $cat_list);
      ?>
    </ul>
  </div>
</section>