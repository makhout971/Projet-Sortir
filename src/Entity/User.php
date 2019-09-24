<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
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
     * @ORM\Column(type="string", lenght="30", nullable=false)
     */
    private $username;

    /**
     * @ORM\Column(type="string", lenght="30", nullable=false)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", lenght="30", nullable=false)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", lenght="15")
     */
    private $tel;

    /**
     * @ORM\Column(type="string", lenght="20", nullable=false)
     */
    private $email;

    /**
     * @ORM\Column(type="string", lenght="20", nullable=false)
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

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $no_site;

    private $roles;

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


}
