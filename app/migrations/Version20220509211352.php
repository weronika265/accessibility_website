<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220509211352 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, content_id INT NOT NULL, message VARCHAR(255) NOT NULL, date DATETIME NOT NULL, is_accepted TINYINT(1) NOT NULL, INDEX IDX_5F9E962A84A0A3ED (content_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE content (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(32) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE opinions (id INT AUTO_INCREMENT NOT NULL, message VARCHAR(255) NOT NULL, date DATETIME NOT NULL, is_accepted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A84A0A3ED FOREIGN KEY (content_id) REFERENCES content (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A84A0A3ED');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE content');
        $this->addSql('DROP TABLE opinions');
    }
}
