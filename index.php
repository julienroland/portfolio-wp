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
    <div class="social">
      <ul>
        <li class="facebook animated bounce"><a href="" title="Aller sur mon compte Facebook">Mon Facebook</a></li>
        <li class="gmail  animated bounce"><a href="" title="M'envoyer un mail sur mon addresse Gmail">M'envoyer un mail</a></li>
        <li class="twitter  animated bounce"><a href="" title="Aller sur mon profil Twitter">Voir mon Twitter</a></li>
        <li class="wordpress  animated bounce"><a href="" title="Aller sur la page de mes thèmes Wordpress">Mes thèmes Wordpress</a></li>
        <li class="linkedin  animated bounce"><a href="" title="Aller sur mon profil Linkedin">Mon profil Linkedin</a></li>
      </ul>
    </div>
    <div class="image">
      <!--<div class="presentation"><p>Julien Roland</p>
      <p class="portfolio">PortFolio</p></div>-->
       <!-- <nav class="ban">
          <h2 class="section">Menu principal</h2>
          <?php get_template_part('navHome'); ?>
        </div>
      </nav>-->
    </header>
    <section id="container">
      <h1 class="section">Contenu principal</h1>
      <?php get_template_part('nav'); ?>
      <section class="main">
        <?php get_template_part('breadcrumbs'); ?>
        <div class="row">
          <div class="large-6 large-offset-1 columns">
            <h2>Mes derniers projets</h2>
          </div>
        </div>
        <div class="row projets">
          <div class="large-12 columns">
            <ul class="lastProjet">
             <?php $loop = new WP_Query( array( 'post_type' => 'work', 'posts_per_page' => 2 ) );
             while ( $loop->have_posts() ) : $loop->the_post();?>
             <div class="large-6 columns">

              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_post_thumbnail('full'); ?><div class="overImg"><h4><?php the_title(); ?></h4> <p><?php
              echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p></div></a>
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            </div>
          <?php endwhile;?>
          <?php wp_reset_postdata(); ?> 
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="large-6 large-offset-1 columns">
        <h2>Mes derniers post</h2>
      </div>
    </div>
    <?php if(have_posts()):?>
    <?php  $args = array('showposts' => 2);?>
    <?php query_posts($args); ?>
    <?php while(have_posts()): the_post();?>
    <div class="row ">

      <div class="large-3 columns moreArticle">
        <i class="icon-calendar huge"></i>
        <p class="date "><time itemprop="datePublished" datetime="<?php the_time(get_option('date_format')); ?>">Posté le <em><?php the_time(get_option('date_format')); ?></em>&nbsp; à&nbsp;<em><?php the_time(); ?></em></time></p>
        <p class="light italic"><i class="icon-comments"></i> <?php comments_number('Pas de commentaire', 'Un commentaire', '% commentaires' );?></p>
      </div>
      <article class="large-7 large-uncentered columns">
        <h3><?php the_title();?></h3>
        <span><?php the_post_thumbnail(); ?>
          <?php the_excerpt(); ?>
        </span>
        <a href="<?php the_permalink(); ?>">Lire la suite</a>
      </article>
    </div>
  <?php endwhile; ?>
  <?php else: ?>
  <div class="row">
    <div class="large-6 large-centered columns">
      <p>Aucun article disponible</p>
    </div>
  </div>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>
</section>
</section>
<?php get_footer();?>