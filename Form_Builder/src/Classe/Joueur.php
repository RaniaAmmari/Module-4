<?php

Namespace App\Classe;

class Joueur
{
    private $Nom;
    private $Age;

    public function getNom()
    {
        return $this->Nom;
    }

    public function setNom( $Nom)
    {
        $this->Nom = $Nom;

        return $this;
    }
    public function getAge()
    {
        return $this->Age;
    }

    public function setAge( $Age)
    {
        $this->Age = $Age;

        return $this;
    }

}