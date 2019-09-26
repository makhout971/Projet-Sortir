<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LieuRepository")
 */
class Lieu
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idLieu;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nomLieu;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $rue;

    /**
     * @return mixed
     */
    public function getIdLieu()
    {
        return $this->idLieu;
    }


    /**
     * @return mixed
     */
    public function getNomLieu()
    {
        return $this->nomLieu;
    }

    /**
     * @param mixed $nomLieu
     */
    public function setNomLieu($nomLieu)
    {
        $this->nomLieu = $nomLieu;
    }

    /**
     * @return mixed
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * @param mixed $rue
     */
    public function setRue($rue)
    {
        $this->rue = $rue;
    }


}
