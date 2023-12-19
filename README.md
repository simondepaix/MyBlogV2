# Ce TP à pour but d'introduire au concept MVC et POO en php. Nous allons créer un blog en partant d'une base bootstrap.

# MyBlog partie 10
## consignes : 
Nous avons mis en place l'inscription. Nous allons maintenant mettre en place la connexion.
# Dans le fichier UserModel 
- Créer une methode static getUserByMail qui permet de récupérer un utilisateur par son email.

# Dans le fichier UserController :
- Créez une méthode login. 

## method login
- Récupère l'utilisateur via son email grâce à la méthode getUserByEmail
- Vérifie son mot de passe avec la foncitn php password_verify
- Si tout est bon, on créé une session dans laquelle on stock l'id de l'utilisateur

