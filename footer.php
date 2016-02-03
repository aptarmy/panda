<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package panda
 */

?>

	<footer class="site-footer">
		<div class="footer-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'panda' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'panda' ), 'WordPress' ); ?></a>
			|
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'panda' ), 'panda', '<a href="http://automattic.com/">Automattic</a>' ); ?>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
