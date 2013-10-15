<?php 
/*
Template Name: index
*/ ?>
<?php
get_header();
?>
<body id="accueil">
  <h2 class="section">Portfolio de Julien Roland webdesigner</h2>
  <header>
    <div class="image">
      <div class="presentation"><p>Julien Roland</p>
        <p class="portfolio">PortFolio</p></div>
        <nav class="ban">
          <h2 class="section">Menu principal</h2>
          <ul class="mainMenu">
            <li><a href="<?php echo home_url().'/qui-suis-je/'; ?>"><i class="icon-user"></i><p>Qui suis-je</p></a></li>
            <li><a href="<?php echo home_url().'/blog/'; ?>"><i class="icon-comment"></i><p>Blog</p></a></li>
            <li><a href="<?php echo home_url().'/projets/'; ?>"><i class="icon-suitcase"></i><p>Mes projets</p></a></li>
            <li><a href="<?php echo home_url().'/contact/'; ?>"><i class="icon-globe"></i><p>Contactez moi</p></a></li>
          </ul>
        </nav>
      </div>
    </header>
    <section id="container">
      <h1 class="section">Contenu principal</h1>
     <?php get_template_part('nav'); ?>
      <section class="main">
        <?php get_template_part('breadcrumbs'); ?>
        <h2><i class="icon-book"></i>&nbsp;Mes derniers post</h2>
        <?php if(have_posts()):?>
        <?php  $args = array('showposts' => 2);?>
        <?php query_posts($args); ?>
        <?php while(have_posts()): the_post();?>
        <div class="row article">

          <div class="large-3 columns moreArticle">
            <i class="icon-calendar article"></i>
            <p class="date article"><time datetime="<?php the_time(get_option('date_format')); ?>">Posté le <?php the_time(get_option('date_format')); ?> à <?php the_time(); ?></time></p>
            <a class="commentsNb article" href="<?php the_permalink(); ?>"><i class="icon-comments"></i> <?php comments_number('Pas de commentaire', 'Un commentaire', '% commentaires' );?></a>
          </div>
          <article class="large-9 columns">
            <h3><?php the_title();?></h3>
            <?php the_excerpt(); ?>
            <a class="small button radius" href="<?php the_permalink(); ?>">Lire la suite</a>
          </article>
        </div>
      <?php endwhile; ?>
    <?php else: 
    echo wpautop( 'Aucun post disponible' );
    endif; ?>
  </section>
</section>
<?php comments_template(); ?>
<?php get_footer();?>