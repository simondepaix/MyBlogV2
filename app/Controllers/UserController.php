<?php


class UserController extends MainController
{
    public function renderUser(): void
    {
        // si la vue stockée est logout
        if ($this->view === 'logout') {
            // on appel la méthode logout()
            $this->logout();
        } else {
            // sinon, s'il y'a une requête post c'est q'un formulaire à été soumis
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                // si le formulaire soumis est registerForm
                if (isset($_POST["registerForm"])) {
                    // on appel la méthode register
                    $this->register();
                    // sinon si le formulaire soumis est LoginForm
                } elseif (isset($_POST["loginForm"])) {
                    // on appel la méthode Login
                    $this->login();
                }
            }
        }
        // dans tous les cas on construit la page
        $this->render();
    }


    public function register()
    {

        $errors = 0;
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $name = filter_input(INPUT_POST, 'name');

        if (!$email || !$password || !$name) {
            $errors = 1;
            $this->data[] = '<div class="alert alert-danger" role="alert">Tous les champs sont obligatoires</div>';
        }

        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        if ($email === false) {
            $this->data[] = '<div class="alert alert-danger" role="alert">Le format de l\'email n\'est pas valide.</div>';
            $errors = 1;
        }

        if (strlen($password) < 8) {
            $this->data[] = '<div class="alert alert-danger" role="alert">Le mot de passe doit contenir au moins 8 caractères.</div>';
            $errors = 1;
        }

        if ($errors < 1) {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            require '../app/Models/UserModel.php';
            $user = new UserModel();
            $user->setEmail($email);
            $user->setPassword($hashedPassword);
            $user->setName($name);
            $user->setRole(3);

            if ($user->checkEmail()) {
                $this->data[] = '<div class="alert alert-danger" role="alert">Cet email est déjà pris, veuillez en choisir un autre.</div>';
                $errors = 1;
            }

            if ($errors < 1) {
                if ($user->registerUser()) {
                    $this->data[] = '<div class="alert alert-success" role="alert">Enregistrement réussi, vous pouvez maintenant vous connecter</div>';
                } else {
                    $this->data[] = '<div class="alert alert-danger" role="alert">Il y a eu une erreur lors de l\enregistrement</div>';
                }
            }
        }
    }


    public function login()
    {
        // Initialisation du compteur d'erreurs
        $errors = 0;

        // Inclusion du fichier UserModel.php qui contient la classe UserModel
        require '../app/Models/UserModel.php';

        // Instanciation d'un nouvel objet UserModel
        $user = new UserModel();

        // Récupération des données de l'utilisateur via la méthode getUserByEmail
        $user = $user->getUserByEmail($_POST['email']);

        // Affichage des données de l'utilisateur (à des fins de débogage, peut être retiré en production)
        var_dump($user);

        // Vérification si l'utilisateur existe
        if ($user === false) {
            $errors = 1;
        }

        // Vérification du mot de passe en utilisant password_verify
        if (password_verify($_POST['password'], $user->getPassword())) {

            // Si le mot de passe est correct, création d'une session pour l'utilisateur
            $_SESSION['user_id'] = $user->getId();

            // Ajout d'un message de succès à afficher à l'utilisateur
            $this->data[] = '<div class="alert alert-success" role="alert">Connexion réussie !</div>';

            // Extraction de l'URI de base en utilisant explode pour la redirection
            $base_uri = explode('index.php', $_SERVER['SCRIPT_NAME']);
            // Redirection vers la page d'accueil (peut être activé en décommentant cette ligne)
            // header('Location:' . $base_uri[0]);

        } else {
            // Si le mot de passe est incorrect, incrémentation du compteur d'erreurs
            $errors = 1;
        }

        // Si des erreurs sont détectées, ajout d'un message d'erreur à afficher à l'utilisateur
        if ($errors > 0) {
            $this->data[] = '<div class="alert alert-danger" role="alert">Email ou mot de passe incorrect</div>';
        }
    }

    public function logout(): void
    {
        // pour supprimer spécifiquement les données de userObject.
        unset($_SESSION['user_id']);
        // pour détruire la session 
        session_destroy();
        // création de l'url de redirection
        $base_uri = explode('index.php', $_SERVER['SCRIPT_NAME']);
        // on redirige vers la home
        header('Location:' . $base_uri[0] . 'home');
    }

}
