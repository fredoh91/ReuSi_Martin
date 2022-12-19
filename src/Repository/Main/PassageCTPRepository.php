<?php

namespace App\Repository\Main;

use App\Entity\Main\PassageCTP;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PassageCTP|null find($id, $lockMode = null, $lockVersion = null)
 * @method PassageCTP|null findOneBy(array $criteria, array $orderBy = null)
 * @method PassageCTP[]    findAll()
 * @method PassageCTP[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PassageCTPRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PassageCTP::class);
    }

    // /**
    //  * @return PassageCTP[] Returns an array of PassageCTP objects
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
    public function findOneBySomeField($value): ?PassageCTP
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
