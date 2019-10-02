<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HomeType extends AbstractType
{
//    public function buildForm(FormBuilderInterface $builder, array $options)
//    {
//        $builder->add('sorties', ChoiceType::class, array(
//            'choices' => array(
//                'site'=>'',
//                'manger'=>'oublier',
//                'sortir'=>'fumer',
//
//            ),
//
//        'multiple'=> 'true',
//        'expanded'=> 'true',
//        ));
//
//        $builder->add('sorties',TextType::class)
//                ->add('findBy',  ChoiceType::class, array(
//                'choices'  => array(
//                        'Commence par' => *une valeur*,
//                'Contient' => *une autre valeur*,
//            ),
//            'mapped'  => false
//        )
//        ->add('Rechercher',SubmitType::class);
//
//    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
