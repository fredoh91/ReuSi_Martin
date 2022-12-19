<?php

declare(strict_types=1);

namespace default;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221216153120 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE relevedecision DROP FOREIGN KEY FK_FD82360A6C4D182');
        $this->addSql('DROP INDEX UNIQ_FD82360A6C4D182 ON relevedecision');
        $this->addSql('ALTER TABLE relevedecision ADD ReleveDecisionSignal_id INT DEFAULT NULL, DROP ReleveSuivi_id, CHANGE DateReuSig DateReuSig DATETIME NOT NULL');
        $this->addSql('ALTER TABLE relevedecision ADD CONSTRAINT FK_FD82360A3236E5D0 FOREIGN KEY (ReleveDecisionSignal_id) REFERENCES `signal` (id)');
        $this->addSql('CREATE INDEX IDX_FD82360A3236E5D0 ON relevedecision (ReleveDecisionSignal_id)');
        $this->addSql('ALTER TABLE `signal` CHANGE DateCreation DateCreation DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE ReleveDecision DROP FOREIGN KEY FK_FD82360A3236E5D0');
        $this->addSql('DROP INDEX IDX_FD82360A3236E5D0 ON ReleveDecision');
        $this->addSql('ALTER TABLE ReleveDecision ADD ReleveSuivi_id INT NOT NULL, DROP ReleveDecisionSignal_id, CHANGE DateReuSig DateReuSig DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE ReleveDecision ADD CONSTRAINT FK_FD82360A6C4D182 FOREIGN KEY (ReleveSuivi_id) REFERENCES suivi (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FD82360A6C4D182 ON ReleveDecision (ReleveSuivi_id)');
        $this->addSql('ALTER TABLE `signal` CHANGE DateCreation DateCreation DATETIME DEFAULT NULL');
    }
}
