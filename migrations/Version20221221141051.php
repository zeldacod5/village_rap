<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221221141051 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artist (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, picture LONGTEXT DEFAULT NULL, sales INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artist_product (artist_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_64055A9AB7970CF8 (artist_id), INDEX IDX_64055A9A4584665A (product_id), PRIMARY KEY(artist_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE label (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, picture LONGTEXT DEFAULT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE label_product (label_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_6FCBAD8433B92F39 (label_id), INDEX IDX_6FCBAD844584665A (product_id), PRIMARY KEY(label_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artist_product ADD CONSTRAINT FK_64055A9AB7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_product ADD CONSTRAINT FK_64055A9A4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE label_product ADD CONSTRAINT FK_6FCBAD8433B92F39 FOREIGN KEY (label_id) REFERENCES label (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE label_product ADD CONSTRAINT FK_6FCBAD844584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artist_product DROP FOREIGN KEY FK_64055A9AB7970CF8');
        $this->addSql('ALTER TABLE artist_product DROP FOREIGN KEY FK_64055A9A4584665A');
        $this->addSql('ALTER TABLE label_product DROP FOREIGN KEY FK_6FCBAD8433B92F39');
        $this->addSql('ALTER TABLE label_product DROP FOREIGN KEY FK_6FCBAD844584665A');
        $this->addSql('DROP TABLE artist');
        $this->addSql('DROP TABLE artist_product');
        $this->addSql('DROP TABLE label');
        $this->addSql('DROP TABLE label_product');
    }
}
