<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211208151103 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, order_date DATETIME NOT NULL, bil_date DATETIME DEFAULT NULL, payment_date DATETIME DEFAULT NULL, ship_date DATETIME DEFAULT NULL, reception_date DATETIME DEFAULT NULL, status VARCHAR(10) DEFAULT NULL, delivery_invoice TINYINT(1) NOT NULL, d_note LONGTEXT NOT NULL, delivery_adress VARCHAR(255) DEFAULT NULL, delivery_city VARCHAR(50) DEFAULT NULL, delivery_countries VARCHAR(50) DEFAULT NULL, delivery_zipcode VARCHAR(20) DEFAULT NULL, additional_reduction NUMERIC(10, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE orders');
    }
}
