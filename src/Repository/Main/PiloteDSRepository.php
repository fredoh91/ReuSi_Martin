<?php

namespace App\Repository\Main;

use App\Entity\Main\PiloteDS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PiloteDS|null find($id, $lockMode = null, $lockVersion = null)
 * @method PiloteDS|null findOneBy(array $criteria, array $orderBy = null)
 * @method PiloteDS[]    findAll()
 * @method PiloteDS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PiloteDSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PiloteDS::class);
    }

    // /**
    //  * @return PiloteDS[] Returns an array of PiloteDS objects
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
    public function findOneBySomeField($value): ?PiloteDS
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
