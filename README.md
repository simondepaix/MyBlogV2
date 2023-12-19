# Ce TP à pour but d'introduire au concept MVC et POO en php. Nous allons créer un blog en partant d'une base bootstrap.

# MyBlog partie 10
## consignes : 
L'admin est en place et on peut y accéder depuis l'url  /public/admin. Nous allons mettre en place le fonctionnement des différentes vues. la vue dashboard doit
- afficher les 10 derniers articles dans le tableau. Il doit y avoir un bouton delete et un bouton update.
- le bouton delete permet de supprimer l'article en question. 
- le bouton update dirige vers une page update qui est un formulaire dans lequel chaque champs récupère la valeur de l'article en bdd pour qu'on puisse les modifier. exemple dans le champs title on inject la valeur du titre de l'article. Il faut donc transmettre l'id pour récupérer l'article en bdd.
- Le bouton add redirige vers un formulaire vierge qui permet d'ajouter un nouvel article.

# AdminController
# renderAdmin
- Toutes les pages liées à l'admin passent par renderAdmin. Il va falloir déterminer quel formulaire à été envoyé entre addpost, delete, update. Celon le formulaire soumis, on appelle la bonne méthode.
## removePost
- cette méthode récupère l'id de l'article que l'on souhaite supprimer et appelle la méthode deletPost du modele
## updatePost
- cette méthode récupère les valeurs des champs, les tests et les filtres puis appelle le PostModel. Elle appelle ensuite updatePost qui va effectuer la requête SQL.
## addPost
cette méthode récupère les valeurs des champs, les tests et les filtres puis appelle le PostModel. Elle appelle ensuite insertPost qui va effectuer la requête SQL.

# PostModel
## getPostById
- méthode permettant de récupérer un article selon son id
## insertPost
- méthode permettant d'ajouter un nouvel article en bdd
## updatePost
- méthode permettant de mettre à jour l'article selon son id
## deletPost
- méthode permettant de supprimer l'article selon son id


