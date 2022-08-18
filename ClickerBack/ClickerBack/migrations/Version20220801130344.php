<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220801130344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cuivre CHANGE cuivre_count cuivre_count DOUBLE PRECISION NOT NULL, CHANGE cuivre_by_click cuivre_by_click DOUBLE PRECISION NOT NULL, CHANGE cuivre_by_auto_increment cuivre_by_auto_increment DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE fer CHANGE fer_count fer_count DOUBLE PRECISION NOT NULL, CHANGE fer_by_click fer_by_click DOUBLE PRECISION NOT NULL, CHANGE fer_by_auto_increment fer_by_auto_increment DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cuivre CHANGE cuivre_count cuivre_count INT NOT NULL, CHANGE cuivre_by_click cuivre_by_click INT NOT NULL, CHANGE cuivre_by_auto_increment cuivre_by_auto_increment INT NOT NULL');
        $this->addSql('ALTER TABLE fer CHANGE fer_count fer_count INT NOT NULL, CHANGE fer_by_click fer_by_click INT NOT NULL, CHANGE fer_by_auto_increment fer_by_auto_increment INT NOT NULL');
    }
}
