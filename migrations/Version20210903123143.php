<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210903123143 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8F3C105691');
        $this->addSql('DROP INDEX IDX_D5128A8F3C105691 ON training');
        $this->addSql('ALTER TABLE training CHANGE coach_id coachs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8F60450EA1 FOREIGN KEY (coachs_id) REFERENCES coach (id)');
        $this->addSql('CREATE INDEX IDX_D5128A8F60450EA1 ON training (coachs_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8F60450EA1');
        $this->addSql('DROP INDEX IDX_D5128A8F60450EA1 ON training');
        $this->addSql('ALTER TABLE training CHANGE coachs_id coach_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8F3C105691 FOREIGN KEY (coach_id) REFERENCES coach (id)');
        $this->addSql('CREATE INDEX IDX_D5128A8F3C105691 ON training (coach_id)');
    }
}
