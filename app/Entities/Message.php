<?php
   namespace App\entities;

class Message
{
    private string $identifiant;
    private string $date;
    private string $contenu;
    private string $id_destinataire;
    private string $id_expediteur;

    public function __construct(){}
    /*
    public function __construct($identifiant, string $date, $contenu, $id_destinataire,$id_expediteur)
    {
        $this->identifiant = $identifiant;
        var_dump('bedel');
        $this->date = \DateTime::createFromFormat('d-m-Y H:i:s',$date);
        
        $this->contenu = $contenu;  
        $this->id_destinataire = $id_destinataire; 
        $this->id_expediteur = $id_expediteur; 
    
    

    }*/


    public function getIdentifiant(): string {
        return $this->identifiant;
    }
    public function setIdentifiant(string $identifiant){
       $this->identifiant = $identifiant;
    }

    public function getDate(): string {
        return $this->date;
    }
    public function setDate(string $date){
       $this->date = $date;
    }
    
    public function getContenu(): string {
        return $this->contenu;
    }
    public function setContenu(string $contenu){
       $this->contenu = $contenu;
    } 

    public function getIdDestinataire(): string {
        return $this->id_destinataire;
    }
    public function setIdDestinataire(string $id_destinataire){
       $this->id_destinataire = $id_destinataire;
    } 
    
    public function getIdExpediteur(): string {
        return $this->id_expediteur;
    }
    public function setIdExpediteur(string $id_expediteur){
       $this->id_expediteur = $id_expediteur;
    }    
}
?>