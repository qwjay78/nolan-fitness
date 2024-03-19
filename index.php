<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Riot&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" type="image/x-icon" href="./assets/images/logo.png" />
    <script
      src="https://kit.fontawesome.com/c402522f6e.js"
      crossorigin="anonymous"
    ></script>
    <title>Nolan Fitness</title>
  </head>
  <body>

  <!-- MENU PRINCIPAL -->

<div class="menu__container">
    <div class="menu__logo">
        <img src="assets/images/logo.png" alt="Nolan Fitness" />
        <h1 class="menu__logo__title">Nolan Fitness</h1>
      </div>

      <!-- menu -->
    <nav class="menu">
      <ul class="menu__list">
        <li class="menu__list__item menu__current-page">
          <a href="index.php">Accueil</a>
        </li>
        <li class="menu__list__item has-dropdown">
          <div class="flex-menu">
          <h4>Présentation</h4>
          <i class="fa-solid fa-chevron-down"></i>
          </div>
          <ul class="menu__dropdown">
            <li class="menu__list__item drop"><a href="./pages/coach.php">Le coach</a></li>
            <li class="menu__list__item drop"><a href="./pages/services.php">Les services</a></li>
          </ul>
        </li>
        <li class="menu__list__item has-dropdown">
          <div class="flex-menu">
         <h4> Programmes d'entraînement </h4>
          <i class="fa-solid fa-chevron-down"></i>
          </div>
          <ul class="menu__dropdown">
            <li class="menu__list__item drop">
              <a href="./pages/programmes.php">Programmes du coach</a>
            </li>
            <li class="menu__list__item drop">
              <a href="./pages/programmes-perso.php">Programmes personnalisés</a>
            </li>
          </ul>
        </li>
        <li class="menu__list__item"><a href="./pages/contact.php">Contact</a></li>
        <li class="menu__list__item last-item">
        <?php
            // Vérifier si l'utilisateur est connecté
            if (isset($_SESSION['client_id'])) {
                // Utilisateur connecté : lien vers l'espace client
                echo '<a href="./pages/espace-client.php">Espace Client</a>';
            } else {
                // Utilisateur non connecté : lien vers la page de connexion
                echo '<a href="./pages/connexion.php">Espace Client</a>';
            }
            ?>

        </li>
      </ul>
      <img src="./assets/images/hamburger.png" alt="menu hamburger logo" class="menu-hamburger">
    </nav>
  </div> 

    <!-- BANNER -->
    <section class="banner">
      <img src="./assets/images/banner.jpg" alt="Banner" />
      <div class="banner__content">
        <h2>Chaque effort vous rapproche de votre objectif</h2>
        <a href="./pages/coach.php" class="banner__button">Votre Coach</a>
        <a href="./pages/contact.php" class="banner__button secondary">Me contacter</a>
      </div>
    </section>

    <!-- Coach -->

    <section id="coach">
      <div class="section__container">
        <h2>Votre coach</h2>
        <hr />
      </div>
      <div class="coach__apropos">
        <div class="coach__apropos__img">
          <div class="coach__apropos__img__container">
            <img src="./assets/images/coach.jpg" alt="coach" />
          </div>
          <a class="coach__apropos__img__button" href="./pages/coach.php"
            >En savoir plus sur Nolan Fitness</a
          >
        </div>
        <div class="coach__apropos__text">
          <h3>A propos de Nolan Fitness</h3>
          <p>
        Nolan Fitness incarne la passion, l'engagement et l'expertise dans le domaine du fitness et du bien-être. Avec une carrière dédiée à aider les individus à atteindre leur plein potentiel physique et mental, Nolan s'engage à offrir des programmes d'entraînement personnalisés et des conseils adaptés à chaque client.
    </p><br>
    <p>
        Fort d'une expérience diversifiée et d'une solide formation dans le domaine du fitness, Nolan combine les dernières avancées scientifiques avec une approche holistique pour aider ses clients à atteindre des résultats durables. Que votre objectif soit de perdre du poids, de développer votre musculature ou d'améliorer votre condition physique générale, Nolan vous accompagnera à chaque étape de votre parcours.
    </p>
    
        </div>
      </div>
    </section>

    <!-- PROGRAMMES -->

    <section id="programmes">
      <div class="section__container">
        <hr />
        <h2>Mes programmes préconçus</h2>
      </div>
      <div class="programmes__coach">
        <!-- prog 1 -->
        <div class="programmes__coach__prog">
          <div class="programmes__coach__prog__img">
            <img src="./assets/images/lose.jpg" alt="Lose & Train" />
          </div>
          <div class="programmes__coach__prog__text">
            <h3>Lose & Train</h3>
            <p>
        Un programme intensif conçu pour brûler les graisses et renforcer votre corps.
          </p>
            <a href="./pages/programmes.php#lose">En savoir +</a>
          </div>
        </div>
        <!-- prog 2 -->
        <div class="programmes__coach__prog">
          <div class="programmes__coach__prog__img">
            <img src="./assets/images/nutrifit.jpg" alt="Nutrifit" />
          </div>
          <div class="programmes__coach__prog__text">
            <h3>Nutrifit</h3>
            <p>
        Optimisez votre alimentation et votre santé avec Nutrifit. 
    </p>
            <a href="./pages/programmes.php#nutrifit">En savoir +</a>
          </div>
        </div>
        <!-- prog 3 -->
        <div class="programmes__coach__prog">
          <div class="programmes__coach__prog__img">
            <img src="./assets/images/competitor.jpg" alt="Competitor" />
          </div>
          <div class="programmes__coach__prog__text">
            <h3>Competitor</h3>
            <p>
        Préparez-vous à atteindre vos objectifs sportifs les plus ambitieux avec le programme Competitor. 
    </p>
            <a href="./pages/programmes.php#competitor">En savoir +</a>
          </div>
        </div>
      </div>
      <div class="programmes__coach__button">
        <a class="programmes__coach__button__item" href="./pages/programmes.php"
          >Voir tous les programmes préconçus</a
        >
      </div>
    </section>
    <!-- JOIN US -->
    <section class="banner join">
      <img src="./assets/images/team.jpg" alt="Nolan team" />
      <div class="banner__content">
        <h2>Rejoindre la Nolan Team</h2>
        <p>
            Vous aspirez à un mode de vie sain et actif ? 
        </p>
        <p>
            En tant que membre de la Nolan Team, vous bénéficierez non seulement de programmes d'entraînement efficaces, mais aussi d'un accompagnement personnalisé et d'une motivation continue pour vous aider à repousser vos limites et à atteindre vos objectifs. Que vous soyez novice dans le monde du fitness ou un athlète chevronné, notre équipe est là pour vous aider à réussir.
        </p>
        <p>
            Rejoignez-nous dès aujourd'hui et faites partie d'une communauté dynamique et inspirante dédiée à la santé, au bien-être et à l'épanouissement personnel. Ensemble, nous pouvons atteindre de nouveaux sommets et vivre une vie pleine de vitalité et de bonheur !
        </p>
        <a href="./pages/contact.php" class="banner__button">Me contacter</a>
      </div>
    </section>

    <!-- temoignages -->
    <section id="temoignages">
      <div class="section__container">
        <h2>Vos témoignages</h2>
        <hr>
      </div>
      <!-- CARTES -->
      <div class="slider-container">
        <!-- carte -->
        <div class="testimonial">
          <img src="./assets/images/anna.jpg" alt="Anna">
          <div class="stars">
            <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-half-o"></i>
          </div>
          <p class="review">Excellent service! J'ai vraiment apprécié le programme. Hautement recommandé.</p>
          <p class="client-name">Anna</p>
          <p class="program">Lose & Train</p>
        </div>
        <div class="testimonial">
          <img src="./assets/images/christelle.jpg" alt="Christelle">
          <div class="stars">
            <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
          </div>
          <p class="review">Coach à l'écoute et programme très complet</p>
          <p class="client-name">Christelle</p>
          <p class="program">Nutrifit</p>
        </div>
        <div class="testimonial">
          <img src="./assets/images/dylan.jpg" alt="Dylan">
          <div class="stars">
            <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-half-o"></i>
          </div>
          <p class="review">Merci à Nolan pour ses conseils précieux. J'ai gagné 10% de muscles.</p>
          <p class="client-name">Dylan</p>
          <p class="program">Programme personnalisé</p>
        </div>
        <div class="testimonial">
          <img src="./assets/images/john.jpg" alt="John">
          <div class="stars">
            <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
          </div>
          <p class="review">Je recommande Nolan. 2 ans que je suis ses entraînements, toujours aussi satisfait !</p>
          <p class="client-name">John</p>
          <p class="program">Competitor</p>
        </div>
        <div class="testimonial">
          <img src="./assets/images/jodie.jpg" alt="Jodie">
          <div class="stars">
            <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-half-o"></i>
          </div>
          <p class="review">-20kg grâce au professionnalisme de Nolan ! Merci !!</p>
          <p class="client-name">Jodie</p>
          <p class="program">Lose & Train</p>
        </div>
        <div class="testimonial">
          <img src="./assets/images/tom.jpg" alt="Client 1">
          <div class="stars">
            <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
          </div>
          <p class="review">Excellent programme. Merci Nolan Fitness !</p>
          <p class="client-name">Tom</p>
          <p class="program">Nutrifit</p>
        </div>
        <div class="temoignages__fleches">
          <button class="temoignages__fleche-gauche"><i class="fa fa-chevron-left"></i></button>
          <button class="temoignages__fleche-droite"><i class="fa fa-chevron-right"></i></button>
        </div>
        
    </section>

    <!-- instagram -->

    <section class="banner instagram">
      <img src="./assets/images/insta.png" alt="Nolan team" />
      <div class="banner__content">
        <h2>Me rejoindre sur <br> <a target="_blank" href="https://www.instagram.com/">Instagram</a></h2>
      </div>
    </section>

    <!-- footer -->

  <footer>
    <div class="footer__infos">
      <div class="footer__infos__logo">
        <img src="./assets/images/logo.png" alt="logo">
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
  <script src="./assets/js/script.js"></script>
  </body>
</html>
