<?php

class connect

{

	public $conn="";

	function __construct()

	{

		

		//$this->conn=new mysqli("localhost","root","","wateryfb_waterdb");

		$this->conn=new mysqli("localhost","wateryfb_waterdb","watermark@123","wateryfb_waterdb");

		//print_r($this->conn);

	}

	function __destruct()

	{

		$ans=$this->conn->close();

		//print_r($ans);

	}

}

$obj=new connect();

?>