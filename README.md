# DynamicStart
Tema WordPress basico para inicar um novo projeto

The norte_marketing theme is a custom WordPress theme designed to provide a flexible and stylish starting point for building your website. This theme includes a variety of features such as custom menus, support for post thumbnails, custom widgets, and more.

Installation

    Upload the theme: Upload the norte_marketing theme files to the /wp-content/themes/ directory on your server.
    Activate the theme: Go to the WordPress admin panel, navigate to Appearance > Themes, and activate the norte_marketing theme.

Features

    Automatic Feed Links: Adds RSS feed links to the <head> section for posts and comments.
    Custom Navigation Menus: Two menu locations (primary and menumobili).
    Custom Widgets: Social media widget included.
    Post Thumbnails: Supports featured images for posts and pages.
    Custom Image Sizes: Adds a custom image size thumb-300x200 (400x200 pixels, cropped).
    Custom Logo: Allows you to upload a custom logo for the site header.
    Widget Areas: Supports multiple widget areas including a sidebar and footer area.
    Optimized Loading: Implements techniques to eliminate render-blocking CSS and defer JS loading.

Setup and Configuration
1. Custom Menus

Register and display custom navigation menus:

    primary: Main menu displayed at the top.
    menumobili: Secondary menu for mobile devices.

Fallback functions provide default menus if none are set.
2. Widgets

Supports custom widget areas:

    sidebar-1: Main sidebar.
    sidebar-2: Footer area.

3. Custom Logo

Allows customization of the site logo via the WordPress Customizer:

    Navigate to Appearance > Customize > Logotipo do Topo.

4. Scripts and Styles

Enqueues essential CSS and JS files:

    Bootstrap: For responsive layout and design.
    Google Fonts: Includes Poppins font.
    MMMenu Light: Mobile menu support.
    Owl Carousel: For carousels and sliders.
    Vega Nav: Desktop navigation support.
    Lottie Player: For JSON animations.

5. Performance Optimization

    Eliminates render-blocking CSS and JS by adding appropriate attributes (media='print' and defer).
    Removes jQuery Migrate to improve performance.

6. Custom Functions

    Breadcrumbs: Displays a breadcrumb navigation for better user experience.
    Comments Template: Custom template for displaying comments and pingbacks.
    Pagination: Custom pagination for archive, taxonomy, category, tag, and search results pages.
    Category Display: Shows categories for each post.

Custom Filters and Actions

    Excerpt Length: Sets custom excerpt length to 600 characters.
    Menu Classes: Adds custom classes to menu items for better styling.
    Submenu Classes: Changes classes for submenus for customized appearance.
    Remove jQuery Migrate: Removes jQuery Migrate script for front-end.

File Structure

    functions.php: Main theme functions file.
    style.css: Main stylesheet.
    /assets/: Directory containing CSS, JS, images, and other assets.
        /plugins/: Directory for third-party plugins and libraries.
        /scss/: Directory for SCSS stylesheets.
        /js/: Directory for custom JavaScript files.
    /includes/: Directory for additional PHP files and custom widgets.

Author

Norte Marketing
Website: https://www.nortemkt.com

For further assistance or inquiries, please visit the support page.

License

