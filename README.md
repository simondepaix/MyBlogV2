# Ce TP à pour but d'introduire au concept MVC et POO en php. Nous allons créer un blog en partant d'une base bootstrap.

# MyBlog partie 6
## consignes : 
Maintenant que la BDD est mise en place, nous allons mettre en place le modèle. Ce fichier sera la représentation en code de la table
Ensuite, nous allons récupérer la data depuis la bdd.

- Créez la classe PostModel
- Cette classe est la représentation de la table donc elle aura autant de propriétés que la table à de champs et ils doivent avoir le même nom
- Créez les méthodes getPosts($limit) et getPostById($id) mais nous n'allons mettre en place que getPosts pour l'instant.
Cette méthodes doit :  
- se connecter à la BDD
- retourner les articles avec PDO
- Astuce (facultatif), utilisez fetchAll(PDO::FETCH_CLASS,'PostModel') pour retourner vos articles sous la forme de votre classe

Côté controller (pour l'instant dans le main):
- Appelez la méthode getPosts($limit) et stockez sa valeur de retour dans une variable $data
- Faite un var_dump() de cette variable pour visualiser les données
