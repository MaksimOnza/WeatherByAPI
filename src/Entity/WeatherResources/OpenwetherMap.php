<?php

namespace App\Entity\WeatherResources;

class OpenwetherMap extends WeatherResource implements WeatherHandleData
{
    private const END_POINT      = '/data/2.5/weather';
    private const URI_PARAMETERS = [
      'query'      => 'q',
      'name_id'    => 'appid',
      'end_point'  => self::END_POINT,
    ];

    /**
     * @var string $temperature
     */
    private $temperature;

    /**
     * @var string $windSpeed
     */
    private $windSpeed;

    /**
     * @var string $city
     */
    private $city;

    /**
     * @param string $accessKey
     * @param string $nameResource
     */
    public function __construct(string $accessKey, string $nameResource)
    {
        parent::__construct($accessKey, $nameResource);
    }

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
     * @param array $data
     *
     * @return $this
     */
    public function setTemperature(array $data): self
    {
        $this->temperature = $data['main']->temp;

        return $this;
    }

    /**
     * @return string
     */
    public function getWindSpeed(): string
    {
        return $this->windSpeed;
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function setWindSpeed(array $data): self
    {
        $this->windSpeed = $data['wind']->speed;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function setCity(array $data): self
    {
        $this->city = $data['name'];

        return $this;
    }
}
