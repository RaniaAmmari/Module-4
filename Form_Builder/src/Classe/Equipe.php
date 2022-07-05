<?php

Namespace App\Classe;


class Equipe
{


    private $Nomequipe ;
    private $Ville;
    private $Sport;
    private $joueur;


    public function getNomequipe()
    {
        return $this->Nomequipe;
    }

    public function setNomequipe( $Nomequipe)
    {
        $this->Nomequipe = $Nomequipe;

        return $this;
    }


    public function getVille()
    {
        return $this->Ville;
    }

    public function setVille( $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }
    public function getSport()
    {
        return $this->Sport;
    }

    public function setSport($Sport): self
    {
        $this->Sport = $Sport;

        return $this;
    }

    public function getJoueur()
    {
        return $this->joueur;
    }

    public function setJoueur( $joueur): self
    {
        $this->joueur = $joueur;

        return $this;
    }

}