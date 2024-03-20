document.addEventListener('DOMContentLoaded', function() {

    // photo de profil
    
    const profileImage = document.getElementById('profile-image');
    const profileUpload = document.getElementById('profile-upload');

 
    const storedImagePath = localStorage.getItem('profileImagePath');

    if (storedImagePath) {
     
        profileImage.src = storedImagePath;
    }

   
    profileUpload.addEventListener('change', function() {
        const file = this.files[0]; 

        if (file) {
            
            const imageUrl = URL.createObjectURL(file);
            // Mettre à jour l'image
            profileImage.src = imageUrl;

            // Sauvegarder le chemin de l'image
            localStorage.setItem('profileImagePath', imageUrl);
        }
    });
});
