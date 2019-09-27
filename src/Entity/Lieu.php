<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nomLieu;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $rue;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sortie", mappedBy="lieu")
     */
    private $sorties;

    /**
     * @var Lieu constructor.
     */
    public function __construct()
    {
        $this->sorties = new ArrayCollection();
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ville", inversedBy="lieux", cascade={"persist"})
     */
    private $ville;

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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

    /**
     * @return ArrayCollection
     */
    public function getSorties()
    {
        return $this->sorties;
    }

    /**
     * @param ArrayCollection $sorties
     */
    public function setSorties($sorties)
    {
        $this->sorties = $sorties;
    }



}
