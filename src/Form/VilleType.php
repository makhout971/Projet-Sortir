<?php

namespace App\Form;

use App\Entity\Ville;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VilleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class,[
                'label' => 'Ville : ',
                    'required' => true
                ]
                )

            ->add('codePostal',  IntegerType::class,[
                'label' => 'Code Postal : ',
                'required' => true
    ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => Ville::class
        ]);
    }
}
