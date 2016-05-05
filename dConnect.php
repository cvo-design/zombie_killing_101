<?php

try
{
    $pdo = new PDO("mysql:host=localhost;dbname=db_users;",'root','');
    echo "Good database connection <br>";

}
catch (PDOException $e)
{
    echo "Could not connect to database <br>".$e->getMessage();

}

session_start();




