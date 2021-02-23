<?php

namespace App\Form;

use App\Entity\Place;
use App\Entity\Creneau;
use App\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreneauType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('debutCreneau')
            ->add('finCreneau')
            ->add('Formation', EntityType::class, [
                'class' => Formation::class,
                'choice_label' => 'intituleFormation',
                ])
            ->add('Place', EntityType::class, [
                'class' => Place::class,
                'choice_label' => 'nomPlace',
                ])        
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Creneau::class,
        ]);
    }
}
