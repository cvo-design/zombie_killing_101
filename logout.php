<?php
/**
 * Created by PhpStorm.
 * User: Chris VanOrden
 * Date: 11/20/2015
 * Time: 8:49 PM
 */

	session_start();
	unset($_SESSION['LoginStatus']);
	header("Location: index.php");
