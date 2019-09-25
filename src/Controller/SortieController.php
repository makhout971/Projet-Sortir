<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 *
 * @Route("/sortie")
 */
class SortieController extends Controller
{
    /**
     * @Route("/add", name="sortie")
     */
    public function addSortie()
    {




        return $this->render('sortie/add.html.twig', [
            'controller_name' => 'SortieController',
        ]);
    }




}
