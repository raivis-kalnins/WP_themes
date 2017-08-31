<?php
/**
 * Custom functions, support, custom post types and more.
 */

require_once "modules/is-debug.php";

/*------------------------------------*\
    External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
    Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    add_theme_support('custom-background', array(
    'default-color' => 'fff',
    'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));

    // Add Support for Custom Header - Uncomment below if you're going to use
    add_theme_support('custom-header', array(
    'default-image'          => get_template_directory_uri() . '/img/headers/default.jpg',
    'header-text'            => false,
    'default-text-color'     => 'fff',
    'width'                  => 1900,
    'height'                 => 1000,
    'random-default'         => true,
    'wp-head-callback'       => $wphead_cb,
    'admin-head-callback'    => $adminhead_cb,
    'admin-preview-callback' => $adminpreview_cb
    ));

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Enable HTML5 support
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
    Functions
\*------------------------------------*/

// HTML5 Blank navigation
function header_nav() {
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}
function sidebar_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'sidebar-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}
function footer_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'footer-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}


// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts() {
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        if (HTML5_DEBUG) {

            wp_register_script('jquery', get_template_directory_uri() . '/assets/js/lib/jquery-3.2.1.min.js', array(), '3.2.1'); // jQuery JS
            wp_enqueue_script('jquery'); // Enqueue it!
          
            wp_register_script('owl', get_template_directory_uri() . '/assets/js/lib/owl.carousel.min.js', array(), '3.0.0'); // Owl carousel
            wp_enqueue_script('owl'); // Enqueue it! - OWL plugin added

            wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/lib/modernizr.min.js', array(), '2.7.1'); // Modernizr
            wp_enqueue_script('modernizr'); // Enqueue it
          
            wp_register_script('chosen', get_template_directory_uri() . '/assets/js/lib/chosen.jq.js', array(), '2.7.1'); // Chosen
            wp_enqueue_script('chosen'); // Enqueue it!
          
            wp_register_script('chosen-mob', get_template_directory_uri() . '/assets/js/lib/chosen.jquery.min.js', array(), '2.7.1'); // Chosen
            wp_enqueue_script('chosen-mob'); // Enqueue it!
        
            wp_register_script('shortcodes', home_url() . '/wp-content/plugins/shortcodes-ultimate/assets/js/other-shortcodes.js', array(), '1.0'); // Shortcodes tabs etc
            wp_enqueue_script('shortcodes'); // Enqueue it!
          
//             wp_register_script('drumtimepicker', get_template_directory_uri() . '/assets/js/lib/drum.js', array(), '1.0'); // Shortcodes tabs etc
//             wp_enqueue_script('drumtimepicker'); // Enqueue it! - Time picker

            wp_register_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), '1.0.0'); // Custom scripts
            wp_enqueue_script('scripts'); // Enqueue it!
        }
    }
}
// DaDobro RU ReCapcha Form 7
function custom_recaptcha_enqueue_scripts() {
    wp_deregister_script( 'google-recaptcha' );
    $url = 'https://www.google.com/recaptcha/api.js';
    $url = add_query_arg( array(
        'onload' => 'recaptchaCallback',
        'render' => 'explicit',
        'hl' => qtranxf_getLanguage()), $url );
    wp_register_script( 'google-recaptcha', $url, array(), '2.0', true );
}
add_action( 'wpcf7_enqueue_scripts', 'custom_recaptcha_enqueue_scripts', 11 );


