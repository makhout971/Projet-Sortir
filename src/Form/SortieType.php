<?php

namespace App\Form;

use App\Entity\Sortie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('nom', TextType::class, [
                'label' => 'Nom : ',
                'required' => true

            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prenom : ',
                'required' => true

            ])
            ->add('dateHeureDebut', \DateTime::class, [
                'label' => 'Date et heure du début : ',
                'required' => true,

            ])
            ->add('duree', IntegerType::class, [
                'label' => 'Durée (en min, optionnel): ',


            ])
            ->add('dateLimiteInscription', \DateTime::class, [
                'required' => true,
                'label' => 'Date limite d\'inscription',

            ])
            ->add('nbInscriptionsMax', IntegerType::class, [
                'label' => 'Nombre max de participants : ',
                'required' => true
            ])
            ->add('infosSortie', TextType::class, [
                'label' => 'Résumé de l\évènement ',
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
