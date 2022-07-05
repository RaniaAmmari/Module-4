<?php

    Namespace App\Classe;
    
    class Info
    {
        private $montant;
        private $email;
        private $confirmedemail;
        private $numero;
    
    

        /**
         * Get the value of montant
         */ 
        public function getMontant()
        {
                return $this->montant;
        }

        /**
         * Set the value of montant
         *
         * @return  self
         */ 
        public function setMontant($montant)
        {
                $this->montant = $montant;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of confirmedemail
         */ 
        public function getConfirmedemail()
        {
                return $this->confirmedemail;
        }

        /**
         * Set the value of confirmedemail
         *
         * @return  self
         */ 
        public function setConfirmedemail($confirmedemail)
        {
                $this->confirmedemail = $confirmedemail;

                return $this;
        }

        /**
         * Get the value of tel
         */ 
        public function getnumero()
        {
                return $this->numero;
        }

        /**
         * Set the value of tel
         *
         * @return  self
         */ 
        public function setnumero($numero)
        {
                $this->numero = $numero;

                return $this;
        }
    }