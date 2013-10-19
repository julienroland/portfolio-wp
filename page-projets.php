<?php 
/*
Template Name: Projet
*/
?>
<?php get_header(); ?>
<body id="projets">
  <h1 class="section">Ici sont présentés mes projets</h1>
  <section id="container">
    <h1 class="section">Contenu principal</h1>
    <?php get_template_part('nav'); ?>
    <section class="main">
     <?php get_template_part('breadcrumbs'); ?>
     <div class="row">
      <div class="large-6 large-offset-1 columns">
        <h2><i class="icon-suitcase"></i>&nbsp;Voici mes projets</h2>
      </div>
    </div>
    <article class="row">
      <div class="large-12 columns">
        <h3 class="section">Liste de mes projets</h3> 
        <ul id="imgTracker" class="inline-list">
          <?php $i=0; ?>
                <?php if(have_posts()):?>
          <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $loop = new WP_Query( array(
            'post_type' => 'work',
            'posts_per_page' => 10,
            'paged'=>$paged
        )); ?>
            <?php while($loop->have_posts()): $loop->the_post();?>
            <?php $i++; ?>
            <?php if($i % 6 === 0):?>
            <?php if(!($i % 2 ===0)): ?>
            <li class="th  focus "><?php the_post_thumbnail('full'); ?><div class="overImg"><a title="Voir la fiche du projet" href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4> <p><?php
            echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p></a></div></li>
          <?php else: ?>
          <li class="th  focus alternate"><?php the_post_thumbnail('full'); ?><div class="overImg"><a title="Voir la fiche du projet" href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4> <p><?php
          echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p></a></div></li>
        <?php endif; ?>
      <?php else: ?>
      <li class="th "><?php the_post_thumbnail('full'); ?><div class="overImg"><a title="Voir la fiche du projet" href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4> <p><?php
      echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p></a></div></li>
    <?php endif; ?>
  <?php endwhile;?>
  <?php  
  pagination($wp_query); ?> 
<?php else: ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?> 
</ul>

</div>
</article>
</section>
</section>

<?php get_footer(); ?>
<?php /*
<div class="overImg"><h4><?php the_title(); ?></h4>  <?php
echo get_post(get_post_thumbnail_id())->post_excerpt; ?>*<a href="<?php the_permalink(); ?>" class="medium button" title="<?php the_title_attribute(); ?>">Voir le projet</a></div>*/ ?>
