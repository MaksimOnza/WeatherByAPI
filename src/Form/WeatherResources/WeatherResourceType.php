<?php

namespace App\Form\WeatherResources;

use App\Entity\WeatherResources\WeatherResource;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WeatherResourceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameResource', TextType::class)
            ->add('apiKey', TextType::class)
            ->add('site', TextType::class)
            ->add('params', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => WeatherResource::class,
        ]);
    }
}
