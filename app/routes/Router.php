<?php
namespace App\Routes;
use App\Repositories\UtilisateurRepository;
use App\Repositories\MessageRepository;

//session_start();
class Router
{

    public $url;
    public $routes = [];
    public function __construct( /*$url*/)
    {
        //$this->url = trim($url, '/');
    }

    public function get(string $action, $id = null)
    {
        $this->routes['GET']['action'] = $action;
        $this->routes['GET']['id'] = $id;
    }

    public function post($action, $params)
    {
        $this->routes['POST']['action'] = $action;
        $this->routes['POST']['params'] = $params;

    }

    public function run()
    {

        if (isset($this->routes['GET'])) {
            $action = explode('@', $this->routes['GET']['action']);
            $id = $this->routes['GET']['id'];
            //var_dump($id);
            $controller = new $action[0]();
            $method = $action[1];
            var_dump($method);
            if (is_null($id)) {
                $controller->$method();
            } else {
                if ($action[0] === 'App\Controllers\UtilisateurController' && $method === 'index') {
                    $users = UtilisateurRepository::find();
                    //var_dump($users);
                    $controller->$method($users);
                }
                else {
                    $controller->$method();
                }
            }
        }

        if (isset($this->routes['POST'])) {

            $action = explode('@', $this->routes['POST']['action']);
            $controller = new $action[0]();
            $method = $action[1];
            //var_dump($method);
            $params = $this->routes['POST']['params'];
            //var_dump($method);
            if ($method == 'auth') {
                $user = UtilisateurRepository::findById($params['nameuser']);
                //var_dump($req);
                //$rep = $req->fetch();
                //var_dump($rep);
                if ($user) {
                    if ($user->getMotDePasse() === $params['password']) {
                        $_SESSION['nameuser'] = $user->getIdentifiant();
                        var_dump('Identifiants correctes');
                        header("location: /");
                    } else {
                        var_dump('Un des Identifiants Incorrectes');
                        $_SESSION['error'] = "Nom d'utilisateur ou mot de passe incorrecte";
                        $controller->$method();
                    }
                } else {
                    var_dump("Utilisateur n'existe pas");
                    $_SESSION['error'] = "Nom d'utilisateur ou mot de passe incorrecte";
                    $controller->$method();
                }

                //var_dump("j'ai trouvé l'utilisateur");
                // var_dump($user);
                // var_dump($req->fetchAll());
                /*
                } else {
                var_dump("Je n'ai trouvé aucun utilisateur");
                }
                */




                /*
                $id = $this->routes['POST']['id'];
                $controller = new $action[0]();
                $method = new $action[1]();
                
                if(is_null($id)){
                $controller->$method();    
                } 
                else{
                $controller->$method();
                }
                */

            }

            if($method === 'register'){

                //var_dump('Me voici');
                //if(preg_match('#^[a-zA-Z0-9_-]{3,16}$#', $params->getIdentifiant()) && preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}#', $params->getMotDePasse()) && preg_match('#^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$#',$params->getEmail()) && preg_match('#^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$#', $params->getNumeroTelephone())) {
                    if(UtilisateurRepository::insert($params)){
                        $_SESSION['succes'] = "Inscription Réussi, Veuillez vous connecter"; 
                    }else{
                        var_dump("J'ai pas pu inserer");
                    }
                //}
                /*
                else {
                    var_dump('Je suis here');
                    if(!preg_match('#^[a-zA-Z0-9_-]{3,16}$#', $params->getIdentifiant())){
                        $_SESSION['errorNameUser'] = "Veuillez saisir un nom d'utilisateur au bon format";   
                    }
                    if(!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$#', $params->getMotDePasse())){
                        $_SESSION['errorPassword'] = "Mot de passe incorrecte";   
                    }
                    if(!preg_match('#^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$#', $params->getEmail())){
                        $_SESSION['errorEmail'] = "Adresse mail incorrecte";   
                    }
                    if(!preg_match('#^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$#',$params->getNumeroTelephone())){
                        $_SESSION['errorNumTel'] = "Numéro de téléphone incorrecte";   
                    }
                   
                }
                */
                header("location: /register");
            }

            if($action[0] === 'App\Controllers\MessageController' && $method === 'index'){
                $messages = MessageRepository::find($params, $_SESSION['nameuser']);
                //var_dump($messages);
                //return json_encode($messages);
                $controller->$method($messages);

            }

            if ($action[0] === 'App\Controllers\MessageController' && $method === 'registermessage') {
                if(MessageRepository::insert($params)){
                    ?>
                    <span>vrai</span>
                    <?php
                    //var_dump("Inscription Réussi, Veuillez vous connecter"); 
                }else{ ?>
                    <span>faux</span>
                    <?php
                    //var_dump("J'ai pas pu inserer");
                }
            
            }




        }
    }
}
?>