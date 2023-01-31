<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230130120125 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE juego (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, ancho INT NOT NULL, largo INT NOT NULL, min_jugador INT NOT NULL, max_jugador INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE juego_evento (juego_id INT NOT NULL, evento_id INT NOT NULL, INDEX IDX_131B1E0113375255 (juego_id), INDEX IDX_131B1E0187A5F842 (evento_id), PRIMARY KEY(juego_id, evento_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE juego_evento ADD CONSTRAINT FK_131B1E0113375255 FOREIGN KEY (juego_id) REFERENCES juego (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE juego_evento ADD CONSTRAINT FK_131B1E0187A5F842 FOREIGN KEY (evento_id) REFERENCES evento (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reserva ADD juego_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3B13375255 FOREIGN KEY (juego_id) REFERENCES juego (id)');
        $this->addSql('CREATE INDEX IDX_188D2E3B13375255 ON reserva (juego_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3B13375255');
        $this->addSql('ALTER TABLE juego_evento DROP FOREIGN KEY FK_131B1E0113375255');
        $this->addSql('ALTER TABLE juego_evento DROP FOREIGN KEY FK_131B1E0187A5F842');
        $this->addSql('DROP TABLE juego');
        $this->addSql('DROP TABLE juego_evento');
        $this->addSql('DROP INDEX IDX_188D2E3B13375255 ON reserva');
        $this->addSql('ALTER TABLE reserva DROP juego_id');
    }
}
