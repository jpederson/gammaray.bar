<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
$admin_email = get_option( 'admin_email' );
?>
	
	</section>
	
	<footer class="footer">
		<?php print apply_filters( 'the_content', get_field( 'address', 'option' ) ); ?>
		<p class="copyright">Copyright &copy; <?php print date( 'Y' ) ?> GammaRay Bar. All Rights Reserved.</p>
	</footer>

</div><!-- #container -->

<?php wp_footer(); ?>
</body>
</html>