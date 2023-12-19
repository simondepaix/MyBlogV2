<?php

class UserModel
{
    // Propriétés représentant les données d'un utilisateur
    private $id; // ID de l'utilisateur
    private $name; // Nom de l'utilisateur
    private $email; // Adresse email de l'utilisateur
    private $password; // Mot de passe de l'utilisateur (Attention: stockage en clair dans cet exemple, à éviter en production)
    private $role; // Rôle de l'utilisateur (peut être administrateur, utilisateur standard, etc.)

    // Méthode pour enregistrer un utilisateur dans la base de données
    public function registerUser()
    {
        // Connexion à la base de données en utilisant la classe DataBase
        $pdo = DataBase::connectPDO();

        // Requête SQL pour insérer un nouvel utilisateur dans la table 'users'
        $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES (:name,:email,:password)";

        // Préparation de la requête avec PDO
        $pdoStatement = $pdo->prepare($sql);

        // Paramètres à lier à la requête préparée
        $params = [
            ':name' => $this->name,
            ':email' => $this->email,
            ':password' => $this->password,
        ];

        // Exécution de la requête avec les paramètres
        $success = $pdoStatement->execute($params);
 
        // Retourne un booléen indiquant le succès de l'opération d'insertion
        return $success;
    }

    // Méthode pour vérifier si un email est déjà utilisé par un utilisateur existant
    public function checkEmail()
    {
        // Connexion à la base de données en utilisant la classe DataBase
        $pdo = DataBase::connectPDO();

        // Requête SQL pour compter le nombre d'utilisateurs avec l'email donné
        $sql = "SELECT COUNT(*) FROM `users` WHERE `email` = :email";
        $query = $pdo->prepare($sql);
        
        // Liaison du paramètre :email à la variable $this->email de l'instance actuelle
        $query->bindParam(':email', $this->email);
        $query->execute();
        
        // Récupération du résultat : nombre d'utilisateurs ayant l'email donné
        $isMail = $query->fetchColumn();     
           
        // Retourne un booléen indiquant si l'email est déjà utilisé (vrai si > 0)
        return $isMail > 0;
    }

    // Méthodes pour récupérer et définir les valeurs des propriétés (accès aux données encapsulées)

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;        
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }
}
