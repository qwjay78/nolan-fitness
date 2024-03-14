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

// Vérifier si un fichier a été téléchargé
if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {
    $uploadsDirectory = '../membres/avatars/';
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    // Obtenir l'extension du fichier téléchargé
    $fileExtension = strtolower(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION));

    // Vérifier si l'extension est valide
    if (in_array($fileExtension, $allowedExtensions)) {
        // Générer un nom de fichier unique
        $newFileName = $_SESSION['client_id'] . '_' . uniqid() . '.' . $fileExtension;

        // Déplacer le fichier téléchargé vers le répertoire des avatars
        $destination = $uploadsDirectory . $newFileName;
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $destination)) {
            // Mettre à jour le chemin de l'avatar dans la base de données
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $updateAvatar = $conn->prepare('UPDATE clients SET avatar = ? WHERE id = ?');
            $updateAvatar->bind_param('si', $newFileName, $_SESSION['client_id']);
            $updateAvatar->execute();
            $updateAvatar->close();
            $conn->close();

            // Stocker le nom du fichier de l'image dans une variable de session
            $_SESSION['avatar'] = $newFileName;

            // Rediriger vers la page d'espace client avec succès
            header('Location: ./espace-client.php?id=' . $_SESSION['client_id']);
            exit();
        } else {
            $msg = "Une erreur s'est produite lors du téléchargement de l'avatar.";
        }
    } else {
        $msg = "Votre photo de profil doit être au format jpg, jpeg, png ou gif.";
    }
}
?>




<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Riot&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" type="image/x-icon" href="../assets/images/logo.png" />
    <script
      src="https://kit.fontawesome.com/c402522f6e.js"
      crossorigin="anonymous"
    ></script>
    <title>Espace-Client | Nolan Fitness</title>
  </head>
  <body>
    <!-- MENU -->
    <nav class="menu">
      <div class="menu__logo">
        <img src="../assets/images/logo.png" alt="Nolan Fitness" />
        <h1 class="menu__logo__title">Nolan Fitness</h1>
      </div>
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
    </nav>

   <!-- BANNER -->
   <section class="banner">
      <img src="../assets/images/banner.jpg" alt="Banner" />
      <div class="bannercontent">
        <h2>Espace Client | Nolan Fitness</h2>
      </div>
    </section>

    <!-- message -->
     
    <section class="message-espace">
    <p>Bienvenue <span>  <?php echo $_SESSION['prenom']; ?> </span> !</p>
    <a href="../scripts/logout.php">Déconnexion</a>
  
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
          // Vérifier si l'utilisateur a un avatar
          if (!empty($_SESSION['avatar'])) {
              // Afficher l'avatar avec l'extension de fichier
              echo '<img id="profile-image" src="../membres/avatars/' . $_SESSION['avatar'] . '" alt="profile picture" />';
          } else {
              // Afficher l'avatar par défaut
              echo '<img id="profile-image" src="../assets/images/profile.jpg" alt="profile picture" />';
          }
          ?>
          </div>
          <!-- Input de type file caché pour télécharger la photo de profil -->
          <input type="file" name="avatar" id="profile-upload" accept="image/*">
          <input type="submit" value="Modifier la photo de profil">
        </form>


        <div class="coach__apropos__text">
          <h3>A propos de Nolan Fitness</h3>
          <ul class="infos-profil">
            <li class="infos-profil__list"><span> Prénom : <?php echo $_SESSION['prenom']; ?></span></li>
            <li class="infos-profil__list"> <span>Nom : <?php echo $_SESSION['nom']; ?></span></li>
            <li class="infos-profil__list"> <span>E-mail : <?php echo $_SESSION['email'];?></span></li>
            <li class="infos-profil__list">Sexe <span>:</span></li>
            <li class="infos-profil__list">Poids <span>:</span></li>
            <li class="infos-profil__list">Programme <span>:</span></li>
          </ul>
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
            <img src="../assets/images/lose.jpg" alt="Lose & Train" />
          </div>
          <div class="programmes__coach__prog__text">
            <h3>Lose & Train</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore
            </p>
            <a href="../pages/programmes.php#lose">En savoir +</a>
          </div>
        </div>
        <!-- prog 2 -->
        <div class="programmes__coach__prog">
          <div class="programmes__coach__prog__img">
            <img src="../assets/images/nutrifit.jpg" alt="Nutrifit" />
          </div>
          <div class="programmes__coach__prog__text">
            <h3>Nutrifit</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore
            </p>
            <a href="../pages/programmes.php#nutrifit">En savoir +</a>
          </div>
        </div>
        <!-- prog 3 -->
        <div class="programmes__coach__prog">
          <div class="programmes__coach__prog__img">
            <img src="../assets/images/competitor.jpg" alt="Competitor" />
          </div>
          <div class="programmes__coach__prog__text">
            <h3>Competitor</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore
            </p>
            <a href="../pages/programmes.php#competitor">En savoir +</a>
          </div>
        </div>
      </div>
      <div class="programmes__coach__button">
        <a class="programmes__coach__button__item" href="../pages/programmes.php"
          >Voir tous les programmes préconçus</a
        >
      </div>
    </section>
    <!-- JOIN US -->
    <section class="banner join">
      <img src="../assets/images/team.jpg" alt="Nolan team" />
      <div class="banner__content">
        <h2>Rejoindre la Nolan Team</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet,
          consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
          labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet,
          consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
          labore
        </p>
        <a href="../pages/contact.php" class="banner__button">Me contacter</a>
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
          <img src="../assets/images/anna.jpg" alt="Anna">
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
          <img src="../assets/images/christelle.jpg" alt="Christelle">
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
          <img src="../assets/images/dylan.jpg" alt="Dylan">
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
          <img src="../assets/images/john.jpg" alt="John">
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
          <img src="../assets/images/jodie.jpg" alt="Jodie">
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
          <img src="../assets/images/tom.jpg" alt="Client 1">
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
      </div> 
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
  <script src="../assets/js/script.js"></script>
  <script src="../assets/js/espace.js"></script>
  </body>
</html>
