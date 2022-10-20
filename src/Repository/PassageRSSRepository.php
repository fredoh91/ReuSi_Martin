<?php

namespace App\Repository;

use App\Entity\PassageRSS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PassageRSS|null find($id, $lockMode = null, $lockVersion = null)
 * @method PassageRSS|null findOneBy(array $criteria, array $orderBy = null)
 * @method PassageRSS[]    findAll()
 * @method PassageRSS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PassageRSSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PassageRSS::class);
    }

    // /**
    //  * @return PassageRSS[] Returns an array of PassageRSS objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PassageRSS
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
