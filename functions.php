<?php
/**
 * Toyota Theme Functions
 * 
 * @package Toyota_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

function toyota_enqueue_assets()
{
    wp_enqueue_style(
        'toyota-global',
        get_template_directory_uri() . '/css/style.css',
        array(),
        '1.0.0'
    );

    wp_enqueue_style(
        'toyota-header',
        get_template_directory_uri() . '/css/header.css',
        array('toyota-global'),
        '1.0.0'
    );

    wp_enqueue_style(
        'toyota-footer',
        get_template_directory_uri() . '/css/footer.css',
        array('toyota-global'),
        '1.0.0'
    );

    if (is_front_page()) {
        wp_enqueue_style(
            'toyota-homepage',
            get_template_directory_uri() . '/css/home.css',
            array('toyota-global'),
            '1.0.0'
        );

        wp_enqueue_script(
            'toyota-homepage',
            get_template_directory_uri() . '/js/home.js',
            array(),
            '1.0.0',
            true
        );
    }

    if (is_home() || is_archive() || is_category()) {
        wp_enqueue_style(
            'toyota-blog',
            get_template_directory_uri() . '/css/blog.css',
            array('toyota-global'),
            '1.0.0'
        );
    }

    // if (is_single() && !is_singular('product')) {
    //     wp_enqueue_style(
    //         'toyota-single-post',
    //         get_template_directory_uri() . '/css/single.css',
    //         array('toyota-global'),
    //         '1.0.0'
    //     );
    // }

    if (is_page_template('page-single.php')) {
        wp_enqueue_style('toyota-single', get_template_directory_uri() . '/css/single.css', array('toyota-global'), '1.0.0');
        wp_enqueue_script('toyota-single', get_template_directory_uri() . '/js/single.js', array('jquery'), '1.0.0', true);
    }

    if (is_page_template('page-about_us.php')) {
        wp_enqueue_style(
            'toyota-about',
            get_template_directory_uri() . '/css/about.css',
            array('toyota-global'),
            '1.0.0'
        );

        wp_enqueue_script(
            'toyota-about',
            get_template_directory_uri() . '/js/about.js',
            array(),
            '1.0.0',
            true
        );
    }

    if (is_page_template('page-contact.php')) {
        wp_enqueue_style(
            'toyota-contact',
            get_template_directory_uri() . '/css/contact.css',
            array('toyota-global'),
            '1.0.0'
        );

        wp_enqueue_script(
            'toyota-contact',
            get_template_directory_uri() . '/js.contact.js',
            array(),
            '1.0.0',
            true
        );
    }


    if (is_page_template('page-single-blogs.php')) {
        wp_enqueue_style(
            'single-post',
            get_template_directory_uri() . '/css/single-blogs.css'
        );

        wp_enqueue_script(
            'single-post',
            get_template_directory_uri() . '/js/single-blogs.js',
            array(),
            null,
            true
        );
    }



    add_action('wp_enqueue_scripts', 'enqueue_single_post_assets');

    if (is_page_template('page-blogs.php')) {
        wp_enqueue_style(
            'toyota-blogs',
            get_template_directory_uri() . '/css/blogs.css',
            array('toyota-global'),
            '1.0.0'
        );

        wp_enqueue_script(
            'toyota-blogs',
            get_template_directory_uri() . '/js/blogs.js',
            array(),
            '1.0.0',
            true
        );
    }

    if (is_page_template('page-wwdo.php')) {
        wp_enqueue_style(
            'toyota-wwdo',
            get_template_directory_uri() . '/css/wwdo.css',
            array('toyota-global'),
            '1.0.0'
        );
        wp_enqueue_script(
            'toyota-wwdo',
            get_template_directory_uri() . '/js/wwdo.js',
            array(),
            '1.0.0',
            true
        );
    }

    if (is_page_template('page-price.php')) {
        wp_enqueue_style(
            'toyota-price',
            get_template_directory_uri() . '/css/price.css',
            array('toyota-global'),
            '1..0.0'
        );

        wp_enqueue_script(
            'toyota-price',
            get_template_directory_uri() . '/js/price.js',
            array(),
            '1.0.0',
            true
        );
    }

    if (is_page_template('page-wwdo-hero.php')) {
        wp_enqueue_style(
            'wwdo-hero',
            get_template_directory_uri() . '/css/aus.css',
            array('toyota-global'),
            '1.0.0'
        );

        wp_enqueue_script(
            'wwdo-hero',
            get_template_directory_uri() . '/js/aus.js',
            array(),
            '1.0.0',
            true
        );
    }

    if (is_page_template('page-text.php')) {
        wp_enqueue_style(
            'text',
            get_template_directory_uri() . '/css/text.css',
            array('toyota-global'),
            '1.0.0'
        );

        wp_enqueue_script(
            'text',
            get_template_directory_uri() . '/js/text.js',
            array(),
            '1.0.0',
            true
        );
    }

    if (is_page_template('page-blog.php')) {
        wp_enqueue_style(
            'text',
            get_template_directory_uri() . '/css/blog.css',
            array('toyota-global'),
            '1.0.0'
        );

        wp_enqueue_script(
            'text',
            get_template_directory_uri() . '/js/blog.js',
            array(),
            '1.0.0',
            true
        );
    }

    if (is_page_template('page-thuythu.php')) {
        wp_enqueue_style(
            'thuythu',
            get_template_directory_uri() . '/css/thuythu.css',
            array('toyota-global'),
            '1.0.0'
        );

        wp_enqueue_script(
            'thuythu',
            get_template_directory_uri() . '/js/thuythu.js',
            array(),
            '1.0.0',
            true
        );
    }


    // Header JS
    wp_enqueue_script(
        'toyota-header',
        get_template_directory_uri() . '/js/header.js',
        array(),
        '1.0.0',
        true
    );

    wp_enqueue_script(
        'toyota-footer',
        get_template_directory_uri() . '/js/footer.js',
        array(),
        '1.0.0',
        true
    );

    wp_enqueue_script(
        'toyota-main',
        get_template_directory_uri() . '/js/single.js',
        array('jquery'),
        '1.0.0',
        true
    );

    wp_localize_script('toyota-header', 'toyotaData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'homeUrl' => home_url('/'),
        'restUrl' => rest_url(),
        'nonce' => wp_create_nonce('toyota-nonce')
    ));



}
add_action('wp_enqueue_scripts', 'toyota_enqueue_assets');

function toyota_theme_setup()
{
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
    ));
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'toyota-theme'),
        'footer' => __('Footer Menu', 'toyota-theme'),
    ));
}
add_action('after_setup_theme', 'toyota_theme_setup');


// Register Custom Post Type: Products (Xe Toyota)
function toyota_register_products_cpt()
{
    $labels = array(
        'name' => 'Sản phẩm',
        'singular_name' => 'Sản phẩm',
        'menu_name' => 'Sản phẩm',
        'add_new' => 'Thêm mới',
        'add_new_item' => 'Thêm sản phẩm mới',
        'edit_item' => 'Sửa sản phẩm',
        'new_item' => 'Sản phẩm mới',
        'view_item' => 'Xem sản phẩm',
        'search_items' => 'Tìm sản phẩm',
        'not_found' => 'Không tìm thấy sản phẩm',
        'not_found_in_trash' => 'Không có sản phẩm trong thùng rác',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-car',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite' => array('slug' => 'san-pham'),
        'capability_type' => 'post',
    );

    register_post_type('product', $args);
}
add_action('init', 'toyota_register_products_cpt');

function toyota_add_featured_image_to_rest()
{
    // For Products
    register_rest_field('product', 'featured_media_url', array(
        'get_callback' => function ($post) {
            $image_id = get_post_thumbnail_id($post['id']);
            if ($image_id) {
                $image = wp_get_attachment_image_src($image_id, 'medium');
                return $image ? $image[0] : '';
            }
            return '';
        },
        'schema' => array(
            'description' => 'Featured image URL',
            'type' => 'string',
        ),
    ));

    // For Posts
    register_rest_field('post', 'featured_media_url', array(
        'get_callback' => function ($post) {
            $image_id = get_post_thumbnail_id($post['id']);
            if ($image_id) {
                $image = wp_get_attachment_image_src($image_id, 'medium');
                return $image ? $image[0] : '';
            }
            return '';
        },
        'schema' => array(
            'description' => 'Featured image URL',
            'type' => 'string',
        ),
    ));
}
add_action('rest_api_init', 'toyota_add_featured_image_to_rest');

function toyota_register_search_endpoint()
{
    register_rest_route('toyota/v1', '/search', array(
        'methods' => 'GET',
        'callback' => 'toyota_search_callback',
        'permission_callback' => '__return_true',
    ));
}
add_action('rest_api_init', 'toyota_register_search_endpoint');


function toyota_search_callback($request)
{
    $query = sanitize_text_field($request->get_param('q'));

    if (empty($query)) {
        return new WP_Error('empty_query', 'Search query is required', array('status' => 400));
    }

    // Search in products
    $products = get_posts(array(
        'post_type' => 'product',
        'posts_per_page' => 5,
        's' => $query,
    ));

    // Search in posts
    $posts = get_posts(array(
        'post_type' => 'post',
        'posts_per_page' => 5,
        's' => $query,
    ));

    return array(
        'products' => $products,
        'posts' => $posts,
    );
}

function toyota_register_sidebars()
{
    // Sidebar cho blog
    register_sidebar(array(
        'name' => 'Blog Sidebar',
        'id' => 'sidebar-blog',
        'description' => 'Sidebar hiển thị ở trang blog',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    // Footer widgets
    register_sidebar(array(
        'name' => 'Footer Widget 1',
        'id' => 'footer-1',
        'description' => 'Footer column 1',
        'before_widget' => '<div class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => 'Footer Widget 2',
        'id' => 'footer-2',
        'description' => 'Footer column 2',
        'before_widget' => '<div class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => 'Footer Widget 3',
        'id' => 'footer-3',
        'description' => 'Footer column 3',
        'before_widget' => '<div class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'toyota_register_sidebars');


// Get product price (custom field)
function toyota_get_product_price($post_id)
{
    $price = get_post_meta($post_id, 'product_price', true);
    return $price ? number_format($price) . ' VNĐ' : '';
}

// Format phone number
function toyota_format_phone($phone)
{
    return preg_replace('/(\d{4})(\d{3})(\d{3,4})/', '$1 $2 $3', $phone);
}

function toyota_remove_wp_defaults()
{
    // Remove emoji scripts
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');

    // Remove WordPress version
    remove_action('wp_head', 'wp_generator');

    // Remove RSD link
    remove_action('wp_head', 'rsd_link');

    // Remove wlwmanifest link
    remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'toyota_remove_wp_defaults');

function toyota_excerpt_length($length)
{
    return 30;
}
add_filter('excerpt_length', 'toyota_excerpt_length');

function toyota_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'toyota_excerpt_more');