<?php

namespace App\Controller;

use App\Entity\User;
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
        $userRepo = $this->get->getDoctrine()->getRepository(User::class);
        $u = $this->get('security.context')->getToken()->getUser();
        $user = $userRepo -> find($u.getId());


        // Récupérer un user en DB
        return $this->render("user/profil.html.twig",[
            "user" => $user
        ]);
    }

}
