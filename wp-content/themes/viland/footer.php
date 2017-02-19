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
<footer id="footer">
	<div class="footer-container">
		<div class="newsletter-block">
			<div class="container">
				<span>Join our newsletter</span>
				<?php echo do_shortcode('[formidable id=16]');?>
			</div>
		</div>
		<div class="footer-content">
			<div class="container">
				<div class="footer-block footer-block-1">
					<?php dynamic_sidebar( 'footer-block-1' ); ?>
				</div>
				<div class="footer-block footer-block-2">
					<?php dynamic_sidebar( 'footer-block-2' ); ?>
				</div>
				<div class="footer-block footer-block-3">
					<?php dynamic_sidebar( 'footer-block-3' ); ?>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body> <!-- end body -->
</html> <!-- end html -->

