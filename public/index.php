<?php
use App\Entities\Utilisateur;
session_start();
require '../vendor/autoload.php';
use App\Routes\Router;

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app'.DIRECTORY_SEPARATOR.'Views' . DIRECTORY_SEPARATOR);

//define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

//define('SCRIPTS',dirname(__DIR__) . DIRECTORY_SEPARATOR . 'public'. DIRECTORY_SEPARATOR);
$url = $_GET['url'];
$url = explode('/', $url);
$url = trim(end($url));
//$url = trim($_GET['url'],"/");
var_dump($url);
//var_dump($_POST['nameuser']);
$router = new Router();
if($url == ''){
    if(!isset($_SESSION['nameuser'])){
        header("location: /login");
        //$router->get('App\Controllers\UtilisateurController@index');
    }
    else{
        $id = $_SESSION['nameuser'];
        //var_dump($id);
        $router->get('App\Controllers\UtilisateurController@index', $id);
        $router->run();
    }

}
elseif($url == 'login'){
    //var_dump($_POST['nameuser']);
    //var_dump($_POST['password']);
    if(isset($_POST['nameuser']) && isset($_POST['password'])){
        
       $router->post('App\Controllers\UtilisateurController@auth', array('nameuser' => $_POST['nameuser'], 'password' => $_POST['password']));
       $router->run(); 
       var_dump('here');
        
    
    }
    else {
        $router->get('App\Controllers\UtilisateurController@auth');
        $router->run();
        //var_dump('Je suis ici');
    }
}elseif($url == 'logout'){
    session_destroy();
    header("location: /");
}
elseif($url == 'register'){
    var_dump($_POST);
    if(!isset($_SESSION['nameuser'])){
        if(!empty($_POST)){
            var_dump("coucou");
            $user = new Utilisateur();
            $user->setIdentifiant($_POST['username']);
            $user->setEmail($_POST['email']);
            $user->setMotDePasse($_POST['pass']);
            $user->setNumeroTelephone( $_POST['numtel']);
            $router->post('App\Controllers\UtilisateurController@register', $user);
            $router->run();    

        }else{
            $router->get('App\Controllers\UtilisateurController@register');
            $router->run();
        }
    
    }
    else{
        header("location: /"); 
    }
}elseif($url == 'essai'){ ?>
    <form action='/registermessage' method="POST">
        <input type="text" name ="destmess" value = "Bedel_Th_07"/>
        <input type="text" name = "expeditmess" value="Bedel_Th" />
        <input type="text" name = "message" value="Hello" />
        <input type="submit" value ="envoyer" />
    </form>

<?php }elseif($url == 'messages'){
    if(!isset($_SESSION['nameuser'])){
        header("location: /"); 
    }else{
        //print_r($_POST);
        $router->post('App\Controllers\MessageController@index', $_POST['user']);
        $router->run();
    }
    
} elseif($url == 'registermessage'){
    if(!isset($_SESSION['nameuser'])){
        header("location: /"); 
    }else{
        //print_r($_POST);
        $router->post('App\Controllers\MessageController@registermessage', $_POST);
        $router->run();
    }

}
//$router->get('App\Controllers\UtilisateurController@index');

//$router->run();

?>