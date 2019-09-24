<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
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
            ->add('password', PasswordType::class,[
                'label' => 'Mot de passe',
                'attr' => [
                    'readOnly' => 'true'
                ]
            ])
            ->add('ville', ChoiceType::class,[
                'label' => 'Ville de rattachement',
                'choices' => [
                    'Saint-Herblain' => 'Saint-Herblain',
                    'Chartres de Bretagne' => 'Chartres de Bretagne',
                    'La Roche sur Yon' => 'La Roche sur Yon',
                    'Niort' => 'Niort',
                ],
                'attr' => [
                    'readOnly' => 'true'
                ]
            ])
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
