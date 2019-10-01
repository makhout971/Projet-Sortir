<?php

namespace App\Controller;

use App\Entity\Etat;
use App\Entity\Sortie;
use App\Form\SortieType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sortie")
 */
class SortieController extends Controller
{

    /**
     * @Route("/creer", name="sortie")
     */
    public function addSortie(Request $request, EntityManagerInterface $em)
    {
        $sortie = new Sortie();
        $sortie->setInscriptionOuverte(false);
        $etatRepo = $this->getDoctrine()->getRepository(Etat::class);
        $e = $etatRepo->find(1);
        $sortie->setEtat($e);
        $sortieForm = $this->createForm(SortieType::class, $sortie);


        $site = $this->getUser()->getSite();
        $sortie->setSite($site);

        $user = $this->getUser();
        $sortie->setUserOrganisateur($user);


        $sortieForm->handleRequest($request);
        if ($sortieForm->isSubmitted() && $sortieForm->isValid()) {
            $em->persist($sortie);
            $em->flush();

            $this->addFlash("successSortie", "Sortie créée avec succès !");
//            TODO : redirige vers la page souhaitée
            return $this->redirectToRoute("sortie");
        }

        return $this->render('sortie/add.html.twig', [
            'sortieForm' => $sortieForm->createView(),
        ]);
    }

    /**
     * @Route ("/afficher", name="afficherSorties")
     */
    public function listeSorties()
{
    $repository = $this->getDoctrine()->getRepository(Sortie::class);
    $toutesLesSorties = $repository->findAll();

    return $this->render('sortie/display.html.twig', [

        'entities' => $toutesLesSorties
    ]);
}


}
