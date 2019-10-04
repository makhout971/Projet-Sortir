<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Entity\User;
use App\Form\HomeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/",  name="user_home")
     */
    public function home()
    {
        $message = null;
        $userRepo = $this->getDoctrine()->getRepository(User::class);
        $sortieRepo = $this->getDoctrine()->getRepository(Sortie::class);

        $toutesLesSorties = $sortieRepo->findAll();

        $users = $userRepo->totalUsersInscrits();
        $sorties = $sortieRepo->totalSortiesOrganisees();

//        dump($users);
//        dump($sorties);

        return $this->render('user/home.html.twig', [
            'users' => $users,
            'entities' => $toutesLesSorties,
            'message' => $message
        ]);
    }


    /**
     * @Route("/afficher", name="afficherSorties")
     */
    public function listeSorties()
    {
        $repository = $this->getDoctrine()->getRepository(Sortie::class);
        $toutesLesSorties = $repository->findAll();
        $home =
        $formHome = $this->createForm(HomeType::class, $home);
        return $this->render('user/home.html.twig', [

            'entities' => $toutesLesSorties
        ]);
    }


}
