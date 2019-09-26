<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SortieRepository")
 */
class Sortie
{


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string")
     */
    private $nom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateHeureDebut;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree;

    /**
     * @ORM\Column(type="date")
     */
    private $dateLimiteInscription;

    /**
     * ORM\Column(type="integer")
     */
    private $nbInscriptionMax;

    /**
     * @ORM\Column(type="string")
     */
    private $infosSortie;

    /**
     * @ORM\Column(type="string")
     * @ORM\ManyToOne(targetEntity="App\Entity\Etat", inversedBy="sorties")
     */
    private $etat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Site", inversedBy="sorties")
     */
    private $site;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lieu", inversedBy="sorties")
     */
    private $lieu;


    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getDateHeureDebut()
    {
        return $this->dateHeureDebut;
    }

    /**
     * @param mixed $dateHeureDebut
     */
    public function setDateHeureDebut($dateHeureDebut)
    {
        $this->dateHeureDebut = $dateHeureDebut;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    }

    /**
     * @return mixed
     */
    public function getDateLimiteInscription()
    {
        return $this->dateLimiteInscription;
    }

    /**
     * @param mixed $dateLimiteInscription
     */
    public function setDateLimiteInscription($dateLimiteInscription)
    {
        $this->dateLimiteInscription = $dateLimiteInscription;
    }

    /**
     * @return mixed
     */
    public function getNbInscriptionMax()
    {
        return $this->nbInscriptionMax;
    }

    /**
     * @param mixed $nbInscriptionMax
     */
    public function setNbInscriptionMax($nbInscriptionMax)
    {
        $this->nbInscriptionMax = $nbInscriptionMax;
    }

    /**
     * @return mixed
     */
    public function getInfosSortie()
    {
        return $this->infosSortie;
    }

    /**
     * @param mixed $infosSortie
     */
    public function setInfosSortie($infosSortie)
    {
        $this->infosSortie = $infosSortie;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return mixed
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param mixed $site
     */
    public function setSite($site)
    {
        $this->site = $site;
    }

    /**
     * @return mixed
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @param mixed $lieu
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    }




}
