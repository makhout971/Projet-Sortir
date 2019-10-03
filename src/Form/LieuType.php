<?php

namespace App\Form;

use App\Entity\Lieu;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LieuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomLieu', TextType::class,[
                'label' => 'Nom: ',
                'required' => true,
            ])
            ->add('rue', TextType::class,[
                'label' => 'Rue: ',
                'required' => true,
            ])
//            ->add('ville', TextType::class,[
//                'label' => 'Ville: ',
//                'required' => true,
//            ])
//            ->add('code', IntegerType::class,[
//                'label' => 'Code postal: ',
//                'required' => true,
//            ])
            ->add('ville', VilleType::class,[

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lieu::class,
        ]);
    }
}
