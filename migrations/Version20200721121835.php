<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200721121835 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE faq (id INT AUTO_INCREMENT NOT NULL, question LONGTEXT NOT NULL, answer LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD first_name_user VARCHAR(50) DEFAULT NULL, ADD last_name_user VARCHAR(50) DEFAULT NULL, ADD photo_user VARCHAR(255) DEFAULT NULL, ADD birthday_date_user DATE DEFAULT NULL, ADD phone_user VARCHAR(10) DEFAULT NULL, ADD adress_user VARCHAR(50) DEFAULT NULL, ADD city_user VARCHAR(50) DEFAULT NULL, ADD postal_code_user VARCHAR(10) DEFAULT NULL, ADD civility_user TINYINT(1) DEFAULT NULL, ADD registration_date_user DATETIME DEFAULT NULL, ADD pseudo_user VARCHAR(50) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE faq');
        $this->addSql('ALTER TABLE user DROP first_name_user, DROP last_name_user, DROP photo_user, DROP birthday_date_user, DROP phone_user, DROP adress_user, DROP city_user, DROP postal_code_user, DROP civility_user, DROP registration_date_user, DROP pseudo_user');
    }
}
