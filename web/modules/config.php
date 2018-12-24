<?php 

	$tenmaychu="localhost";
	$tentaikhoan="root";
	$pass="";
	$csdl="quanlytiembanhpizza";

	/*$tenmaychu="sql103.byethost.com";
	$tentaikhoan="b31_22276893";
	$pass="anhquoc123";
	$csdl="b31_22276893_pizza";*/


	$conn= new mysqli($tenmaychu,$tentaikhoan,$pass,$csdl);
	mysqli_set_charset($conn, 'UTF8');

	if($conn->connect_error){
		die("Không kết nối được MySql: ". $conn->connect_error);
	}
	
	mysqli_select_db($conn,$csdl);

 ?>