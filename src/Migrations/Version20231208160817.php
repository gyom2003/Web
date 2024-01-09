<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231208160817 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP categorymain');
        $this->addSql('ALTER TABLE items DROP category_ref, DROP category_relation');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category ADD categorymain VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE items ADD category_ref VARCHAR(255) NOT NULL, ADD category_relation VARCHAR(255) NOT NULL');
    }
}
