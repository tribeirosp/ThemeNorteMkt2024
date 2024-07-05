<?php

/**
 * The Template for displaying all single posts.
 *
 * @file      single.php
 * @package   norte_marketing
 * @author    Norte Marketing
 * @link 	  https://www.nortemkt.com
 */
?>
<?php get_header(); ?>

<div id="primary" class="container">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-8">
			<main id="main" class="site-main" role="main">
				<section id="content">
					<?php if (have_posts()) { ?>
						<?php while (have_posts()) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class('post single-post'); ?>>
								<div class="post-entry">
									<header class="entry-header mb-3 pb-2 ">
										<h1 class="entry-title"><?php the_title(); ?></h1>
										
										<div class="data-post">
											<h3><?php echo the_time('j, F, Y');   ?> · </h3>
										</div>  
										<?php show_category_post(); ?>
									</header>
									<?php the_content(); ?>
									<footer class="entry-footer">
										<div class="post-tags mb-3 mt-3">
											<?php the_tags('<span class="tags">' . __('<b>Tags:</b> ', 'norte_marketing') . ' ', ", ", "</span>") ?>
										</div>
										<?php edit_post_link(__('Edit', 'norte_marketing'), '<span class="edit-link" >', '</span>'); ?>
										<?php if (comments_open()) : ?>
											<span class="sep"> - </span>
											<span class="comments"><?php comments_popup_link(__('no comments', 'norte_marketing'), __('1 comment', 'norte_marketing'), __('% comments', 'norte_marketing')); ?></span>
										<?php endif; ?>
									</footer>
								</div><!-- /post-entry -->
							</article><!-- post -->
							<?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'norte_marketing'), 'after' => '</div>')); ?>
					
							<?php comments_template( '', true ); ?>

					
					
							<?php endwhile; ?>
						<?php if ($wp_query->max_num_pages > 1) { ?>
							<div class="navigation">
								<div class="previous"><?php next_posts_link(__('Avançar >', 'norte_marketing')); ?></div>
								<div class="next"><?php previous_posts_link(__('< Voltar ', 'norte_marketing')); ?></div>
							</div>
						<?php } ?>
					<?php } else { ?>
						<?php if ($wp_query->max_num_pages > 1) { ?>
							<div class="navigation">
								<div class="previous"><?php next_posts_link(__('Avançar >', 'norte_marketing')); ?></div>
								<div class="next"><?php previous_posts_link(__('< Voltar ', 'norte_marketing')); ?></div>
							</div>
						<?php } ?>
						<?php get_template_part('includes/content_excerpt_404'); ?>
					<?php } ?> <!-- /have_posts -->
				</section>
			</main>
		</div>

		<aside class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-4">
			<?php get_sidebar(); ?>
		</aside>
	</div>
</div>
<?php get_footer(); ?>