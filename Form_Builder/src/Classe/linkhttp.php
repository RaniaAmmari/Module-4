<?php

    Namespace App\Classe;
    
    class linkhttp
    {
        private $nom;
        private $lien;

        /**
         * Get the value of nom
         */ 
        public function getNom()
        {
                return $this->nom;
        }

        /**
         * Set the value of nom
         *
         * @return  self
         */ 
        public function setNom($nom)
        {
                $this->nom = $nom;

                return $this;
        }

        /**
         * Get the value of lien
         */ 
        public function getLien()
        {
                return $this->lien;
        }

        /**
         * Set the value of lien
         *
         * @return  self
         */ 
        public function setLien($lien)
        {
                $this->lien = $lien;

                return $this;
        }
    }
    
    