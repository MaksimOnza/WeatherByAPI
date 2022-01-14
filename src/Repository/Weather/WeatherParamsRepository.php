<?php

namespace App\Repository\Weather;

use App\Entity\Weather\WeatherParams;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WeatherParams|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeatherParams|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeatherParams[]    findAll()
 * @method WeatherParams[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeatherParamsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeatherParams::class);
    }

    // /**
    //  * @return WeatherParams[] Returns an array of WeatherParams objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WeatherParams
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
