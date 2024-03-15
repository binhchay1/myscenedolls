<?php get_template_part('games', 'footer'); ?>
</section>
<!--</bdcn>-->
<?php
// Do some actions before the footer
do_action('arcadexls_before_footer');
?>
<!--<ftcn>-->
<style>
  #content-footer {
    font-size: 14px;
    padding: 1%;
    overflow: auto;
    margin-bottom: 10px;
    background-color: #fff;
    border-radius: 15px;
  }
</style>

<?php if (is_home() and is_front_page()) { ?>
  <?php $descriptionHomepage = get_option('description_homepage') ?>
  <div id="content-footer" class="rounded bg-white">
    <?php echo html_entity_decode($descriptionHomepage) ?>
  </div>
<?php } ?>

<?php if (is_category() and !is_category(array(1))) { ?>
  <?php $category = get_category(get_query_var('cat'));
  $cat_id = $category->cat_ID;
  $result = $wpdb->get_results("SELECT * FROM wp_category_custom WHERE category_id = $cat_id");
  if (!empty($result)) {
  ?>
  <?php } ?>
  <div id="content-footer" class="rounded bg-white">
    <?php echo html_entity_decode($result[0]->content) ?>
  </div>
<?php } ?>

<footer class="ft" itemscope="itemscope" itemtype="http://schema.org/WPFooter">

  <section class="ftxt">
    <p><?php $copyright = arcadexls_get_option('footer_copyright');
        if (empty($copyright)) {
          $copyright = sprintf(__('Proudly powered by %sMyArcadePlugin%s', 'arcadexls'), '<a target="_blank" href="http://myarcadeplugin.com/" title="WordPress Arcade" itemprop="url">', '</a>');
        }
        echo $copyright; ?></p>
  </section>
</footer>
<!--</ftcn>-->
<?php
// Do some actions after the footer
do_action('arcadexls_after_footer');
?>
</section>
<!--</wrpp>-->

<?php wp_footer(); ?>
<!--[if lt IE 9]><script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/css3mq.js"></script><![endif]-->
<!--[if lte IE 9]><script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/ie.js"></script><![endif]-->

</body>

</html>