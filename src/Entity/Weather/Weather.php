<?php

namespace App\Entity\Weather;

use App\Entity\WeatherResources\WeatherResource;
use App\Repository\Weather\WeatherRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WeatherRepository::class)
 */
class Weather
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $townName;

    /**
     * @ORM\OneToOne(targetEntity=WeatherResource::class, inversedBy="weather", cascade={"persist", "remove"})
     */
    private $weatherResource;

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
    public function getTownName(): ?string
    {
        return $this->townName;
    }

    /**
     * @param string $townName
     *
     * @return $this
     */
    public function setTownName(string $townName): self
    {
        $this->townName = $townName;

        return $this;
    }

    /**
     * @return WeatherResource|null
     */
    public function getWeatherResource(): ?WeatherResource
    {
        return $this->weatherResource;
    }

    /**
     * @param WeatherResource|null $weatherResource
     *
     * @return $this
     */
    public function setWeatherResource(?WeatherResource $weatherResource): self
    {
        $this->weatherResource = $weatherResource;

        return $this;
    }
}
