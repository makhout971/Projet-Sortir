<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ProfilType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ConnectionController extends Controller
{
    /**
     * @Route("/connection", name="connection")
     */
    public function index()
    {
        return $this->render('connection/home.html.twig', [
            'controller_name' => 'ConnectionController',
        ]);
    }
















































































    // Pierre

    /**
     * @Route("/monProfil", name="user_profil")
     */
    public function updateProfil(){
        $userRepo = $this->getDoctrine()->getRepository(User::class);
        $u = $this->getUser();
        $user = $userRepo -> find($u.getId());

        $profilForm = $this->createForm(ProfilType::class, $u);


        // Récupérer un user en DB
        return $this->render("user/profil.html.twig",[
            "user" => $user
        ]);
    }

}
