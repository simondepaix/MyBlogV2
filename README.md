# Ce TP à pour but d'introduire au concept MVC et POO en php. Nous allons créer un blog en partant d'une base bootstrap.

# MyBlog partie 15
## consignes : 
Magnifique ! on peut accéder à l'admin et ajoute, modifier, afficher, supprimer un article. Nous avons donc mis en place notre CRUD !!!
Hum, il y'a quand même quelque chose de pas terrible. N'importe qui peut accéder à notre interface d'admin. Il suffit de modifier l'url et n'importe qui peut supprimer nos articles ou les modifier pour écrire n'importe quoi !

- nous allons devoir mettre en place une protection pour que seuls les utilisateurs ayant le role 1 puissent accéder à l'interface d'administration

# MainController
## checkUserAuthorization
- cette méthode à pour but de récupérer l'utilisateur en bdd grâce à son id stocké en session, puis de vérifie son role.
- elle prends un role en paramètre que l'on passera lors de l'appel
- si le role du user est inférieur ou égal au role demandé en param, on retourne true
- sinon on renvoie vers une page 403. Il faut donc modifier la valeur de $view et appeler render().
- s'il n'ya pas de session, on renvoie directement vers la page de login

# AdminController

- nous allons maintenant pouvoir appeler checkUserAuthorization dans la méthode renderAdmin. Avant tout autre traitement. Comme ça, si l'utilisateur à le bon role, il pourra passer et on continue le render. Sinon il est redirigé vers une 403 ou la page login.
<code>

 public function renderAdmin(): void
    {
        // pour pouvoir accéder à l'admin, il faut avoir le role n°1. L-On lance donc la méthode pour checker le role du user connecté
        $this->checkUserAuthorization(1);
        // suite du code ne sera interprété que si l'utilisateur à le role 1
    }

</code>




