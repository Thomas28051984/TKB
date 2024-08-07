<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240807201138 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dossier ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE photo ADD dossier_id INT DEFAULT NULL, ADD name VARCHAR(255) NOT NULL, ADD path VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418611C0C56 FOREIGN KEY (dossier_id) REFERENCES dossier (id)');
        $this->addSql('CREATE INDEX IDX_14B78418611C0C56 ON photo (dossier_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dossier DROP name');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418611C0C56');
        $this->addSql('DROP INDEX IDX_14B78418611C0C56 ON photo');
        $this->addSql('ALTER TABLE photo DROP dossier_id, DROP name, DROP path');
    }
}
