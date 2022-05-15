<?php

namespace App\Form\Weather;

use App\Entity\Weather\WeatherParams;
use App\Entity\WeatherResources\WeatherResource;
use App\Repository\WeatherResources\WeatherResourceRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class WeatherType
 * @package App\Form\WeatherType
 */
class WeatherType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('townName', TextType::class,[
                'required' => false
            ])
            ->add('weatherResource', EntityType::class, [
                'class'         => WeatherResource::class,
                'placeholder'   => 'Select Resource',
                'query_builder' => function (WeatherResourceRepository $openWeatherMapRepository) use ($options) {
                    return $openWeatherMapRepository->createQueryBuilder('r');
                }
            ])
            ->add('weatherParams', ChoiceType::class, [
                'required' => false,
                'expanded' => true,
                'multiple' => true,
                'choices'  => [
                    'Wind'        => WeatherResource::WEATHER_PARAMS['wind'],
                    'Pressure'    => WeatherResource::WEATHER_PARAMS['pressure'],
                    'Temperature' => WeatherResource::WEATHER_PARAMS['temperature'],
                    'Description' => WeatherResource::WEATHER_PARAMS['description'],
                ]
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
