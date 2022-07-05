<?php

    Namespace App\Classe;
    
    class Papier
    {
        private $nom;
        private $prenom;
        private $age;
        private $adresse;
        private $codepostal;
        private $ville;
        private $permis;
    
        public function getnom()
        {
            return $this->nom;
        }
    
        public function getprenom()
        {
            return $this->prenom;
        }
    
        public function setnom( $nom): self
        {
            $this->nom = $nom;
    
            return $this;
        }
        public function setprenom( $prenom): self
        {
            $this->prenom = $prenom;
    
            return $this;
        }
    
        public function getage()
        {
            return $this->age;
        }
        public function setage( $age): self
        {
            $this->age = $age;
    
            return $this;
        }
        
        public function getadresse()
        {
            return $this->adresse;
        }
        public function setadresse( $adresse): self
        {
            $this->adresse = $adresse;
    
            return $this;
        }

        public function getcodepostal()
        {
            return $this->codepostal;
        }
        public function setcodepostal( $codepostal): self
        {
            $this->codepostal = $codepostal;
    
            return $this;
        }
        
        public function getville()
        {
            return $this->ville;
        }
        public function setville( $ville): self
        {
            $this->ville = $ville;
    
            return $this;
        }
        public function getpermis()
        {
            return $this->permis;
        }
        public function setpermis( $permis): self
        {
            $this->permis = $permis;
    
            return $this;
        }
    }
    
