<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SortieRepository")
 */
class Sortie
{

    public function __construct()
    {

        $this.self::$nombreTotalSorties++;

    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private static $nombreTotalSorties;

    /**
     * @ORM\Column(type="string")
     */
    private $nom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateHeureDebut;

    /**
     * @ORM\Column(type="date", nullable=true)
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
     */
    private $etat;

    public function getId()
    {
        return $this->id;
    }



}
