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
  <ul class="breadcrumbs">
    <li><a href="quisuisje.html">Accueil</a></li>
    <li class="current">Projets</li>
  </ul>
  <article class="row">
    <h2><i class="icon-suitcase"></i>&nbsp;Voici mes projets</h2>
    <div class="large-4 columns"><img class="track" src="<?php bloginfo('stylesheet_directory'); ?>/img/projet.png" alt="">
      <p class="lien"><a href="voirProjet.html">Voir le projet <i class="icon-chevron-right"></i></a></p>
    </div>

    <div class="large-8 columns">
      <h3 class="section">Liste de mes projets</h3>
      <ul id="imgTracker" class="inline-list">
        <li class="th radius"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/logo.png" alt=""/><div class="overImg"><p>Logo personnel fait lors du cours de Dessin en 2ème année.</p><a href="voirProjet.html" class="medium button">Voir le projet</a></div></li>
        <li class="th radius"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/perso.png" alt=""/><div class="overImg"><p>Logo personnel fait lors du cours de Dessin en 2ème année.</p><a href="voirProjet.html" class="medium button">Voir le projet</a></div></li>
        <li class="th radius"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/perso.png" alt=""/><div class="overImg"><p>Logo personnel fait lors du cours de Dessin en 2ème année.</p><a href="voirProjet.html" class="medium button">Voir le projet</a></div></li>
        <li class="th radius"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/perso.png" alt=""/><div class="overImg"><p>Logo personnel fait lors du cours de Dessin en 2ème année.</p><a href="voirProjet.html" class="medium button">Voir le projet</a></div></li>
      </ul>
    </div>
  </article>
</section>
</section>
<div class="image">
<?php include('slider.php'); ?>
</div>

<?php get_footer(); ?>
