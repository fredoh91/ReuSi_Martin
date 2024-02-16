<?php

namespace App\Repository;

use App\Entity\SearchSignalANSM;
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
    
    
    
    
    
    /**
     * retourne la liste des SUSARs recherchés par un formulaire du type SearchListeEvalSusarType
     *
     * @param SearchListeEvalSusar $search
     * @return Susar|null
     */
    public function findBySearchSignalANSM(SearchSignalANSM $search): ?array
    {
        
        $query = $this->createQueryBuilder('s');
        
        if ($search->getId()) {
            $query = $query
            ->andWhere('s.id = :id')
            ->setParameter('id', $search->getId());
        }
        
        if ($search->getDebutDateCreation()) {
            $query = $query
                ->andWhere('s.DateCreation >= :ddc')
                ->setParameter('ddc', $search->getDebutDateCreation());
        }
    
        if ($search->getFinDateCreation()) {
            $query = $query
                ->andWhere('s.DateCreation <= :fdc')
                ->setParameter('fdc', $search->getFinDateCreation());
        }

        if ($search->getDenoDCI()) {
            $query = $query
                ->leftJoin(
                    'App\Entity\Produit',
                    'produit',
                    \Doctrine\ORM\Query\Expr\Join::WITH,
                    'produit.ProduitSignal = s.id'
                )
                ->andWhere('produit.Denomination LIKE :deno OR produit.DCI LIKE :deno ')
                ->setParameter('deno', '%' . $search->getDenoDCI() . '%')
                ;
        }

        // if ($search->getMasterId()) {
        //     $query = $query
        //         ->andWhere('s.master_id = :mi')
        //         ->setParameter('mi', $search->getMasterId());
        // }

        // if ($search->getDLPVersion()) {
        //     $query = $query
        //         ->andWhere('s.DLPVersion = :dv')
        //         ->setParameter('dv', $search->getDLPVersion());
        // }

        // if ($search->getCaseid()) {
        //     $query = $query
        //         ->andWhere('s.caseid = :ci')
        //         ->setParameter('ci', $search->getCaseid());
        // }

        // if ($search->getNumEudract()) {
        //     $query = $query
        //         ->andWhere('s.num_eudract = :ne')
        //         ->setParameter('ne', $search->getNumEudract());
        // }

        // if ($search->getWorldWideId()) {
        //     $query = $query
        //         ->andWhere('s.worldWide_id LIKE :wwi')
        //         ->setParameter('wwi', '%' . $search->getWorldWideId() . '%');
        // }

        // if ($search->getSponsorstudynumb()) {
        //     $query = $query
        //         ->andWhere('s.sponsorstudynumb = :ssn')
        //         ->setParameter('ssn', $search->getSponsorstudynumb());
        // }

        // if ($search->getStudytitle()) {
        //     $query = $query
        //         ->andWhere('s.studytitle LIKE :st')
        //         ->setParameter('st', '%' . $search->getStudytitle() . '%');
        // }

        // if ($search->getProductName()) {
        //     $query = $query
        //         ->andWhere('s.productName LIKE :pn')
        //         ->setParameter('pn', '%' . $search->getProductName() . '%');
        // }

        // if ($search->getSubstanceName()) {
        //     $query = $query
        //         ->andWhere('s.substanceName LIKE :sn')
        //         ->setParameter('sn', '%' . $search->getSubstanceName() . '%');
        // }

        // if ($search->getIndication()) {
        //     $query = $query
        //         ->andWhere('s.indication LIKE :if')
        //         ->setParameter('if', '%' . $search->getIndication() . '%');
        // }

        // if ($search->getIndicationEng()) {
        //     $query = $query
        //         ->andWhere('s.indication_eng LIKE :ie')
        //         ->setParameter('ie', '%' . $search->getIndicationEng() . '%');
        // }

        // // dd($search->getIntervenantANSM()->getDMMPoleCourt());
        // if ($search->getIntervenantANSM()) {
        //     $query = $query
        //         ->leftJoin('s.intervenantANSM', 'iANSM')
        //         ->andWhere('iANSM.DMM_pole_court LIKE :ia')
        //         ->setParameter('ia', '%' . $search->getIntervenantANSM()->getDMMPoleCourt() . '%');
        // }

        // // dd($search->getMesureAction()->getLibelle());
        // if ($search->getMesureAction()) {
        //     $query = $query
        //         ->leftJoin('s.MesureAction', 'ma')
        //         ->andWhere('ma.Libelle LIKE :ia')
        //         ->setParameter('ia', '%' . $search->getMesureAction()->getLibelle() . '%');
        // }

        // if ($search->getDebutCreationDate()) {
        //     $query = $query
        //         ->andWhere('s.creationdate >= :dcd')
        //         ->setParameter('dcd', $search->getDebutCreationDate());
        // }

        // if ($search->getFinCreationDate()) {
        //     $query = $query
        //         ->andWhere('s.creationdate <= :fcd')
        //         ->setParameter('fcd', $search->getFinCreationDate());
        // }


        // if ($search->getDebutDateImport()) {
        //     $query = $query
        //         ->andWhere('s.dateImport >= :ddi')
        //         ->setParameter('ddi', $search->getDebutDateImport());
        // }

        // if ($search->getFinDateImport()) {
        //     $query = $query
        //         ->andWhere('s.dateImport <= :fdi')
        //         ->setParameter('fdi', $search->getFinDateImport()->modify('+1 day'));
        // }

        // if ($search->getDebutDateAiguillage()) {
        //     $query = $query
        //         ->andWhere('s.dateAiguillage >= :dda')
        //         ->setParameter('dda', $search->getDebutDateAiguillage());
        // }

        // if ($search->getFinDateAiguillage()) {
        //     $query = $query
        //         ->andWhere('s.dateAiguillage <= :fda')
        //         ->setParameter('fda', $search->getFinDateAiguillage()->modify('+1 day'));
        // }

        // if ($search->getDebutDateEvaluation()) {
        //     $query = $query
        //         ->andWhere('s.dateEvaluation >= :dde')
        //         ->setParameter('dde', $search->getDebutDateEvaluation());
        // }

        // if ($search->getFinDateEvaluation()) {
        //     $query = $query
        //         ->andWhere('s.dateEvaluation <= :fde')
        //         ->setParameter('fde', $search->getFinDateEvaluation()->modify('+1 day'));
        // }

        // if ($search->getEvalue()) {
        //     if ($search->getEvalue() === 'Non') {
        //         $query = $query
        //             ->andWhere('s.dateEvaluation IS NULL');
        //     } elseif ($search->getEvalue() === 'Oui') {
        //         $query = $query
        //             ->andWhere('s.dateEvaluation IS NOT NULL');
        //     } else {}
        // }

        // if ($search->getAiguille()) {
        //     if ($search->getAiguille() === 'Non') {
        //         $query = $query
        //             ->andWhere('s.intervenantANSM IS NULL');
        //     } elseif ($search->getAiguille() === 'Oui') {
        //         $query = $query
        //             ->andWhere('s.intervenantANSM IS NOT NULL');
        //     } else {}
        // }

        return $query
            ->orderBy('s.DateCreation', 'DESC')
            ->getQuery()
            ->getResult();
    }




    /**
     * @return Signal[] Returns an array of Signal objects
     */
    
    public function findAll_DtCreaDesc()
    {
        return $this->createQueryBuilder('s')
            // ->andWhere('s.exampleField = :val')
            // ->setParameter('val', $value)
            ->orderBy('s.DateCreation', 'DESC')
            // ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
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
