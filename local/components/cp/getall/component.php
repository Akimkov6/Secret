<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if ($_GET['status'] == 'detail' && $_GET['element']) {
    $this->IncludeComponentTemplate('read_secret');
} else {
    $this->IncludeComponentTemplate('list');
}

/* $this->IncludeComponentTemplate('add');
$this->IncludeComponentTemplate('looksecret'); */
?>