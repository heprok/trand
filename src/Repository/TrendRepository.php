<?php

namespace App\Repository;

use App\Entity\Trend;
use DatePeriod;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
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

    /**
     * Подготавливает запрос для периода
     *
     * @param DatePeriod $period
     * @return QueryBuilder
     */
    private function getQueryFromPeriod(DatePeriod $period): QueryBuilder
    {
        $qb = $this->createQueryBuilder('t')
            ->where('t.drec BETWEEN :start AND :end')
            ->setParameter('start', $period->getStartDate()->format(DATE_ATOM))
            ->setParameter('end', $period->end ? $period->getEndDate()->format(DATE_ATOM) : date(DATE_ATOM))
            ->orderBy('t.drec', 'ASC');

        return $qb;
    }

    /**
     * @return Trend[] Returns an array of Trend objects
     */
    public function findByAttribute(DatePeriod $period, array $attributes): array
    {
        return $this->getQueryFromPeriod($period)
            ->andWhere('t.attribute IN (:attributes)')
            ->setParameter('attributes', $attributes)
            ->getQuery()
            ->getResult();
    }

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

    public function findOneByAttributeFirstValue(DatePeriod $period, int $attributeId): ?Trend
    {
        return $this->getQueryFromPeriod($period)
            ->andWhere('t.attribute = :attributeId')
            ->setParameter('attributeId', $attributeId)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findOneByAttributeLastValue(DatePeriod $period, int $attributeId) : Trend
    {
        return $this->createQueryBuilder('t')
            ->where('t.drec <= :drec')            
            ->andWhere('t.attribute = :attributeId')
            ->setParameter('attributeId', $attributeId)
            ->setParameter('drec', $period->getStartDate()->format(DATE_ATOM))
            ->orderBy('t.drec', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
