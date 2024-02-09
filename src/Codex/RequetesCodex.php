<?php

namespace App\Codex;

use App\Entity\Produit;
use App\Entity\Codex\SearchCodex;
use Doctrine\Persistence\ManagerRegistry;

class RequetesCodex
{
    private $em;
    private $doctrine;
    public function __construct(ManagerRegistry $doctrine)
    {
        // $this->dateCreation = $dateCreation;
        $this->doctrine = $doctrine;
        $this->em = $this->doctrine->getManager('codex');
    }

    
    /**
     * méthode de test de requete dans la base sfCODEX sur la DCI
     *
     * @param string $dci
     * @return array
     */
    public function donneProduitTest(string $dci): array
    {

        // $sql = "SELECT * FROM savu WHERE nomSubstance LIKE '%clobazam%';";
        $sql = "SELECT * FROM savu WHERE nomSubstance LIKE '%" . $dci . "%';";

        $stmt = $this->em->getConnection()->prepare($sql);
        $stmt_2 = $stmt->execute()->fetchAll();

        return $stmt_2;
    }



    public function donneProduit_deno_dci(?string $deno,?string $dci): array
    {

        // $sql = "SELECT * FROM savu WHERE nomSubstance LIKE '%clobazam%';";
        $sql = "SELECT " 
        . "	vuutil.nomVU, " 
        . "	savu.nomSubstance, " 
        . "	savu.dosageLibra, " 
        . "	savu.libCourt, " 
        . "	vuutil.dbo_Autorisation_libAbr, " 
        . "	vuutil.dbo_ClasseATC_libAbr, " 
        . "	vuutil.dbo_ClasseATC_libCourt, " 
        . "	vuutil.dbo_StatutSpeci_libAbr, " 
        . "	vuutil.codeVU, " 
        . "	vuutil.codeCIS, " 
        . "	vuutil.codeDossier, " 
        . "	vuutil.nomContactLibra, " 
        . "	vuutil.adresseContact, " 
        . "	vuutil.adresseCompl, " 
        . "	vuutil.codePost, " 
        . "	vuutil.nomVille, " 
        . "	vuutil.telContact, " 
        . "	vuutil.faxContact, " 
        . "	vuutil.nomActeurLong, " 
        . "	vuutil.adresse, " 
        . "	vuutil.adresseComplExpl, " 
        . "	vuutil.codePostExpl, " 
        . "	vuutil.nomVilleExpl, " 
        . "	vuutil.tel, " 
        . "	vuutil.fax, " 
        . "	vuutil.codeContact, " 
        . "	vuutil.codeActeur " 
        . "FROM " 
        . "	vuutil " 
        . "	INNER JOIN savu ON vuutil.codeVU = savu.codeVU " 
        . "GROUP BY " 
        . "	vuutil.nomVU, " 
        . "	savu.nomSubstance, " 
        . "	vuutil.dbo_Autorisation_libAbr, " 
        . "	vuutil.dbo_ClasseATC_libAbr, " 
        . "	vuutil.dbo_ClasseATC_libCourt, " 
        . "	vuutil.dbo_StatutSpeci_libAbr, " 
        . "	vuutil.codeVU, " 
        . "	vuutil.codeCIS, " 
        . "	vuutil.codeDossier, " 
        . "	vuutil.nomContactLibra, " 
        . "	vuutil.adresseContact, " 
        . "	vuutil.adresseCompl, " 
        . "	vuutil.codePost, " 
        . "	vuutil.nomVille, " 
        . "	vuutil.telContact, " 
        . "	vuutil.faxContact, " 
        . "	vuutil.nomActeurLong, " 
        . "	vuutil.adresse, " 
        . "	vuutil.adresseComplExpl, " 
        . "	vuutil.codePostExpl, " 
        . "	vuutil.nomVilleExpl, " 
        . "	vuutil.tel, " 
        . "	vuutil.fax, " 
        . "	vuutil.codeContact, " 
        . "	vuutil.codeActeur, " 
        . "	vuutil.dbo_Pays_libCourt " ;


        if (is_null($deno) AND is_null($dci)) {
            $sql .= "ORDER BY vuutil.nomVU ";
            $sql .= "LIMIT 1000";
        }
        elseif (!is_null($deno) AND !is_null($dci)) { 
            $sql .= "HAVING " ;
            $sql .= "vuutil.nomVU LIKE '%" . $deno . "%' " ;
            $sql .= "OR " ;
            $sql .= "savu.nomSubstance LIKE '%" . $dci . "%' " ;
            $sql .= "ORDER BY vuutil.nomVU";
        } 
        elseif (!is_null($deno) AND is_null($dci)) { 
            $sql .= "HAVING " ;
            $sql .= "vuutil.nomVU LIKE '%" . $deno . "%' " ;
            $sql .= "ORDER BY vuutil.nomVU";            
        } 
        elseif (is_null($deno) AND !is_null($dci)) { 
            $sql .= "HAVING " ;
            $sql .= "savu.nomSubstance LIKE '%" . $dci . "%' " ;
            $sql .= "ORDER BY vuutil.nomVU";            
        } else {
            // Pas possible
        }
            
        $sql .= ";";

        $stmt = $this->em->getConnection()->prepare($sql);
        $stmt_2 = $stmt->execute()->fetchAll();

        return $stmt_2;
    }


