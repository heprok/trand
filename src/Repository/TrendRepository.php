<?php

namespace App\Repository;

use App\Entity\Trend;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Trend|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trend|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trend[]    findAll()
 * @method Trend[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrendRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trend::class);
    }

    // /**
    //  * @return Trend[] Returns an array of Trend objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Trend
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
