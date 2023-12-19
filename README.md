# Ce TP à pour but d'introduire au concept MVC et POO en php. Nous allons créer un blog en partant d'une base bootstrap.

# MyBlog partie 10
## consignes : 
Notre utilisateur est maintenant capable de s'inscrire et de se connecter mais il ne peut pas encore accéder à l'interface d'admin. C'est normal, elle n'existe pas encore !

# index.php
- ajoutez la route vers le bon controller

# AdminController
- Créez un fichier AdminController qui aura une méthode renderAdmin.
- la méthode renderAdmin devra appeler render comme tous les autres controller mais elle va également définir une nouvelle propriété du main controller dont elle hérite en $this->viewType = 'admin'; Pourquoi ? tout simplement car le layout de l'interface d'admin est complètement différent de celui du front. Nous allons donc séparer le dossier views/front et views/Admin

# Dossiers
- Créer un dossier admin dans views qui contiendra les fichiers layouts et partials
- Récupérez aussi les dossiez public/admin
# MainController
- Ajoutez la propriété protected $viewType = 'front'; (de base elle vaut front). Retouchez le render pour prendre en compte le viewType et changer dynamiquement de dossier. Vous devriez avoir quelquechose comme ça :
<code>
        require __DIR__.'/../views/'.$this->viewType.'/layouts/header.phtml';
        require __DIR__.'/../views/'.$this->viewType.'/partials/'.$this->view.'.phtml';
        require __DIR__.'/../views/'.$this->viewType.'/layouts/footer.phtml';
</code>



