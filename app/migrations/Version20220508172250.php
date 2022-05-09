<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220508172250 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments CHANGE user_id user_id INT UNSIGNED NOT NULL, CHANGE content_id content_id INT NOT NULL');
        $this->addSql('ALTER TABLE opinions CHANGE user_id user_id INT UNSIGNED NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments CHANGE user_id user_id INT UNSIGNED DEFAULT NULL, CHANGE content_id content_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE opinions CHANGE user_id user_id INT UNSIGNED DEFAULT NULL');
    }
}
