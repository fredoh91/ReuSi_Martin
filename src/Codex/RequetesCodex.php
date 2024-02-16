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

        $sql = "SELECT DISTINCT " 
        . "	vuutil.nomVU, "  
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
        . " WHERE vuutil.codeVU = " . $CodeVU ;


        $stmt = $this->em->getConnection()->prepare($sql);
        $stmt_2 = $stmt->execute()->fetchAll();
        
        if (!empty($stmt_2)){

            $sub = $this->donneDCI_dosage_voie_parCodeVU($CodeVU);
            $prescDeliv = $this->donneDCI_delivrance_parCodeVU($CodeVU);

            $produit->setDenomination($stmt_2[0]['nomVU']);
            $produit->setDCI($sub['DCI']);
            $produit->setDosage($sub['dosage']);
            $produit->setVoie($sub['voie']);
            $produit->setLaboratoire($stmt_2[0]['nomActeurLong']);
            $produit->setIdLaboratoire($stmt_2[0]['codeActeur']);
            $produit->setTypeProcedure($stmt_2[0]['dbo_Autorisation_libAbr']);
            $produit->setCodeCIS($stmt_2[0]['codeVU']);
            $produit->setCodeVU($stmt_2[0]['codeVU']);
            $produit->setCodeDossier($stmt_2[0]['codeDossier']);
            $produit->setNomVU($stmt_2[0]['nomVU']);
            $produit->setTitulaire($stmt_2[0]['nomContactLibra']);
            $produit->setIdTitulaire($stmt_2[0]['codeContact']);
            $produit->setAdresseContact($stmt_2[0]['adresseContact']);
            $produit->setAdresseCompl($stmt_2[0]['adresseCompl']);
            $produit->setCodePost($stmt_2[0]['codePost']);
            $produit->setNomVille($stmt_2[0]['nomVille']);
            $produit->setTelContact($stmt_2[0]['telContact']);
            $produit->setFaxContact($stmt_2[0]['faxContact']);
            $produit->setAdresse($stmt_2[0]['adresse']);
            $produit->setAdresseComplExpl($stmt_2[0]['adresseComplExpl']);
            $produit->setCodePostExpl($stmt_2[0]['codePostExpl']);
            $produit->setNomVilleExpl($stmt_2[0]['nomVilleExpl']);
            $produit->setTel($stmt_2[0]['tel']);
            $produit->setFax($stmt_2[0]['fax']);
            $produit->setCodeATC($stmt_2[0]['dbo_ClasseATC_libAbr']);
            $produit->setLibATC($stmt_2[0]['dbo_ClasseATC_libCourt']);
            $produit->setPrescriptionDelivrance($prescDeliv);

            return $produit;

            
        } else {
            return null;
        }
            
    }

    public function donneDCI_dosage_voie_parCodeVU(int $CodeVU): array
    {

        $sql = "SELECT " 
        . "	savu.nomSubstance, " 
        . "	savu.dosageLibra, " 
        . "	savu.libCourt AS 'voie' " 
        . "	FROM " 
        . "	savu " 
        . "	WHERE savu.codeVU = " . $CodeVU ;

        $stmt = $this->em->getConnection()->prepare($sql);
        $stmt_2 = $stmt->execute()->fetchAll();
        $retour = [];

        if (!empty($stmt_2)){
            // foreach ($stmt_2[0] as $prod) {
                foreach ($stmt_2 as $prod) {
                if (empty($retour)){
                    $retour['DCI']= $prod['nomSubstance'];
                    $retour['dosage']= $prod['dosageLibra'];
                    $retour['voie']= $prod['voie'];
                } else {
                    $retour['DCI']= $retour['DCI'] . "/" . $prod['nomSubstance'];
                    $retour['dosage']= $retour['dosage'] . "/" . $prod['dosageLibra'];
                    $retour['voie']= $retour['voie'] . "/" . $prod['voie'];
                }
            }

            return $retour;
            
        } else {
            return null;
        }
            
    }

    public function donneDCI_delivrance_parCodeVU(int $CodeVU): string
    {

        $sql = "SELECT " 
        . "	vudelivrance.codeVU, " 
        . "	vudelivrance.codeDelivrance, " 
        . "	vudelivrance.libLong " 
        . "	FROM " 
        . "	vudelivrance " 
        . "	WHERE vudelivrance.codeVU = " . $CodeVU ;


        $stmt = $this->em->getConnection()->prepare($sql);
        $stmt_2 = $stmt->execute()->fetchAll();
        

        if (!empty($stmt_2)){
            // foreach ($stmt_2[0] as $prod) {
                foreach ($stmt_2 as $presc) {
                if (empty($prescDeliv)){
                    $prescDeliv= $presc['libLong'];
                } else {
                    $prescDeliv= $prescDeliv . "/" .$presc['libLong'];
                }
            }

            return $prescDeliv;
            
        } else {
            return null;
        }
    }

}
