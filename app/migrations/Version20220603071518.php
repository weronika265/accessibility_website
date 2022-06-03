<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220603071518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE comments ADD author_id INT UNSIGNED DEFAULT NULL, ADD location_id INT NOT NULL');
//        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AF675F31B FOREIGN KEY (author_id) REFERENCES users (id)');
//        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A64D218E FOREIGN KEY (location_id) REFERENCES content (id)');
//        $this->addSql('CREATE INDEX IDX_5F9E962AF675F31B ON comments (author_id)');
//        $this->addSql('CREATE INDEX IDX_5F9E962A64D218E ON comments (location_id)');
//        $this->addSql('ALTER TABLE opinions ADD author_id INT UNSIGNED DEFAULT NULL');
//        $this->addSql('ALTER TABLE opinions ADD CONSTRAINT FK_BEAF78D0F675F31B FOREIGN KEY (author_id) REFERENCES users (id)');
//        $this->addSql('CREATE INDEX IDX_BEAF78D0F675F31B ON opinions (author_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AF675F31B');
//        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A64D218E');
//        $this->addSql('DROP INDEX IDX_5F9E962AF675F31B ON comments');
//        $this->addSql('DROP INDEX IDX_5F9E962A64D218E ON comments');
//        $this->addSql('ALTER TABLE comments DROP author_id, DROP location_id');
//        $this->addSql('ALTER TABLE opinions DROP FOREIGN KEY FK_BEAF78D0F675F31B');
//        $this->addSql('DROP INDEX IDX_BEAF78D0F675F31B ON opinions');
//        $this->addSql('ALTER TABLE opinions DROP author_id');
    }
}
