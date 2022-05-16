<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220508170612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE comments ADD user_id INT UNSIGNED DEFAULT NULL, ADD content_id INT DEFAULT NULL, ADD is_accepted TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE comments ADD content_id INT DEFAULT NULL, ADD is_accepted TINYINT(1) NOT NULL');

//        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A84A0A3ED FOREIGN KEY (content_id) REFERENCES content (id)');
//        $this->addSql('CREATE INDEX IDX_5F9E962AA76ED395 ON comments (user_id)');
        $this->addSql('CREATE INDEX IDX_5F9E962A84A0A3ED ON comments (content_id)');

//        $this->addSql('ALTER TABLE opinions ADD user_id INT UNSIGNED DEFAULT NULL, ADD is_accepted TINYINT(1) NOT NULL, CHANGE message message VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE opinions ADD is_accepted TINYINT(1) NOT NULL, CHANGE message message VARCHAR(255) NOT NULL');

//        $this->addSql('ALTER TABLE opinions ADD CONSTRAINT FK_BEAF78D0A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
//        $this->addSql('CREATE INDEX IDX_BEAF78D0A76ED395 ON opinions (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AA76ED395');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A84A0A3ED');
        $this->addSql('DROP INDEX IDX_5F9E962AA76ED395 ON comments');
        $this->addSql('DROP INDEX IDX_5F9E962A84A0A3ED ON comments');

//        $this->addSql('ALTER TABLE comments DROP user_id, DROP content_id, DROP is_accepted');
        $this->addSql('ALTER TABLE comments DROP content_id, DROP is_accepted');

        $this->addSql('ALTER TABLE opinions DROP FOREIGN KEY FK_BEAF78D0A76ED395');
        $this->addSql('DROP INDEX IDX_BEAF78D0A76ED395 ON opinions');

//        $this->addSql('ALTER TABLE opinions DROP user_id, DROP is_accepted, CHANGE message message INT NOT NULL');
        $this->addSql('ALTER TABLE opinions DROP is_accepted, CHANGE message message INT NOT NULL');
    }
}