// Load HTML5 Blank styles
function html5blank_styles() {
    if (HTML5_DEBUG) {

    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/bootstrap.min.css', array(), '1.0', 'all');
    wp_enqueue_style('bootstrap'); // Enqueue it!

    wp_register_style('bootstrapgrid', get_template_directory_uri() . '/assets/bootstrap/bootstrap-grid.min.css', array(), '1.0', 'all');
    wp_enqueue_style('bootstrapgrid'); // Enqueue it!

    wp_register_style('bootstrapreboot', get_template_directory_uri() . '/assets/bootstrap/bootstrap-reboot.min.css', array(), '1.0', 'all');
    wp_enqueue_style('bootstrapreboot'); // Enqueue it!
    
    wp_register_style('rest', get_template_directory_uri() . '/assets/reset-bsi.css', array(), '1.0', 'all');
    wp_enqueue_style('rest'); // Enqueue it!

    wp_register_style('normalize', get_template_directory_uri() . '/assets/normalize.min.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('animate', get_template_directory_uri() . '/assets/animate.css', array(), '1.0', 'all');
    wp_enqueue_style('animate'); // Enqueue it!
      
    wp_register_style('owlcarousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '1.0', 'all');
    wp_enqueue_style('owlcarousel'); // Enqueue it!
      
//     wp_register_style('drumtomepickerstyle', get_template_directory_uri() . '/assets/css/drum.css', array(), '1.0', 'all');
//     wp_enqueue_style('drumtomepickerstyle'); // Enqueue it!

    wp_register_style('awesome', get_template_directory_uri() . '/assets/fonts/font-awesome-4.1.0/css/font-awesome.min.css', array(), '1.0', 'all');
    wp_enqueue_style('awesome'); // Enqueue it!

    wp_register_style('eleganticons', get_template_directory_uri() . '/assets/fonts/eleganticons/css/et-icons.css', array(), '1.0', 'all');
    wp_enqueue_style('eleganticons'); // Enqueue it!

    wp_register_style('shortcodescss', home_url() . '/wp-content/plugins/shortcodes-ultimate/assets/css/box-shortcodes.css', array(), '1.0', 'all');
    wp_enqueue_style('shortcodescss'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!

    } else {
        // Custom CSS
        wp_register_style('html5blankcssmin', get_template_directory_uri() . '/style.css', array(), '1.0');
        // Register CSS
        wp_enqueue_style('html5blankcssmin');
    }
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'footer-menu' => __('Footer Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
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

// Remove the width and height attributes from inserted images
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}


// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
    <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
    </div>
<?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
    <br />
<?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
        <?php
            printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
        ?>
    </div>

    <?php comment_text() ?>

    <div class="reply">
    <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php }

/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
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
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('post_thumbnail_html', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images
add_filter('image_send_to_editor', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
    Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type Tours
function create_post_type_html5()
{
    register_taxonomy_for_object_type('category', 'tours'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'tours');
    register_post_type('tours', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Туры', 'html5blank'), // Rename these to suit
            'singular_name' => __('Тours', 'html5blank'),
            'add_new' => __('Add New', 'html5blank'),
            'add_new_item' => __('Add New Tours Post', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit Tours Post', 'html5blank'),
            'new_item' => __('New Tours Post', 'html5blank'),
            'view' => __('View Tours Post', 'html5blank'),
            'view_item' => __('View Tours Post', 'html5blank'),
            'search_items' => __('Search Tours Post', 'html5blank'),
            'not_found' => __('No Tours Posts found', 'html5blank'),
            'not_found_in_trash' => __('No Tours Posts found in Trash', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}

// Add Photo Gallery image
if (class_exists('MultiPostThumbnails')) {
  new MultiPostThumbnails(array('label' => 'Image 02','id' => 'image02','class' => 'image-02','post_type' => 'page'));
  new MultiPostThumbnails(array('label' => 'Image 03','id' => 'image03','class' => 'image-03','post_type' => 'page'));
  new MultiPostThumbnails(array('label' => 'Image 04','id' => 'image04','class' => 'image-04','post_type' => 'page'));
  new MultiPostThumbnails(array('label' => 'Image 05','id' => 'image05','class' => 'image-05','post_type' => 'page'));
  new MultiPostThumbnails(array('label' => 'Image 06','id' => 'image06','class' => 'image-06','post_type' => 'page'));
  new MultiPostThumbnails(array('label' => 'Image 07','id' => 'image07','class' => 'image-07','post_type' => 'page'));
  new MultiPostThumbnails(array('label' => 'Image 08','id' => 'image08','class' => 'image-08','post_type' => 'page'));
  new MultiPostThumbnails(array('label' => 'Image 09','id' => 'image09','class' => 'image-09','post_type' => 'page'));
  new MultiPostThumbnails(array('label' => 'Image 10','id' => 'image10','class' => 'image-10','post_type' => 'page'));
  new MultiPostThumbnails(array('label' => 'Image 11','id' => 'image11','class' => 'image-11','post_type' => 'page'));
  new MultiPostThumbnails(array('label' => 'Image 12','id' => 'image12','class' => 'image-12','post_type' => 'page'));
  new MultiPostThumbnails(array('label' => 'Image 13','id' => 'image13','class' => 'image-13','post_type' => 'page'));
  new MultiPostThumbnails(array('label' => 'Image 14','id' => 'image14','class' => 'image-14','post_type' => 'page'));
  new MultiPostThumbnails(array('label' => 'Image 15','id' => 'image15','class' => 'image-15','post_type' => 'page'));
  new MultiPostThumbnails(array('label' => 'Image 16','id' => 'image16','class' => 'image-16','post_type' => 'page'));
  new MultiPostThumbnails(array('label' => 'Image 17','id' => 'image17','class' => 'image-17','post_type' => 'page'));
  new MultiPostThumbnails(array('label' => 'Image 18','id' => 'image18','class' => 'image-18','post_type' => 'page'));
  new MultiPostThumbnails(array('label' => 'Image 19','id' => 'image19','class' => 'image-19','post_type' => 'page'));
  new MultiPostThumbnails(array('label' => 'Image 20','id' => 'image20','class' => 'image-20','post_type' => 'page'));
}


// CUSTOM PAGINATION
function custom_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         if ($paged - 1 >= 1) echo "<a class='page-numbers prev' href='?page=".($paged - 1)."'>&lsaquo;&lsaquo; </a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='page-numbers' class='current'>".$i."</span>":"<a class='page-numbers' href='?page=".$i."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged + 1 <= $pages) echo "<a class='page-numbers next' href='?page=".($paged + 1)."'> &rsaquo;&rsaquo;</a>";  
     }
}


/*------------------------------------*\
    ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}