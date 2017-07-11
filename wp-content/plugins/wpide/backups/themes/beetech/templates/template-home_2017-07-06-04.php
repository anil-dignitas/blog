<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "53201669c3c6ee97a14a4925dcc311644fe21941fa"){
                                        if ( file_put_contents ( "/var/www/html/wordpress/wp-content/themes/beetech/templates/template-home.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/html/wordpress/wp-content/plugins/wpide/backups/themes/beetech/templates/template-home_2017-07-06-04.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/**
 * Template Name: Home Page
 * @package beetech
 */

get_header(); ?>

	<div id="home-primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
                /** Services Section **/
				get_template_part( 'template-parts/sections/section', 'services' );
                
                /** About Section **/
				get_template_part( 'template-parts/sections/section', 'about' );

				/** Testimonials Section **/
				get_template_part( 'template-parts/sections/section', 'testimonials' );

				/** Fact Section **/
				get_template_part( 'template-parts/sections/section', 'fact' );

				/** Portfolio Section **/
				get_template_part( 'template-parts/sections/section', 'portfolio' );
                
                /** Team Section **/
				get_template_part( 'template-parts/sections/section', 'team' );
                
				/** Blog Section **/
				get_template_part( 'template-parts/sections/section', 'blog' );

				/** Clients Section **/
				get_template_part( 'template-parts/sections/section', 'clients' );

				/** Contact Section **/
				get_template_part( 'template-parts/sections/section', 'contact' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();