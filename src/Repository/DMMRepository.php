<?php

namespace App\Repository;

use App\Entity\DMM;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DMM|null find($id, $lockMode = null, $lockVersion = null)
 * @method DMM|null findOneBy(array $criteria, array $orderBy = null)
 * @method DMM[]    findAll()
 * @method DMM[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DMMRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DMM::class);
    }

    // /**
    //  * @return DMM[] Returns an array of DMM objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DMM
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
