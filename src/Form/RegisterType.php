<?php

namespace App\Form;

use App\Entity\Site;
use App\Entity\User;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\Tests\Form\Type\EntityTypePerformanceTest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'Pseudo : ',
                'required' => true

            ])
            ->add('nom', TextType::class, [
                'label' => 'Nom : ',
                'required' => true

            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prenom : ',
                'required' => true

            ])
            ->add('tel', TextType::class, [
                'label' => 'Téléphone : '

            ])
            ->add('email', EmailType::class, [
                'label' => 'Email : ',
                'required' => true

            ])
            ->add('password', RepeatedType::class, [
                    'type' => PasswordType::class,
//                    'invalid_message' =>'Les mots de passe ne correspondent pas!',
                    'required' => true,
                    'first_options' => array('label' => 'Mot de passe : '),
                    'second_options' => array('label' => 'Répétez le mot de passe : ')
                ])
            ->add('site', EntityType::class, [

                    'class' => Site::class,
                    'choice_label' => 'nom'
                ,

                'required' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }



}
