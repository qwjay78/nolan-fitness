<?php
if (isset($_POST['modifier_informations'])) {
    $_SESSION['modifier_informations'] = true;
}

// Vérifie si le genre n'est pas renseigné dans la base de données
if (!isset($genre)) {
    // Si le genre n'est pas renseigné, affiche le formulaire de modification
?>
    <!-- FORMULAIRE -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <!-- Prénom -->
        <h4> <span>Prénom : </span> <?php echo $prenomMaj; ?></h4>
        <!-- Nom -->
        <h4><span>Nom : </span> <?php echo $nomMaj; ?></h4>
        <!-- E-mail -->
        <h4><span>E-mail : </span> <?php echo $_SESSION['email']; ?></h4>

        <!-- Genre -->
        <div class="radio-buttons-container">
            <h4> <span>Genre :</span> </h4>
            <div class="radio-button">
                <input name="genre" id="homme" class="radio-button__input" type="radio" value="Homme">
                <label for="homme" class="radio-button__label">
                    <span class="radio-button__custom"></span>
                    Homme
                </label>
            </div>
            <div class="radio-button">
                <input name="genre" id="femme" class="radio-button__input" type="radio" value="Femme">
                <label for="femme" class="radio-button__label">
                    <span class="radio-button__custom"></span>
                    Femme
                </label>
            </div>
            <div class="radio-button">
                <input name="genre" id="autre" class="radio-button__input" type="radio" value="Autre">
                <label for="autre" class="radio-button__label">
                    <span class="radio-button__custom"></span>
                    Autre
                </label>
            </div>
        </div>
        <!-- Date de naissance -->
        <div class="form-element">
            <span>Date de naissance :</span>
            <input type="date" name="date_naissance">
        </div>
        <!-- Poids -->
        <div class="form-element">
            <span>Poids : </span> <input type="number" name="poids" min="0" step="0.1"> kg<br>
        </div>
        <!-- Programme -->
        <div class="form-element">
            <span>Programme : </span>
            <select name="programme" class="select-programme">
                <option value="Lose & Train">Lose & Train</option>
                <option value="Nutrifit">Nutrifit</option>
                <option value="Competitor">Competitor</option>
            </select><br>
        </div>
        <!-- Bouton -->
        <input type="submit" name="enregistrer_modifications" value="Enregistrer les modifications">
    </form>
<?php
} else {
    // Si le genre est renseigné, affiche les informations de profil
?>
    <ul class="infos-profil">
        <li class="infos-profil__list"><span>Prénom : </span> <?php echo $prenomMaj; ?></li>
        <li class="infos-profil__list"><span>Nom : </span> <?php echo $nomMaj; ?></li>
        <li class="infos-profil__list"><span>E-mail : </span> <?php echo $_SESSION['email']; ?></li>
        <li class="infos-profil__list"><span>Genre : </span> <?php echo $genre; ?></li>
        <li class="infos-profil__list"><span>Date de naissance : </span><?php echo $date_naissance; ?></li>
        <li class="infos-profil__list"><span>Poids : </span> <?php echo $poids; ?> kg</li>
        <li class="infos-profil__list"><span>Programme : </span> <?php echo $programme; ?></li>
    </ul>
    <!-- Bouton -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="submit" name="modifier_informations" value="Modifier mes informations">
    </form>
<?php
}
?>