<?php

namespace App\Repository;

use App\Entity\NiveauRisqueInitial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NiveauRisqueInitial|null find($id, $lockMode = null, $lockVersion = null)
 * @method NiveauRisqueInitial|null findOneBy(array $criteria, array $orderBy = null)
 * @method NiveauRisqueInitial[]    findAll()
 * @method NiveauRisqueInitial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NiveauRisqueInitialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NiveauRisqueInitial::class);
    }

    // /**
    //  * @return NiveauRisqueInitial[] Returns an array of NiveauRisqueInitial objects
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
    public function findOneBySomeField($value): ?NiveauRisqueInitial
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
