<?php

/**
 * The template for displaying image attachments.
 *
 * @file      image.php
 * @package   norte_marketing
 * @author    Norte Marketing
 * @link 	  https://www.nortemkt.com
 **/
?>
<?php get_header(); ?>
<div id="primary" class="container">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<main id="main" class="site-main" role="main">
				<section id="content">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
							<?php the_attachment_link($post->ID, true) ?>
						</div>
						<footer class="entry-footer">
							<?php edit_post_link(__('Edit', 'norte_marketing'), '<span class="edit-link">', '</span>'); ?>
						</footer>
					</article>
				</section>
			</main>
		</div>
	</div>
</div>
<?php get_footer(); ?>