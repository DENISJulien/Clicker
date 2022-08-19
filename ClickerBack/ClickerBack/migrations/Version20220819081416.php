<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220819081416 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE basic_resources (id INT AUTO_INCREMENT NOT NULL, fer_count INT NOT NULL, fer_by_click INT NOT NULL, fer_by_auto_increment INT NOT NULL, fer_status TINYINT(1) NOT NULL, cuivre_count INT NOT NULL, cuivre_by_click INT NOT NULL, cuivre_by_auto_increment INT NOT NULL, cuivre_status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE basic_resources');
    }
}
