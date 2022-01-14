<?php

namespace App\Repository\WeatherResources;

use App\Entity\WeatherResources\WeatherResource;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WeatherResource|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeatherResource|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeatherResource[]    findAll()
 * @method WeatherResource[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeatherResourceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeatherResource::class);
    }

    // /**
    //  * @return OpenWeatherMap[] Returns an array of OpenWeatherMap objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OpenWeatherMap
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
