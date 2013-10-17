<?php 
/*
Template Name: Qui
*/
?>
<?php get_header(); ?>
<body id="top">
  <h1 class="section">Mon portfolio, qui suis-je?</h1>
  <section id="container">
    <h1 class="section">Contenu principal</h1>
    <?php get_template_part('nav'); ?>
    <section class="main">
      <?php get_template_part('breadcrumbs'); ?>
      <?php if(have_posts()):?>
      <?php while(have_posts()): the_post();?>
      <div class="row title">
        <div class="large-6 large-offset-1 columns">
         <h2><i class="icon-male"></i>&nbsp;Qui suis-je?</h2>
       </div>
     </div>
     <div class="row ">

      <div class="large-4 columns"><img src="<?php bloginfo('template_directory');?>/img/imac.png" alt=""></div>
      <article class="large-8  columns" itemprop="text" itemscope itemtype="http://schema.org/Person" >
        <h4 class="section">Je m'appel Julien Roland</h4>
        <?php the_content(); ?>
      </article>
    </div>
  <?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
<div class="row doc">
  <div class="large-4 large-centered columns">
   <div class="cv animated bounce"><a href="">CV</a></div>
 </div>
</div>
</section>
</section>


<?php get_footer(); ?>
