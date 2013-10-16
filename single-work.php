<?php get_header(); ?>
<body>
  <h1 class="section">Page du projet: <?php the_title(); ?></h1>
  <section id="container">
    <h1 class="section">Contenu principal</h1>
    <?php get_template_part('nav'); ?>
    <section class="main">
      <?php get_template_part('breadcrumbs'); ?>
      <?php if(have_posts()):?>

      <?php while(have_posts()): the_post();?>
      <div class="row">
        <h2><?php the_title(); ?></h2>
        <div class="large-4 columns">
          <?php the_post_thumbnail('full'); ?>
        </div>
        <div class="large-8 columns">
          <p><?php the_content(); ?></p>
        </div>
      </div>
    <?php endwhile; ?>
    <?php else: 
    echo wpautop( 'Aucun post disponible' );
    endif; ?>
        <?php wp_reset_postdata(); ?>
  </section>
</section>
<?php get_footer(); ?>
