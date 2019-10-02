<?php

namespace App\Controller;

use App\Entity\Etat;
use App\Entity\Lieu;
use App\Entity\Sortie;
use App\Form\LieuType;
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
//        $lieu =new Lieu();
//        $lieuForm = $this->createForm(LieuType::class,$lieu);
        //
        $site = $this->getUser()->getSite();
        $sortie->setSite($site);

//        $lieu = getSortie()->getLieu();
//        $sortie->setLieu($lieu);

        $user = $this->getUser();
        $sortie->setUserOrganisateur($user);



        $sortieForm->handleRequest($request);
        if ($sortieForm->isSubmitted() &&  $sortieForm->isValid()){
            $em->persist($sortie);
            $em->flush();

            $this-> addFlash("successSortie","Sortie créée avec succès !");
//            TODO : redirige vers la page souhaitée
            return $this->redirectToRoute("user_home");
        }

        return $this->render('sortie/add.html.twig', [
            'sortieForm' => $sortieForm->createView(),
        ]);
    }


    /**
     * @Route("/inscription/{id}", name="inscriptionSortie")
     *  requirements={"id": "\d+"}
     */
public function inscriptionSortie($id)
{
    $em = $this->getDoctrine()->getManager();
    $sortieRepo = $em->getRepository(Sortie::class);
    $sortie = $sortieRepo->find($id);

    $userconnecte = $this->getUser();

    $sortie->getUsers()->add($userconnecte);


    $this->addFlash("successInscription", "Vous êtes bien inscrit !");

   return $this->render('sortie/display.html.twig');
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


    /**
     * @Route ("/afficher/{id}", name="afficherUneSortie")
     *  requirements={"id": "\d+"}
     */
    public function uneSortie($id)
    {
        $repository = $this->getDoctrine()->getRepository(Sortie::class);
        $sortie = $repository->find($id);

        return $this->render('sortie/detail.html.twig', [

            'sortie' => $sortie
        ]);
    }


}
