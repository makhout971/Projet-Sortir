<?php

namespace App\Form;

use App\Entity\Site;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\Tests\Form\Type\EntityTypePerformanceTest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('username', TextType::class,[
                'label' => 'Pseudo',
                'attr' => [
                    'readOnly' => 'true'

                ]
            ])
            ->add('prenom', TextType::class,[
                'label' => 'Prénom',
                'attr' => [
                    'readOnly' => 'true'
                ]
            ])
            ->add('nom', TextType::class,[
                'label' => 'Nom',
                'attr' => [
                    'readOnly' => 'true'
                ]
            ])
            ->add('tel', TextType::class,[
                'label' => 'Téléphone',
                'attr' => [
                    'readOnly' => 'true'
                ]
            ])
            ->add('email', EmailType::class,[
                'label' => 'Email',
                'attr' => [
                    'readOnly' => 'true'
                ]
            ])
        ->add('password', RepeatedType::class, [
            'type' => PasswordType::class,
            'first_options' => ['label' => 'Mot de passe'],
            'second_options' => ['label' => 'Répétez votre mot de passe'],
            'required' => 'true'
        ])

            ->add('site', EntityType::class, [
                
                    'class' => Site::class,
                    'choice_label' => 'nom',
                    'required' => true

                ])



//            ->add('ville', ChoiceType::class,[
//                'label' => 'Ville de rattachement',
//                'choices' => [
//                    'Saint-Herblain' => 'Saint-Herblain',
//                    'Chartres de Bretagne' => 'Chartres de Bretagne',
//                    'La Roche sur Yon' => 'La Roche sur Yon',
//                    'Niort' => 'Niort',
//                ],
//                'attr' => [
//                    'readOnly' => 'true'
//                ]
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => User::class,
        ]);
    }
}
