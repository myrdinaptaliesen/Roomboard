<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210222091520 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE creneau ADD formation_id INT DEFAULT NULL, ADD place_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE creneau ADD CONSTRAINT FK_F9668B5F5200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE creneau ADD CONSTRAINT FK_F9668B5FDA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('CREATE INDEX IDX_F9668B5F5200282E ON creneau (formation_id)');
        $this->addSql('CREATE INDEX IDX_F9668B5FDA6A219 ON creneau (place_id)');
        $this->addSql('ALTER TABLE formation ADD type_id INT DEFAULT NULL, ADD centre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF463CD7C3 FOREIGN KEY (centre_id) REFERENCES centre (id)');
        $this->addSql('CREATE INDEX IDX_404021BFC54C8C93 ON formation (type_id)');
        $this->addSql('CREATE INDEX IDX_404021BF463CD7C3 ON formation (centre_id)');
        $this->addSql('ALTER TABLE place ADD salle_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CDDC304035 FOREIGN KEY (salle_id) REFERENCES salle (id)');
        $this->addSql('CREATE INDEX IDX_741D53CDDC304035 ON place (salle_id)');
        $this->addSql('ALTER TABLE salle ADD centre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salle ADD CONSTRAINT FK_4E977E5C463CD7C3 FOREIGN KEY (centre_id) REFERENCES centre (id)');
        $this->addSql('CREATE INDEX IDX_4E977E5C463CD7C3 ON salle (centre_id)');
        $this->addSql('ALTER TABLE stagiaire ADD place_id INT DEFAULT NULL, ADD formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stagiaire ADD CONSTRAINT FK_4F62F731DA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE stagiaire ADD CONSTRAINT FK_4F62F7315200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_4F62F731DA6A219 ON stagiaire (place_id)');
        $this->addSql('CREATE INDEX IDX_4F62F7315200282E ON stagiaire (formation_id)');
        $this->addSql('ALTER TABLE utilisateur ADD centre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3463CD7C3 FOREIGN KEY (centre_id) REFERENCES centre (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3463CD7C3 ON utilisateur (centre_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE creneau DROP FOREIGN KEY FK_F9668B5F5200282E');
        $this->addSql('ALTER TABLE creneau DROP FOREIGN KEY FK_F9668B5FDA6A219');
        $this->addSql('DROP INDEX IDX_F9668B5F5200282E ON creneau');
        $this->addSql('DROP INDEX IDX_F9668B5FDA6A219 ON creneau');
        $this->addSql('ALTER TABLE creneau DROP formation_id, DROP place_id');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFC54C8C93');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF463CD7C3');
        $this->addSql('DROP INDEX IDX_404021BFC54C8C93 ON formation');
        $this->addSql('DROP INDEX IDX_404021BF463CD7C3 ON formation');
        $this->addSql('ALTER TABLE formation DROP type_id, DROP centre_id');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CDDC304035');
        $this->addSql('DROP INDEX IDX_741D53CDDC304035 ON place');
        $this->addSql('ALTER TABLE place DROP salle_id');
        $this->addSql('ALTER TABLE salle DROP FOREIGN KEY FK_4E977E5C463CD7C3');
        $this->addSql('DROP INDEX IDX_4E977E5C463CD7C3 ON salle');
        $this->addSql('ALTER TABLE salle DROP centre_id');
        $this->addSql('ALTER TABLE stagiaire DROP FOREIGN KEY FK_4F62F731DA6A219');
        $this->addSql('ALTER TABLE stagiaire DROP FOREIGN KEY FK_4F62F7315200282E');
        $this->addSql('DROP INDEX IDX_4F62F731DA6A219 ON stagiaire');
        $this->addSql('DROP INDEX IDX_4F62F7315200282E ON stagiaire');
        $this->addSql('ALTER TABLE stagiaire DROP place_id, DROP formation_id');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3463CD7C3');
        $this->addSql('DROP INDEX IDX_1D1C63B3463CD7C3 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP centre_id');
    }
}
