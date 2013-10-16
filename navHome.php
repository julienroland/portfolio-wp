

 <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'mainMenu','walker' => new Custom_Walker_Nav_Menu, 'depth' => 1 ) ); ?>
<?php /*<ul class="mainMenu">
            <li><a href="<?php echo home_url().'/qui-suis-je/'; ?>"><i class="icon-user"></i><p>Qui suis-je</p></a></li>
            <li><a href="<?php echo home_url().'/blog/'; ?>"><i class="icon-comment"></i><p>Blog</p></a></li>
            <li><a href="<?php echo home_url().'/projets/'; ?>"><i class="icon-suitcase"></i><p>Mes projets</p></a></li>
            <li><a href="<?php echo home_url().'/contact/'; ?>"><i class="icon-globe"></i><p>Contactez moi</p></a></li>
          </ul>
        </nav> */?>