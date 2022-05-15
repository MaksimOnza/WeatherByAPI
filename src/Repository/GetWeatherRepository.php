<?php

namespace App\Repository;

use App\Entity\ActionPages\GetWeather;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GetWeather|null find($id, $lockMode = null, $lockVersion = null)
 * @method GetWeather|null findOneBy(array $criteria, array $orderBy = null)
 * @method GetWeather[]    findAll()
 * @method GetWeather[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GetWeatherRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GetWeather::class);
    }

    // /**
    //  * @return GetWeather[] Returns an array of GetWeather objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GetWeather
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
