<?php get_header(); ?>
<body id="top">
  <h1 class="section">Article découerte de Modernizr</h1>
  <section id="container" >
    <h1 class="section">Contenu principal</h1>
 <?php include('nav.php'); ?>
<section role="main" class="main" itemscope itemtype="http://schema.org/Article">
  <?php include('breadcrumbs.php'); ?>
      <?php if(have_posts()): ?>
      <?php while(have_posts()): the_post(); ?>
       <h2><i class="icon-globe"></i>&nbsp;<?php the_title(); ?></h2>
  <div class="row head">
    <div class="infosDate"  itemtype="http://schema.org/Person">
     <p><a class="date article" href=""><time itemprop="datePublished" datetime="11:12">Posté le <?php the_time(get_option('date_format')); ?> à <?php the_time(); ?></time></a>par <a itemprop="author" href=""><?php the_author(); ?></a></p>
   </div>
 </div>

 <div class="row article">
  <article itemprop="text">
    <h2 class="section"><?php the_title(); ?></h2>
    <?php the_content(); ?>
  </article>
</div>
<?php endwhile; ?>
<?php endif; ?>
</section>
</div>
<?php get_footer();