<?php
/**
 * Created by PhpStorm.
 * User: chutienphuc
 * Date: 22/04/2015
 * Time: 17:45
 * This template to display footer
 */
?>
</div> <!-- end #container -->
</div> <!-- end #wrapper -->
<div class="newsletter-block">
    Join our letter
    <?php echo do_shortcode('[formidable id=16]');?>
</div>
<footer>
    <?php dynamic_sidebar( 'footer-block-1' ); ?>
    <?php dynamic_sidebar( 'footer-block-2' ); ?>
    <?php dynamic_sidebar( 'footer-block-3' ); ?>
</footer>
<?php wp_footer(); ?>
</body> <!-- end body -->
</html> <!-- end html -->

