

<nav class="top-bar fixed" role="navigation">
  <div class="skip-link screen-reader-text">
    <a href="#content" title="<?php esc_attr_e( 'Passer au contenu', 'portfolio' ); ?>">
      <?php _e( 'Passer au contenu', 'portfolio' ); ?></a>
    </div>
    <h3 role="heading" aria-level="3" class="section">Menu principal</h3>
    <ul class="title-area">
      <!-- Title Area -->
      <li class="name">
        <a href="<?php echo home_url(); ?>"><i class="icon-home"></i>&nbsp;Revenir à l'accueil</a>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>
    <div class="top-bar-section">
     <?php wp_nav_menu( array( 'theme_location' => 'extra-menu', 'menu_class' => 'right' ) ); ?>
   </div>
 </nav>

