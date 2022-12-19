<?php

namespace App\Repository\Main;

use App\Entity\Main\StatutEmetteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StatutEmetteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatutEmetteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatutEmetteur[]    findAll()
 * @method StatutEmetteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatutEmetteurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatutEmetteur::class);
    }

    // /**
    //  * @return StatutEmetteur[] Returns an array of StatutEmetteur objects
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
    public function findOneBySomeField($value): ?StatutEmetteur
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
