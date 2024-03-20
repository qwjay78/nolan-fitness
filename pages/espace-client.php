<?php
include('../includes/config.php');

// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['client_id'])) {
  // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
  header("Location: ../pages/login.php");
  exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
}

include('../includes/traitement-espace-client.php');
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
  <title>Espace-Client | Nolan Fitness</title>
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
        <li class="menu__list__item menu__current-page">
          <a href="../index.php">Accueil</a>
        </li>
        <li class="menu__list__item has-dropdown">
          <div class="flex-menu">
            <h4>Présentation</h4>
            <i class="fa-solid fa-chevron-down"></i>
          </div>
          <ul class="menu__dropdown">
            <li class="menu__list__item drop"><a href="../pages/coach.php">Le coach</a></li>
            <li class="menu__list__item drop"><a href="../pages/services.php">Les services</a></li>
          </ul>
        </li>
        <li class="menu__list__item has-dropdown">
          <div class="flex-menu">
            <h4> Programmes d'entraînement </h4>
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
  <section class="banner">
    <img src="../assets/images/banner.jpg" alt="Banner" />
    <div class="banner__content">
      <h2>Espace Client | Nolan Fitness</h2>
    </div>
  </section>

  <!-- message -->

  <section class="message-espace">
    <div>
      <p>Bienvenue <span> <?php echo "$prenomMaj"; ?> </span> !</p>
    </div>
    <div>
      <a href="../scripts/logout.php">Déconnexion</a>
    </div>

  </section>

  <!--Profil -->

  <section id="coach" class="profil">
    <div class="section__container">
      <h2>Mon profil</h2>
      <hr />
    </div>

    <!-- modifier pdp -->
    <div class="coach__apropos">
      <form class="coach__apropos__img" method="POST" action="espace-client.php" enctype="multipart/form-data">
        <div class="coach__apropos__img__container">
          <?php
          if (!empty($_SESSION['avatar'])) {
            echo '<img id="profile-image" src="../membres/avatars/' . $_SESSION['avatar'] . '" alt="profile picture" />';
          } else {
            // avatar par défaut
            echo '<img id="profile-image" src="../assets/images/profile.jpg" alt="profile picture" />';
          }
          ?>
        </div>
        <!-- boutons pour télécharger la photo de profil -->

        <!-- bouton upload -->
        <label for="profile-upload" class="Documents-btn">
          <span class="folderContainer">
            <svg class="fileBack" width="146" height="113" viewBox="0 0 146 113" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 4C0 1.79086 1.79086 0 4 0H50.3802C51.8285 0 53.2056 0.627965 54.1553 1.72142L64.3303 13.4371C65.2799 14.5306 66.657 15.1585 68.1053 15.1585H141.509C143.718 15.1585 145.509 16.9494 145.509 19.1585V109C145.509 111.209 143.718 113 141.509 113H3.99999C1.79085 113 0 111.209 0 109V4Z" fill="url(#paint0_linear_117_4)"></path>
              <defs>
                <linearGradient id="paint0_linear_117_4" x1="0" y1="0" x2="72.93" y2="95.4804" gradientUnits="userSpaceOnUse">
                  <stop stop-color="#a040fd"></stop>
                  <stop offset="1" stop-color="#5f41f3"></stop>
                </linearGradient>
              </defs>
            </svg>
            <svg class="filePage" width="88" height="99" viewBox="0 0 88 99" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect width="88" height="99" fill="url(#paint0_linear_117_6)"></rect>
              <defs>
                <linearGradient id="paint0_linear_117_6" x1="0" y1="0" x2="81" y2="160.5" gradientUnits="userSpaceOnUse">
                  <stop stop-color="white"></stop>
                  <stop offset="1" stop-color="#686868"></stop>
                </linearGradient>
              </defs>
            </svg>

            <svg class="fileFront" width="160" height="79" viewBox="0 0 160 79" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0.29306 12.2478C0.133905 9.38186 2.41499 6.97059 5.28537 6.97059H30.419H58.1902C59.5751 6.97059 60.9288 6.55982 62.0802 5.79025L68.977 1.18034C70.1283 0.410771 71.482 0 72.8669 0H77H155.462C157.87 0 159.733 2.1129 159.43 4.50232L150.443 75.5023C150.19 77.5013 148.489 79 146.474 79H7.78403C5.66106 79 3.9079 77.3415 3.79019 75.2218L0.29306 12.2478Z" fill="url(#paint0_linear_117_5)"></path>
              <defs>
                <linearGradient id="paint0_linear_117_5" x1="38.7619" y1="8.71323" x2="66.9106" y2="82.8317" gradientUnits="userSpaceOnUse">
                  <stop stop-color="#a040fd"></stop>
                  <stop offset="1" stop-color="#5251f2"></stop>
                </linearGradient>
              </defs>
            </svg>
          </span>
          <p class="text">Choisir une photo</p>
        </label>
        <input type="file" name="avatar" id="profile-upload" accept="image/*" style="display: none;">

        <!-- bouton 2 -->
        <input type="submit" name="enregistrer_modifications" value="Enregistrer la photo de profil">
      </form>

      <!-- infos profil -->
      <div class="coach__apropos__text infos-profil">
        <h3>A propos de moi</h3>
        <?php
        include('../includes/infos-profil.php');
        ?>
      </div>
    </div>
  </section>

  <!-- PROGRAMMES -->

  <section id="programmes">
    <?php
    $fileToInclude = '';
    switch ($programme) {
      case 'Competitor':
        $fileToInclude = '../includes/competitor.html';
        break;
      case 'Lose & Train':
        $fileToInclude = '../includes/losetrain.html';
        break;
      case 'Nutrifit':
        $fileToInclude = '../includes/nutrifit.html';
        break;
      default:
        // pas de programme choisi
        break;
    }

    // inclure le fichier correspondant au programme
    if (!empty($fileToInclude) && file_exists($fileToInclude)) {
      include($fileToInclude);
    } else {
      // par défaut
      echo '';
    }
    ?>
  </section>
  <!-- Conseils coach -->
  <section class="banner join bienvenue">
    <img src="../assets/images/conseil.jpg" alt="conseils" />
    <div class="banner__content">
      <h2>Bienvenue dans la Nolan Team !</h2>
      <p>
        Cher(e) ami(e), <br><br>

        Le voyage vers une meilleure version de vous-même est un chemin parsemé de défis, mais chaque défi surmonté vous rendra plus <span>fort(e)</span>. Que vous ayez choisi <span>Lose & Train</span>, <span>Nutrifit</span> ou <span>Competitor</span>, chaque petit pas vous rapproche de vos objectifs. <br><br>

        Rappelez-vous, chaque séance d'entraînement, chaque repas équilibré est un investissement dans votre <span>bien-être futur</span>. Si vous aspirez à aller plus loin, envisagez de réserver une séance avec <span>Nolan Fitness</span> pour un <span>programme personnalisé</span> et un soutien expert. <br><br>

        Vous avez déjà franchi la première étape. Maintenant, continuez à avancer, un pas à la fois, vers une vie plus <span>saine</span> et plus <span>épanouie</span>. <br><br>

        Avec détermination, <br><br> Nolan Fitness
      </p>
    </div>
  </section>

  <!-- Calendly -->
  <section id="temoignages">
    <div class="section__container">
      <h2>Réserver un coaching</h2>
      <hr>
    </div>
    <!-- Début de widget en ligne Calendly -->
    <div class="calendly-inline-widget" data-url="https://calendly.com/nolan-fitness?hide_gdpr_banner=1&primary_color=0077b6" style="min-width:320px;height:700px;"></div>
    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
    <!-- Fin de widget en ligne Calendly -->
  </section>

  <!-- instagram -->

  <section class="banner instagram">
    <img src="../assets/images/insta.png" alt="Nolan team" />
    <div class="banner__content">
      <h2>Me rejoindre sur <br> <a target="_blank" href="https://www.instagram.com/">Instagram</a></h2>
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
  <script src="../assets/js/espace.js"></script>
</body>

</html>