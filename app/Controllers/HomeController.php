<?php

class HomeController extends MainController{

    public function renderHome(){    
         require '../app/Models/PostModel.php';
        $postModel = new PostModel();        
        $this->data = $postModel->getPosts(5);   
        $this->render();        
    }
}
