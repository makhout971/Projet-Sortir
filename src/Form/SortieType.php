<?php

namespace App\Form;

use App\Entity\Lieu;
use App\Entity\Site;
use App\Entity\Sortie;
use App\Entity\User;
use App\Entity\Ville;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormTypeInterface;
use App\Form\VilleType;
use App\Form\LieuType;



class SortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('nom', TextType::class, [
                'label' => 'Nom : ',
                'required' => true

            ])
            ->add('dateHeureDebut', DateTimeType::class, [
                'label' => 'Date et heure du début : ',
                'required' => true,

            ])

            ->add('dateLimiteInscription', DateType::class, [
                'required' => true,
                'label' => 'Date limite d\'inscription',

            ])
            ->add('dateHeureFin', DateTimeType::class, [
                'label' => 'Date et heure de fin'

            ])
            ->add('nbInscriptionMax', IntegerType::class, [
                'label' => 'Nombre max de participants : ',
                'required' => true,
//                'min' => 1
            ])
            ->add('infosSortie', TextType::class, [
                'label' => 'Résumé de l\'évènement ',
                'required' => true
            ])

//            TODO: FORMULAIRE DANS UN FORMULAIRE POUR VILLE ET LIEU
            ->add('lieu', LieuType::class,[

            ])
//                'class'=>Lieu::class,
//                'label' =>'Lieu :',
//                'required'=>true,
////                'label' =>'Rue :',
////                'required'=>true ,
////                'label' =>'Ville :',
////                'required'=>true ,
////                'label' =>'Code Postal :',
////                'required'=>true
//            ])
            ->add('site', EntityType::class, [

                'class' => Site::class,
                'choice_label' => 'nom',
                'required' => true

            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => Sortie::class,
        ]);
    }
}
