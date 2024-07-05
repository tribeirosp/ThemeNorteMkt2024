<?php
/**
 *
 * The template for displaying the full width page.
 * 
 * @file      page.php
 * @package   norte_marketing
 * @author    Norte Marketing
 * @link 	  https://www.nortemkt.com
 */
?>
<?php get_header(); ?>

<div id="primary" class="container">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<main id="main" class="site-main" role="main">
				<section id="content">

					<?php if (have_posts()) { ?>
						<?php while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header class="entry-header">
									<h1 class="entry-title"><?php the_title(); ?></h1>
								</header>
								<div class="entry-content">
									<?php the_content(); ?>
								</div><!-- .entry-content -->
								<footer class="entry-footer">
									<?php edit_post_link(__('Edit', 'norte_marketing'), '<span class="edit-link">', '</span>'); ?>
								</footer><!-- .entry-footer -->
							</article><!-- #post-## -->
						<?php endwhile; ?>
						<?php if ($wp_query->max_num_pages > 1) { ?>
							<div class="navigation">
								<div class="previous"><?php next_posts_link(__('&#8249; Avançar', 'norte_marketing')); ?></div>
								<div class="next"><?php previous_posts_link(__('Voltar &#8250;', 'norte_marketing')); ?></div>
							</div>
						<?php } ?>
					<?php } else { ?>
						<?php get_template_part('includes/content_excerpt_404'); ?>
					<?php } ?>
				</section>
			</main>
		</div>
	</div>
</div>

<?php get_footer(); ?>