<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220604112452 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments ADD author_id INT UNSIGNED NOT NULL, CHANGE content_id content_id INT NOT NULL');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AF675F31B FOREIGN KEY (author_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_5F9E962AF675F31B ON comments (author_id)');
        $this->addSql('ALTER TABLE opinions CHANGE date date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE author_id author_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE opinions ADD CONSTRAINT FK_BEAF78D0F675F31B FOREIGN KEY (author_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AF675F31B');
        $this->addSql('DROP INDEX IDX_5F9E962AF675F31B ON comments');
        $this->addSql('ALTER TABLE comments DROP author_id, CHANGE content_id content_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE opinions DROP FOREIGN KEY FK_BEAF78D0F675F31B');
        $this->addSql('ALTER TABLE opinions CHANGE author_id author_id INT UNSIGNED DEFAULT NULL, CHANGE date date DATETIME NOT NULL');
    }
}
