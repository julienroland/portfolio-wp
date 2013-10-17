<?php
/*
Template Name: Contact
*/
?>


<?php 
//If the form is submitted
if(isset($_POST['submitted'])) {

	//Check to see if the honeypot captcha field was filled in
	if(trim($_POST['checking']) !== '') {
		$captchaError = true;
	} else {

		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = 'Indiquez votre nom.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = 'Indiquez une adresse e-mail valide.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = 'Adresse e-mail invalide.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}

		//Check to make sure comments were entered	
		if(trim($_POST['comments']) === '') {
			$commentError = 'Entrez votre message.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}

		//If there is no error, send the email
		if(!isset($hasError)) {

			$emailTo = 'roland.julien.perso@gmail.com';
			$subject = 'Formulaire de contact de '.$name;
			$sendCopy = trim($_POST['sendCopy']);
			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'De : mon site <'.$emailTo.'>' . "\r\n" . 'R&eacute;pondre &agrave; : ' . $email;
			
			mail($emailTo, $subject, $body, $headers);

			if($sendCopy == true) {
				$subject = 'Formulaire de contact';
				$headers = 'De : <noreply@somedomain.com>';
				mail($email, $subject, $body, $headers);
			}

			$emailSent = true;

		}
	}
} ?>


<?php get_header(); ?>


<body id="top">
	<h1 class="section">Contactez-moi</h1>
	<section id="container" >
		<h1 class="section">Contenu principal</h1>
     <?php get_template_part('nav'); ?>
     <section class="main">
               <?php get_template_part('breadcrumbs'); ?>
    <div class="row">
        <h2><i class="icon-globe"></i>&nbsp;Me contacter? </h2>
        <div class="large-4 columns">
            <div id="gmap"></div>
            <label for="map">Et vous, vous habitez où?</label>
            <input type="text" name="map" value="" id="map" placeholder="Rue Basse-Montagne 40, 5100 Wépion, Belgique">
        </div>
        <section class="large-7  columns">
         <h2 class="section">Formulaire de contact</h2>

         <?php if(isset($emailSent) && $emailSent == true) { ?>

         <div class="thanks">
          <h1>Merci, <?=$name;?></h1>
          <p>Votre e-mail a &eacute;t&eacute; envoy&eacute; avec succ&egrave;s. Vous recevrez une r&eacute;ponse sous peu.</p>
      </div>

      <?php } else { ?>

      <?php if (have_posts()) : ?>

      <?php while (have_posts()) : the_post(); ?>
      <?php the_content(); ?>

      <?php if(isset($hasError) || isset($captchaError)) { ?>
      <p class="error">Une erreur est survenue lors de l'envoi du formulaire.</p>
      <?php } ?>

      <form action="<?php the_permalink(); ?>" id="contactForm" method="post">
          <fieldset>
           <div class="row">
            <div class="large-6 columns">
             <label for="contactName">Nom</label>
             <input type="text" name="contactName" id="contactName" placeholder="Roland" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField" />
             <?php if($nameError != '') { ?>
             <span class="error"><?=$nameError;?></span> 
             <?php } ?>
         </div>
     </div>
     <div class="row">
        <div class="large-6 columns">

         <label for="email">E-mail</label>
         <input type="email"  name="email" id="email" placeholder="vous@gmail.com" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email" />
         <?php if($emailError != '') { ?>
         <span class="error"><?=$emailError;?></span>
         <?php } ?>
     </div>
 </div>
 <div class="row">
    <div class="large-6 columns textarea"><label for="commentsText">Message</label>
     <textarea name="comments" id="commentsText" placeholder="Entrer votre texte ici" style="min-width:300px; min-height:200px;" cols="100" rows="20" class="requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
     <?php if($commentError != '') { ?>
     <span class="error"><?=$commentError;?></span> 
     <?php } ?>
 </div>
 <aside class="large-6 columns">
             <?php // The Query
             $user_query = new WP_User_Query(  array( 'role' => 'Administrator' ) );

// User Loop
             if ( ! empty( $user_query->results ) ) :
             	foreach ( $user_query->results as $user ) :?>

             <h3 class="section">Mes informations personnelles</h3>
             <address itemscope itemtype="http://schema.org/Person" class="vcard">
             	<span class="name contact " itemprop="name"><i class="icon-user"></i>&nbsp;<a class="url fn" href="http://julien-roland.be"><?php echo $user->display_name ; ?></a></span>
             	<meta itemprop="name" content="http://www.julien-roland.be"/>
             	<span class="mail contact email" itemprop="email"><i class="icon-envelope-alt"></i>&nbsp;<?php echo $user->user_email ; ?></span>
             	<span class="mail contact" itemprop="url"><i class="icon-globe"></i>&nbsp;<a href="<?php echo $user->user_url ; ?>"><?php echo $user->user_url ; ?></a></span>

             	<span class="tel contact" itemprop="telephone"><i class="icon-mobile-phone"></i>&nbsp;+32 495/94.51.93</span>
             	<span class="adress contact" itemprop="homeLocation"><i class="icon-map-marker"></i>&nbsp;Namur (Belgique)</span>
                <meta class="adr hide">
                <meta class="street-address" content="Rue Basse Montagne"/>
                <meta class="locality" content="Namur"/>
                <meta class="region" content="BE"/>
                <meta class="postal-code" content="5100"/>
                <meta class="country-name" content="Belgique"/>
            </meta>
            <meta class="bday hide" content="1992-02-28">
            <meta class="category" content="Infographiste">

        </address>
        <?php endforeach;
        endif; ?>
    </aside>
</div>
<div class="row">
  <div class="large-6 columns textarea"><input type="checkbox" name="sendCopy" id="sendCopy" value="true"<?php if(isset($_POST['sendCopy']) && $_POST['sendCopy'] == true) echo ' checked="checked"'; ?> /><label for="sendCopy">Recevoir une copie du message</label>
  </div>
</div>
<div class="row">
  <div class="large-6 columns textarea alert-box alert secondary "><label for="checking" class="screenReader">Pour envoyer ce formulaire, ne saisissez RIEN dans ce champ</label><input type="text" name="checking" id="checking" class="screenReader" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>" />
  </div>
</div>
<div class="row">
  <div class="large-6 columns textarea"><input type="hidden" name="submitted" id="submitted" value="true" /><button class="button prefix" type="submit">Envoyer</button>
  </div>
</div>
</fieldset>
</form>
</section>
</div>
</section>
</section>
<?php endwhile; ?>
<?php endif; ?>
    <?php wp_reset_postdata(); ?>
<?php } ?>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHJ3p-sn1Y5tJGrzH9MF5cbR5sdsDmhfg&sensor=false"></script>
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/map.js"></script>
<?php get_footer(); ?>