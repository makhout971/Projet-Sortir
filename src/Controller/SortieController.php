<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\SortieType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
    public function addSortie(Request $request, EntityManagerInterface $em)
    {
        $sortie = new Sortie();
        $form = $this->createForm(SortieType::class, $sortie);
        $form->handleRequest($request);

        if ($form->isSubmitted() &&  $form->isValid()){
            $em->persist($sortie);
            $em->flush();
        }






        return $this->render('sortie/add.html.twig', [
            'sortieForm' => $form->createView(),
        ]);
    }




}
