<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ProfilType;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserController extends Controller
{
    /**
     * @Route("/home",  name="user_home")
     */
    public function home()
    {
        return $this->render('user/home.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/login", name="user_login")
     * @Template()
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
                                 EntityManagerInterface $em
                                 ){
        $userRepo = $this->getDoctrine()->getRepository(User::class);
                $u = $this->getUser();

        $user = $userRepo -> find($u->getId());


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
                $user->setPrenom(filter_var($_POST['prenom'],FILTER_SANITIZE_STRING));
                $user->setNom(filter_var($_POST['nom'],FILTER_SANITIZE_STRING));
                $user->setTel(filter_var($_POST['tel'],FILTER_SANITIZE_STRING));
                $user->setEmail(filter_var($_POST['mail'],FILTER_SANITIZE_EMAIL));
                $user->setPassword(filter_var($_POST['password'],FILTER_SANITIZE_STRING));
                $hased = $passwordEncoder->encodePassword($user, $user->getPassword());

                $em->persist($user);
                $em->flush();

                $this->get('session')->getFlashBag()->add('reussi', 'Modification réussie !');



            }

            return $this->render("user/profil.html.twig",[
//
//        }


            ]);
        }







    }

}
