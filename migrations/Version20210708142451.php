<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210708142451 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA trend');
        $this->addSql('CREATE SEQUENCE trend.attribute_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE trend.action_operator (id SMALLINT NOT NULL, name VARCHAR(128) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON TABLE trend.action_operator IS \'Действия оператора\'');
        $this->addSql('COMMENT ON COLUMN trend.action_operator.name IS \'Название действия\'');
        $this->addSql('CREATE TABLE trend.attribute (id INT NOT NULL, name VARCHAR(128) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON TABLE trend.attribute IS \'Свойства\'');
        $this->addSql('CREATE TABLE trend.error (id SMALLINT NOT NULL, text VARCHAR(128) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON TABLE trend.error IS \'Ошибки\'');
        $this->addSql('COMMENT ON COLUMN trend.error.id IS \'Код ошибки\'');
        $this->addSql('COMMENT ON COLUMN trend.error.text IS \'Текст ошибки\'');
        $this->addSql('CREATE TABLE trend.event (drec TIMESTAMP(0) WITH TIME ZONE NOT NULL, type VARCHAR(1) NOT NULL, source VARCHAR(1) NOT NULL, text VARCHAR(128) NOT NULL, code SMALLINT NOT NULL, PRIMARY KEY(drec))');
        $this->addSql('CREATE INDEX IDX_BB8642508CDE5729 ON trend.event (type)');
        $this->addSql('CREATE INDEX IDX_BB8642505F8A7F73 ON trend.event (source)');
        $this->addSql('COMMENT ON COLUMN trend.event.drec IS \'Начало события\'');
        $this->addSql('CREATE TABLE trend.event_source (id VARCHAR(1) NOT NULL, name VARCHAR(16) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON TABLE trend.event_source IS \'Источник события\'');
        $this->addSql('COMMENT ON COLUMN trend.event_source.name IS \'Название события\'');
        $this->addSql('CREATE TABLE trend.event_type (id VARCHAR(1) NOT NULL, name VARCHAR(16) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON TABLE trend.event_type IS \'Типы события\'');
        $this->addSql('CREATE TABLE trend.trend (drec TIMESTAMP(0) WITH TIME ZONE NOT NULL, attribute_id INT NOT NULL, value SMALLINT NOT NULL, PRIMARY KEY(drec))');
        $this->addSql('CREATE INDEX IDX_74D37B51B6E62EFA ON trend.trend (attribute_id)');
        $this->addSql('COMMENT ON TABLE trend.trend IS \'Тендеции\'');
        $this->addSql('COMMENT ON COLUMN trend.trend.drec IS \'Время изменения значения тренда(DC2Type:carbondatetimetz)\'');
        $this->addSql('COMMENT ON COLUMN trend.trend.value IS \'Значение\'');
        $this->addSql('ALTER TABLE trend.event ADD CONSTRAINT FK_BB8642508CDE5729 FOREIGN KEY (type) REFERENCES trend.event_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE trend.event ADD CONSTRAINT FK_BB8642505F8A7F73 FOREIGN KEY (source) REFERENCES trend.event_source (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE trend.trend ADD CONSTRAINT FK_74D37B51B6E62EFA FOREIGN KEY (attribute_id) REFERENCES trend.attribute (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE trend.trend DROP CONSTRAINT FK_74D37B51B6E62EFA');
        $this->addSql('ALTER TABLE trend.event DROP CONSTRAINT FK_BB8642505F8A7F73');
        $this->addSql('ALTER TABLE trend.event DROP CONSTRAINT FK_BB8642508CDE5729');
        $this->addSql('DROP SEQUENCE trend.attribute_id_seq CASCADE');
        $this->addSql('DROP TABLE trend.action_operator');
        $this->addSql('DROP TABLE trend.attribute');
        $this->addSql('DROP TABLE trend.error');
        $this->addSql('DROP TABLE trend.event');
        $this->addSql('DROP TABLE trend.event_source');
        $this->addSql('DROP TABLE trend.event_type');
        $this->addSql('DROP TABLE trend.trend');
    }
}
