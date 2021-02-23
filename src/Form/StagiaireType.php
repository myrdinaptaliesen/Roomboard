<?php

namespace App\Form;

use App\Entity\Place;
use App\Entity\Formation;
use App\Entity\Stagiaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StagiaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomStagiaire')
            ->add('prenomStagiaire')
            ->add('Place', EntityType::class, [
                'class' => Place::class,
                'choice_label' => 'nomPlace',
                ])
            ->add('Formation', EntityType::class, [
                'class' => Formation::class,
                'choice_label' => 'intituleFormation',
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stagiaire::class,
        ]);
    }
}
