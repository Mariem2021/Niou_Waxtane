<?php

namespace App\Controllers;
class UtilisateurController extends Controller{

    public function __construct (){

    }

    public function index($users=null){
        $this->view("Utilisateur.index", $users);
    }


    public function auth(){
        $this->view("Utilisateur.auth");
    }

    public function register(){
        $this->view("Utilisateur.register");

    }
    public function show($id){

    }

    public function update($id){

    }
}


?>