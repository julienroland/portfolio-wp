<?php
add_filter('excerpt_more', 'new_excerpt_more');
add_filter('get_avatar','change_avatar_css');
add_filter('wp_nav_menu_items','add_search_box', 10, 2);

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

function create_post_type() {
    register_post_type( 'projet',
        array(
            'labels' => array(
                'name' => __( 'Projets' ),
                'singular_name' => __( 'Projet' )
                ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title','editor','author','excerpt','custom-fields')
            )
        );

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
function add_search_box($items, $args) {

    ob_start();
    get_search_form();
    $searchform = ob_get_contents();
    ob_end_clean();

    $items .=  $searchform ;
    return $items;
}

add_action( 'init', 'register_my_menus' );
add_action( 'init', 'create_post_type' );
add_action('widgets_init', 'portfolio_widgets_init');