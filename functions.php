<?php

/**
 * norte_marketing Theme functions and definitions
 *
 * @file      functions.php
 * @package   norte_marketing 	
 * @author    Norte Marketing
 * @link 	  https://www.nortemkt.com
 */

/**
 * Tell WordPress to run norte_marketing_setup() when the 'after_setup_theme' hook is run.
 */

add_action('after_setup_theme', 'norte_marketing_setup');

if (!function_exists('norte_marketing_setup')) :

	function norte_marketing_setup()
	{

		/** 
		 * Add default posts and comments RSS feed links to <head>.
		 */
		add_theme_support('automatic-feed-links');

		/**
		 * This theme uses wp_nav_menu() in one location.	
		 */
		register_nav_menus(array(
			'primary' => __('Menu topo', 'norte_marketing'),
			'menumobili' => __('Menu Mobili', 'norte_marketing'),
		));
		
		function norte_marketing_menu_fallback()
		{ ?>
			<ul class="menu">
				<?php
				wp_list_pages(array(
					'number' => 5,
					'exclude' => '',
					'title_li' => '',
					'sort_column' => 'post_title',
					'sort_order' => 'ASC',

				));
				?>
			</ul>
			<?php
		}
		function norte_marketing_menu_fallback_vg_nav()
		{ ?>
			<ul class="vg-nav-wrapper">
				<?php
				wp_list_pages(array(
					'number' => 5,
					'exclude' => '',
					'title_li' => '',
					'sort_column' => 'post_title',
					'sort_order' => 'ASC',
				));
				?>
			</ul>
			
			<?php
		}
		function add_menu_item_class($classes, $item, $args) {
			if (in_array('menu-item-has-children', $item->classes)) {
				$classes[] = 'dropdown';
			}
			return $classes;
		}
		add_filter('nav_menu_css_class', 'add_menu_item_class', 10, 3);
		function change_submenu_class($menu)
		{
			$menu = preg_replace('/ class="sub-menu"/', '/ class="iten-submenu left" /', $menu);
 			//$menu = preg_replace('/ class="sub-menu"/', '/ class="left" /', $menu);
			return $menu;
		}
		add_filter('wp_nav_menu', 'change_submenu_class');
 

		/**
		 * This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
		 */
		if (function_exists('add_theme_support')) {

			add_theme_support('post-thumbnails');
			
		}

		/**
		 * Add custom image size for slider and featured category thumbnails.	
		 */
		add_image_size('thumb-300x200', 400, 200, true);

 		require_once( get_template_directory() . '/includes/widget/redes-sociais-widget.php' );			
 
 		
	}
endif; // norte_marketing_setup

//carrega folhas de estilo 
function thema_styles()
{
 
	//add bootstrap css
	wp_enqueue_style('bootstrap',  'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', array(), '1.0', 'all');
	
	//add google fonts   font-family: 'Inter', sans-serif;
	wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap', array(), '1.0', 'all');

	//add css mmenu-light 
	wp_enqueue_style('mmenu-light', get_template_directory_uri() . '/assets/plugins/mmenu/mmenu-light.css', array(), '1.0', 'all');

	//add carousel owl  
	wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/plugins/owl-carousel/assets/owl.carousel.min.css', array(), '2.0', 'all');

	//add carousel owl 
	wp_enqueue_style('owl-theme-default', get_template_directory_uri() . '/assets/plugins/owl-carousel/assets/owl.theme.default.min.css', array(), '2.0', 'all');

 	//icones
	 wp_enqueue_style('tabler-icons', get_template_directory_uri() . '/assets/plugins/icons-webfont/tabler-icons.min.css', array(), '1.0', 'all');
	 //wp_enqueue_style('tabler-icons', 'https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css', array(), '1.0', 'all');

	 wp_enqueue_style('vega-nav', get_template_directory_uri() . '/assets/plugins/vega-nav/dist/vgnav.css', array(), '1.0', 'all');
	 wp_enqueue_style('vgnav-theme', get_template_directory_uri() . '/assets/plugins/vega-nav/dist/vgnav-theme-min.css', array(), '1.1', 'all');
 
	//add css defalt theme
	wp_enqueue_style('core', get_template_directory_uri() . '/assets/scss/index.css', array(), '1.3', 'all'); 
}
add_action('wp_enqueue_scripts', 'thema_styles'); 
 
  
//Eliminate render-blocking resources do css
function eliminate_render_blocking_css($html, $handle)
{
	$handles = array( 'google_fonts', 'wp-block-library', 'tabler-icons',   'classic-theme-styles-css', 'dashicons', 'classic-theme-styles', 'mmenu-light', 'owl-carousel', 'owl-theme-default');
	if (in_array($handle, $handles)) {
		$html = str_replace('media=\'all\'', 'media=\'print\' onload="this.onload=null;this.media=\'all\'"', $html);
	}
	return $html;
}
add_filter('style_loader_tag', 'eliminate_render_blocking_css', 10, 2);


