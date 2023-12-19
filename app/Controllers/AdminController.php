<?php

class AdminController extends MainController{
    public function renderAdmin(){
        $this->viewType = 'admin';
        $this->render();
    }
 
}