<?php

namespace App\Controllers;

class MessageController extends Controller
{

    public function __construct()
    {

    }
    public function index($messages=null){
        $this->view("Message.index", $messages);
    }

}
?>