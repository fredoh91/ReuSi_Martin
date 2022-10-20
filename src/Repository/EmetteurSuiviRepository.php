<?php

namespace App\Repository;

use App\Entity\EmetteurSuivi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EmetteurSuivi|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmetteurSuivi|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmetteurSuivi[]    findAll()
 * @method EmetteurSuivi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmetteurSuiviRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmetteurSuivi::class);
    }

    // /**
    //  * @return EmetteurSuivi[] Returns an array of EmetteurSuivi objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EmetteurSuivi
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
