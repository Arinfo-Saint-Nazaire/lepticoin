<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200716133924 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notice (id INT AUTO_INCREMENT NOT NULL, title_notice VARCHAR(50) NOT NULL, price_notice INT NOT NULL, description_notice LONGTEXT NOT NULL, location_notice VARCHAR(255) NOT NULL, photo_one_notice VARCHAR(255) NOT NULL, photo_two_notice VARCHAR(255) DEFAULT NULL, photo_three_notice VARCHAR(255) DEFAULT NULL, category_professionnal_notice TINYINT(1) NOT NULL, date_notice DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE notice');
    }
}
