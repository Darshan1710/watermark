<?php 
require_once('class/helper.php');

$name=$_REQUEST['uname'];
$pass=$_REQUEST['upass'];

if(empty($name) && empty($pass))
{
	//echo"Username or password not empty.";
	echo 0;
	
}
else
{
	$str=$hobj->select("wm_upass,wm_uname","wm_admin","wm_uname='$name'");
	
	if($str=="no")
	{
		//echo "Wrong User Name";
		echo 0;
		
	}
	else
	{
		if($str[0][0]==$pass)
		{
			session_start();
			$_SESSION['name']=$str[0][1];
			echo 1;
		}
		
		else
		{
			echo 0;
		}
	}
	
}
?>
