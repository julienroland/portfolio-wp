<?php 
/*
Template Name: Qui
*/
?>
<?php get_header(); ?>
<body id="top">
  <h1 aria-level="1" role="heading" class="section">Mon portfolio page qui suis-je?</h1>
  <section id="container">
    <h2 aria-level="2" role="heading" class="section">Contenu principal</h2>
    <?php get_template_part('nav'); ?>
    <section class="main" role="main">
      <?php get_template_part('breadcrumbs'); ?>
      <?php if(have_posts()):?>
      <?php while(have_posts()): the_post();?>
      <div class="row title">
        <div class="large-6 large-offset-1 columns">
         <h2 aria-level="2" role="heading"><i class="icon-male"></i>&nbsp;Qui suis-je?</h2>
       </div>
     </div>
     <div class="row ">

      <div class="large-4 columns"><img src="<?php bloginfo('template_directory');?>/img/imac.png" alt=""></div>
      <article class="large-8  columns" itemprop="text" itemscope itemtype="http://schema.org/Person" >
        <h4 aria-level="4" role="heading" class="section">Je m'appel Julien Roland</h4>
        <?php the_content(); ?>
      </article>
    </div>
  <?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
<div class="row doc">
  <div class="large-4 large-centered columns">
   <div class="cv animated bounce"><a href="http://julien-roland.be/cv/">CV</a></div>
 </div>
</div>
</section>
</section>


<?php get_footer(); ?>
