<?php

namespace Sprint\Migration;


class Version20190410113543 extends Version
{
    protected $description = 'Создание таблицы для секретов и доступов';

    private $a1_secret = 'a1_secret';
    private $a1_dostyp ='a1_dostyp';

    public function up()
    {
        global $DB;

		$sql = $this->getSQLCreateTableSecret();
$DB->Query($sql);
        $sql = $this->getSQLCreateTableDostyp();
        $DB->Query($sql);
    }

    public function down()
    {
		global $DB;
        $sql = "DROP TABLE IF EXISTS `{$this->a1_secret}`, `{$this->a1_dostyp}`";
$DB->Query($sql);
    }

    private function getSQLCreateTableSecret()
    {
	return "CREATE TABLE IF NOT EXISTS `{$this->a1_secret}`(
    `id` INT NOT NULL AUTO_INCREMENT NOT NULL,
    `name` varchar(255) NOT NULL,
    `text` varchar(1023) NOT NULL,
     PRIMARY KEY (id));
";
    }

    private function getSQLCreateTableDostyp()
    {
    return "CREATE TABLE IF NOT EXISTS `{$this->a1_dostyp}`(
    `id` INT NOT NULL AUTO_INCREMENT NOT NULL,
    `secret_id` INT NOT NULL,
    `user_id` INT NOT NULL,
     PRIMARY KEY (id));
     ";
    }


}