    public function donneProduit_SearchCodex(SearchCodex $search): array
    {
        $deno = $search->getdenomination();
        
        $dci = $search->getdci();

        // $sql = "SELECT * FROM savu WHERE nomSubstance LIKE '%clobazam%';";
        $sql = "SELECT " 
        . "	vuutil.nomVU, " 
        . "	savu.nomSubstance, " 
        . "	savu.dosageLibra, " 
        . "	savu.libCourt, " 
        . "	vuutil.dbo_Autorisation_libAbr, " 
        . "	vuutil.dbo_ClasseATC_libAbr, " 
        . "	vuutil.dbo_ClasseATC_libCourt, " 
        . "	vuutil.dbo_StatutSpeci_libAbr, " 
        . "	vuutil.codeVU, " 
        . "	vuutil.codeCIS, " 
        . "	vuutil.codeDossier, " 
        . "	vuutil.nomContactLibra, " 
        . "	vuutil.adresseContact, " 
        . "	vuutil.adresseCompl, " 
        . "	vuutil.codePost, " 
        . "	vuutil.nomVille, " 
        . "	vuutil.telContact, " 
        . "	vuutil.faxContact, " 
        . "	vuutil.nomActeurLong, " 
        . "	vuutil.adresse, " 
        . "	vuutil.adresseComplExpl, " 
        . "	vuutil.codePostExpl, " 
        . "	vuutil.nomVilleExpl, " 
        . "	vuutil.tel, " 
        . "	vuutil.fax, " 
        . "	vuutil.codeContact, " 
        . "	vuutil.codeActeur " 
        . "FROM " 
        . "	vuutil " 
        . "	INNER JOIN savu ON vuutil.codeVU = savu.codeVU " 
        . "GROUP BY " 
        . "	vuutil.nomVU, " 
        . "	savu.nomSubstance, " 
        . "	vuutil.dbo_Autorisation_libAbr, " 
        . "	vuutil.dbo_ClasseATC_libAbr, " 
        . "	vuutil.dbo_ClasseATC_libCourt, " 
        . "	vuutil.dbo_StatutSpeci_libAbr, " 
        . "	vuutil.codeVU, " 
        . "	vuutil.codeCIS, " 
        . "	vuutil.codeDossier, " 
        . "	vuutil.nomContactLibra, " 
        . "	vuutil.adresseContact, " 
        . "	vuutil.adresseCompl, " 
        . "	vuutil.codePost, " 
        . "	vuutil.nomVille, " 
        . "	vuutil.telContact, " 
        . "	vuutil.faxContact, " 
        . "	vuutil.nomActeurLong, " 
        . "	vuutil.adresse, " 
        . "	vuutil.adresseComplExpl, " 
        . "	vuutil.codePostExpl, " 
        . "	vuutil.nomVilleExpl, " 
        . "	vuutil.tel, " 
        . "	vuutil.fax, " 
        . "	vuutil.codeContact, " 
        . "	vuutil.codeActeur, " 
        . "	vuutil.dbo_Pays_libCourt " ;


        if (is_null($deno) AND is_null($dci)) {
            $sql .= "ORDER BY vuutil.nomVU ";
            $sql .= "LIMIT 1000";
        }
        elseif (!is_null($deno) AND !is_null($dci)) { 
            $sql .= "HAVING " ;
            $sql .= "vuutil.nomVU LIKE '%" . $deno . "%' " ;
            $sql .= "OR " ;
            $sql .= "savu.nomSubstance LIKE '%" . $dci . "%' " ;
            $sql .= "ORDER BY vuutil.nomVU";
        } 
        elseif (!is_null($deno) AND is_null($dci)) { 
            $sql .= "HAVING " ;
            $sql .= "vuutil.nomVU LIKE '%" . $deno . "%' " ;
            $sql .= "ORDER BY vuutil.nomVU";            
        } 
        elseif (is_null($deno) AND !is_null($dci)) { 
            $sql .= "HAVING " ;
            $sql .= "savu.nomSubstance LIKE '%" . $dci . "%' " ;
            $sql .= "ORDER BY vuutil.nomVU";            
        } else {
            // Pas possible
        }
            
        $sql .= ";";

        $stmt = $this->em->getConnection()->prepare($sql);
        $stmt_2 = $stmt->execute()->fetchAll();

        return $stmt_2;
    }

