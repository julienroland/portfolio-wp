
<div class="skip-link screen-reader-text">
  <a href="#content" title="<?php esc_attr_e( 'Skip to content', 'portfolio' ); ?>">
    <?php _e( 'Skip to content', 'portfolio' ); ?></a>
  </div>
  <nav class="top-bar fixed">
    <ul class="title-area">
      <!-- Title Area -->
      <li class="name">
        <a href="<?php echo home_url(); ?>"><i class="icon-home"></i>&nbsp;Revenir à l'accueil</a>
      </li>
      <li>
        <?php/*
      get_search_form(); */ ?>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>
      <div class="top-bar-section">
       <?php wp_nav_menu( array( 'theme_location' => 'extra-menu', 'menu_class' => 'right' ) ); ?>
      </div>
    </nav>

