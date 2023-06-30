<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230504144018 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
       $this->addSql('ALTER TABLE relevedecision DROP FOREIGN KEY FK_FD82360A3236E5D0');
        $this->addSql('DROP INDEX IDX_FD82360A3236E5D0 ON relevedecision');
        $this->addSql('ALTER TABLE relevedecision CHANGE ReleveDecisionSignal_id Suivi_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE relevedecision ADD CONSTRAINT FK_FD82360A869C3B96 FOREIGN KEY (Suivi_id) REFERENCES Suivi (id)');
        $this->addSql('CREATE INDEX IDX_FD82360A869C3B96 ON relevedecision (Suivi_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ReleveDecision DROP FOREIGN KEY FK_FD82360A869C3B96');
        $this->addSql('DROP INDEX IDX_FD82360A869C3B96 ON ReleveDecision');
        $this->addSql('ALTER TABLE ReleveDecision CHANGE Suivi_id ReleveDecisionSignal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ReleveDecision ADD CONSTRAINT FK_FD82360A3236E5D0 FOREIGN KEY (ReleveDecisionSignal_id) REFERENCES `signal` (id)');
        $this->addSql('CREATE INDEX IDX_FD82360A3236E5D0 ON ReleveDecision (ReleveDecisionSignal_id)');
    }
}
