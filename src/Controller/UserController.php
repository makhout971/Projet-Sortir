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

class UserController extends Controller
{
    /**
     * @Route("/", name="user_home")
     */
    public function home()
    {
        return $this->render('user/home.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/login", name="user_login")
     */
    public function login()
    {
        return $this->render('user/login.html.twig', [
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
    public function updateProfil(Request $request,
                                 UserPasswordEncoderInterface $passwordEncoder,
                                 EntityManagerInterface $em){

        if (isset($_POST['validate']) && $_POST['validate'] != null)
        {
            if (!empty($_POST['prenom'])
                &&
                !empty( $_POST['nom'])
                &&
                !empty($_POST['tel'])
                &&
                !empty( $_POST['password'])
                &&
                !empty($_POST['mail'])
            ){


            }
        }


        // if ( $request->request->get(''))
        return $this->render("user/profil.html.twig",[
//            "user" => $u,
            //  $userRepo = $this->getDoctrine()->getRepository(User::class);
//
//        $u = $this->getUser();
//        // $user = $userRepo -> find($u.getId());
//
//        $profilForm = $this->createForm(ProfilType::class, $u);
//
//        $profilForm->handleRequest($request);
//        if ($profilForm->isSubmitted() && $profilForm->isValid() )
//        {
//        //    $password = $passwordEncoder->encodePassword($u, $u->getPassword());
//        //    $u->setPassword($password);
//            $u->setPrenom($request->request->get('prenom'));
//            $u->setNom($request->request->get('nom'));
//            $u->setTelephone($request->request->get('tel'));
//            $u->setEmail($request->request->get('email'));
////            L'user ne change jamais de site de rattachement
//            $em->persist($u);
//            $em->flush();
//        }








        ]);



    }

}