<?php
$dsn = 'mysql:dbname=mhusers;host=localhost';
$dbuser = 'root';
$dbpass = '';


try{
    
$dbcon= NEW PDO($dsn,$dbuser,$dbpass);
$dbcon->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION); //SET ATTRIBUTE ERRMODE TO ERRMODE EXCEPTION
}
catch(PDOException $e)
{

die("Connection failed".$e->getMessage());


};





?>