<?php

namespace App\Repository;

use App\Entity\ResourceManager;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ResourceManager|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResourceManager|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResourceManager[]    findAll()
 * @method ResourceManager[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResourceManagerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResourceManager::class);
    }

    // /**
    //  * @return ResourceManager[] Returns an array of ResourceManager objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ResourceManager
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
