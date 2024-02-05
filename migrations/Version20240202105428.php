<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240202105428 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_E618D5BB42DFC8A6 FOREIGN KEY (ProduitSignal_id) REFERENCES signal_ansm (id)');
        $this->addSql('ALTER TABLE suivi ADD CONSTRAINT FK_EF7DE58B17A26983 FOREIGN KEY (SuiviSignal_id) REFERENCES signal_ansm (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Produit DROP FOREIGN KEY FK_E618D5BB42DFC8A6');
        $this->addSql('ALTER TABLE Suivi DROP FOREIGN KEY FK_EF7DE58B17A26983');
    }
}
