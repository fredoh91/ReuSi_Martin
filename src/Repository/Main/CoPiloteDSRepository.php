<?php

namespace App\Repository\Main;

use App\Entity\Main\CoPiloteDS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CoPiloteDS|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoPiloteDS|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoPiloteDS[]    findAll()
 * @method CoPiloteDS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoPiloteDSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoPiloteDS::class);
    }

    // /**
    //  * @return CoPiloteDS[] Returns an array of CoPiloteDS objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CoPiloteDS
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
