<?php get_header(); ?>


			<div id="content" class="owl-carousel">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
							<!-- the query -->
							<?php 
								$args = array(
									'category_name'		  => 'slide',
									//'post_type' 		  => array( 'any' ),
									'ignore_sticky_posts' => 1,
									'post__not_in'		  => $sticky,
									'nopaging'			  => true,
									'posts_per_page'	  => 5,
									'orderby'			  => 'date',
									'order'   			  => 'DESC'
								);
								$the_query = new WP_Query( $args );
							?>
							<?php if ( $the_query->have_posts() ) : ?>

							<div class="wrap">

							<!-- the loop -->
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'owl-slide wrap cf' ); ?> role="article">

								<header class="article-header">

									<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>


								</header>

								<section class="entry-content cf">
									<!-- <p>using front-page.php</p> -->
									<?php the_content(); ?>
								</section>

								<footer class="article-footer cf">

									<?php //twentyfifteen_entry_meta(); ?>

								</footer>

							</article>

							<?php endwhile; ?>

							<?php wp_reset_postdata(); ?>

							<?php else : ?>

								<!-- DEFAULT HOME PAGE -->
								<article id="post-not-found" class="hentry cf">
									<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
									</footer>
								</article>

							<?php endif; ?>
						
							</div><!-- end owl-carousel -->

						</main>

					<!-- featured content -->
					<?php //get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
