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
	$user_data = check_login($con);
?>

<form  method="post">
    <div class="form-group" id="head1">
    	<label>Name: </label>
    	<p><?php echo $user_data['name']; ?></p>
    </div>
    <div class="form-group">
    	<label>username: </label>
        <p><?php echo $user_data['u_name']; ?></p>
    </div>
    <div class="form-group">
    	<label>Email: </label>
        <p><?php echo $user_data['u_email']; ?></p>
    </div>
    <div class="form-group">
    	<label>Phone number: </label>
        <p><?php echo $user_data['u_phone']; ?></p>									
    </div>
    <div class="form-group">
    	<label>Address: </label>
        <p><?php echo $user_data['u_add']; ?></p>
    </div>
    <div class="form-group">
    	<label>Blood group: </label>
        <p><?php echo $user_data['u_bloodgrp']; ?></p>
    </div>
    <div class="form-group">
    	<label>DOB: </label>
        <p><?php echo $user_data['u_dob']; ?></p>
    </div>
    <div class="form-group">
    	<label>Medical issues: </label>
        <p><?php echo $user_data['u_mediss']; ?></p>
    </div>
    <div class="text-center mt-3" >
    <button type="button" class="btn btn-lg btn-primary" onclick="location.href='editprofile.php'">edit profile</button> <br><br>
    </div>
    <div class="text-center mt-3">
    	 <button type="button" class="btn btn-lg btn-primary" onclick="location.href='home.php'">home</button> <br><br>
    </div>
</form>
