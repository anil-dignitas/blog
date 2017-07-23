<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @subpackage beetech
 */

?>

<article class="cuswr" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-image-wrap">
		<?php 
			if( has_post_thumbnail() ){
				the_post_thumbnail( 'beetech_single_thumb' );
			}
		?>
	</div>
	<div class="blog-content-wrap">

		<h1 class="entry-title">WHO Am I ?</h1>
		
		<div class="entry-content">
			<?php
				the_content();
                
                wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'beetech' ),
					'after'  => '</div>',
				) );
			?>
			<!--custom design  -->
			<div class="about-custom">
				<div class="skil-sets">
					<span>LAMP Stack (Linux, Apache, MySQL, PHP) </span>
					<span>MEAN Stack (Mongo, Express, Angular, Node) </span>
					<span>ASP.NET, .NET (MVC)</span>
					<span>Zend</span>
					<span>Laravel</span>
					<span>Codeigniter</span>
					<span>Redis Database</span>
					<span>React</span>
					<span>Flux</span>
					<span>Vue</span>
					<span>Bootstrap</span>
					<span>Jquery</span>
					<span>SEO and SEM</span>
					<span>Social Media and Internet Marketing</span>
				</div>
				<div class="on-the-web">
					<span style="font-family: terminal, monaco, monospace; font-size: 14pt;"><strong>On The Web:</strong></span>
					<div>
						<a href="https://facebook.com/realAnilSharma" class="c-so-link" target="_blank">Facebook</a>
						<a href="https://twitter.com/realAnilSharma" class="c-so-link" target="_blank">Twitter</a>
						<a href="https://www.youtube.com/channel/UCU3rEpeziO4iLirQFjR_bNQ" class="c-so-link" target="_blank">Youtube</a>
						<a href="https://www.instagram.com/_iam.as/" class="c-so-link" target="_blank">Instagram</a>
						<a href="https://www.linkedin.com/in/realanilsharma" class="c-so-link" target="_blank">Linkedin</a>
						<a href="https://in.pinterest.com/realanilsharma" class="c-so-link" target="_blank">Pinterest</a>
					</div>
				</div>
				<div class="about-more">
						<div><p>
						more<br>
						<i class="fa fa-arrow-down"></i>
						</div>
				</div>
				<div class="qrcode">
					<img src="http://tyagibhai.com/wordpress/wp-content/uploads/2017/07/qr-code.png"/>
				</div>
			</div>
		<footer class="entry-footer">
			<?php beetech_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>

</article><!-- #post-## -->


