<?php get_header(); ?>

<body id="single">
  <h1 class="section">Article découerte de Modernizr</h1>
  <section id="container" >
    <h1 class="section">Contenu principal</h1>
     <?php get_template_part('nav'); ?>
    <section role="main" class="main" itemscope itemtype="http://schema.org/Article">
      <?php if(have_posts()): ?>
      <?php while(have_posts()): the_post(); ?>
      <?php get_template_part('breadcrumbs'); ?>
      <h2><?php the_title(); ?></h2>
      <div class="row head">
        <div class="infosDate"  itemtype="http://schema.org/Person">
           <p class="date "><time itemprop="datePublished" datetime="<?php the_time(get_option('date_format')); ?>">Posté le <em><?php the_time(get_option('date_format')); ?></em>&nbsp; à&nbsp;<em><?php the_time(); ?></em></time></p><p>par<a itemprop="author" href=""><?php the_author(); ?></a></p>
       </div>
     </div>

     <div class="row article">
      <article class="large-10 large-centered columns"itemprop="text">
        <h2 class="section"><?php the_title(); ?></h2>
        <?php the_post_thumbnail(); ?><?php the_content(); ?>
      </article>
    </div>
    <?php comments_template(); ?>
  <?php endwhile; ?>
<?php endif; ?>
    <?php wp_reset_postdata(); ?>
</section>
</div>
<?php get_footer();