<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210424221844 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pointeuse (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, chantiers_id INT DEFAULT NULL, date DATE NOT NULL, duree VARCHAR(255) DEFAULT NULL, INDEX IDX_58EB5617A76ED395 (user_id), INDEX IDX_58EB5617691F92D8 (chantiers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pointeuse ADD CONSTRAINT FK_58EB5617A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE pointeuse ADD CONSTRAINT FK_58EB5617691F92D8 FOREIGN KEY (chantiers_id) REFERENCES chantier (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pointeuse');
    }
}
