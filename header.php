<?php
/**
 * The Header for our theme.
 *
 * @file      header.php
 * @package   norte_marketing
 * @author    Norte Marketing
 * @link 	  https://www.nortemkt.com
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="no-js ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />

  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  
  <title><?php the_title(); ?></title> 
 
    
  <meta name="description" content="<?php bloginfo('description');?> - <?php the_title();?>">
  <meta name="author" content="Norte marketing esportivo">

  <meta name="google-site-verification" content="mKfLwF_f8ZgS6FGphBhwaAf0QRYKL0xIfzNLZ57rbvM">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=5, user-scalable=yes'>
  <meta http-equiv='X-UA-Compatible' content='ie=edge'>

  <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri();?>/favicon.ico">
  
  <!--[if lt IE 9]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
  <![endif]-->

  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
 
  <?php
  if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply');
  wp_head();
  ?>

</head>
<body <?php body_class(); ?>>
 
  <!-- // Logo, menu  // -->
  <div class="container-fluid header-bar">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

          <div class="logo">
            <h1 class="site-title">
            <?php if (get_theme_mod('logo_setting')):?>
                <a href="<?php echo home_url();?>" title="<?php bloginfo('name');?>">
                    <img width="120" height="auto" src="<?php echo esc_url(get_theme_mod('logo_setting'));?>" alt="<?php bloginfo('name');?>">
                </a>
            <?php else:?>
                <a href="<?php echo home_url();?>" title="<?php bloginfo('name');?>">
                   <?php bloginfo('name');?>
                </a>
            <?php endif;?>
            </h1>
          </div><!-- /logo -->

    
            <a id="navMmenu" class="btn-hamburger" title="Menu" href="#nav">
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 200 200">
                <g stroke-width="6.5" stroke-linecap="round">
                  <path d="M72 82.286h28.75" fill="#fff" fill-rule="evenodd" stroke="#fff" />
                  <path d="M100.75 103.714l72.482-.143c.043 39.398-32.284 71.434-72.16 71.434-39.878 0-72.204-32.036-72.204-71.554" fill="none" stroke="#fff" />
                  <path d="M72 125.143h28.75" fill="#fff" fill-rule="evenodd" stroke="#fff" />
                  <path d="M100.75 103.714l-71.908-.143c.026-39.638 32.352-71.674 72.23-71.674 39.876 0 72.203 32.036 72.203 71.554" fill="none" stroke="#fff" />
                  <path d="M100.75 82.286h28.75" fill="#fff" fill-rule="evenodd" stroke="#fff" />
                  <path d="M100.75 125.143h28.75" fill="#fff" fill-rule="evenodd" stroke="#fff" />
                </g>
              </svg>
            </span>
          </a> 
         
          <nav id="nav" style="display:none;">
            <?php wp_nav_menu(
              array(
                'theme_location' => 'menumobili',
                'fallback_cb' => 'norte_marketing_menu_fallback',
                'container' => false
              )
            );
            ?>
          </nav>
          <nav id="nav-desck" class="vg-nav">
            <?php wp_nav_menu(
              array(
                'theme_location' => 'primary',
                'fallback_cb' => 'norte_marketing_menu_fallback_vg_nav',
                'container' => false,
                'menu' => 'vg-nav-wrapper', // name of menu
                'menu_id' => 'vg-nav-wrapper', //change ul id
                'menu_class' => 'vg-nav-wrapper', //ul class name
              )
            );
            ?>
          </nav>
  
         
        </div>

      </div>
    </div>

  </div>