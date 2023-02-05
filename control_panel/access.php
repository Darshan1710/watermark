<?php
session_start();
if(!isset($_SESSION['name']))
{

	header("location:logout.php");
}
require_once("class/helper.php");


$serverip=$_SERVER['REMOTE_ADDR'];
$name=$_SESSION['name'];
?>