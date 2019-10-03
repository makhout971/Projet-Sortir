<?php

namespace App\Controller;

use App\Entity\Etat;
use App\Entity\Lieu;
use App\Entity\Site;
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
    public function listeSorties(Request $request)
    {
        $userDansSortie = false;
        $repository = $this->getDoctrine()->getRepository(Sortie::class);
        $toutesLesSorties = $repository->findAll();






        return $this->render('sortie/display.html.twig', [

            'entities' => $toutesLesSorties,

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
        $userconnecte = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $sortieRepo = $em->getRepository(Sortie::class);
        $sortie = $sortieRepo->find($id);
        $sorties = $sortieRepo->findAll();

        foreach ($sorties as $s)
        {
            if (   $s->getUsers()->contains($userconnecte) )
            {
                $this->addFlash("echecInscriptionSortie", "Vous êtes déjà inscrit(e) à cette sortie");
            }
            elseif ( $s->getUsers()->count() == $s->getNbInscriptionMax() ){
                $this->addFlash("palierInscritsMax", "Nombre inscrits max atteint !");
            }

            return $this->render('sortie/display.html.twig',[
                "entities" =>$sorties
            ]);
        }



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

        foreach ($sorties as $s)
        {
            if (   !$s->getUsers()->contains($userconnecte) )
            {
                $this->addFlash("echecDesInscriptionSortie", "Vous n'êtes pas inscrit(e) à cette sortie, vous ne pouvez donc pas vous désinscrire");
            }

            return $this->render('sortie/display.html.twig',[
                "entities" =>$sorties
            ]);
        }
        $sortie->getUsers()->removeElement($userconnecte);

        $em->flush();

        $this->addFlash("successDesInscription", "Vous êtes bien désinscrit(e) !");

        return $this->render('sortie/display.html.twig',[
            "entities" =>$sorties
        ]);
    }
}
