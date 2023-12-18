# Ce TP à pour but d'introduire au concept MVC et POO en php. Nous allons créer un blog en partant d'une base bootstrap.

# MyBlog partie 11
## consignes : 
Nous allons mettre en place la création de compte.
- Récupérez les partials login.phtml et register.phtml
- Vous devez ajouter les liens dans la barre de navigation
- Ajoutez les nouvelles routes disponible. Comme on ne s'occupe pas encore de login. cette page appellera directement MainController
- register renverra vers UserController et déclenchera renderRegister
- Vous allez donc devoir créer UserController
- Comme on doit insérer un nouvel utilisateur en bdd, il faudra créer un nouveau UserModel
## UserModel
UserModel doit :
- être la représentation de la table users
- avoir une méthode registerUser qui fait une requête sql insert into users
- avoir une fonction checkMail qui vérifie si un utilisateur existe déjà via son mail

## UserController
UserController doit : 
- avoir une méthode renderRegister qui test si un formulaire à été soumis, si le formulaire register à été envoyé, on déclenche la méthode register. Dans tous les cas, renderRegister appelle la méthode render de MainController comme tous les autres Controller.
## méthode register
La méthode register doit :
- récupérer, tester et filtrer les champs du formulaire
- hasher le mot de passe 
- vous pouvez ensuite set les valeurs des champs directement dans le UserModel. Il est fait pour ça et la manipulation de sa méthode register registerUser en sera beaucoup plus simple et maintenable car on pourra simplement accéder aux propriétés. Par exemple :
<code> 
            $user = new UserModel();            
            
            $user->setEmail($email);
            $user->setPassword($hashedPassword);
            $user->setName($name);             
            $user->setRole(3);    
</code>

- On doit ensuite tester si un utilisateur existe déjà en bdd avec checkMail
- Si tous les tests sont validés, on peu enregistrer l'utilisateur
