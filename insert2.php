<?php 
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dbms";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect!");
}
include("functions.php");
if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$u_name = $_POST['u_name'];
		$u_password1 = $_POST['u_password1'];
		$u_password2 = $_POST['u_password2'];
		$name = $_POST['name'];
		$u_email = $_POST['u_email'];
		$u_phone = $_POST['u_phone'];
		$u_add = $_POST['u_add'];
		$u_dob = $_POST['u_dob'];
		$u_bloodgrp = $_POST['u_bloodgrp'];
		$u_mediss = $_POST['u_mediss'];
		$u_count = 0;
		if(!empty($u_name) && !empty($u_password1) && !is_numeric($u_name) && !empty($name) && !empty($u_bloodgrp) && !empty($u_email) && !empty($u_password2) && !empty($u_phone) && !empty($u_add) && !empty($u_dob) && !empty($u_mediss) && ($u_password1===$u_password2))
		{
                                          if($u_bloodgrp=="A" || $u_bloodgrp=="A+" || $u_bloodgrp=="A-" || $u_bloodgrp=="AB" || $u_bloodgrp=="AB+" || $u_bloodgrp=="AB-" || $u_bloodgrp=="B" || $u_bloodgrp=="B+" || $u_bloodgrp=="B-" || $u_bloodgrp=="O" || $u_bloodgrp=="O+" || $u_bloodgrp=="O-"){
				//save to database
				$u_id = rand(1,10000000);
				$query="insert	into	users (u_id,name,u_name,u_email,u_phone,u_add,u_dob,u_bloodgrp,u_mediss,u_count,u_password1,u_password2) values ('$u_id','$name','$u_name'  ,'$u_email' ,'$u_phone' ,'$u_add' ,'$u_dob' ,'$u_bloodgrp' ,'$u_mediss' ,'$u_count' ,'$u_password1' ,'$u_password2' )";
				mysqli_query($con, $query);
				header("Location: login.php");
			}
			else{
				echo "Please enter some valid information!";
				header("Location: signup.php");
			}
			
		}else
		{
			echo "Please enter some valid information!";
			header("Location: signup.php");
		}
	}
 mysqli_close($con); 
?>
