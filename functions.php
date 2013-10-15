<?php
add_filter('excerpt_more', 'new_excerpt_more');
add_filter('get_avatar','change_avatar_css');
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
/*Thème support*/

add_theme_support( 'post-thumbnails' ); 

function new_excerpt_more( $more ) {
    return '...';
}

function change_avatar_css($class) {
    $class = str_replace("class='avatar", "class='avatar th radius ", $class) ;
    return $class;
}
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
      )
    );
}


function remove_width_attribute( $html ) {
 $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
 return $html;
}
function create_post_type() {
    register_post_type( 'projet',
        array(
            'labels' => array(
                'name' => __( 'Projets' ),
                'singular_name' => __( 'Projet' )
                ),
            'public' => true,
            'has_archive' => true,
            'show_in_menu'=> true,
            'show_in_nav_menus' => true,
            'supports' => array('title','editor','author','thumbnail','excerpt','custom-fields')
            )
        );
}
function olab_register_taxonomy_for_images() {
    register_taxonomy_for_object_type( 'category', 'attachment' );
}

function portfolio_widgets_init()
{
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'portfolio' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">', //le html
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        ) );

    register_sidebar( array(
        'name' => __( 'Secondary Sidebar', 'portfolio' ),
        'id' => 'sidebar-2',
        'description' => __( 'description', 'portfolio' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        ) );
}
function olab_add_image_category_filter() {
    $screen = get_current_screen();
    if ( 'upload' == $screen->id ) {
        $dropdown_options = array( 'show_option_all' => __( 'View all categories', 'olab' ), 'hide_empty' => false, 'hierarchical' => true, 'orderby' => 'name', );
        wp_dropdown_categories( $dropdown_options );
    }
}
add_action( 'restrict_manage_posts', 'olab_add_image_category_filter' );
add_action( 'init', 'olab_register_taxonomy_for_images' );
add_action( 'init', 'register_my_menus' );
add_action( 'init', 'create_post_type' );
add_action('widgets_init', 'portfolio_widgets_init');