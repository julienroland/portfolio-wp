<?php get_header(); ?>
<body>
  <h1 class="section">Page du projet: logo personnel</h1>
  <section id="container">
    <h1 class="section">Contenu principal</h1>
   <nav class="top-bar fixed">
      <h2 class="section">Menu secondaire du contenu principal</h2>
      <ul class="title-area">
        <!-- Title Area -->
        <li class="name">
          <a href="index.html"><i class="icon-reorder"></i>&nbsp;Revenir à l'accueil</a>
        </li>
        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>

      <div class="top-bar-section">

        <ul class="right">
         <li>
           <a href="quisuisje.html"><i class="icon-male"></i>&nbsp;Qui suis-je?</a>
         </li>
         <li >
           <a href="blog.html"><i class="icon-comment"></i>&nbsp;Blog</a>
         </li>
         <li class="has-dropdown active" ><a href="projets.html" data-dropdown="drop1" ><i class="icon-suitcase"></i>&nbsp;Projets</a>
          <ul class="dropdown" id="drop1" class="f-dropdown" data-dropdown-content> 
            <li><label>Liste des projets</label></li>
            <li><a href="voirProjet.html"><i class="icon-camera"></i>&nbsp;Logo personnel</a></li>
            <li><a href="voirProjet1.html"><i class="icon-signal"></i>&nbsp;Logo personnel</a></li>
            <li class="divider"></li>
          </ul>
        </li>
        <li>
          <a href="contact.html"><i class="icon-globe"></i>&nbsp;Contact</a>
        </li>
      </ul>
    </div>
  </nav>
<section class="main">
  <ul class="breadcrumbs">
    <li><a href="index.html">Accueil</a></li>
    <li><a href="projets.html">Projets</a></li>
    <li class="current">Logo personnel</li>
  </ul>

  <div class="row">
    <h2>Logo personnel</h2>
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
