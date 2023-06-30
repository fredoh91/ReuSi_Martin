<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230428142030 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ClassificationRevDec (id INT AUTO_INCREMENT NOT NULL, Libelle VARCHAR(255) NOT NULL, Actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE CoPiloteDS (id INT AUTO_INCREMENT NOT NULL, Libelle VARCHAR(255) NOT NULL, Actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE DMM (id INT AUTO_INCREMENT NOT NULL, Libelle VARCHAR(255) NOT NULL, Actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE EmetteurSuivi (id INT AUTO_INCREMENT NOT NULL, Libelle VARCHAR(255) NOT NULL, Actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE LibelleMesure (id INT AUTO_INCREMENT NOT NULL, Libelle VARCHAR(255) NOT NULL, Actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Mesure (id INT AUTO_INCREMENT NOT NULL, Description LONGTEXT DEFAULT NULL, DatePrev DATETIME DEFAULT NULL, DateRealisation DATETIME DEFAULT NULL, LibelleMesure_id INT DEFAULT NULL, MesureReleveDecision_id INT DEFAULT NULL, INDEX IDX_58B76B4648CF4097 (LibelleMesure_id), INDEX IDX_58B76B4675E7CC7F (MesureReleveDecision_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE PassageCTP (id INT AUTO_INCREMENT NOT NULL, Libelle VARCHAR(255) NOT NULL, Actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE PassageRSS (id INT AUTO_INCREMENT NOT NULL, Libelle VARCHAR(255) NOT NULL, Actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE PiloteDS (id INT AUTO_INCREMENT NOT NULL, Libelle VARCHAR(255) NOT NULL, Actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE PoleDS (id INT AUTO_INCREMENT NOT NULL, Libelle VARCHAR(255) NOT NULL, Actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Produit (id INT AUTO_INCREMENT NOT NULL, Denomination VARCHAR(255) DEFAULT NULL, DCI VARCHAR(255) DEFAULT NULL, Dosage VARCHAR(255) DEFAULT NULL, Voie VARCHAR(255) DEFAULT NULL, Laboratoire VARCHAR(255) DEFAULT NULL, idLaboratoire VARCHAR(255) DEFAULT NULL, TypeProcedure VARCHAR(255) DEFAULT NULL, CodeCIS VARCHAR(255) DEFAULT NULL, CodeVU VARCHAR(255) DEFAULT NULL, CodeDissier VARCHAR(255) DEFAULT NULL, NomVU VARCHAR(255) DEFAULT NULL, Codex TINYINT(1) DEFAULT NULL, Titulaire VARCHAR(255) DEFAULT NULL, idTitulaire VARCHAR(255) DEFAULT NULL, AdresseContact VARCHAR(255) DEFAULT NULL, AdresseCompl VARCHAR(255) DEFAULT NULL, CodePost VARCHAR(255) DEFAULT NULL, NomVille VARCHAR(255) DEFAULT NULL, TelContact VARCHAR(255) DEFAULT NULL, FaxContact VARCHAR(255) DEFAULT NULL, Adresse VARCHAR(255) DEFAULT NULL, AdresseComplExpl VARCHAR(255) DEFAULT NULL, CodePostExpl VARCHAR(255) DEFAULT NULL, NomVilleExpl VARCHAR(255) DEFAULT NULL, Complement VARCHAR(255) DEFAULT NULL, Tel VARCHAR(255) DEFAULT NULL, Fax VARCHAR(255) DEFAULT NULL, CodeATC VARCHAR(255) DEFAULT NULL, LibATC VARCHAR(255) DEFAULT NULL, DP VARCHAR(255) DEFAULT NULL, PrescriptionDelivrance VARCHAR(255) DEFAULT NULL, ProduitSignal_id INT DEFAULT NULL, INDEX IDX_E618D5BB42DFC8A6 (ProduitSignal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ReleveDecision (id INT AUTO_INCREMENT NOT NULL, DateReuSig DATETIME NOT NULL, NiveauRisque VARCHAR(255) DEFAULT NULL, InfoAvis LONGTEXT DEFAULT NULL, Classification_id INT DEFAULT NULL, ReleveDecisionSignal_id INT DEFAULT NULL, PassageCTP_id INT DEFAULT NULL, PassageRSS_id INT DEFAULT NULL, INDEX IDX_FD82360A4256765 (Classification_id), INDEX IDX_FD82360A3236E5D0 (ReleveDecisionSignal_id), INDEX IDX_FD82360A915D06B3 (PassageCTP_id), INDEX IDX_FD82360AF942A473 (PassageRSS_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE SourceSignal (id INT AUTO_INCREMENT NOT NULL, Libelle VARCHAR(255) NOT NULL, Actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE StatutEmetteur (id INT AUTO_INCREMENT NOT NULL, Libelle VARCHAR(255) NOT NULL, Actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE StatutSignal (id INT AUTO_INCREMENT NOT NULL, Libelle VARCHAR(255) NOT NULL, Actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Suivi (id INT AUTO_INCREMENT NOT NULL, DateSuivi DATETIME DEFAULT NULL, Description LONGTEXT DEFAULT NULL, EmetteurSuivi_id INT DEFAULT NULL, SuiviSignal_id INT DEFAULT NULL, INDEX IDX_EF7DE58B5FDB6181 (EmetteurSuivi_id), INDEX IDX_EF7DE58B17A26983 (SuiviSignal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `signal` (id INT AUTO_INCREMENT NOT NULL, DateCreation DATETIME NOT NULL, Description LONGTEXT DEFAULT NULL, Indication VARCHAR(255) DEFAULT NULL, Contexte LONGTEXT DEFAULT NULL, NiveauRisqueInitial VARCHAR(255) DEFAULT NULL, NiveauRisqueFinal VARCHAR(255) DEFAULT NULL, AnaRisqueComment LONGTEXT DEFAULT NULL, ProposReducRisque LONGTEXT DEFAULT NULL, RefSignal VARCHAR(255) DEFAULT NULL, IdentifiantSource VARCHAR(255) DEFAULT NULL, SourceSignal_id INT DEFAULT NULL, PoleDS_id INT DEFAULT NULL, DMM_id INT DEFAULT NULL, PiloteDS_id INT DEFAULT NULL, CoPiloteDS_id INT DEFAULT NULL, StatutSignal_id INT DEFAULT NULL, StatutEmetteur_id INT DEFAULT NULL, INDEX IDX_740C95F5B71A8984 (SourceSignal_id), INDEX IDX_740C95F564741D50 (PoleDS_id), INDEX IDX_740C95F57516E9E3 (DMM_id), INDEX IDX_740C95F52082ABE3 (PiloteDS_id), INDEX IDX_740C95F51EF05291 (CoPiloteDS_id), INDEX IDX_740C95F58B3C03F7 (StatutSignal_id), INDEX IDX_740C95F5C7566ED0 (StatutEmetteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Mesure ADD CONSTRAINT FK_58B76B4648CF4097 FOREIGN KEY (LibelleMesure_id) REFERENCES LibelleMesure (id)');
        $this->addSql('ALTER TABLE Mesure ADD CONSTRAINT FK_58B76B4675E7CC7F FOREIGN KEY (MesureReleveDecision_id) REFERENCES ReleveDecision (id)');
        $this->addSql('ALTER TABLE Produit ADD CONSTRAINT FK_E618D5BB42DFC8A6 FOREIGN KEY (ProduitSignal_id) REFERENCES `signal` (id)');
        $this->addSql('ALTER TABLE ReleveDecision ADD CONSTRAINT FK_FD82360A4256765 FOREIGN KEY (Classification_id) REFERENCES ClassificationRevDec (id)');
        $this->addSql('ALTER TABLE ReleveDecision ADD CONSTRAINT FK_FD82360A3236E5D0 FOREIGN KEY (ReleveDecisionSignal_id) REFERENCES `signal` (id)');
        $this->addSql('ALTER TABLE ReleveDecision ADD CONSTRAINT FK_FD82360A915D06B3 FOREIGN KEY (PassageCTP_id) REFERENCES PassageCTP (id)');
        $this->addSql('ALTER TABLE ReleveDecision ADD CONSTRAINT FK_FD82360AF942A473 FOREIGN KEY (PassageRSS_id) REFERENCES PassageRSS (id)');
        $this->addSql('ALTER TABLE Suivi ADD CONSTRAINT FK_EF7DE58B5FDB6181 FOREIGN KEY (EmetteurSuivi_id) REFERENCES EmetteurSuivi (id)');
        $this->addSql('ALTER TABLE Suivi ADD CONSTRAINT FK_EF7DE58B17A26983 FOREIGN KEY (SuiviSignal_id) REFERENCES `signal` (id)');
        $this->addSql('ALTER TABLE `signal` ADD CONSTRAINT FK_740C95F5B71A8984 FOREIGN KEY (SourceSignal_id) REFERENCES SourceSignal (id)');
        $this->addSql('ALTER TABLE `signal` ADD CONSTRAINT FK_740C95F564741D50 FOREIGN KEY (PoleDS_id) REFERENCES PoleDS (id)');
        $this->addSql('ALTER TABLE `signal` ADD CONSTRAINT FK_740C95F57516E9E3 FOREIGN KEY (DMM_id) REFERENCES DMM (id)');
        $this->addSql('ALTER TABLE `signal` ADD CONSTRAINT FK_740C95F52082ABE3 FOREIGN KEY (PiloteDS_id) REFERENCES PiloteDS (id)');
        $this->addSql('ALTER TABLE `signal` ADD CONSTRAINT FK_740C95F51EF05291 FOREIGN KEY (CoPiloteDS_id) REFERENCES CoPiloteDS (id)');
        $this->addSql('ALTER TABLE `signal` ADD CONSTRAINT FK_740C95F58B3C03F7 FOREIGN KEY (StatutSignal_id) REFERENCES StatutSignal (id)');
        $this->addSql('ALTER TABLE `signal` ADD CONSTRAINT FK_740C95F5C7566ED0 FOREIGN KEY (StatutEmetteur_id) REFERENCES StatutEmetteur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Mesure DROP FOREIGN KEY FK_58B76B4648CF4097');
        $this->addSql('ALTER TABLE Mesure DROP FOREIGN KEY FK_58B76B4675E7CC7F');
        $this->addSql('ALTER TABLE Produit DROP FOREIGN KEY FK_E618D5BB42DFC8A6');
        $this->addSql('ALTER TABLE ReleveDecision DROP FOREIGN KEY FK_FD82360A4256765');
        $this->addSql('ALTER TABLE ReleveDecision DROP FOREIGN KEY FK_FD82360A3236E5D0');
        $this->addSql('ALTER TABLE ReleveDecision DROP FOREIGN KEY FK_FD82360A915D06B3');
        $this->addSql('ALTER TABLE ReleveDecision DROP FOREIGN KEY FK_FD82360AF942A473');
        $this->addSql('ALTER TABLE Suivi DROP FOREIGN KEY FK_EF7DE58B5FDB6181');
        $this->addSql('ALTER TABLE Suivi DROP FOREIGN KEY FK_EF7DE58B17A26983');
        $this->addSql('ALTER TABLE `signal` DROP FOREIGN KEY FK_740C95F5B71A8984');
        $this->addSql('ALTER TABLE `signal` DROP FOREIGN KEY FK_740C95F564741D50');
        $this->addSql('ALTER TABLE `signal` DROP FOREIGN KEY FK_740C95F57516E9E3');
        $this->addSql('ALTER TABLE `signal` DROP FOREIGN KEY FK_740C95F52082ABE3');
        $this->addSql('ALTER TABLE `signal` DROP FOREIGN KEY FK_740C95F51EF05291');
        $this->addSql('ALTER TABLE `signal` DROP FOREIGN KEY FK_740C95F58B3C03F7');
        $this->addSql('ALTER TABLE `signal` DROP FOREIGN KEY FK_740C95F5C7566ED0');
        $this->addSql('DROP TABLE ClassificationRevDec');
        $this->addSql('DROP TABLE CoPiloteDS');
        $this->addSql('DROP TABLE DMM');
        $this->addSql('DROP TABLE EmetteurSuivi');
        $this->addSql('DROP TABLE LibelleMesure');
        $this->addSql('DROP TABLE Mesure');
        $this->addSql('DROP TABLE PassageCTP');
        $this->addSql('DROP TABLE PassageRSS');
        $this->addSql('DROP TABLE PiloteDS');
        $this->addSql('DROP TABLE PoleDS');
        $this->addSql('DROP TABLE Produit');
        $this->addSql('DROP TABLE ReleveDecision');
        $this->addSql('DROP TABLE SourceSignal');
        $this->addSql('DROP TABLE StatutEmetteur');
        $this->addSql('DROP TABLE StatutSignal');
        $this->addSql('DROP TABLE Suivi');
        $this->addSql('DROP TABLE `signal`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
