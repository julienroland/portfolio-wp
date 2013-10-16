<?php 
/*
Template Name: Projet
*/
?>
<?php get_header(); ?>
<body id="top">
  <h1 class="section">Ici sont présentés mes projets</h1>
  <section id="container">
    <h1 class="section">Contenu principal</h1>
    <?php get_template_part('nav'); ?>
    <section class="main">
     <?php get_template_part('breadcrumbs'); ?>
     <article class="row">
      <h2><i class="icon-suitcase"></i>&nbsp;Voici mes projets</h2>
      <div class="large-4 columns"><img class="track" src="<?php bloginfo('stylesheet_directory'); ?>/img/projet.png" alt="">
        <p class="lien"><a href="voirProjet.html">Voir le projet <i class="icon-chevron-right"></i></a></p>
      </div>
      <div class="large-8 columns">


        <h3 class="section">Liste de mes projets</h3> 
        <ul id="imgTracker" class="inline-list">
          <?php $loop = new WP_Query( array( 'post_type' => 'work', 'posts_per_page' => 10 ) );
          while ( $loop->have_posts() ) : $loop->the_post();?>

          <li class="th radius"><?php the_post_thumbnail('full'); ?><div class="overImg"><h4><?php the_title(); ?></h4>  <?php
          echo get_post(get_post_thumbnail_id())->post_excerpt; ?>*<a href="<?php the_permalink(); ?>" class="medium button" title="<?php the_title_attribute(); ?>">Voir le projet</a></div></li>

        <?php endwhile;?>

      </ul>

    </div>
  </article>
</section>
</section>

<?php get_footer(); ?>