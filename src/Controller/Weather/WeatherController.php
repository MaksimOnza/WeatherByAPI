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
                $data          = $this->handler->getData([
                    'city'       => $form->getData()->getCity(),
                    'resource'   => $form->getData()->getResource(),
                    'query_name' => $urlParameters['query'],
                    'end_point'  => $urlParameters['end_point'],
                    'name_id'    => $urlParameters['name_id'],
                    'access_key' => $urlParameters['access_key'],
                ]);

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

    function get_json($data)
    {
        $data = json_decode($data, true);
        $json_data = array(
            "temp"=> (int)(($data['main']['temp'])-273),
            "desc"=> $data['weather'][0]['description']
        );
        return $json_data;
    }
}
