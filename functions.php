<?php
add_filter('excerpt_more', 'new_excerpt_more');
add_filter('get_avatar','change_avatar_css');
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
/*Thème support*/

add_theme_support( 'post-thumbnails' ); 
/* Affiche ... a la fin de excerpt*/
function new_excerpt_more( $more ) {
    return '...';   
}
/*Changer l'image d'avatar*/
function change_avatar_css($class) {
    $class = str_replace("class='avatar", "class='avatar th radius ", $class) ;
    return $class;
}
/*Mes menus*/
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
      )
    );
}

/*SUPP les dimensions des images*/
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}
/* mes post type*/ 
function create_post_type() {
    register_post_type( 'work',
        array(
            'labels' => array(
                'name' => __( 'Projets' ),
                'singular_name' => __( 'Projet' )
                ),
            'public' => true,
            'has_archive' => true,
            'show_in_menu'=> true,
            'show_in_nav_menus' => true,
            'supports' => array('title','editor','author','thumbnail','excerpt','custom-fields','pagination')
            )
        );
}
/*Nav personnaliser*/
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_el ( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    // Copy all the start_el code from source, and modify
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

    $output .= $indent . '<li class="animated bounce"' . $id . $value . $class_names .'>';

    $atts = array();
    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
    $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
    $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
    $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

    $attributes = '';
    foreach ( $atts as $attr => $value ) {
        if ( ! empty( $value ) ) {
            $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
            $attributes .= ' ' . $attr . '="' . $value . '"';
        }
    }
    switch ($item->title) {
        case 'Qui suis-je ?':
        $icon = '<i class="icon-user"></i>';
        break;
        case 'Blog':
        $icon = '<i class="icon-comment"></i>';
        break;
        case 'Projets':
        $icon = '<i class="icon-suitcase"></i>';
        break;
        case 'Contact':
        $icon = '<i class="icon-globe"></i>';
        break;


    }
    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>'.$icon;
    $item_output .= '<p>'.$args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after.'</p>';

    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}

function end_el( &$output, $item, $depth = 0, $args = array() ) {
    // Copy all the end_el code from source, and modify
    $output .= "</li>\n";
}
}
/*Ajout de catégorie dans media*/
function olab_register_taxonomy_for_images() {
    register_taxonomy_for_object_type( 'category', 'attachment' );
}
/*Ajout de widget*/
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
/*Ajout de catégorie dans media*/
function olab_add_image_category_filter() {
    $screen = get_current_screen();
    if ( 'upload' == $screen->id ) {
        $dropdown_options = array( 'show_option_all' => __( 'View all categories', 'olab' ), 'hide_empty' => false, 'hierarchical' => true, 'orderby' => 'name', );
        wp_dropdown_categories( $dropdown_options );
    }
}
/*Pagination*/
function pagination( $query) {
    // Nombre d'elements a afficher avant et après la page courante
    $NB_TO_DISPLAY = 4;

    $baseURL = "http://".$_SERVER['HTTP_HOST'];
    if($_SERVER['REQUEST_URI'] != "/"){
      $baseURL = $baseURL.$_SERVER['REQUEST_URI'];
  }

    // Suppression de '/page' de l'URL
  $sep = strrpos($baseURL, '/page/');
  if($sep != FALSE){
      $baseURL = substr($baseURL, 0, $sep);
  }

    // Suppression des parametres de l'URL
  $sep = strrpos($baseURL, '?');
  if($sep != FALSE){
      // On supprime le caractere avant qui est un '/' 
      $baseURL = substr($baseURL, 0, ($sep-1));
  }

    // Recuperation des parametres pour les re-afficher dans les liens
  $qs = $_SERVER["QUERY_STRING"] ? "?".$_SERVER["QUERY_STRING"] : "";
  $hasQs = false;

  if($qs != "")
      $hasQs = true;
  
  $page = $query->query_vars["paged"];
  if ( !$page ){
      $page = 1;
  }
  
    // Generation et affichage uniquement si il y a plusieurs pages
  if ( $query->found_posts > $query->query_vars["posts_per_page"] ) {
      // Calcul des pages a afficher
      $minPage = $page - $NB_TO_DISPLAY;
      if($minPage <= 0){
        $minPage = 1;
    }
    $maxPage = $minPage + ($NB_TO_DISPLAY * 2);
    if($maxPage > $query->max_num_pages){
        $maxPage = $query->max_num_pages;
    }

    $html =  '<div class="row "><div class="large-3 large-centered columns"><ul id="pagination">';
      //$html .= "<li>Page ".$page." sur ".$query->max_num_pages."</li>";

    if($page > 1){
        $previous = $page -1;
        $html .= "<li><a href='".$baseURL."/page/".$previous;
        if($hasQs)
          $html .= $qs;
      $html .= "'>&laquo; Précédente</a></li>";
  } 
  if($minPage > 1){
    $html .= "<li><a href='".$baseURL."/page/1";
    if($hasQs)
      $html .= $qs;
  $html .= "'>1</a></li>";
}
if($minPage > 2){      
  $html .= "<li>...</li>";
} 

      // Boucle dans les pages
for ( $i=$minPage; $i <= $maxPage; $i++ ) {
        // Detection de la page active dans la liste des liens
    if ( $i == $page ) {
      $html .= '<li class="activePage">'.$i.'</li>';
  } else {
      $html .= '<li><a href="'.$baseURL.'/page/'.$i;
      if($hasQs)
        $html .= $qs;
    $html .= '">'.$i.'</a></li>';
}
}

if($maxPage < $query->max_num_pages){
  if($maxPage < $query->max_num_pages -1)
    $html .= "<li>...</li>";
$html .= '<li><a href="'.$baseURL.'/page/'.$query->max_num_pages;
if($hasQs)
  $html .= $qs;
$html .='">'.$query->max_num_pages.'</a></li>';
}        
if($page < $query->max_num_pages){
    $html .= '<li><a href="'.$baseURL.'/page/'.($page+1);
    if($hasQs)
      $html .= $qs;
  $html .= '">Suivante &raquo;</a></li>';
}
$html .= '</ul></div></div>';

      // Affichage de la liste des liens
echo $html;
}
}
add_action( 'restrict_manage_posts', 'olab_add_image_category_filter' );
add_action( 'init', 'olab_register_taxonomy_for_images' );
add_action( 'init', 'register_my_menus' );
add_action( 'init', 'create_post_type' );
add_action('widgets_init', 'portfolio_widgets_init');