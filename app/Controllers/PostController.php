<?php

class PostController extends MainController{

    public function renderPost(){
        require '../app/Models/PostModel.php';        
        $postModel = new PostModel();                   
        $this->data =  $postModel->getPostById($this->id);        
        $this->render();
    }
}
