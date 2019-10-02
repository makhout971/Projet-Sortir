<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ProfilType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfilController extends Controller
{
    /**
     * @Route("/monProfil/{id}", name="user_profil")
     */
    public function modifProfil(Request $request,
                                EntityManagerInterface $em,
                                UserPasswordEncoderInterface $encoder)
    {
        $userRepo = $this->getDoctrine()->getRepository(User::class);
        $u = $this->getUser();
        $user = $userRepo -> find($u->getId());
        $form = $this->createForm(ProfilType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            //hacher le mot de passe


            $hashed = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hashed);

            $em->persist($user);
            $em->flush();
            $this->addFlash(
                'succesProfil',
                'Vous pouvez maintenant vous connecter !'
            );
           return $this->redirectToRoute('user_home');

        }



        return $this->render('user/profil.html.twig', [
            "profilForm" => $form->createView(),
            "user" => $user
        ]);
    }


    /**
     * @Route("/profil/{id}", name="other_user")
     */
    public function viewProfil($id)
    {
        $userRepo = $this->getDoctrine()->getRepository(User::class);
        $user = $userRepo->find($id);
        return $this->render('user/otherProfil.html.twig', [

            "user" => $user
        ]);
    }
}
