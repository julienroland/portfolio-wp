
<?php get_header(); ?>
<body id="top">
  <h1 class="section">Voici mon blog</h1>
  <section id="container" >
    <h1 class="section">Contenu principal de mon blog</h1>
     <?php get_template_part('nav'); ?>
    <section role="main" class="main">
      <ul class="breadcrumbs">
        <li><a href="index.html">Accueil</a></li>
        <li class="current">Blog</li>
      </ul>
      <div class="row">
        <h2><i class="icon-globe"></i>&nbsp;Mon blog </h2> 
      </div>
      <?php if(have_posts()):?>

      <?php while(have_posts()): the_post();?>
      <div class="row article">
        <div class="large-3 columns moreArticle">
          <i class="icon-calendar article"></i>
          <time class="date article" datetime="<?php the_time(get_option('date_format')); ?>">Posté le <?php the_time(get_option('date_format')); ?> à <?php the_time(); ?></time></a>
          <a class="commentsNb article" href="<?php the_permalink(); ?>"><i class="icon-comments"></i><?php comments_number('Pas de commentaire', 'Un commentaire', '% commentaires' );?></a>
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
  <?php get_footer(); ?>
