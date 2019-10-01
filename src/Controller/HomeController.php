<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/",  name="user_home")
     */
    public function home()
    {
        $userRepo = $this->getDoctrine()->getRepository(User::class);
        $sortieRepo = $this->getDoctrine()->getRepository(Sortie::class);

        $users = $userRepo->totalUsersInscrits();
        $sorties = $sortieRepo->totalSortiesOrganisees();

        dump($users);
        dump($sorties);

        return $this->render('user/home.html.twig', [
            'users' => $users,
            'sorties' => $sorties,
        ]);
    }

}
