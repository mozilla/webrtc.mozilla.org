<?php

/*------------------------------------*\
Theme Support
\*------------------------------------*/

if (function_exists('add_theme_support')) {
  // Add Menu Support
  add_theme_support('menus');

  // Add Thumbnail Theme Support
  add_theme_support('post-thumbnails');
  add_image_size('large', 700, '', true); // Large Thumbnail
  add_image_size('medium', 250, '', true); // Medium Thumbnail
  add_image_size('small', 120, '', true); // Small Thumbnail
  add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

  // Enables post and comment RSS feed links to head
  add_theme_support('automatic-feed-links');
}

/*------------------------------------*\
Functions
\*------------------------------------*/

// Register Custom Navigation Walker
require_once 'wp_bootstrap_navwalker.php';

// Bootstrap primary navigation
function primary_nav() {
  wp_nav_menu(
    array(
      'theme_location'  => 'header-menu',
      'menu'            => '',
      'container'       => false,
      'container_class' => 'menu-{menu slug}-container',
      'container_id'    => '',
      'menu_class'      => 'menu',
      'menu_id'         => '',
      'echo'            => true,
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '<span>',
      'link_after'      => '</span>',
      'items_wrap'      => '<ul class="nav navbar-nav navbar-right">%3$s</ul>',
      'depth'           => 2,
      'walker'          => new wp_bootstrap_navwalker(),
    )
  );
}

function footer_menu() {
  $location = 'footer-menu';
  get_menu_by_location($location);
  $menu_obj = get_menu_by_location($location);
  wp_nav_menu(array('theme_location' => $location, 'items_wrap' => '<ul id="footer-menu" class="footer-menu">%3$s</ul>'));
}

function get_menu_by_location($location) {
  if (empty($location)) {
    return false;
  }

  $locations = get_nav_menu_locations();
  if (!isset($locations[$location])) {
    return false;
  }

  $menu_obj = get_term($locations[$location], 'nav_menu');
  return $menu_obj;
}

// Load scripts (header.php)
function html5blank_header_scripts() {
  if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    wp_register_script('conditionizr', get_template_directory_uri() . '/assets/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
    wp_enqueue_script('conditionizr'); // Enqueue it!

    wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
    wp_enqueue_script('modernizr'); // Enqueue it!

    wp_register_script('classie', get_template_directory_uri() . '/assets/js/lib/classie.js', array(), null, false);
    wp_enqueue_script('classie'); // Enqueue it!
    
    wp_register_script('html5blankscripts', get_template_directory_uri() . '/assets/js/min/scripts-min.js', array('jquery'), '1.1.0'); // Custom scripts
    wp_enqueue_script('html5blankscripts'); // Enqueue it!

    wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/lib/bootstrap.min.js', array(), null, false);
    wp_enqueue_script('bootstrap'); // Enqueue it!

  }
}

// Load conditional scripts
function html5blank_conditional_scripts() {
  if (is_front_page()) {

    //wp_register_script('home', get_template_directory_uri() . '/assets/js/sections/min/home-min.js', array(), null, true); // Home scripts
    //wp_enqueue_script('home'); // Enqueue it!

  }

}

// Load styles
function html5blank_styles() {
  wp_register_style('styles', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
  wp_enqueue_style('styles'); // Enqueue it!

  wp_register_style('google-font', 'https://fonts.googleapis.com/css?family=Fira+Sans:500,700|Open+Sans:400,300,600,700,300italic,400italic,600italic,700italic', array(), '1.0', 'all');
  wp_enqueue_style('google-font'); // Enqueue it!

}

// Load conditional styles
function html5blank_conditional_styles() {

}

// Register Navigation
function register_html5_menu() {
  register_nav_menus(array( // Using array to specify more menus if needed
    'header-menu'           => __('Header Menu', 'primary'),
    'footer-menu'           => __('Footer Menu', 'secondary'),
  ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '') {
  $args['container'] = false;
  return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var) {
  return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist) {
  return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes) {
  global $post;
  if (is_home()) {
    $key = array_search('blog', $classes);
    if ($key > -1) {
      unset($classes[$key]);
    }
  } elseif (is_page()) {
    $classes[] = sanitize_html_class($post->post_name);
  } elseif (is_singular()) {
    $classes[] = sanitize_html_class($post->post_name);
  }

  return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar')) {

  // Define Sidebar Widget Area
  register_sidebar(array(
    'name'          => __('Global Sidebar', 'html5blank'),
    'description'   => __('The global sidebar', 'html5blank'),
    'id'            => 'global-sidebar',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style() {
  global $wp_widget_factory;
  remove_action('wp_head', array(
    $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
    'recent_comments_style',
  ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination() {
  global $wp_query;
  $big = 999999999;
  echo paginate_links(array(
    'base'    => str_replace($big, '%#%', get_pagenum_link($big)),
    'format'  => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total'   => $wp_query->max_num_pages,
  ));
}

// Custom Excerpts
function html5wp_index($length) { // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
    return 20;
}
function html5wp_custom_post($length) { // Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}

// Remove Admin bar
function remove_admin_bar() {
  return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag) {
  return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions($html) {
  $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
  return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar($avatar_defaults) {
  $myavatar                   = get_template_directory_uri() . '/img/gravatar.jpg';
  $avatar_defaults[$myavatar] = "Custom Gravatar";
  return $avatar_defaults;
}

function webrtc_author_name( $display_name ) {
  global $post;
  // Get author's display name
  $display_name = get_the_author_meta( 'display_name', $post->post_author );
  echo $display_name;
}

function webrtc_author_link( $user_website ) {
  global $post;
  // Get author's website URL
  $user_website = get_the_author_meta('url', $post->post_author);
  echo $user_website;
}

function webrtc_author_title( $user_description ) {
  global $post;
    // Get author's biographical information or description
    $user_description = get_the_author_meta( 'user_description', $post->post_author );
    echo $user_description;
}


/*------------------------------------*\
Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
//add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles', 15); // Add Theme Stylesheet
add_action('wp_enqueue_scripts', 'html5blank_conditional_styles'); // Add Conditional Theme Stylesheets
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
//add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
//add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
// function html5_shortcode_demo($atts, $content = null) {
//   return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
// }

// Shortcode Demo with simple <h2> tag
// function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
// {
//   return '<h2>' . $content . '</h2>';
// }

// Enable ACF Global Options Page
if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page();
  
}