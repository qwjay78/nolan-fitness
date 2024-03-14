document.addEventListener('DOMContentLoaded', function() {

    // photo de profil
    
    const profileImage = document.getElementById('profile-image');
    const profileUpload = document.getElementById('profile-upload');

    // Vérifier s'il existe déjà un chemin d'image dans le stockage local
    const storedImagePath = localStorage.getItem('profileImagePath');

    if (storedImagePath) {
        // S'il existe un chemin d'image, afficher cette image
        profileImage.src = storedImagePath;
    }

    // Ajouter un écouteur d'événement pour détecter le changement de fichier
    profileUpload.addEventListener('change', function() {
        const file = this.files[0]; // Obtenir le fichier téléchargé

        if (file) {
            // Créer un objet URL pour l'aperçu de l'image
            const imageUrl = URL.createObjectURL(file);
            // Mettre à jour l'attribut src de l'image de profil avec l'URL de l'image téléchargée
            profileImage.src = imageUrl;

            // Sauvegarder le chemin de l'image dans le stockage local
            localStorage.setItem('profileImagePath', imageUrl);
        }
    });
});
