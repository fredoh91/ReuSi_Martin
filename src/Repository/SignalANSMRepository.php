<?php

namespace App\Repository;

use App\Entity\SignalANSM;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SignalANSM|null find($id, $lockMode = null, $lockVersion = null)
 * @method SignalANSM|null findOneBy(array $criteria, array $orderBy = null)
 * @method SignalANSM[]    findAll()
 * @method SignalANSM[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SignalANSMRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SignalANSM::class);
    }

    public function testJoin()
    {
        $result = $this->createQueryBuilder('s')
            ->join('s.produits', 'p');
        $result->andWhere('s.Description LIKE :Description')
            ->setParameter('Description', '%' . 'Hépatite' . '%');

        return $result->getQuery()->getResult();
    }

    /**
     * @return SignalANSM[]
     */
    public function findLike($produit, $substance): array
    {
        $result = $this->createQueryBuilder('s')
            ->join('s.produits', 'p');
        if ($produit != '' and $substance != '' ) {
            $result = $result 
                        ->andWhere('p.Dénomination LIKE :produit AND p.DCI LIKE :DCI')
                        ->setParameter('produit', '%' . $produit . '%')
                        ->setParameter('substance', '%' . $substance . '%');
        } elseif ($produit == '' and $substance != '' ) {
            $result = $result 
                        ->andWhere('p.DCI LIKE :substance')
                        ->setParameter('substance', '%' . $substance . '%');
        } elseif ($produit != '' and $substance == '' ) {
            $result = $result 
                        ->andWhere('p.Denomination LIKE :produit')
                        ->setParameter('produit', '%' . $produit . '%');
        }
        $result = $result->orderBy('s.id', 'ASC');
        return $result->getQuery()->getResult();
    }

    // /**
    //  * @return Signal[] Returns an array of Signal objects
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
    public function findOneBySomeField($value): ?Signal
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
