<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240203124611 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE NiveauRisqueFinal (id INT AUTO_INCREMENT NOT NULL, Libelle VARCHAR(255) NOT NULL, Actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE NiveauRisqueInitial (id INT AUTO_INCREMENT NOT NULL, Libelle VARCHAR(255) NOT NULL, Actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE signal_ansm ADD NiveauRisqueInitial_id INT DEFAULT NULL, ADD NiveauRisqueFinal_id INT DEFAULT NULL, DROP NiveauRisqueInitial, DROP NiveauRisqueFinal');
        $this->addSql('ALTER TABLE signal_ansm ADD CONSTRAINT FK_C2A065B6A3D7ACCB FOREIGN KEY (NiveauRisqueInitial_id) REFERENCES NiveauRisqueInitial (id)');
        $this->addSql('ALTER TABLE signal_ansm ADD CONSTRAINT FK_C2A065B6DED8B1F7 FOREIGN KEY (NiveauRisqueFinal_id) REFERENCES NiveauRisqueFinal (id)');
        $this->addSql('CREATE INDEX IDX_C2A065B6A3D7ACCB ON signal_ansm (NiveauRisqueInitial_id)');
        $this->addSql('CREATE INDEX IDX_C2A065B6DED8B1F7 ON signal_ansm (NiveauRisqueFinal_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE signal_ansm DROP FOREIGN KEY FK_C2A065B6DED8B1F7');
        $this->addSql('ALTER TABLE signal_ansm DROP FOREIGN KEY FK_C2A065B6A3D7ACCB');
        $this->addSql('DROP TABLE NiveauRisqueFinal');
        $this->addSql('DROP TABLE NiveauRisqueInitial');
        $this->addSql('DROP INDEX IDX_C2A065B6A3D7ACCB ON signal_ansm');
        $this->addSql('DROP INDEX IDX_C2A065B6DED8B1F7 ON signal_ansm');
        $this->addSql('ALTER TABLE signal_ansm ADD NiveauRisqueInitial VARCHAR(255) DEFAULT NULL, ADD NiveauRisqueFinal VARCHAR(255) DEFAULT NULL, DROP NiveauRisqueInitial_id, DROP NiveauRisqueFinal_id');
    }
}
