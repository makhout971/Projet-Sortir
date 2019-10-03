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
        $message = null;
        $sortie = new Sortie();
        $sortie->setInscriptionOuverte(true);
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
            'message' => $message
        ]);
    }


    /**
     * @Route("/annuler/{id} ", name="annulerSortie")
     */
    public function supprimerSortie($id, EntityManagerInterface $em)
    {
        $message = null;

        $sortieRepo = $this->getDoctrine()->getRepository(Sortie::class);
        $etatRepo = $this->getDoctrine()->getRepository(Etat::class);
        $etatCloture = $etatRepo->find(6);

        $sortie = $sortieRepo->find($id);
        $sorties = $sortieRepo->findAll();
        if ($sortie->getEtat()->getId() == $etatRepo->find(2)->getId()){
            $sortie->setEtat($etatCloture);
            $sorties = $sortieRepo->findAll();
            $em->persist($sortie);
            $em ->flush();
            $message = "Votre sortie \"".$sortie->getNom() . "\" a été annulée.";
        }
        else{
            $message = "Vous ne pouvez pas annuler une sortie passée et/ou dont les inscriptions sont clôturées";
        }
     //   $this->addFlash("annulation", "Votre sortie a été annulée");
        return $this->render('sortie/display.html.twig', [
            "message" => $message,
            "entities" => $sorties
        ]);
    }

    /**
     * @Route ("/afficher", name="afficherSorties")
     */
    public function listeSorties(Request $request)
    {
        $message = null;
        $userDansSortie = false;
        $repository = $this->getDoctrine()->getRepository(Sortie::class);
        $toutesLesSorties = $repository->findAll();






        return $this->render('sortie/display.html.twig', [

            'entities' => $toutesLesSorties,
            "message" => $message
        ]);
    }


    /**
     * @Route ("/afficher/{id}", name="afficherUneSortie")
     *  requirements={"id": "\d+"}
     */
    public function uneSortie($id)
    {
        $message = null;
        $repository = $this->getDoctrine()->getRepository(Sortie::class);
        $sortie = $repository->find($id);
        $userconnecte = $this->getUser();

        if (  $sortie->getUsers()->contains($userconnecte) )
        {
            $message = "Vous êtes déjà inscrit(e) à cette sortie !";
        }
       elseif ( $sortie->getUsers()->count() == $sortie->getNbInscriptionMax() ){
           $message = "Nombre inscrits max atteint !";
        }


        return $this->render('sortie/detail.html.twig', [

            'sortie' => $sortie,
            'message' => $message,
        ]);
    }


    /**
     * @Route("/inscription/{id}", name="inscriptionSortie")
     *  requirements={"id": "\d+"}
     */
    public function inscriptionSortie($id)
    {
        $message = null;
        $userconnecte = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $sortieRepo = $em->getRepository(Sortie::class);
        $sortie = $sortieRepo->find($id);
        $sorties = $sortieRepo->findAll();


        if (  $sortie->getUsers()->contains($userconnecte) )
        {
            $message = "Vous êtes déjà inscrit(e) à cette sortie (". $sortie->getNom() . ").";
//            $this->addFlash("echecInscriptionSortie", "Vous êtes déjà inscrit(e) à cette sortie");
            return $this->render('sortie/display.html.twig', [
                "message" => $message,
                "entities" => $sorties,
            ]);

        }
        elseif ( $sortie->getNbInscriptionMax() == $sortie->getUsers()->count())
        {
            $message = "Nombre de participants max atteint pour cette sortie (". $sortie->getNom() .").";
//            $this->addFlash("echecInscriptionSortie", "Vous êtes déjà inscrit(e) à cette sortie");
            return $this->render('sortie/display.html.twig', [
                "message" => $message,
                "entities" => $sorties,
            ]);
        }
        elseif ($sortie->getEtat()->getId() != 2 )
        {
            $message = "Inscription à cette sortie (". $sortie->getNom() .") clôturée !.";
        }

        $sortie->getUsers()->add($userconnecte);

        $em->flush();

        $this->addFlash("successDesInscription", "Vous êtes bien inscrit(e) à la sortie \" " . $sortie->getNom() . "\" !"   );

        return $this->render('sortie/display.html.twig',[
            "entities" =>$sorties,
            "message" => $message
        ]);
    }


    /**
     * @Route("/desincription/{id}", name="desinscriptionSortie")
     *  requirements={"id": "\d+"}
     */
    public function desInscriptionSortie($id)
    {
        $message = null;
        $em = $this->getDoctrine()->getManager();
        $sortieRepo = $em->getRepository(Sortie::class);
        $sortie = $sortieRepo->find($id);
        $sorties = $sortieRepo->findAll();

        $userconnecte = $this->getUser();

        if ( !$sortie->getUsers()->contains($userconnecte)){
            $message = "Vous n'êtes pas inscrit(e) à cette sortie, vous ne pouvez donc pas vous désinscrire\"";
            return $this->render('sortie/display.html.twig',[
                "entities" =>$sorties,
                "message" => $message
            ]);
        }
        else{
            $sortie->getUsers()->removeElement($userconnecte);

            $em->flush();

            $this->addFlash("successDesInscription", "Vous êtes bien désinscrit(e) de la sortie \" ". $sortie->getNom() . "\" !");
            return $this->render('sortie/display.html.twig',[
                "entities" =>$sorties,
                "message" => $message
            ]);
        }




    }


}
