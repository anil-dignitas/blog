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

		<h1 class="entry-title">GET IN TOUCH</h1>
		
		<div class="entry-content">
			<?php
				the_content();
                
                wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'beetech' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php beetech_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>

</article><!-- #post-## -->


