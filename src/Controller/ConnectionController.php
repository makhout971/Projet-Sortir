<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ConnectionController extends Controller
{
    /**
     * @Route("/home", name="home")
     */
    public function home()
    {
        return $this->render('connection/home.html.twig', [
            'controller_name' => 'ConnectionController',
        ]);
    }

    /**
     * @Route("/login", name"login")
     */
















































































    // Pierre

    /**
     * @Route("/monProfil", name="user_profil")
     */
    public function updateProfil(){
        $userRepo = $this->get->getDoctrine()->getRepository(User::class);
        $user = $this->get('security.context')->getToken()->getUser();


        // Récupérer un user en DB
        return $this->render("user/profil.html.twig");
    }

}
