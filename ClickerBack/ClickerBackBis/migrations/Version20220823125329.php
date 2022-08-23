<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220823125329 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_basic_resources (user_id INT NOT NULL, basic_resources_id INT NOT NULL, INDEX IDX_4E6616AA76ED395 (user_id), INDEX IDX_4E6616ABACA7092 (basic_resources_id), PRIMARY KEY(user_id, basic_resources_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_craft_resources (user_id INT NOT NULL, craft_resources_id INT NOT NULL, INDEX IDX_86CCFE9DA76ED395 (user_id), INDEX IDX_86CCFE9D27234A46 (craft_resources_id), PRIMARY KEY(user_id, craft_resources_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_technology_tree (user_id INT NOT NULL, technology_tree_id INT NOT NULL, INDEX IDX_3E14859A76ED395 (user_id), INDEX IDX_3E1485946C52114 (technology_tree_id), PRIMARY KEY(user_id, technology_tree_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_basic_resources ADD CONSTRAINT FK_4E6616AA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_basic_resources ADD CONSTRAINT FK_4E6616ABACA7092 FOREIGN KEY (basic_resources_id) REFERENCES basic_resources (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_craft_resources ADD CONSTRAINT FK_86CCFE9DA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_craft_resources ADD CONSTRAINT FK_86CCFE9D27234A46 FOREIGN KEY (craft_resources_id) REFERENCES craft_resources (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_technology_tree ADD CONSTRAINT FK_3E14859A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_technology_tree ADD CONSTRAINT FK_3E1485946C52114 FOREIGN KEY (technology_tree_id) REFERENCES technology_tree (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649BACA7092');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64927234A46');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64946C52114');
        $this->addSql('DROP INDEX IDX_8D93D64927234A46 ON user');
        $this->addSql('DROP INDEX IDX_8D93D64946C52114 ON user');
        $this->addSql('DROP INDEX IDX_8D93D649BACA7092 ON user');
        $this->addSql('ALTER TABLE user DROP basic_resources_id, DROP craft_resources_id, DROP technology_tree_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_basic_resources DROP FOREIGN KEY FK_4E6616AA76ED395');
        $this->addSql('ALTER TABLE user_basic_resources DROP FOREIGN KEY FK_4E6616ABACA7092');
        $this->addSql('ALTER TABLE user_craft_resources DROP FOREIGN KEY FK_86CCFE9DA76ED395');
        $this->addSql('ALTER TABLE user_craft_resources DROP FOREIGN KEY FK_86CCFE9D27234A46');
        $this->addSql('ALTER TABLE user_technology_tree DROP FOREIGN KEY FK_3E14859A76ED395');
        $this->addSql('ALTER TABLE user_technology_tree DROP FOREIGN KEY FK_3E1485946C52114');
        $this->addSql('DROP TABLE user_basic_resources');
        $this->addSql('DROP TABLE user_craft_resources');
        $this->addSql('DROP TABLE user_technology_tree');
        $this->addSql('ALTER TABLE `user` ADD basic_resources_id INT DEFAULT NULL, ADD craft_resources_id INT DEFAULT NULL, ADD technology_tree_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649BACA7092 FOREIGN KEY (basic_resources_id) REFERENCES basic_resources (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D64927234A46 FOREIGN KEY (craft_resources_id) REFERENCES craft_resources (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D64946C52114 FOREIGN KEY (technology_tree_id) REFERENCES technology_tree (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64927234A46 ON `user` (craft_resources_id)');
        $this->addSql('CREATE INDEX IDX_8D93D64946C52114 ON `user` (technology_tree_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649BACA7092 ON `user` (basic_resources_id)');
    }
}
