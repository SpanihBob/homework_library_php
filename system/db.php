<?
$dbHost = "localhost";
$dbName = "web113store";
$dbUsername = "root";
$dbPassword = "";
$db = new PDO("mysql:dbhost=$dbHost;dbname=$dbName",$dbUsername,$dbPassword,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
// array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") -означат что данные в БД будут сохраняться в utf8, т.е будет поддерживаться кириллица
