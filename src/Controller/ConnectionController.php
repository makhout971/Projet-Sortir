<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ProfilType;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ConnectionController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('connection/home.html.twig', [
            'controller_name' => 'ConnectionController',
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login()
    {
        return $this->render('connection/login.html.twig', [
        ]);
    }












































    /**
     * @Route("/inscription", name="register")
     */
    public function register(Request $request,
                             EntityManagerInterface $em,
                             UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $registerForm = $this->createForm(RegisterType::class, $user);

        $registerForm->handleRequest($request);
        if ($registerForm->isSubmitted() && $registerForm->isValid())
        {
            //hacher le mot de passe

            $hashed = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hashed);

            $em->persist($user);
            $em->flush();

        }


        return $this->render("user/register.html.twig", [
            "registerForm" => $registerForm->createView()

        ]);
    }















































    // Pierre

    /**
     * @Route("/monProfil", name="user_profil")
     */
    public function updateProfil(){

        //  $userRepo = $this->getDoctrine()->getRepository(User::class);
        $u = $this->getUser();
        // $user = $userRepo -> find($u.getId());

        $profilForm = $this->createForm(ProfilType::class, $u);

        // $user = $this->get('security.context')->getToken()->getUser();




        // Récupérer un user en DB

        return $this->render("user/profil.html.twig",[
            "user" => $u,
            "profilForm" => $profilForm->createView()
        ]);



    }

}
