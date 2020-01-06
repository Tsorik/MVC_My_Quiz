<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191128145238 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reponse_user ADD user_id INT DEFAULT NULL, ADD question_id INT NOT NULL, ADD reponse_id INT NOT NULL, ADD user_anonyme VARCHAR(255) DEFAULT NULL, ADD has_right TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE reponse_user ADD CONSTRAINT FK_B1F89F0AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reponse_user ADD CONSTRAINT FK_B1F89F0A1E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE reponse_user ADD CONSTRAINT FK_B1F89F0ACF18BB82 FOREIGN KEY (reponse_id) REFERENCES reponse (id)');
        $this->addSql('CREATE INDEX IDX_B1F89F0AA76ED395 ON reponse_user (user_id)');
        $this->addSql('CREATE INDEX IDX_B1F89F0A1E27F6BF ON reponse_user (question_id)');
        $this->addSql('CREATE INDEX IDX_B1F89F0ACF18BB82 ON reponse_user (reponse_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reponse_user DROP FOREIGN KEY FK_B1F89F0AA76ED395');
        $this->addSql('ALTER TABLE reponse_user DROP FOREIGN KEY FK_B1F89F0A1E27F6BF');
        $this->addSql('ALTER TABLE reponse_user DROP FOREIGN KEY FK_B1F89F0ACF18BB82');
        $this->addSql('DROP INDEX IDX_B1F89F0AA76ED395 ON reponse_user');
        $this->addSql('DROP INDEX IDX_B1F89F0A1E27F6BF ON reponse_user');
        $this->addSql('DROP INDEX IDX_B1F89F0ACF18BB82 ON reponse_user');
        $this->addSql('ALTER TABLE reponse_user DROP user_id, DROP question_id, DROP reponse_id, DROP user_anonyme, DROP has_right');
    }
}
