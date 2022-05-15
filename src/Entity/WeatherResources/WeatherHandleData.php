<?php

namespace App\Entity\WeatherResources;

interface WeatherHandleData
{
    /**
     * @return string
     */
    function getEndPoint(): string;

    /**
     * @return array
     */
    function getUriParameters(): array;

}