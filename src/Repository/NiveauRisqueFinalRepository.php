<?php

namespace App\Repository;

use App\Entity\NiveauRisqueFinal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NiveauRisqueFinal|null find($id, $lockMode = null, $lockVersion = null)
 * @method NiveauRisqueFinal|null findOneBy(array $criteria, array $orderBy = null)
 * @method NiveauRisqueFinal[]    findAll()
 * @method NiveauRisqueFinal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NiveauRisqueFinalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NiveauRisqueFinal::class);
    }

    // /**
    //  * @return NiveauRisqueFinal[] Returns an array of NiveauRisqueFinal objects
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
    public function findOneBySomeField($value): ?NiveauRisqueFinal
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
