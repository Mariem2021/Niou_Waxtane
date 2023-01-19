<?php 
    namespace App\Entities;
    class Utilisateur {
/*         private string $identifiant;
        private string $nom;
        private string $prenom;
        private string $motDePasse;
        private string $dateDeNaissance;
        private string $dateCreationCompte;
        private ?string $email;
        private string $emailRecuperationCompte;
        private ?int $numeroTelephone;
        private ?string $pays;
        
        private ?string $ville; */
        
        private string $identifiant;
        private string $mot_de_passe;
        private ?string $email;
        private ?string $numero_de_telephone;
        /*
        public function __construct($identifiant, $motDePasse, $email,$numeroTelephone){
        $this->identifiant = $identifiant;
        $this->motDePasse = $motDePasse;
        $this->numeroTelephone = $numeroTelephone;
        $this->email = $email;

        }
        */
        

        public function __construct(){

        }

        public function getIdentifiant(): string {
            return $this->identifiant;
        }
        public function setIdentifiant(string $identifiant){
           $this->identifiant = $identifiant;
        }
/* 
        public function getNom(): string {
            return $this->nom;
        }
        public function setNom(string $nom){
           $this->nom = $nom;
        }

        public function getPrenom(): string {
            return $this->prenom;
        }
        public function setPrenom(string $prenom){
           $this->prenom = $prenom;
        } */

        public function getMotDePasse(): string {
            return $this->mot_de_passe;
        }
        public function setMotDePasse(string $motDePasse){
           $this->mot_de_passe = $motDePasse;
        }

/*         public function getDatDeNaissance(): string {
            return $this->dateDeNaissance;
        }
        public function setDateDeNaissance(string $dateDeNaissance){
           $this->dateDeNaissance = $dateDeNaissance;
        }

        public function getDatCreationCompte(): string {
            return $this->dateCreationCompte;
        }
        public function setDateCreationCompte(string $dateCreationCompte){
           $this->dateCreationCompte = $dateCreationCompte;
        } */

        public function getEmail(): string {
            return $this->email;
        }
        public function setEmail(string $email){
           $this->email = $email;
        }
/* 
        public function getEmailRecuperationCompte(): string {
            return $this->emailRecuperationCompte;
        }
        public function setEmailRecuperationCompte(string $emailRecuperationCompte){
           $this->emailRecuperationCompte = $emailRecuperationCompte;
        } */

        public function getNumeroTelephone(): string {
            return $this->numero_de_telephone;
        }
        public function setNumeroTelephone(string $numeroTelephone){
           $this->numero_de_telephone = $numeroTelephone;
        }
/* 
        public function getPays(): string {
            return $this->pays;
        }
        public function setPays(string $pays){
           $this->pays = $pays;
        }

        public function getVille(): string {
            return $this->ville;
        }
        public function setVille(string $ville){
           $this->ville = $ville;
        }   */         


    }
?>