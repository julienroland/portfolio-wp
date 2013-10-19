<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>

<body id="blog">
  <h1 class="section">Voici mon blog</h1>
  <section id="container" >
    <h1 class="section">Contenu principal de mon blog</h1>
    <?php get_template_part('nav'); ?>
    <section role="main" class="main">
      <?php get_template_part('breadcrumbs'); ?>
      <div class="row">
        <div class="large-6 large-offset-1 columns">
          <h2><i class="icon-comments"></i>&nbsp;Mon blog </h2> 
        </div>
      </div>
      <?php $i=0; ?>
      <?php if(have_posts()):?>

      <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array(
        'posts_per_page' => 5,
        'paged' => $paged
        );?>

        <?php query_posts($args); ?>
        <?php while(have_posts()): the_post();?>
              <?php $i++; ?>
              <?php if($i % 2 === 0): ?>
        <div class="row pair">
          <div class="large-3 columns moreArticle">
            <i class="icon-calendar huge"></i>
            <p class="date "><time datetime="<?php the_time(get_option('date_format')); ?>">Posté le <em><?php the_time(get_option('date_format')); ?></em>&nbsp; à&nbsp;<em><?php the_time(); ?></em></time></p>
            <p class="light italic" href="<?php the_permalink(); ?>"><i class="icon-comments"></i>&nbsp;<?php comments_number('Pas de commentaire', 'Un commentaire', '% commentaires' );?></p>
          </div>
    
          <article class="large-7 large-uncentered columns">
            <h3><?php the_title();?></h3>
            <span> <?php the_excerpt(); ?></span> 
            <a href="<?php the_permalink(); ?>">Lire la suite</a>
          </article>
          </div>
        <?php else: ?>

        <div class="row impair">
          <div class="large-3 columns moreArticle">
            <i class="icon-calendar huge"></i>
            <p class="date "><time itemprop="datePublished"  datetime="<?php the_time(get_option('date_format')); ?>">Posté le <em><?php the_time(get_option('date_format')); ?></em>&nbsp; à&nbsp;<em><?php the_time(); ?></em></time></p>
            <p class="light italic" href="<?php the_permalink(); ?>"><i class="icon-comments"></i>&nbsp;<?php comments_number('Pas de commentaire', 'Un commentaire', '% commentaires' );?></p>
          </div>
    
          <article class="large-7 large-uncentered columns">
            <h3><?php the_title();?></h3>
            <span> <?php the_post_thumbnail(); ?><?php the_excerpt(); ?></span> 
            <a href="<?php the_permalink(); ?>">Lire la suite</a>
          </article>
          </div>
        <?php endif; ?>
      <?php endwhile; ?>

      <?php  
      pagination($wp_query); ?> 
      <?php else: 
      echo wpautop( 'Aucun post disponible' );
      endif; ?>
      <?php wp_reset_postdata(); ?>

    </section>
  </section>
  <?php get_footer(); ?>