    public function donneProduit_parCodeVU(int $CodeVU): Produit
    {
        $produit = new Produit;

        // $sql = "SELECT * FROM savu WHERE nomSubstance LIKE '%clobazam%';";
        $sql = "SELECT DISTINCT " 
        . "	vuutil.nomVU, " 
        . "	savu.nomSubstance, " 
        . "	savu.dosageLibra, " 
        . "	savu.libCourt, " 
        . "	vuutil.dbo_Autorisation_libAbr, " 
        . "	vuutil.dbo_ClasseATC_libAbr, " 
        . "	vuutil.dbo_ClasseATC_libCourt, " 
        . "	vuutil.dbo_StatutSpeci_libAbr, " 
        . "	vuutil.codeVU, " 
        . "	vuutil.codeCIS, " 
        . "	vuutil.codeDossier, " 
        . "	vuutil.nomContactLibra, " 
        . "	vuutil.adresseContact, " 
        . "	vuutil.adresseCompl, " 
        . "	vuutil.codePost, " 
        . "	vuutil.nomVille, " 
        . "	vuutil.telContact, " 
        . "	vuutil.faxContact, " 
        . "	vuutil.nomActeurLong, " 
        . "	vuutil.adresse, " 
        . "	vuutil.adresseComplExpl, " 
        . "	vuutil.codePostExpl, " 
        . "	vuutil.nomVilleExpl, " 
        . "	vuutil.tel, " 
        . "	vuutil.fax, " 
        . "	vuutil.codeContact, " 
        . "	vuutil.codeActeur " 
        . "FROM " 
        . "	vuutil " 
        . "	INNER JOIN savu ON vuutil.codeVU = savu.codeVU "  
        . " WHERE vuutil.codeVU = " . $CodeVU ;


        $stmt = $this->em->getConnection()->prepare($sql);
        $stmt_2 = $stmt->execute()->fetchAll();
        
        if (!empty($stmt_2)){

            $produit->setDenomination($stmt_2[0]['nomVU']);
            $produit->setDCI($stmt_2[0]['nomSubstance']);
            $produit->setDosage($stmt_2[0]['nomSubstance']);
            $produit->setVoie($stmt_2[0]['nomSubstance']);
            $produit->setCodeATC($stmt_2[0]['dbo_ClasseATC_libAbr']);
            $produit->setLibATC($stmt_2[0]['dbo_ClasseATC_libCourt']);

            return $produit;
            // foreach ($stmt_2[0] as $prod) {
            //     dump($prod);
            // }
            
        } else {
            return null;
        }
        // dd($stmt_2);
        // dd($produit);
            
    }


}
