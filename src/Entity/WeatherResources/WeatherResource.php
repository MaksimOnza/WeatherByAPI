<?php

namespace App\Entity\WeatherResources;

use App\Entity\Weather\Weather;
use App\Entity\Weather\WeatherParams;
use App\Repository\WeatherResources\WeatherResourceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WeatherResourceRepository::class)
 */
class WeatherResource
{
    const WEATHER_PARAMS = [
        'wind'        => 'WIND',
        'pressure'    => 'PRESSURE',
        'temperature' => 'TEMPERATURE',
        'description' => 'DESCRIPTION'
    ];

    const WEATHER_RESOURCES = [
      'OWM' => 'api.openweathermap.org',
      'WS'  => 'api.weatherstack.com'
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameResource;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apiKey;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $site;

    /**
     * @ORM\OneToOne(targetEntity=Weather::class, mappedBy="weatherResource", cascade={"persist", "remove"})
     */
    private $weather;

    /**
     * @ORM\Column(type="array")
     */
    private $params = [];

    /**
     * @param string $nameResource
     * @param string $accessKey
     */
    public function __construct(string $accessKey, string $nameResource = 'Select resource')
    {
        $this->nameResource = $nameResource;

        $this->setApiKey($accessKey);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->nameResource;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getNameResource(): ?string
    {
        return $this->nameResource;
    }

    /**
     * @param string $nameResource
     *
     * @return $this
     */
    public function setNameResource(string $nameResource): self
    {
        $this->nameResource = $nameResource;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getApiKey(): ?string
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     *
     * @return $this
     */
    public function setApiKey(string $apiKey): self
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSite(): ?string
    {
        return $this->site;
    }

    /**
     * @param string $site
     *
     * @return $this
     */
    public function setSite(string $site): self
    {
        $this->site = $site;

        return $this;
    }

    /**
     * @return Weather|null
     */
    public function getWeather(): ?Weather
    {
        return $this->weather;
    }

    /**
     * @param Weather|null $weather
     *
     * @return $this
     */
    public function setWeather(?Weather $weather): self
    {
        // unset the owning side of the relation if necessary
        if ($weather === null && $this->weather !== null) {
            $this->weather->setWeatherResource(null);
        }

        // set the owning side of the relation if necessary
        if ($weather !== null && $weather->getWeatherResource() !== $this) {
            $weather->setWeatherResource($this);
        }

        $this->weather = $weather;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getParams(): ?array
    {
        return $this->params;
    }

    /**
     * @param array $params
     *
     * @return $this
     */
    public function setParams(array $params): self
    {
        $this->params = $params;

        return $this;
    }
}
