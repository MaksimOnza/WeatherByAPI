<?php

namespace App\Form\ActionPages;

use App\Entity\ActionPages\GetWeather;
use App\Entity\WeatherResources\OpenwetherMap;
use App\Entity\WeatherResources\WeatherResource;
use App\Entity\WeatherResources\WeatherStack;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GetWeatherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('city', TextType::class, [
                'attr' => array(
                    'placeholder' => 'Enter a city'
                )
            ])
            ->add('resource', ChoiceType::class, [
                'placeholder' => 'Select Resources',
                'choices'     => [
                    'OpenWeatherMap' => (
                        new OpenwetherMap($options['accessKey'],
                            WeatherResource::WEATHER_RESOURCES['OWM'])),
                    'WeatherStack'   => (
                        new WeatherStack($options['accessKey'],
                            WeatherResource::WEATHER_RESOURCES['WS'])),
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => GetWeather::class,
            'accessKey' => '',
        ]);
    }
}
