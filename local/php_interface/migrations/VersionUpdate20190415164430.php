<?php

namespace Sprint\Migration;


class VersionUpdate20190415164430 extends Version
{

    protected $description = "Добавление авторов";

	private $a1_secret = 'a1_secret';

    public function up() {
		global $DB;
        $sql = $this->addCol();
        $DB->Query($sql);
    }

    public function down() {
		global $DB;
        $sql = $this->delCol();
        $DB->Query($sql);
    }

	private function addCol()
    {
    return "ALTER TABLE `{$this->a1_secret}` ADD athtor VARCHAR (30) AFTER text;
     ";
#ALTER TABLE a1_secret ADD athtor VARCHAR (30) AFTER text;
    }

    private function delCol()
    {
    return "ALTER TABLE `{$this->a1_secret}` DROP COLUMN athtor; 
     ";
#ALTER TABLE a1_secret DROP COLUMN athtor; 
    }

}
