<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240202101141 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bar DROP FOREIGN KEY FK_4EB2CA4A8E48560F');
        $this->addSql('ALTER TABLE baz DROP FOREIGN KEY FK_406942788E48560F');
        $this->addSql('ALTER TABLE qux DROP FOREIGN KEY FK_9EA9E9288E48560F');
        $this->addSql('DROP TABLE bar');
        $this->addSql('DROP TABLE baz');
        $this->addSql('DROP TABLE foo');
        $this->addSql('DROP TABLE qux');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bar (id INT AUTO_INCREMENT NOT NULL, foo_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_4EB2CA4A8E48560F (foo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE baz (id INT AUTO_INCREMENT NOT NULL, foo_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_406942788E48560F (foo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE foo (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE qux (id INT AUTO_INCREMENT NOT NULL, foo_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_9EA9E9288E48560F (foo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE bar ADD CONSTRAINT FK_4EB2CA4A8E48560F FOREIGN KEY (foo_id) REFERENCES foo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE baz ADD CONSTRAINT FK_406942788E48560F FOREIGN KEY (foo_id) REFERENCES foo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE qux ADD CONSTRAINT FK_9EA9E9288E48560F FOREIGN KEY (foo_id) REFERENCES foo (id) ON DELETE CASCADE');
    }
}
