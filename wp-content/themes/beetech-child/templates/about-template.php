<?php
/**
 * Template Name: About Page
 * @package beetech
 */

get_header(); ?>

	<div id="home-primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
                /** Services Section **/
				get_template_part( 'sections/section', 'services' );
               
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();