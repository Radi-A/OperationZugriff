<?php


/**
 * Verbindung zum Host, Erzeugung einer Datenbank samt Tabelle sowie Auswahl dieser Datenbank
 */
 
//Tragt hier eure Verbindungsdaten zur Datenbank ein
$db_host = 'localhost';
$db_name = 'Login_AI';
$db_user = 'root';
$db_password = '';

// Create connection (PHP-Data-Objects)

try{
$conn = new PDO("mysql:host=$db_host",$db_user, $db_password);
// set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

// create database

try {
  
  $sql = "CREATE DATABASE IF NOT EXISTS $db_name";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo '<span style="color:orange">Database created successfully</span><br>';
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

// sql to create table

$table="users";

try {
$sqlt = "CREATE TABLE IF NOT EXISTS $table (
  id int unsigned NOT NULL AUTO_INCREMENT,
  email varchar(255) COLLATE utf8_unicode_ci NOT NULL,     -- up to 255 characters; collation: case insensitive
  passwort varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  name varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,  -- default value 
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id), UNIQUE (email)
 )";   
  $conn->exec("USE $db_name");
  $conn->exec($sqlt);

  echo '<span style="color:orange">Table:'.$table.' created successfully</span><br>';
} catch(PDOException $e) {
  echo $sqlt . "<br>" . $e->getMessage();
}

// Einlesen unserer Daten
/*$hash = password_hash("hallo", PASSWORD_DEFAULT);
     $sql = "INSERT INTO $table (email, passwort, name)
             VALUES ('me@hhbk.de', '$hash', 'me')";
     //$conn->exec($sql);    // exec ,execute, and query */

//$conn = null;


?>