<?php

namespace App\Entity\WeatherResources;

class WeatherStack extends WeatherResource implements WeatherHandleData
{
    private const END_POINT      = '/current';
    private const URI_PARAMETERS = [
        'query'      => 'query',
        'name_id'    => 'access_key',
        'end_point'  => self::END_POINT,
        'access_key' => '719d3fe6203f73509524e0bca348cb53',
    ];

    /**
     * @var string $temperature
     */
    private $temperature;

    /**
     * @return string
     */
    public function getEndPoint(): string
    {
        return self::END_POINT;
    }

    /**
     * @return string[]
     */
    public function getUriParameters(): array
    {
        return self::URI_PARAMETERS;
    }
    /**
     * @return int|string
     */
    public function getTemperature(): string
    {
        return $this->temperature;
    }

    /**
     * @param array $temperature
     *
     * @return $this
     */
    public function setTemperature(array $temperature): self
    {
        $this->temperature = $temperature['current']->temperature;

        return $this;
    }
}
