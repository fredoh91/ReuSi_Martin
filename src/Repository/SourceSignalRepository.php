<?php

namespace App\Repository;

use App\Entity\SourceSignal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SourceSignal|null find($id, $lockMode = null, $lockVersion = null)
 * @method SourceSignal|null findOneBy(array $criteria, array $orderBy = null)
 * @method SourceSignal[]    findAll()
 * @method SourceSignal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SourceSignalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SourceSignal::class);
    }

    // /**
    //  * @return SourceSignal[] Returns an array of SourceSignal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SourceSignal
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
