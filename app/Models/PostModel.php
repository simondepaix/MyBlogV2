<?php

class PostModel{
    private $id;
    private $img;
    private $date;
    private $title;
    private $content;
    private $user_id;
    
    // méthode pour récupérer tous les articles, il est possible de spécifier une limite
    public static function getPosts(int $limit = null): array
    {
        // connexion pdo avec le pattern singleton
        $pdo = DataBase::connectPDO();
        // s'il y'a un param limit
        if (!empty($limit)) {
            // alors on fait la requête avec le limit
            $query = $pdo->prepare('SELECT * FROM posts ORDER BY date DESC LIMIT ' . $limit);
        } else {
            // sinon, on fait la requête classique
            $query = $pdo->prepare('SELECT * FROM posts ORDER BY date DESC');
        }


        $query->execute();
        // on fetchAll avec l'option FETCH_CLASS afin d'obtenir un tableau d'objet de type PostModel. 
        // On pourra ensuite manipuler les propriétés grâce au getters / setters        
        $posts = $query->fetchAll(PDO::FETCH_CLASS, 'PostModel');
        return $posts;
    }

     // récupération d'un article via son id
    // : ?PostModel est le typage de retour de la fonction. Ça signifie quelle peut retourner 
    // soit un objet de type PostModel, soit null
    public static function getPostById(int $id): ?PostModel
    {
        // connection pdo
        $pdo = DataBase::connectPDO();
        // impératif, :id permet d'éviter les injections SQL
        $query = $pdo->prepare('SELECT * FROM posts WHERE id=:id');
        // Comme il n'y a qu'un seul param, pas besoin de faire un tableau, on peut utiliser bindParam
        $query->bindParam(':id', $id);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'PostModel');
        // fetch et non fetchAll car on récupère une seule entrée
        $post = $query->fetch();       
        if(!$post){
            $post = null;
        } 
        return $post;
    }


    public function insertPost(): bool
    {
        $pdo = DataBase::connectPDO();
        // récupération de l'id de l'utilisateur via la superglobale $_SESSION
        $user_id = $_SESSION['user_id'];
        // requête sql protégée des injections sql 
        $sql = "INSERT INTO `posts`(`title`, `date`, `content`, `img`, `user_id`) VALUES (:title, :date, :content, :img, :user_id)";
        // associations des bonnes valeurs
        $params = [
            'title' => $this->title,
            'date' => $this->date,
            'content' => $this->content,
            'img' => $this->img,
            'user_id' =>  $user_id
        ];
        $query = $pdo->prepare($sql);
        // execution de la méthode en passant le tableau de params
        $queryStatus = $query->execute($params);
        return $queryStatus;
    }

    public function updatePost(): bool
    {
        $pdo = DataBase::connectPDO();
        // récupération de l'id de l'utilisateur via la superglobale $_SESSION
        $user_id = $_SESSION['user_id'];        
        // requête sql protégée des injections sql 
        $sql = "UPDATE `posts` SET `title` = :title, `date` = :date, `content` = :content, `img` = :img, `user_id` = :user_id WHERE `id` = :id";
        // associations des bonnes valeurs
        $params = [
            'id' => $this->id,
            'title' => $this->title,
            'date' => $this->date,
            'content' => $this->content,
            'img' => $this->img,
            'user_id' =>  $user_id
        ];
        $query = $pdo->prepare($sql);
        // execution de la méthode en passant le tableau de params
        $queryStatus = $query->execute($params);
        return $queryStatus;
    }

    public static function deletePost(int $postId): bool
    {
        $pdo = DataBase::connectPDO();
        $sql = 'DELETE FROM `posts` WHERE id = :id';
        $query = $pdo->prepare($sql);
        $query->bindParam('id', $postId, PDO::PARAM_INT);
        $queryStatus = $query->execute();
        return $queryStatus;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id)
    {
        $this->id = $id;
        
    }

    /**
     * Get the value of img
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     */
    public function setImg($img)
    {
        $this->img = $img;
        
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     */
    public function setDate($date)
    {
        $this->date = $date;
        
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        
    }

    /**
     * Get the value of contenu
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of contenu
     */
    public function setContent($content)
    {
        $this->content = $content;
        
    }

    /**
     * Get the value of user_id
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        
    }
}
