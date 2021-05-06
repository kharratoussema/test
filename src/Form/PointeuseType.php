<?php

namespace App\Form;

use App\Entity\Pointeuse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Entity\User;
use App\Entity\Chantier;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
class PointeuseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user', EntityType::class, [
                'class' => User::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.name', 'ASC');
                },
                'choice_label' => 'name',
            ])
            ->add('chantiers', EntityType::class, [
                'class' => Chantier::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.name', 'ASC');
                },
                'choice_label' => 'name',
            ])
            ->add('date',DateType::class, [
                'required' => true,  
            ])
            ->add('duree',TextType::class, [
                'required' => true,               
            ])
            ->add('week',HiddenType::class, [
                'required' => false,                        
            ])       
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pointeuse::class,
        ]);
    }
}
