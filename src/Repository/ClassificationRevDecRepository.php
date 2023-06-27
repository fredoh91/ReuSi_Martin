<?php

namespace App\Repository;

use App\Entity\ClassificationRevDec;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ClassificationRevDec>
 *
 * @method ClassificationRevDec|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClassificationRevDec|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClassificationRevDec[]    findAll()
 * @method ClassificationRevDec[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassificationRevDecRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClassificationRevDec::class);
    }

    public function save(ClassificationRevDec $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ClassificationRevDec $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ClassificationRevDec[] Returns an array of ClassificationRevDec objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ClassificationRevDec
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
