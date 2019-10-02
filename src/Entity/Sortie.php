<?php

namespace App\Entity;

use App\Repository\EtatRepository;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\Column(type="datetime")
     */
    private $dateHeureDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateHeureFin;

    /**
     * @return mixed
     */
    public function getDateHeureFin()
    {
        return $this->dateHeureFin;
    }

    /**
     * @param mixed $dateHeureFin
     */
    public function setDateHeureFin($dateHeureFin)
    {
        $this->dateHeureFin = $dateHeureFin;
    }



    /**
     * @ORM\Column(type="datetime")
     */
    private $dateLimiteInscription;

    /**
     * @return mixed
     */
    public function getInscriptionOuverte()
    {
        return $this->inscriptionOuverte;
    }

    /**
     * @param mixed $inscriptionOuverte
     */
    public function setInscriptionOuverte($inscriptionOuverte)
    {
        $this->inscriptionOuverte = $inscriptionOuverte;
    }

    /**
     * @ORM\Column(type="boolean")
     */
    private $inscriptionOuverte;

    /**
     * ORM\Column(type="integer")
     */
    private $nbInscriptionMax;

    /**
     * @ORM\Column(type="string")
     */
    private $infosSortie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Etat", inversedBy="sorties")
     */
    private $etat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Site", inversedBy="sorties")
     */
    private $site;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lieu", inversedBy="sorties", cascade={"persist"})
     */
    private $lieu;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="sortiesOrganisateur")
     */
    private $userOrganisateur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User")
     * * @ORM\JoinTable(name="sorties_des_users",
     *     joinColumns={
     *      @ORM\JoinColumn(
     *          name="id_de_la_sortie",
     *          referencedColumnName="id"
     *     )
     *     },
     * )
     */
    private $users;




    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ville", inversedBy="lieux", cascade={"persist"})
     */
        private $ville;


    /**
     * Sortie constructor.
     */
    public function __construct()
    {
        $this->users = new ArrayCollection();

        $e = new Etat();
        $e->setLibelle('Créée');
        $this->etat = $e;
        $inscriptionOuverte = false;

    }


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

    /**
     * @return mixed
     */
    public function getUserOrganisateur()
    {
        return $this->userOrganisateur;
    }

    /**
     * @param mixed $userOrganisateur
     */
    public function setUserOrganisateur($userOrganisateur)
    {
        $this->userOrganisateur = $userOrganisateur;
    }

    /**
     * @return ArrayCollection
     */
    public function getUsers(): ArrayCollection
    {
        return $this->users;
    }

    /**
     * @param ArrayCollection $users
     */
    public function setUsers(ArrayCollection $users)
    {
        $this->users = $users;
    }



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


}
