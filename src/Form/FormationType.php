<?php

namespace App\Form;

use App\Entity\Type;
use App\Entity\Centre;
use App\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intituleFormation')
            ->add('nbStagiaires')
            ->add('debutFormation', DateType::class, [
                'format' => 'dd-MM-yy',
            ])
            ->add('finFormation', DateType::class, [
                'format' => 'dd-MM-yy',
            ])
            ->add('couleurFormation', ColorType::class)
            ->add('Centre', EntityType::class, [
                'class' => Centre::class,
                'choice_label' => 'nomCentre',
                ])
            ->add('Type', EntityType::class, [
                'class' => Type::class,
                'choice_label' => 'nomType',
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
