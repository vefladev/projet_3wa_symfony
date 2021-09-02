<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210901132940 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE training (id INT AUTO_INCREMENT NOT NULL, coach_id INT DEFAULT NULL, user_nom_id INT DEFAULT NULL, started_at DATETIME NOT NULL, ended_at DATETIME DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_D5128A8F3C105691 (coach_id), INDEX IDX_D5128A8FAD4007D4 (user_nom_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, image_name VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, telephone VARCHAR(13) DEFAULT NULL, date_de_naissance DATE NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8F3C105691 FOREIGN KEY (coach_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8FAD4007D4 FOREIGN KEY (user_nom_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8F3C105691');
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8FAD4007D4');
        $this->addSql('DROP TABLE training');
        $this->addSql('DROP TABLE user');
    }
}
