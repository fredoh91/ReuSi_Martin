<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240201165251 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Bar (id INT AUTO_INCREMENT NOT NULL, foo_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, INDEX IDX_4EB2CA4A8E48560F (foo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Baz (id INT AUTO_INCREMENT NOT NULL, foo_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, INDEX IDX_406942788E48560F (foo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Foo (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Qux (id INT AUTO_INCREMENT NOT NULL, foo_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, INDEX IDX_9EA9E9288E48560F (foo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Bar ADD CONSTRAINT FK_4EB2CA4A8E48560F FOREIGN KEY (foo_id) REFERENCES Foo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Baz ADD CONSTRAINT FK_406942788E48560F FOREIGN KEY (foo_id) REFERENCES Foo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Qux ADD CONSTRAINT FK_9EA9E9288E48560F FOREIGN KEY (foo_id) REFERENCES Foo (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Bar DROP FOREIGN KEY FK_4EB2CA4A8E48560F');
        $this->addSql('ALTER TABLE Baz DROP FOREIGN KEY FK_406942788E48560F');
        $this->addSql('ALTER TABLE Qux DROP FOREIGN KEY FK_9EA9E9288E48560F');
        $this->addSql('DROP TABLE Bar');
        $this->addSql('DROP TABLE Baz');
        $this->addSql('DROP TABLE Foo');
        $this->addSql('DROP TABLE Qux');
    }
}
