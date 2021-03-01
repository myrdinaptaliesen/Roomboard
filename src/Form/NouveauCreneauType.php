<?php

namespace App\Form;

use App\Entity\Creneau;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class NouveauCreneauType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('debutCreneau', DateType::class, [
                'format' => 'dd-MM-yy',
            ])
            ->add('finCreneau', DateType::class, [
                'format' => 'dd-MM-yy',
            ])
            ->add('Formation', EntityType::class, [
                'class' => Formation::class,
                'choice_label' => 'intituleFormation',
                ])
            ->add('Place')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Creneau::class,
        ]);
    }
}
