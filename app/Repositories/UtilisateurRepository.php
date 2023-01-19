<?php
namespace App\Repositories;
use App\Entities\Utilisateur;
use \PDO;
    class UtilisateurRepository{

        public static function findById($id){
            $pdo = new PDO('mysql:dbname=niou_waxtane;host=localhost','root','');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $req = $pdo->prepare("SELECT * FROM utilisateur WHERE identifiant = ?");
            $req->execute([$id]);
            $req->setFetchMode(PDO::FETCH_CLASS, 'App\Entities\Utilisateur');

            return $req->fetch();
            /*
            if($req->fetchColumn() > 0) {
                return $req->fetch();
            }else {
                return false;
                }
            */    
        }

    public static function insert($params){
        $id = $params->getIdentifiant();
        $password = $params->getMotDePasse();
        $email = $params->getEmail();
        $numtel = $params->getNumeroTelephone();

        $pdo = new PDO('mysql:dbname=niou_waxtane;host=localhost','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO utilisateur (identifiant, mot_de_passe, email, numero_de_telephone) 
                VALUES (:identifiant,:motDePasse, :email, :numeroTelephone)";
        $req = $pdo->prepare($sql);
        $req->bindParam(':identifiant', $id);
        $req->bindParam(':motDePasse', $password);
        $req->bindParam(':email', $email);
        $req->bindParam(':numeroTelephone', $numtel);

        $req->execute();

        if($req->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }    
    
    public static function find(){
        $pdo = new PDO('mysql:dbname=niou_waxtane;host=localhost', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = $pdo->query("SELECT * FROM utilisateur");
        $req->setFetchMode(PDO::FETCH_CLASS, '\App\Entities\Utilisateur');
        //var_dump($req->fetchAll());
        $result = $req->fetchAll();
        foreach($result as $user){
            $users[] = $user;//->getIdentifiant();
            //$users[] = $user;
        }
        return $users;
    }


    }
?>