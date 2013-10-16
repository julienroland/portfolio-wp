
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
        <?php
      get_search_form(); ?>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>
      <div class="top-bar-section">
       <?php wp_nav_menu( array( 'theme_location' => 'extra-menu', 'menu_class' => 'right' ) ); ?>
      </div>
    </nav>

  <?php /*<h2 class="section">Menu secondaire du contenu principal</h2>
  <ul class="title-area">
    <!-- Title Area -->
    <li class="name">
      <a href="<?php echo home_url(); ?>"><i class="icon-reorder"></i>&nbsp;Revenir à l'accueil</a>
    </li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <div class="top-bar-section">

    <ul class="right">
      <li><?php
      get_search_form(); ?></li>
      <li >
       <a href="<?php echo home_url().'/qui-suis-je/'; ?>"><i class="icon-male"></i>&nbsp;Qui suis-je?</a>
     </li>
     <li >
       <a href="<?php echo home_url().'/blog/'; ?>"><i class="icon-comment"></i>&nbsp;Blog</a>
     </li>
     <li><a href="<?php echo home_url().'/projets/'; ?>"  ><i class="icon-suitcase"></i>&nbsp;Projets</a>
     </li>
     <li class="active">
      <a href="<?php echo home_url().'/contact/'; ?>"><i class="icon-globe"></i>&nbsp;Contact</a>
    </li>
  </ul>
  </div>*/?>