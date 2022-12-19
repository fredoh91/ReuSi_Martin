<?php

namespace App\Repository\Main;

use App\Entity\Main\ReleveDecision;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ReleveDecision|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReleveDecision|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReleveDecision[]    findAll()
 * @method ReleveDecision[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReleveDecisionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReleveDecision::class);
    }

    // /**
    //  * @return ReleveDecision[] Returns an array of ReleveDecision objects
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
    public function findOneBySomeField($value): ?ReleveDecision
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
