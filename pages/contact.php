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
  <title>Contact</title>
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
        <li class="menu__list__item menu__current-page"><a href="../pages/contact.php">Contact</a></li>
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
    <img src="../assets/images/banner-contact.jpg" alt="Banner" />
    <div class="banner__content">
      <h2>Contact - Nolan Fitness</h2>
    </div>
  </section>

  <!-- form -->

  <section class="banner contact">
    <div class="banner__content">
      <h2>Des questions ?</h2>
      <p>N'hésitez pas à me contacter en cas de besoin, je répondrai à toutes vos questions !</p>
      <form class="form-contact" action="../scripts/formulaire-contact.php" method="post">

        <div class="flex">
          <input type="text" placeholder="Nom & Prénom" class="input" name="nom_prenom">
          <input type="text" placeholder="Adresse mail" class="input" name="adresse_mail">
        </div>
        <textarea placeholder="Votre message" name="message"></textarea>
        <button type="submit" name="submit">Envoyer</button>
      </form>
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