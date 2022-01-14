<?php

namespace App\Entity\Weather;

use App\Repository\Weather\WeatherParamsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WeatherParamsRepository::class)
 */
class WeatherParams
{
    const WEATHER_PARAMS = [
        'wind'        => 'WIND',
        'pressure'    => 'PRESSURE',
        'temperature' => 'TEMPERATURE',
        'description' => 'DESCRIPTION'
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wind;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pressure;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $temperature;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

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
    public function getWind(): ?string
    {
        return $this->wind;
    }

    /**
     * @param string|null $wind
     *
     * @return $this
     */
    public function setWind(?string $wind): self
    {
        $this->wind = $wind;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPressure(): ?string
    {
        return $this->pressure;
    }

    /**
     * @param string|null $pressure
     *
     * @return $this
     */
    public function setPressure(?string $pressure): self
    {
        $this->pressure = $pressure;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTemperature(): ?string
    {
        return $this->temperature;
    }

    /**
     * @param string|null $temperature
     *
     * @return $this
     */
    public function setTemperature(?string $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