//carrega os JS"s
function theme_scripts()
{

	//bootstrap                     
	wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array(),  '5.2.3', true);

	//Plugin mmenu-lightmenu mobili
	wp_enqueue_script('mmenu-light', get_template_directory_uri() . '/assets/plugins/mmenu/mmenu-light.js', array('jquery'), '1.0', true);

	//Plugin carousel owl
	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/plugins/owl-carousel/owl.carousel.js', array('jquery'), '2.0', true);

	// vega-nav menu descktop
	wp_enqueue_script('vega-nav', get_template_directory_uri() . '/assets/plugins/vega-nav/dist/vgnav.umd.js', array('jquery'), '1.0', true);

	// lottie-player - player para animações json 
	wp_enqueue_script('lottie-player', 'https://unpkg.com/@lottiefiles/lottie-player@0.4.0/dist/lottie-player.js', array('jquery'), '1.0', true);

	//add JS defalt theme
	wp_enqueue_script('norte_marketing_custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'theme_scripts');   

 
//define a propriedade defer em todos os Js do tema
function eliminate_render_blocking_js($url)
{
	if (FALSE === strpos($url, '.js')) return $url;
	if (strpos($url, 'jquery.js')) return $url;
	return "$url' defer='defer";
}
if (!is_admin()) {
	add_filter('clean_url', 'eliminate_render_blocking_js', 11, 1);
}


//Remove JQuery migrate
function remove_jquery_migrate($scripts)
{
	if (!is_admin() && isset($scripts->registered['jquery'])) {
		$script = $scripts->registered['jquery'];
		if ($script->deps) {
			// Check whether the script has any dependencies
			$script->deps = array_diff($script->deps, array('jquery-migrate'));
		}
	}
}
add_action('wp_default_scripts', 'remove_jquery_migrate');

/**
 * Add opção para logo  personalizado.
 *
 */
function my_customize_register($wp_customize) {
 
    // Seção para o logotipo do topo
    $wp_customize->add_section('logo_section', array(
        'title' => __('Logotipo do Topo', 'meu_tema'),
        'description' => __('Personalize o logotipo do topo do seu site. Recomendamos um tamanho de 120 pixels de largura', 'meu_tema'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('logo_setting', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_control', array(
        'label' => __('Logotipo', 'meu_tema'),
        'section' => 'logo_section',
        'settings' => 'logo_setting',
    )));

    // Seção para o logotipo do rodapé
    $wp_customize->add_section('footer_logo_section', array(
        'title' => __('Logotipo do Rodapé', 'meu_tema'),
        'description' => __('Personalize o logotipo do rodapé do seu site. Recomendamos um tamanho de 120 pixels de largura', 'meu_tema'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('footer_logo_setting', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo_control', array(
        'label' => __('Logotipo do Rodapé', 'meu_tema'),
        'section' => 'footer_logo_section',
        'settings' => 'footer_logo_setting',
    )));
}
add_action('customize_register', 'my_customize_register');

     



 
/**
 * Register our sidebars and widgetized areas.
 *
 */
if (function_exists('register_sidebar')) {
 
	register_sidebar(array(
		'name' => __('Barra leteral', 'norte_marketing'),
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
 
	register_sidebar(array(
		'name' => __('Footer Area', 'norte_marketing'),
		'id' => 'sidebar-2',
		'description' => __('Uma área de widget opcional para o rodapé do seu site', 'norte_marketing'),
		'before_widget' => '<div id="%1$s" class="col widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2><span class="linha-titulo"></span>',
	));

 
}


/**
 * Configura  the excerpt para exibir até 600 caracteres 
 */
add_filter('excerpt_length', 'custom_excerpt_length');
function custom_excerpt_length($length)
{
	return 600;
}


/**
 * Mostra as categorias do post
 *
 */
function show_category_post()
{
	$categories = get_the_category();
	$separator  = ', ';
	$output     = '';
	if ($categories) {
		echo '<div class="category-post">';
		echo '<h2>' . __('Categoria:', 'norte_marketing') . '</h2>';

		foreach ($categories as $category) {
			$output .= '<a class="cat-' . $category->slug . ' " href="' . get_category_link($category->term_id) . '" title="' . esc_attr(sprintf(__("Veja mais sobre: %s"), $category->name)) . '">' . $category->cat_name . '</a>' . $separator;
		}
		echo trim($output, $separator);
		echo '</div>';
	}
}


function the_breadcrumb()
{
	echo '
	<div id="breadcrumb" class="container-fluid">
	<div class="container">
	<div class="row">
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
	<ul class="breadcrumb">';
	if (is_home()) {
		echo '<li><a href="';
		echo get_option('home');
		echo '">';
		echo 'Home';
		echo "</a></li>";
	} elseif (!is_home()) {
		echo '<li><a href="';
		echo get_option('home');
		echo '">';
		echo 'Home';
		echo "</a></li><span> > </span>";

		if (is_category() || is_single()) {
			$categories = get_the_category();
			if (is_category($categories[0]->cat_name) ||  is_single()) {
				echo '<li>';
				echo '<div style="color:#fff;">' . $categories[0]->cat_name . '</div>';
				echo "</li>";
			}
			if ($term_ids = get_ancestors(get_queried_object_id(), 'category', 'taxonomy')) {
				$crumbs = [];
				foreach ($term_ids as $term_id) {
					$term = get_term($term_id, 'category');
					if ($term && !is_wp_error($term)) {
						$crumbs[] = sprintf('<li><a href="%s">%s</a></li>', esc_url(get_term_link($term)), esc_html($term->name));
					}
				}
				echo implode('<span> > </span>', array_reverse($crumbs));
				echo '<span> > </span><li>';
				echo single_cat_title();
				echo '</li>';
			}
		}
		if (is_tag()) {
			// Get tag information
			$term_id        = get_query_var('tag_id');
			$taxonomy       = 'post_tag';
			$args           = 'include=' . $term_id;
			$terms          = get_terms($taxonomy, $args);
			$get_term_name  = $terms[0]->name;

			// Display the tag name
			echo '<li style="color:#fff;" >Tag</li><span> : </span>';
			echo '<li class="item-current item">' . $get_term_name . '</li>';
		}
		if (is_single()) {
			echo '<span> > </span><li>';
			echo the_title();
			echo '</li>';
		} elseif (is_page()) {
			echo '<li>';
			echo the_title();
			echo '</li>';
		}
	} elseif (is_day()) {
		echo "<li>Archive for ";
		the_time('F jS, Y');
		echo '</li>';
	} elseif (is_month()) {
		echo "<li>Archive for ";
		the_time('F, Y');
		echo '</li>';
	} elseif (is_year()) {
		echo "<li>Archive for ";
		the_time('Y');
		echo '</li>';
	} elseif (is_author()) {
		echo "<li>Author Archive";
		echo '</li>';
	} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
		echo "<li>Blog Archives";
		echo '</li>';
	} elseif (is_search()) {
		echo "<li>Search Results";
		echo '</li>';
	}
	echo '</ul></div></div></div></div>';
}


/**
 * Function for the custom template for comments and pingbacks.
 *
 */
if (!function_exists('norte_marketing_comments')) {

	function norte_marketing_comments($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
		switch ($comment->comment_type):
			case 'pingback':
			case 'trackback':
			?>
				<li class="pingback">
					<span class="title"><?php _e('Pingback:', 'norte_marketing') ?></span> <?php comment_author_link(); ?>
				<?php

				break;

			default:
				?>
				<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
					<div id="comment-<?php comment_ID(); ?>" class="comment">
						<div class="comment-meta">

							<div class="comment-author vcard">
								<?php
								$avatar_size = 39;
								if ('0' != $comment->comment_parent)
									$avatar_size = 39;

								echo get_avatar($comment, $avatar_size);

								/* translators: 1: comment author, 2: date and time */
								printf(
									'%1$s <span class="date-and-time">%2$s</span>',
									sprintf('<span class="fn">%s</span>', get_comment_author_link()),
									sprintf(
										'<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
										esc_url(get_comment_link($comment->comment_ID)),
										get_comment_time('c'),
										/* translators: 1: date, 2: time */
										sprintf(__('%1$s at %2$s', 'norte_marketing'), get_comment_date(), get_comment_time())
									)
								);
								?>
							</div><!-- /comment-author /vcard -->

							<?php if ($comment->comment_approved == '0') : ?>
								<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'norte_marketing'); ?></em>
								<br />
							<?php endif; ?>

						</div>

						<div class="comment-content"><?php comment_text(); ?></div>

						<div class="reply">
							<?php comment_reply_link(array_merge($args, array('reply_text' => __('Reply', 'norte_marketing'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
						</div><!-- ./reply -->
					</div><!-- /comment -->
				<?php
				break;
		endswitch;
	}
}


/**
 * Pagination for archive, taxonomy, category, tag and search results pages
 *
 * @global $wp_query http://codex.wordpress.org/Class_Reference/WP_Query
 * @return Prints the HTML for the pagination if a template is $paged
 */
function norte_marketing_pagination()
{
	global $wp_query;

	$big = 999999999; // This needs to be an unlikely integer

	// For more options and info view the docs for paginate_links()
	// http://codex.wordpress.org/Function_Reference/paginate_links
	$paginate_links = paginate_links(array(
		'base' => str_replace($big, '%#%', get_pagenum_link($big)),
		'current' => max(1, get_query_var('paged')),
		'total' => $wp_query->max_num_pages,
		'mid_size' => 5
	));

	// Display the pagination if more than one page is found
	if ($paginate_links) {
		echo '<div class="pagination">';
		echo $paginate_links;
		echo '</div><!--// end .pagination -->';
	}
}