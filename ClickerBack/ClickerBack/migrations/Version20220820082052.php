<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220820082052 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE craft_resources (id INT AUTO_INCREMENT NOT NULL, count_engrenage INT NOT NULL, status_engrenage TINYINT(1) NOT NULL, count_plaque_de_cuivre INT NOT NULL, status_plaque_de_cuivre TINYINT(1) NOT NULL, count_pack_de_science1 INT NOT NULL, status_pack_de_science1 INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE basic_resources ADD fer_name VARCHAR(255) NOT NULL, ADD cuivre_name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE craft_resources');
        $this->addSql('ALTER TABLE basic_resources DROP fer_name, DROP cuivre_name');
    }
}
