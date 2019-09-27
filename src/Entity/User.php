<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @UniqueEntity(fields="username")
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @Assert\NotBlank(message="Veuillez renseigner un pseudo")
     * @ORM\Column(type="string", length=30, nullable=false)
     */
    private $username;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner un nom")
     * @ORM\Column(type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner un prenom")
     * @ORM\Column(type="string", length=30, nullable=false)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $tel;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner un email")
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $email;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner un mot de passe")
     * @ORM\Column(type="string", nullable=false)
     */
    private $password;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $admin;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $actif;


    private $roles;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Site", inversedBy="users")
     */
    private $site;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Sortie", mappedBy="users")
     */
    private $sorties;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sortie", mappedBy="userOrganisateur")
     */
    private $sortiesOrganisateur;

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
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * @param mixed $admin
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }

    /**
     * @return mixed
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * @param mixed $actif
     */
    public function setActif($actif)
    {
        $this->actif = $actif;
    }

    /**
     * @return mixed
     */
    public function getNoSite()
    {
        return $this->no_site;
    }

    /**
     * @param mixed $no_site
     */
    public function setNoSite($no_site)
    {
        $this->no_site = $no_site;
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return ["ROLE_USER"];
    }

    /**
     * @param mixed $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {

    }

    public function __construct()
    {
        $this->sortiesOrganisateur = new ArrayCollection();
        $this->admin = 0;
        $this->actif = 0;
    }

    /**
     * @return mixed
     */
    public function getSorties()
    {
        return $this->sorties;
    }

    /**
     * @param mixed $sorties
     */
    public function setSorties($sorties)
    {
        $this->sorties = $sorties;
    }

    /**
     * @return ArrayCollection
     */
    public function getSortiesOrganisateur()
    {
        return $this->sortiesOrganisateur;
    }

    /**
     * @param ArrayCollection $sortiesOrganisateur
     */
    public function setSortiesOrganisateur( $sortiesOrganisateur)
    {
        $this->sortiesOrganisateur = $sortiesOrganisateur;
    }

}
