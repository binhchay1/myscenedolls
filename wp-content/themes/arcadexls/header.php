<!doctype html>
<!--[if IE 8]><html class="ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9]><html class="ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>><!--<![endif]-->

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="theme-color" content="<?php echo arcadexls_get_option('toolbar-color'); ?>">
  <meta name="msapplication-navbutton-color" content="<?php echo arcadexls_get_option('toolbar-color'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!--[if lte IE 9]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css"><![endif]-->
  <!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/lib/html5.js"></script><![endif]-->
  <?php wp_head(); ?>
</head>
<style>
  #hdhdcn {
    background: #c7a5d1
  }

  #content-header {
    font-size: 14px;
    padding: 1%;
    overflow: auto;
    margin-bottom: 10px;
    background-color: #fff;
    border-radius: 15px;
  }
</style>

<body <?php body_class(); ?>>

  <?php
  // Do some actions before we open the page wrapper
  do_action('arcadexls_before_wrapper');
  ?>
  <!--<wrpp>-->
  <section class="wrpp<?php if (arcadexls_get_option('mt-choose-size', 1) == 2) {
                        echo ' boxed';
                      } ?>">
    <?php
    // Do some actions before the header output
    do_action('arcadexls_before_header');
    ?>
    <!--<hdcn>-->
    <header class="hdcn bgdg1 shdw1 rnd5" id="hdhdcn" itemscope="itemscope" itemtype="http://schema.org/WPHeader" style="background-color: #c7a5d1">
      <section class="hdcn1 flol pore">
        <?php $logo = arcadexls_get_option('logohd'); ?>
        <div class="logo-themes flol pore"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo $logo['url']; ?>" alt="<?php bloginfo('blogname'); ?>"></a></div>
        <nav class="navcnt flol pore" itemscope="itemscope" itemtype="http://www.schema.org/SiteNavigationElement">
          <button type="button" class="btn-collapse" data-toggle="collapse" data-target=".menucn-hd" data-tooltip="tooltip" data-placement="top" title="<?php _e('Menu', 'arcadexls'); ?>"><span class="iconb-menu rgba1 rnd5"><?php _e('Menu', 'arcadexls'); ?></span></button>
          <?php
          // Do some actions before the main menu
          do_action('arcadexls_before_menu');
          ?>
          <div class="menucn menucn-hd collapse">
            <ul>
              <li><a class="iconb-home" href="<?php echo home_url(); ?>"><?php _e('HOME', 'arcadexls'); ?></a></li>
              <?php wp_nav_menu(array('fallback_cb' => 'arcadexls_default_menu', 'container' => '', 'theme_location' => 'menu_header', 'items_wrap' => '%3$s', 'walker' => new arcadexls_walker_nav_menu())); ?>
              <li><a class="iconb-rand" href="<?php echo home_url(); ?>/?randomgame=1"><?php _e('RANDOM GAME', 'arcadexls'); ?></a></li>
            </ul>
          </div>
          <?php
          // Do some actions after the main menu
          do_action('arcadexls_after_menu');
          ?>
        </nav>
      </section>
      <?php if (arcadexls_get_option('show_loginform', 1) == 1) { ?>
        <section class="hdcn2 flol-pore">
          <?php if (!is_user_logged_in()) { ?>
            <!--[OFFLINE]-->
            <div class="usrbx flol-pore">
              <figure class="rgba1 rnd5"><img src="<?php echo get_template_directory_uri(); ?>/img/user_img2.png" alt="<?php _e('Guest', 'arcadexls'); ?>" height="38px" width="38px"></figure>
              <p><strong><?php _e('Welcome', 'arcadexls'); ?></strong></p>
              <p><strong><a class="iconb-lgin" href="#" data-toggle="modal" data-target="#modal-login"><strong><?php _e('LOGIN', 'arcadexls'); ?></strong></a></strong></p>
            </div>
            <ul class="btnshd flol lstli pore">
              <li><a class="botn iconb-lgin" href="#" data-toggle="modal" data-tooltip="tooltip" data-placement="top" data-target="#modal-login" title="<?php _e('LOGIN', 'arcadexls'); ?>"><?php _e('LOGIN', 'arcadexls'); ?></a></li>
              <li><a class="botn iconb-user" href="#" data-toggle="modal" data-tooltip="tooltip" data-placement="top" data-target="#modal-signup" title="<?php _e('SIGNUP', 'arcadexls'); ?>"><?php _e('SIGNUP', 'arcadexls'); ?></a></li>
            </ul>
          <?php
          } else {
            global $current_user;
          ?>
            <!--[ONLINE]-->
            <div class="usrbx flol pore">
              <figure class="rgba1 rnd5"><?php echo get_avatar($current_user->ID, 40); ?></figure>
              <p><strong><?php echo $current_user->display_name; ?></strong></p>
              <p><a href="<?php if (defined('BP_VERSION')) {
                            global $bp;
                            echo $bp->loggedin_user->domain;
                          } else {
                            echo home_url() . '/wp-admin/profile.php';
                          } ?>"><strong><?php _e('MY ACCOUNT', 'arcadexls'); ?></strong></a></p>
            </div>
            <ul class="btnshd flol lstli pore">
              <li><a class="botn iconb-lgot" href="<?php echo wp_logout_url(get_option('home') . '/'); ?>" data-tooltip="tooltip" data-placement="top" title="<?php _e('LOGOUT', 'arcadexls'); ?>"><?php _e('LOGOUT', 'arcadexls'); ?></a></li>
            </ul>
          <?php } ?>
        </section>
      <?php } ?>
      <section class="hdcn3 srcsoc flor pore rgba1">
        <div class="srchbx flol pore rgba1 rnd5">
          <form method="get" id="search_form" action="<?php bloginfo('url'); ?>">
            <input name="s" id="s" type="text" placeholder="<?php _e('Search game...', 'arcadexls'); ?>">
            <button name="btn_search" type="submit"><span class="iconb-srch"><?php _e('Search', 'arcadexls'); ?></span></button>
          </form>
        </div>
        <?php arcadexls_get_social_icons('header'); ?>
      </section>
    </header>
    <!--</hdcn>-->

    <?php if (is_home() and is_front_page()) { ?>
      <?php $h1HomePage = get_option('h1_homepage') ?>
      <div id="content-header" class="rounded bg-white">
        <h1><?php echo $h1HomePage ?></h1>
      </div>

      <h2 style="font-size: 20px; font-weight: bold; color: #fff">Top categories</h2>
      <?php
      $topCategory = get_option('top_category_homepage');
      if ($topCategory) {
        $arrTopCategory = json_decode(json_encode(json_decode($topCategory)), true); ?>

        <div class="top-cate-homepage">

          <div class="list-top-cate">
            <?php foreach ($arrTopCategory as $category => $status) {
              if ($status == 'true') { ?>
                <a href="<?php echo get_category_link(get_cat_ID($category)) ?>">
                  <div class="in-list-top-cate"><?php echo ucfirst(str_replace('-', ' ', $category)) ?></div>
                </a>
            <?php }
            } ?>
          </div>
        </div>
      <?php }
      ?>

      <?php $args = array(
        'posts_per_page'   => -1,
        'post_type'        => 'post',
        'meta_key'         => 'top_game_homepage',
        'meta_value'       => '1'
      );

      $query = new WP_Query($args);

      ?>
      <div class="top-cate-homepage">
        <h2 style="font-size: 20px; font-weight: bold; color: #fff">Top games</h2>
        <div class="list-top-cate">
          <?php foreach ($query->posts as $post) {
            $img_url = get_post_meta($post->ID, 'mabp_thumbnail_url');
          ?>

            <article class="pstcnt bgco1 rnd5">
              <figure class="rnd5"><a href="<?php get_permalink($post->ID) ?>"><img src="<?php echo $img_url[0] ?>" width="100" height="100" alt="<?php echo $post->post_title ?>"></a></figure>
              <header>
                <h2><a href="<?php get_permalink($post->ID) ?>"><?php echo get_the_title($post->ID) ?></a></h2>
                <p><a href="<?php get_category_link(get_the_category($post->ID)) ?>" rel="category tag"><?php get_the_category($post->ID)[0]->cat_name ?></a></p>
                <a class="iconb-game" href="<?php get_permalink($post->ID) ?>" title="Play"><span>Play</span></a>
              </header>
            </article>

          <?php } ?>
        </div>
      </div>
    <?php } ?>


    <?php if (is_category() and !is_category(array(1))) { ?>
      <?php
      // Generate dynamic heading for SEO
      $category = get_category(get_query_var('cat'));
      $cat_id = $category->cat_ID;
      $result = $wpdb->get_results("SELECT * FROM wp_category_custom WHERE category_id = $cat_id");
      if (!empty($result)) {
      ?>
        <h1><?php echo $result[0]->title ?></h1>
      <?php } ?>
      <div style="display: flex; flex-direction: column; margin-left: 10px">
        <h2 style="font-size: 20px; font-weight: bold; color: #fff">Top categories</h2>
        <?php
        $topCategory = get_option('top_category_homepage');
        if ($topCategory) {
          $arrTopCategory = json_decode(json_encode(json_decode($topCategory)), true); ?>

          <div class="top-cate-homepage">
            <div class="list-top-cate">
              <?php foreach ($arrTopCategory as $category => $status) {
                if ($status == 'true') { ?>
                  <a href="<?php echo get_category_link(get_cat_ID($category)) ?>">
                    <div class="in-list-top-cate"><?php echo ucfirst(str_replace('-', ' ', $category)) ?></div>
                  </a>
              <?php }
              } ?>
            </div>
          </div>
        <?php }
        ?>

        <?php
        $category = get_category(get_query_var('cat'));
        $queryGet = "SELECT * FROM " . $wpdb->prefix . 'top_game_category WHERE category_id = "' . $category->term_id . '"';
        $resultTopGame = $wpdb->get_results($queryGet);

        if (empty($resultTopGame)) {
          $listTopGame = array();
        } else {
          if (empty($resultTopGame[0]->game)) {
            $listTopGame = array();
          } else {
            $listTopGame = explode(',', $resultTopGame[0]->game);
          }
        }

        ?>
        <div class="top-cate-homepage">
          <h2 style="font-size: 20px; font-weight: bold; color: #fff">Top games</h2>
          <div class="list-top-cate">
            <?php foreach ($listTopGame as $post_id) {
              $img_url = get_post_meta($post_id, 'mabp_thumbnail_url');
            ?>

              <article class="pstcnt bgco1 rnd5">
                <figure class="rnd5"><a href="<?php get_permalink($post_id) ?>"><img src="<?php echo $img_url[0] ?>" width="100" height="100" alt="<?php echo get_the_title($post_id) ?>"></a></figure>
                <header>
                  <h2><a href="<?php get_permalink($post_id) ?>"><?php echo get_the_title($post_id) ?></a></h2>
                  <p><a href="<?php get_category_link(get_the_category($post_id)) ?>" rel="category tag"><?php get_the_category($post_id)[0]->cat_name ?></a></p>
                  <a class="iconb-game" href="<?php get_permalink($post_id) ?>" title="Play"><span>Play</span></a>
                </header>
              </article>
            <?php } ?>
          </div>
        </div>
      </div>

    <?php } ?>

    <!--<bdcn>-->
    <section class="bdcn">
      <?php
      // Do some actions before the content wrap
      do_action('arcadexls_before_content');
      ?>

      <?php get_template_part('games', 'header'); ?>