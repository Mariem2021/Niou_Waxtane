<?php
    namespace App\Repositories;
    use App\Entities\Utilisateur;
    use DateTime;
    use \PDO;

class MessageRepository
{

    public static function find($recepteur, $expediteur)
    {
        //var_dump($expediteur);
        //var_dump($recepteur);
        $pdo = new PDO('mysql:dbname=niou_waxtane;host=localhost', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = $pdo->prepare("SELECT * FROM messages WHERE (id_expediteur = ? AND id_destinataire = ?) OR (id_expediteur = ? AND id_destinataire = ?) ORDER BY " ."date ". "ASC" );
        $req->execute([$expediteur, $recepteur, $recepteur, $expediteur]);
        //var_dump($req);
        $req->setFetchMode(PDO::FETCH_CLASS, '\App\Entities\Message');

        //var_dump($req->fetchAll());
        $result = $req->fetchAll();
        var_dump($result);
        $messages=[''];
        foreach($result as $message){
            //$messages[] = $message->getContenu();
            $messages[] = $message;
            //var_dump($messages);
        }
       return $messages;
    }
    public static function insert($params){
        $dest = $params['destmess'];
        $expedit = $params['expeditmess'];
        $message = $params['message'];
        $date = new DateTime();
        $date = $date->format('Y-m-d H:i:s');

        $pdo = new PDO('mysql:dbname=niou_waxtane;host=localhost','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO messages ("." date, contenu, id_expediteur, id_destinataire) 
                VALUES (".":date,:contenu, :expediteur, :destinataire)";
        $req = $pdo->prepare($sql);
        $req->bindParam(':date', $date);
        $req->bindParam(':expediteur', $expedit);
        $req->bindParam(':destinataire', $dest);
        $req->bindParam(':contenu', $message);
        var_dump($req);
        $req->execute();

        if($req->rowCount()>0){
            return true;
        }else{
            return false;
        }
    } 


}   

?>