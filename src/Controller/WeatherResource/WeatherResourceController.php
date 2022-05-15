<?php

namespace App\Controller\WeatherResource;

use App\Entity\Weather\WeatherParams;
use App\Entity\WeatherResources\WeatherResource;
use App\Form\WeatherResources\WeatherResourceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class WeatherResourceController
 *
 * @Route("/weather/resource", name="weather_resource")
 *
 * @package App\Controller\WeatherResource
 */
class WeatherResourceController extends AbstractController
{
    /**
     * @Route("/create", name="create")
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(Request $request): Response
    {
        $resource = (new WeatherResource());
        $form = $this->createForm(WeatherResourceType::class, $resource)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('index_home');
        }

        return $this->render('WeatherResource/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
