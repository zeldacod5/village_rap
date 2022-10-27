<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221027132142 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE buyer (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, ref LONGTEXT DEFAULT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, zipcode VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, picture LONGTEXT DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE composed_by (id INT AUTO_INCREMENT NOT NULL, payment_id INT DEFAULT NULL, composed_taxes DOUBLE PRECISION DEFAULT NULL, composed_quantity INT NOT NULL, composed_sell_price DOUBLE PRECISION NOT NULL, composed_with_details LONGTEXT DEFAULT NULL, INDEX IDX_8F0D9B714C3A3BB (payment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE deal (id INT AUTO_INCREMENT NOT NULL, buyer_id INT DEFAULT NULL, staff_id INT DEFAULT NULL, INDEX IDX_E3FEC1166C755722 (buyer_id), INDEX IDX_E3FEC116D4D57CD (staff_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delivery (id INT AUTO_INCREMENT NOT NULL, payment_id INT DEFAULT NULL, number VARCHAR(255) NOT NULL, date DATETIME DEFAULT NULL, follow_up LONGTEXT DEFAULT NULL, INDEX IDX_3781EC104C3A3BB (payment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, buyer_id INT DEFAULT NULL, coeffficient VARCHAR(255) DEFAULT NULL, reduction DOUBLE PRECISION DEFAULT NULL, delivery_adress VARCHAR(255) NOT NULL, delivery_zipcode VARCHAR(255) NOT NULL, delivery_city VARCHAR(255) NOT NULL, delivery_country VARCHAR(255) NOT NULL, billing_adress VARCHAR(255) NOT NULL, billing_zipcode VARCHAR(255) NOT NULL, billing_city VARCHAR(255) NOT NULL, billing_country VARCHAR(255) NOT NULL, methode VARCHAR(255) NOT NULL, date DATETIME NOT NULL, delete_date DATETIME DEFAULT NULL, facturation_number VARCHAR(255) DEFAULT NULL, INDEX IDX_E52FFDEE6C755722 (buyer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prepared (id INT AUTO_INCREMENT NOT NULL, delivery_id INT DEFAULT NULL, delivery_quantity INT NOT NULL, INDEX IDX_95D4E72612136921 (delivery_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, supplier_id INT DEFAULT NULL, composed_by_id INT DEFAULT NULL, prepared_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, short_lib VARCHAR(255) DEFAULT NULL, long_lib LONGTEXT DEFAULT NULL, reference LONGTEXT DEFAULT NULL, price INT DEFAULT NULL, picture LONGTEXT DEFAULT NULL, stock INT DEFAULT NULL, stock_max VARCHAR(255) DEFAULT NULL, stock_alert INT DEFAULT NULL, price_included_taxes DOUBLE PRECISION DEFAULT NULL, INDEX IDX_D34A04AD2ADD6D8C (supplier_id), INDEX IDX_D34A04ADDF76E8B4 (composed_by_id), INDEX IDX_D34A04ADCA008C11 (prepared_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_subcategory (product_id INT NOT NULL, subcategory_id INT NOT NULL, INDEX IDX_A1F33A574584665A (product_id), INDEX IDX_A1F33A575DC6FE57 (subcategory_id), PRIMARY KEY(product_id, subcategory_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staff (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, zipcode VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subcategory (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, picture LONGTEXT DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_DDCA44812469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE supplier (id INT AUTO_INCREMENT NOT NULL, phone VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, zipcode VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE composed_by ADD CONSTRAINT FK_8F0D9B714C3A3BB FOREIGN KEY (payment_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE deal ADD CONSTRAINT FK_E3FEC1166C755722 FOREIGN KEY (buyer_id) REFERENCES buyer (id)');
        $this->addSql('ALTER TABLE deal ADD CONSTRAINT FK_E3FEC116D4D57CD FOREIGN KEY (staff_id) REFERENCES staff (id)');
        $this->addSql('ALTER TABLE delivery ADD CONSTRAINT FK_3781EC104C3A3BB FOREIGN KEY (payment_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE6C755722 FOREIGN KEY (buyer_id) REFERENCES buyer (id)');
        $this->addSql('ALTER TABLE prepared ADD CONSTRAINT FK_95D4E72612136921 FOREIGN KEY (delivery_id) REFERENCES delivery (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD2ADD6D8C FOREIGN KEY (supplier_id) REFERENCES supplier (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADDF76E8B4 FOREIGN KEY (composed_by_id) REFERENCES composed_by (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADCA008C11 FOREIGN KEY (prepared_id) REFERENCES prepared (id)');
        $this->addSql('ALTER TABLE product_subcategory ADD CONSTRAINT FK_A1F33A574584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_subcategory ADD CONSTRAINT FK_A1F33A575DC6FE57 FOREIGN KEY (subcategory_id) REFERENCES subcategory (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subcategory ADD CONSTRAINT FK_DDCA44812469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE composed_by DROP FOREIGN KEY FK_8F0D9B714C3A3BB');
        $this->addSql('ALTER TABLE deal DROP FOREIGN KEY FK_E3FEC1166C755722');
        $this->addSql('ALTER TABLE deal DROP FOREIGN KEY FK_E3FEC116D4D57CD');
        $this->addSql('ALTER TABLE delivery DROP FOREIGN KEY FK_3781EC104C3A3BB');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE6C755722');
        $this->addSql('ALTER TABLE prepared DROP FOREIGN KEY FK_95D4E72612136921');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD2ADD6D8C');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADDF76E8B4');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADCA008C11');
        $this->addSql('ALTER TABLE product_subcategory DROP FOREIGN KEY FK_A1F33A574584665A');
        $this->addSql('ALTER TABLE product_subcategory DROP FOREIGN KEY FK_A1F33A575DC6FE57');
        $this->addSql('ALTER TABLE subcategory DROP FOREIGN KEY FK_DDCA44812469DE2');
        $this->addSql('DROP TABLE buyer');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE composed_by');
        $this->addSql('DROP TABLE deal');
        $this->addSql('DROP TABLE delivery');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE prepared');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_subcategory');
        $this->addSql('DROP TABLE staff');
        $this->addSql('DROP TABLE subcategory');
        $this->addSql('DROP TABLE supplier');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
