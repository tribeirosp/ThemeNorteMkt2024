<?php
/**
 * The default template for displaying content excerpt.
 *
 * @file      content-excerpt.php
 * @package   norte_marketing
 * @author    Norte Marketing
 * @link 	  https://www.nortemkt.com
 */
?>  
        <article id="post-<?php the_ID(); ?>" <?php post_class('post-excerpt mb-4'); ?>>
            <header class="entry-header mb-3 ">
                <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );?>
           
            </header>  

			<div class="row">
            <?php if(has_post_thumbnail()): ?>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-3 mb-sm-4 mb-md-3 mb-lg-0 mb-lg-0 mb-xl-0">
                    <figure class="thumbnail-post">
                        <a class="container-photo" href="<?php the_permalink() ?>" title="<?php printf(__('%s', 'norte_marketing'), the_title_attribute('echo=0')); ?>">
                            <?php the_post_thumbnail( 'thumb-300x200' ); ?>
                        </a>
                    </figure>
                </div>
            <?php endif; ?> 

                <div class="<?php if(has_post_thumbnail()): ?> col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8  <?php else: ?> col-12  <?php endif; ?>  ">
                    <div class="excerpt">
                        <p>
                            <a href="<?php the_permalink() ?>" title="Saiba Mais">
                                <?php 
                                    $excerpt = get_the_excerpt();                                                                
                                    echo substr($excerpt, 0, 345);                                    
                                    if (strlen($excerpt) > 344){ 
                                        echo '...'; 
                                    } 
                                ?>
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <footer class="entry-footer">

            <div class="post-category  mt-3  ">
                    <?php show_category_post(); ?>
                </div>
           
                 
            </footer>
        </article>
 