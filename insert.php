<?php
/**
 * Created by PhpStorm.
 * User: Chris VanOrden
 * Date: 1/29/2016
 * Time: 11:54 PM
 */
require 'connection.php';

//write the sql statement with placeholders
$sql_input =    "INSERT INTO  blog "
    . " (title, "
    . "summary, "
    . "content, "
    . "blog_date, "
    . "VALUES ("
    . ":title, "
    . ":summary, "
    . ":content, "
    . ":blog_date) ";


//prepare the squel statement
$sqlb_input = $pdo->prepare($sql_input);



//sanitize data
$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
$summary = filter_var($_POST['summary'], FILTER_SANITIZE_STRING);
$content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
$blog_date = filter_var($_POST['blog_date'], FILTER_SANITIZE_STRING);

//bind parameters
$sqlb_input->bindparam(":title", $title);
$sqlb_input->bindparam(":summary", $summary);
$sqlb_input->bindparam(":content", $content);
$sqlb_input->bindparam(":blog_date", $blog_date);



$sqlb_input_input->execute();


print_r($_FILES);

