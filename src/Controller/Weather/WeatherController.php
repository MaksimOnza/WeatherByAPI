<?php

namespace App\Controller\Weather;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class WeatherController
 *
 * @Route("/weather", name="weather_")
 *
 * @package App\Controller\common
 */
class WeatherController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('weather/weather/weather.html.twig', [
            'controller_name' => 'WeatherController',
        ]);
    }
}
