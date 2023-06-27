<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210729135446 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classification_rev_dec (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE co_pilote_ds (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dmm (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emetteur_suivi (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE libelle_mesure (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mesure (id INT AUTO_INCREMENT NOT NULL, libelle_mesure_id INT DEFAULT NULL, mesure_releve_decision_id INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, date_prev DATETIME DEFAULT NULL, date_realisation DATETIME DEFAULT NULL, INDEX IDX_5F1B6E705CC1CB4A (libelle_mesure_id), INDEX IDX_5F1B6E709847A02D (mesure_releve_decision_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE passage_ctp (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE passage_rss (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilote_ds (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pole_ds (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, produit_signal_id INT DEFAULT NULL, denomination VARCHAR(255) DEFAULT NULL, dci VARCHAR(255) DEFAULT NULL, dosage VARCHAR(255) DEFAULT NULL, voie VARCHAR(255) DEFAULT NULL, laboratoire VARCHAR(255) DEFAULT NULL, id_laboratoire VARCHAR(255) DEFAULT NULL, type_procedure VARCHAR(255) DEFAULT NULL, code_cis VARCHAR(255) DEFAULT NULL, code_vu VARCHAR(255) DEFAULT NULL, code_dissier VARCHAR(255) DEFAULT NULL, nom_vu VARCHAR(255) DEFAULT NULL, codex TINYINT(1) DEFAULT NULL, titulaire VARCHAR(255) DEFAULT NULL, id_titulaire VARCHAR(255) DEFAULT NULL, adresse_contact VARCHAR(255) DEFAULT NULL, adresse_compl VARCHAR(255) DEFAULT NULL, code_post VARCHAR(255) DEFAULT NULL, nom_ville VARCHAR(255) DEFAULT NULL, tel_contact VARCHAR(255) DEFAULT NULL, fax_contact VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, adresse_compl_expl VARCHAR(255) DEFAULT NULL, code_post_expl VARCHAR(255) DEFAULT NULL, nom_ville_expl VARCHAR(255) DEFAULT NULL, complement VARCHAR(255) DEFAULT NULL, tel VARCHAR(255) DEFAULT NULL, fax VARCHAR(255) DEFAULT NULL, code_atc VARCHAR(255) DEFAULT NULL, lib_atc VARCHAR(255) DEFAULT NULL, dp VARCHAR(255) DEFAULT NULL, prescription_delivrance VARCHAR(255) DEFAULT NULL, INDEX IDX_29A5EC27545918E7 (produit_signal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE releve_decision (id INT AUTO_INCREMENT NOT NULL, classification_id INT DEFAULT NULL, releve_decision_signal_id INT DEFAULT NULL, passage_ctp_id INT DEFAULT NULL, passage_rss_id INT DEFAULT NULL, date_reu_sig DATETIME NOT NULL, niveau_risque VARCHAR(255) DEFAULT NULL, info_avis LONGTEXT DEFAULT NULL, INDEX IDX_38F349212A86559F (classification_id), INDEX IDX_38F34921A594C238 (releve_decision_signal_id), INDEX IDX_38F34921E7199D48 (passage_ctp_id), INDEX IDX_38F349218F063F88 (passage_rss_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE savu (id INT AUTO_INCREMENT NOT NULL, code_vu VARCHAR(255) DEFAULT NULL, code_cis VARCHAR(255) DEFAULT NULL, code_dossier VARCHAR(255) DEFAULT NULL, nom_vu VARCHAR(255) DEFAULT NULL, num_element VARCHAR(255) DEFAULT NULL, code_substance VARCHAR(255) DEFAULT NULL, num_composant VARCHAR(255) DEFAULT NULL, code_unite_dosage VARCHAR(255) DEFAULT NULL, code_nature VARCHAR(255) DEFAULT NULL, dosage_libra_typo VARCHAR(255) DEFAULT NULL, dosage_libra VARCHAR(255) DEFAULT NULL, lib_court VARCHAR(255) DEFAULT NULL, nom_substance VARCHAR(255) DEFAULT NULL, code_produit VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `signal` (id INT AUTO_INCREMENT NOT NULL, source_signal_id INT DEFAULT NULL, pole_ds_id INT DEFAULT NULL, dmm_id INT DEFAULT NULL, pilote_ds_id INT DEFAULT NULL, co_pilote_ds_id INT DEFAULT NULL, statut_signal_id INT DEFAULT NULL, statut_emetteur_id INT DEFAULT NULL, date_creation DATETIME NOT NULL, description LONGTEXT DEFAULT NULL, indication VARCHAR(255) DEFAULT NULL, contexte LONGTEXT DEFAULT NULL, niveau_risque_initial VARCHAR(255) DEFAULT NULL, niveau_risque_final VARCHAR(255) DEFAULT NULL, ana_risque_comment LONGTEXT DEFAULT NULL, propos_reduc_risque LONGTEXT DEFAULT NULL, ref_signal VARCHAR(255) DEFAULT NULL, identifiant_source VARCHAR(255) DEFAULT NULL, INDEX IDX_740C95F5B850D5C5 (source_signal_id), INDEX IDX_740C95F5B9330DD2 (pole_ds_id), INDEX IDX_740C95F513496CEF (dmm_id), INDEX IDX_740C95F5BC73C17A (pilote_ds_id), INDEX IDX_740C95F5B785F2F3 (co_pilote_ds_id), INDEX IDX_740C95F57160D3C9 (statut_signal_id), INDEX IDX_740C95F5405D25 (statut_emetteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE source_signal (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut_emetteur (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut_signal (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suivi (id INT AUTO_INCREMENT NOT NULL, emetteur_suivi_id INT DEFAULT NULL, suivi_signal_id INT DEFAULT NULL, date_suivi DATETIME DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_2EBCCA8FFC83ECC7 (emetteur_suivi_id), INDEX IDX_2EBCCA8FB96EBD65 (suivi_signal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vuutil (id INT AUTO_INCREMENT NOT NULL, code_vu VARCHAR(255) NOT NULL, code_cis VARCHAR(255) DEFAULT NULL, code_dossier VARCHAR(255) DEFAULT NULL, nom_vu VARCHAR(255) DEFAULT NULL, dbo_autorisation_lib_abr VARCHAR(255) DEFAULT NULL, dbo_classe_atc_lib_abr VARCHAR(255) DEFAULT NULL, dbo_classe_atc_lib_court VARCHAR(255) DEFAULT NULL, lib_court VARCHAR(255) DEFAULT NULL, code_contact VARCHAR(255) DEFAULT NULL, nom_contact_libra VARCHAR(255) DEFAULT NULL, adresse_contact VARCHAR(255) DEFAULT NULL, adresse_compl VARCHAR(255) DEFAULT NULL, code_post VARCHAR(255) DEFAULT NULL, nom_ville VARCHAR(255) DEFAULT NULL, tel_contact VARCHAR(255) DEFAULT NULL, fax_contact VARCHAR(255) DEFAULT NULL, dbo_pays_lib_court VARCHAR(255) DEFAULT NULL, dbo_statut_speci_lib_abr VARCHAR(255) DEFAULT NULL, statut_abrege VARCHAR(255) DEFAULT NULL, code_acteur VARCHAR(255) DEFAULT NULL, code_tigre VARCHAR(255) DEFAULT NULL, nom_acteur_long VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, adresse_compl_expl VARCHAR(255) DEFAULT NULL, code_post_expl VARCHAR(255) DEFAULT NULL, nom_ville_expl VARCHAR(255) DEFAULT NULL, complement VARCHAR(255) DEFAULT NULL, tel VARCHAR(255) DEFAULT NULL, fax VARCHAR(255) DEFAULT NULL, dbo_pays_lib_abr VARCHAR(255) DEFAULT NULL, code_produit VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mesure ADD CONSTRAINT FK_5F1B6E705CC1CB4A FOREIGN KEY (libelle_mesure_id) REFERENCES libelle_mesure (id)');
        $this->addSql('ALTER TABLE mesure ADD CONSTRAINT FK_5F1B6E709847A02D FOREIGN KEY (mesure_releve_decision_id) REFERENCES releve_decision (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27545918E7 FOREIGN KEY (produit_signal_id) REFERENCES `signal` (id)');
        $this->addSql('ALTER TABLE releve_decision ADD CONSTRAINT FK_38F349212A86559F FOREIGN KEY (classification_id) REFERENCES classification_rev_dec (id)');
        $this->addSql('ALTER TABLE releve_decision ADD CONSTRAINT FK_38F34921A594C238 FOREIGN KEY (releve_decision_signal_id) REFERENCES `signal` (id)');
        $this->addSql('ALTER TABLE releve_decision ADD CONSTRAINT FK_38F34921E7199D48 FOREIGN KEY (passage_ctp_id) REFERENCES passage_ctp (id)');
        $this->addSql('ALTER TABLE releve_decision ADD CONSTRAINT FK_38F349218F063F88 FOREIGN KEY (passage_rss_id) REFERENCES passage_rss (id)');
        $this->addSql('ALTER TABLE `signal` ADD CONSTRAINT FK_740C95F5B850D5C5 FOREIGN KEY (source_signal_id) REFERENCES source_signal (id)');
        $this->addSql('ALTER TABLE `signal` ADD CONSTRAINT FK_740C95F5B9330DD2 FOREIGN KEY (pole_ds_id) REFERENCES pole_ds (id)');
        $this->addSql('ALTER TABLE `signal` ADD CONSTRAINT FK_740C95F513496CEF FOREIGN KEY (dmm_id) REFERENCES dmm (id)');
        $this->addSql('ALTER TABLE `signal` ADD CONSTRAINT FK_740C95F5BC73C17A FOREIGN KEY (pilote_ds_id) REFERENCES pilote_ds (id)');
        $this->addSql('ALTER TABLE `signal` ADD CONSTRAINT FK_740C95F5B785F2F3 FOREIGN KEY (co_pilote_ds_id) REFERENCES co_pilote_ds (id)');
        $this->addSql('ALTER TABLE `signal` ADD CONSTRAINT FK_740C95F57160D3C9 FOREIGN KEY (statut_signal_id) REFERENCES statut_signal (id)');
        $this->addSql('ALTER TABLE `signal` ADD CONSTRAINT FK_740C95F5405D25 FOREIGN KEY (statut_emetteur_id) REFERENCES statut_emetteur (id)');
        $this->addSql('ALTER TABLE suivi ADD CONSTRAINT FK_2EBCCA8FFC83ECC7 FOREIGN KEY (emetteur_suivi_id) REFERENCES emetteur_suivi (id)');
        $this->addSql('ALTER TABLE suivi ADD CONSTRAINT FK_2EBCCA8FB96EBD65 FOREIGN KEY (suivi_signal_id) REFERENCES `signal` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE releve_decision DROP FOREIGN KEY FK_38F349212A86559F');
        $this->addSql('ALTER TABLE `signal` DROP FOREIGN KEY FK_740C95F5B785F2F3');
        $this->addSql('ALTER TABLE `signal` DROP FOREIGN KEY FK_740C95F513496CEF');
        $this->addSql('ALTER TABLE suivi DROP FOREIGN KEY FK_2EBCCA8FFC83ECC7');
        $this->addSql('ALTER TABLE mesure DROP FOREIGN KEY FK_5F1B6E705CC1CB4A');
        $this->addSql('ALTER TABLE releve_decision DROP FOREIGN KEY FK_38F34921E7199D48');
        $this->addSql('ALTER TABLE releve_decision DROP FOREIGN KEY FK_38F349218F063F88');
        $this->addSql('ALTER TABLE `signal` DROP FOREIGN KEY FK_740C95F5BC73C17A');
        $this->addSql('ALTER TABLE `signal` DROP FOREIGN KEY FK_740C95F5B9330DD2');
        $this->addSql('ALTER TABLE mesure DROP FOREIGN KEY FK_5F1B6E709847A02D');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27545918E7');
        $this->addSql('ALTER TABLE releve_decision DROP FOREIGN KEY FK_38F34921A594C238');
        $this->addSql('ALTER TABLE suivi DROP FOREIGN KEY FK_2EBCCA8FB96EBD65');
        $this->addSql('ALTER TABLE `signal` DROP FOREIGN KEY FK_740C95F5B850D5C5');
        $this->addSql('ALTER TABLE `signal` DROP FOREIGN KEY FK_740C95F5405D25');
        $this->addSql('ALTER TABLE `signal` DROP FOREIGN KEY FK_740C95F57160D3C9');
        $this->addSql('DROP TABLE classification_rev_dec');
        $this->addSql('DROP TABLE co_pilote_ds');
        $this->addSql('DROP TABLE dmm');
        $this->addSql('DROP TABLE emetteur_suivi');
        $this->addSql('DROP TABLE libelle_mesure');
        $this->addSql('DROP TABLE mesure');
        $this->addSql('DROP TABLE passage_ctp');
        $this->addSql('DROP TABLE passage_rss');
        $this->addSql('DROP TABLE pilote_ds');
        $this->addSql('DROP TABLE pole_ds');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE releve_decision');
        $this->addSql('DROP TABLE savu');
        $this->addSql('DROP TABLE `signal`');
        $this->addSql('DROP TABLE source_signal');
        $this->addSql('DROP TABLE statut_emetteur');
        $this->addSql('DROP TABLE statut_signal');
        $this->addSql('DROP TABLE suivi');
        $this->addSql('DROP TABLE vuutil');
    }
}
