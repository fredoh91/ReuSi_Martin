<?php

namespace App\Repository;

use App\Entity\PoleDS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PoleDS|null find($id, $lockMode = null, $lockVersion = null)
 * @method PoleDS|null findOneBy(array $criteria, array $orderBy = null)
 * @method PoleDS[]    findAll()
 * @method PoleDS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PoleDSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PoleDS::class);
    }

    // /**
    //  * @return PoleDS[] Returns an array of PoleDS objects
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
    public function findOneBySomeField($value): ?PoleDS
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
