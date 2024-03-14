<?php get_template_part('games', 'footer'); ?>
</section>
<!--</bdcn>-->
<?php
// Do some actions before the footer
do_action('arcadexls_before_footer');
?>
<!--<ftcn>-->
<footer class="ft" itemscope="itemscope" itemtype="http://schema.org/WPFooter">

  <section class="ftxt">
    <p><?php $copyright = arcadexls_get_option( 'footer_copyright' ); if ( empty( $copyright ) ) { $copyright = sprintf( __('Proudly powered by %sMyArcadePlugin%s', 'arcadexls'), '<a target="_blank" href="http://myarcadeplugin.com/" title="WordPress Arcade" itemprop="url">', '</a>' ) ; } echo $copyright; ?></p>
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