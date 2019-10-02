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
     * @Route ("/afficher", name="afficherSorties")
     */
    public function listeSorties()
    {
        $userDansSortie = false;
        $repository = $this->getDoctrine()->getRepository(Sortie::class);
        $toutesLesSorties = $repository->findAll();

        foreach ($toutesLesSorties as $sortie)
        {
            if ($sortie->getUsers()->contains($this->getUser()))
            {
                $userDansSortie = true;
            }
        }
dump($toutesLesSorties);
        return $this->render('sortie/display.html.twig', [

            'entities' => $toutesLesSorties,
            'bool' => $userDansSortie
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


    /**
     * @Route("/inscription/{id}", name="inscriptionSortie")
     *  requirements={"id": "\d+"}
     */
    public function inscriptionSortie($id)
    {
        $em = $this->getDoctrine()->getManager();
        $sortieRepo = $em->getRepository(Sortie::class);
        $sortie = $sortieRepo->find($id);
        $sorties = $sortieRepo->findAll();

        $userconnecte = $this->getUser();

        $sortie->getUsers()->add($userconnecte);

        $em->flush();

        $this->addFlash("successDesInscription", "Vous êtes bien inscrit(e) !");

        return $this->render('sortie/display.html.twig',[
            "entities" =>$sorties
        ]);
    }


    /**
     * @Route("/desincription/{id}", name="desinscriptionSortie")
     *  requirements={"id": "\d+"}
     */
    public function desInscriptionSortie($id)
    {
        $em = $this->getDoctrine()->getManager();
        $sortieRepo = $em->getRepository(Sortie::class);
        $sortie = $sortieRepo->find($id);
        $sorties = $sortieRepo->findAll();

        $userconnecte = $this->getUser();

        $sortie->getUsers()->removeElement($userconnecte);

        $em->flush();

        $this->addFlash("successDesInscription", "Vous êtes bien désinscrit(e) !");

        return $this->render('sortie/display.html.twig',[
            "entities" =>$sorties
        ]);
    }
}
