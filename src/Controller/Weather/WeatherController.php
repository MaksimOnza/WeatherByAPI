<?php

namespace App\Controller\Weather;

use App\Entity\ActionPages\GetWeather;
use App\Form\ActionPages\GetWeatherType;
use App\Handler\GetResourceHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class WeatherController
 *
 * @package App\Controller\common
 *
 * @Route("/", name="weather_")
 */
class WeatherController extends AbstractController
{
    /**
     * @var GetResourceHandler $handler
     */
    private $handler;

    public function __construct(GetResourceHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(Request $request): Response
    {
        $form = $this
            ->createForm(GetWeatherType::class, new GetWeather())
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($resource = $form->get('resource')->getNormData()) {
                $urlParameters = $resource->getUriParameters();
                $data          = $this->handler->setData($form, $urlParameters);

                if (empty($data)) {
                    return $this->render('weather/get_weather.html.twig', [
                        'form' => $form->createView(),
                    ]);
                }

                $resource->setTemperature($data);
                $resource->setWindSpeed($data);
                $resource->setCity($data);

                $weatherParams = [
                    'temp' => $this->handler->formatTemperature($resource->getTemperature($data)),
                    'city' => $resource->getCity($data),
                    'windSpeed' => $resource->getWindSpeed($data),
                ];

                return $this->render('weather/get_weather.html.twig', [
                    'form' => $form->createView(),
                    'data' => $weatherParams,
                ]);
            }
        }

        return $this->render('weather/get_weather.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
