<?php

namespace App\Repository\Codex;

use App\Entity\Codex\SAVU;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SAVU|null find($id, $lockMode = null, $lockVersion = null)
 * @method SAVU|null findOneBy(array $criteria, array $orderBy = null)
 * @method SAVU[]    findAll()
 * @method SAVU[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SAVURepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SAVU::class);
    }

    // /**
    //  * @return SAVU[] Returns an array of SAVU objects
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
    public function findOneBySomeField($value): ?SAVU
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
