<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtatRepository")
 */
class Etat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @var
     */
    private $idEtat;

    /**
     * @ORM\Column(type="string", length = 15)
     * @var
     */
    private $libelle;

    /**
     * @return mixed
     */
    public function getIdEtat()
    {
        return $this->idEtat;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }


}

