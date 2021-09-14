<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Coach;
use App\Entity\Training;
use App\Form\SearcheableEntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class TrainingType extends AbstractType
{

    public function __construct(UrlGeneratorInterface $url)
    {
        $this->url = $url;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom du cours :',
            ])

            ->add('date', DateTimeType::class, [
                'label' => 'Débute à :',
                // 'format' => 'dd/MM/yyyy H:i',
            ])
            ->add('coach', EntityType::class, [
                'label' => 'Coach',
                'class' => Coach::class,
            ])
            ->add('users', EntityType::class, [
                'label' => 'Adhérent(s)',
                'multiple' => true,
                'class' => User::class,
                // 'search' => $this->url->generate('users'),
                // 'label_property' => 'nom',
                // 'value_property' => 'id',
            ]);
        // ->add('users', EntityType::class, [
        //     'label' => 'Adhérent(s)',
        //     'multiple' => true,
        //     'class' => User::class,
        // ]);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Training::class,
        ]);
    }
}
