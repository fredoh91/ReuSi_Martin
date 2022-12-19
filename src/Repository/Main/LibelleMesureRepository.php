<?php

namespace App\Repository\Main;

use App\Entity\Main\LibelleMesure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LibelleMesure|null find($id, $lockMode = null, $lockVersion = null)
 * @method LibelleMesure|null findOneBy(array $criteria, array $orderBy = null)
 * @method LibelleMesure[]    findAll()
 * @method LibelleMesure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LibelleMesureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LibelleMesure::class);
    }

    // /**
    //  * @return LibelleMesure[] Returns an array of LibelleMesure objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LibelleMesure
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
