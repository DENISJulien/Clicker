<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220823124835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE technology_tree (id INT AUTO_INCREMENT NOT NULL, technology_tree_name VARCHAR(50) NOT NULL, technology_tree_price INT NOT NULL, technology_tree_status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD basic_resources_id INT DEFAULT NULL, ADD craft_resources_id INT DEFAULT NULL, ADD technology_tree_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649BACA7092 FOREIGN KEY (basic_resources_id) REFERENCES basic_resources (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64927234A46 FOREIGN KEY (craft_resources_id) REFERENCES craft_resources (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64946C52114 FOREIGN KEY (technology_tree_id) REFERENCES technology_tree (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649BACA7092 ON user (basic_resources_id)');
        $this->addSql('CREATE INDEX IDX_8D93D64927234A46 ON user (craft_resources_id)');
        $this->addSql('CREATE INDEX IDX_8D93D64946C52114 ON user (technology_tree_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64946C52114');
        $this->addSql('DROP TABLE technology_tree');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649BACA7092');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64927234A46');
        $this->addSql('DROP INDEX IDX_8D93D649BACA7092 ON `user`');
        $this->addSql('DROP INDEX IDX_8D93D64927234A46 ON `user`');
        $this->addSql('DROP INDEX IDX_8D93D64946C52114 ON `user`');
        $this->addSql('ALTER TABLE `user` DROP basic_resources_id, DROP craft_resources_id, DROP technology_tree_id');
    }
}
