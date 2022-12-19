<?php

namespace App\Repository\Main;

use App\Entity\Main\ClassificationRevDev;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ClassificationRevDev|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClassificationRevDev|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClassificationRevDev[]    findAll()
 * @method ClassificationRevDev[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassificationRevDevRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClassificationRevDev::class);
    }

    // /**
    //  * @return ClassificationRevDev[] Returns an array of ClassificationRevDev objects
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
    public function findOneBySomeField($value): ?ClassificationRevDev
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
