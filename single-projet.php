<?php get_header(); ?>
<body>
  <h1 class="section">Page du projet: <?php the_title(); ?></h1>
  <section id="container">
    <h1 class="section">Contenu principal</h1>
   
<section class="main">
  <?php get_template_part('breadcrumbs'); ?>
  <?php get_template_part('nav'); ?>
  <div class="row">
    <h2><?php the_title(); ?></h2>
    <div class="large-4 columns"><img class="voir" src="img/projet.png" alt="" href="img/logo.png">
    </div>
    <div class="large-8 columns">
      <h3><i class="icon-caret-right"></i>&nbsp;Context de création</h3>
      <p class="text">Ce logo à été crée lors du cours de dessin en 2ème année donné par Mme Lussardi.
      </p>
      <h3><i class="icon-caret-right"></i>&nbsp;Deadlines</h3>
      <p class="text">Le projet à du être crée en 2 semaines maximun. Il était à rendre en version pdf et une version imprimé.
      </p>
    </div>
  </div>
</section>
</section>
<?php get_footer(); ?>
