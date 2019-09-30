<?php

namespace App\Entity;

use App\Repository\EtatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping as ORM;
use PhpParser\Node\Expr\Array_;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtatRepository")
 */
class Etat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length = 15)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sortie", mappedBy="etat")
     */
    private $sorties;

    /**
     * constructor.
     */
    public function __construct()
    {
      //  $this->libelle = new Libelle();
        $this->sorties = new ArrayCollection();
        $em = EntityManager::class;
        $rep = new EtatRepository();
        $lib = $rep->find(1);
        $this->setLibelle($lib);
    }

    /**
     * @return identifiant
     */
    public function getId()
    {
        return $this->id;
    }

//    /**
//     * @param identifiant $id
//     */
//    public function setId($id)
//    {
//        $this->id = $id;
//    }

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
    public function setSorties(ArrayCollection $sorties)
    {
        $this->sorties = $sorties;
    }



}

