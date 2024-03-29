<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Riot&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="../assets/images/logo.png" />
  <script src="https://kit.fontawesome.com/c402522f6e.js" crossorigin="anonymous"></script>
  <title>Programmes du coach</title>
</head>

<body>
  <!-- MENU -->
  <div class="menu__container">
    <div class="menu__logo">
      <a href="../index.php"><img src="../assets/images/logo.png" alt="Nolan Fitness" /></a>
      <h1 class="menu__logo__title">Nolan Fitness</h1>
    </div>
    <nav class="menu">

      <ul class="menu__list">
        <li class="menu__list__item">
          <a href="../index.php">Accueil</a>
        </li>
        <li class="menu__list__item has-dropdown">
          <div class="flex-menu">
            <h4>Présentation</h4>
            <i class="fa-solid fa-chevron-down"></i>
          </div>
          <ul class="menu__dropdown">
            <li class="menu__list__item drop "><a href="../pages/coach.php">Le coach</a></li>
            <li class="menu__list__item drop"><a href="../pages/services.php">Les services</a></li>
          </ul>
        </li>
        <li class="menu__list__item has-dropdown">
          <div class="flex-menu">
            <h4 class="menu__current-page"> Programmes d'entraînement </h4>
            <i class="fa-solid fa-chevron-down"></i>
          </div>
          <ul class="menu__dropdown">
            <li class="menu__list__item drop">
              <a href="../pages/programmes.php">Programmes du coach</a>
            </li>
            <li class="menu__list__item drop">
              <a href="../pages/programmes-perso.php">Programmes personnalisés</a>
            </li>
          </ul>
        </li>
        <li class="menu__list__item"><a href="../pages/contact.php">Contact</a></li>
        <li class="menu__list__item last-item">
          <?php
          // Vérifier si l'utilisateur est connecté
          if (isset($_SESSION['client_id'])) {
            // Utilisateur connecté : lien vers l'espace client
            echo '<a href="../pages/espace-client.php">Espace Client</a>';
          } else {
            // Utilisateur non connecté : lien vers la page de connexion
            echo '<a href="../pages/connexion.php">Espace Client</a>';
          }
          ?>

        </li>
      </ul>
      <img src="../assets/images/hamburger.png" alt="menu hamburger logo" class="menu-hamburger">
    </nav>
  </div>


  <!-- BANNER -->
  <section class="banner titles">
    <img src="../assets/images/banner-prog.jpg" alt="Banner" />
    <div class="banner__content">
      <h2>Programmes préconçus du coach</h2>
    </div>
  </section>

  <!-- title -->
  <section class="services">
    <h2>Mes programmes standards 🏋️</h2>
    <p>Explorez nos <span>3 programmes gratuits</span> conçus par le coach <span>Nolan Fitness</span> pour répondre à divers objectifs tels que la perte de poids ou la préparation à la compétition. <br><br> Pour accéder à ces programmes exclusifs, <a href="../pages/new-account.php">inscrivez-vous</a> dès maintenant. <br><br> Si vous cherchez quelque chose de plus spécifique, découvrez nos options de <a href="../pages/programmes-perso.html">programmes personnalisés</a> sur devis.</p>
  </section>
  <!-- programmes-->

  <!-- lose & train -->

  <section id="lose" class="apropos prog">
    <div class="apropos__image">
      <img src="../assets/images/lose-prog.jpg" alt="Programmes personnalisés">
    </div>
    <div class="apropos__texte">
      <h2>🥊 Lose & Train<span> |</span> Programme perte de poids</h2>
      <p>Découvrez notre programme exclusif "<span>Lose & Train</span>", une fusion dynamique de <span>boxe</span> et de <span>musculation</span> conçue pour vous aider à atteindre vos objectifs de <span>perte de poids</span> de manière efficace et motivante. Ce programme unique allie les bienfaits <span>cardiovasculaires</span> de la boxe à la puissance sculptante de la musculation, créant ainsi une expérience d'entraînement complète. <br><br> Affinez votre silhouette, développez votre force et boostez votre endurance avec "<span>Lose & Train</span>" – une approche holistique pour transformer votre corps et stimuler votre bien-être. </p>

    </div>
  </section>

  <!-- nutrifit-->
  <section id="nutrifit" class="apropos">
    <div class="apropos__image">
      <img src="../assets/images/nutrifit-prog.jpg" alt="Programmes personnalisés">
    </div>
    <div class="apropos__texte">
      <h2>🥗 Nutrifit<span> |</span> Programme alimentaire & Fitness</h2>
      <p>Optimisez votre prise de masse avec notre programme exclusif "<span>Nutrifit</span>", une synergie parfaite entre un <span>programme alimentaire</span> et des séances de <span>fitness ciblées</span>. Conçu pour favoriser une <span>prise de masse en douceur</span>, Nutrifit s'adapte à vos besoins nutritionnels tout en vous proposant des entraînements adaptés à vos objectifs. Mettez en place une alimentation équilibrée et découvrez des séances de fitness spécifiquement élaborées pour stimuler la croissance musculaire. <br><br> Développez votre force et sculptez votre silhouette de manière progressive et saine. </p>
    </div>
  </section>

  <!-- competitor -->

  <section id="competitor" class="apropos prog">
    <div class="apropos__image">
      <img src="../assets/images/competitor-prog.jpg" alt="Programmes personnalisés">
    </div>
    <div class="apropos__texte">
      <h2>🏋️ Competitor<span> |</span> Programme de compétition</h2>
      <p>Pour les athlètes déterminés à atteindre l'excellence, découvrez notre programme exclusif "<span>Competitor</span>". Conçu spécifiquement pour les <span>athlètes de compétition</span>, ce programme allie <span>entraînements avancés</span> et <span>suivi personnalisé</span>. <br><br> Quels que soient vos objectifs, que ce soit l'amélioration des performances, la préparation à une compétition, ou la recherche d'une edge compétitive, "Competitor" vous offre les outils nécessaires pour exceller dans votre discipline. Bénéficiez de séances d'entraînement intensives, d'un suivi rigoureux et d'un programme individualisé pour maximiser vos performances athlétiques. </p>
    </div>
  </section>
  <!-- footer -->

  <footer>
    <div class="footer__infos">
      <div class="footer__infos__logo">
        <img src="../assets/images/logo.png" alt="logo">
        <h2>Nolan Fitness</h2>
      </div>
      <p>Nolan Fitness, Coach et sportif de haut niveau certifié</p>
      <div class="footer__infos__cadre">
        <p><span>Téléphone :</span> <br> <a href="tel:0123456789">01 23 45 67 89</a> <br> <a href="tel:0199998562">01 99 99 85 62</a></p>
        <p><span>Mail :</span> <br> <a href="mailto:nolan@fitness.com">Nolan@fitness.com</a></p>
      </div>
    </div>
    <div class="footer__reseaux">
      <h2>Mes réseaux</h2>
      <div class="footer__reseaux__grp">
        <a target="_blank" href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
        <a target="_blank" href="https://fr-fr.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
        <a target="_blank" href="https://twitter.com/"><i class="fa-brands fa-x-twitter"></i></a>
      </div>
      <div class="up">
        <hr>
        <a id="scroll-to-top-button" href="#"><i class="fa-solid fa-chevron-up"></i></a>
      </div>
    </div>
  </footer>

  <section class="copyright">
    <p>Designed & created by <span>©Equipe1</span></p>
  </section>
  <script src="../assets/js/menu.js"></script>
</body>

</html>