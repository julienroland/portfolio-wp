<?php get_header(); ?>

<body id="single">
  <h1 aria-level="1" role="heading" class="section">Article:<?php the_title(); ?></h1>
  <section id="container" >
    <h2 aria-level="2" role="heading" class="section">Contenu principal</h2>
     <?php get_template_part('nav'); ?>
    <article role="article" class="main" itemscope itemtype="http://schema.org/Article">
      <?php if(have_posts()): ?>
      <?php while(have_posts()): the_post(); ?>
      <?php get_template_part('breadcrumbs'); ?>
      <h2 aria-level="2" role="heading"><?php the_title(); ?></h2>
      <div class="row head">
        <div class="infosDate"  itemtype="http://schema.org/Person">
           <p class="date"><time itemprop="datePublished" datetime="<?php the_time(get_option('date_format')); ?>">Posté le <em><?php the_time(get_option('date_format')); ?></em>&nbsp; à&nbsp;<em><?php the_time(); ?></em></time></p><p>par<em itemprop="author"><?php the_author(); ?></em></p>
       </div>
     </div>

     <div class="row article">
      <div class="large-10 large-centered columns"itemprop="text">
        <?php the_post_thumbnail(); ?><?php the_content(); ?>
      </div>
    </div>
    <?php comments_template(); ?>
  <?php endwhile; ?>
<?php endif; ?>
    <?php wp_reset_postdata(); ?>
</article>
</div>
<?php get_footer();