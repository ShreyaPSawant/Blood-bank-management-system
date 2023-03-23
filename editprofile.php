<form  method="post">
	<div class="form-group">
		<label>Name</label>
		<input class="form-control form-control-lg" type="text" name="name" value="<?php echo 			$user_data['name']; ?>">
	</div>
	<div class="form-group">
		<label>username</label>
		<input class="form-control form-control-lg" type="text" name="u_name" value="<?php echo 			$user_data['u_name']; ?>">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input class="form-control form-control-lg" type="email" name="u_email" value="<?php echo 			$user_data['u_email']; ?>">
	</div>
	<div class="form-group">
		<label>Phone number</label>
		<input class="form-control form-control-lg" type="text" name="u_phone"  value="<?php echo 			$user_data['u_phone']; ?>">
	</div>
	<div class="form-group">
		<label>Address</label>
		<input class="form-control form-control-lg" type="text" name="u_add"  value="<?php echo 			$user_data['u_add']; ?>">
	</div>
	<div class="form-group">
		<label>Blood group</label>
		<input class="form-control form-control-lg" type="text" name="u_bloodgrp"  value="<?php echo 			$user_data['u_bloodgrp']; ?>">
	</div>
	<div class="form-group">
		<label>DOB</label>
		<input class="form-control form-control-lg" type="datetime-local" name="u_dob"  value="<?php echo 		$user_data['u_dob']; ?>">
	</div>
	<div class="form-group">
		<label>Medical issues </label>
		<input class="form-control form-control-lg" type="text" name="u_mediss"  value="<?php echo 			$user_data['u_mediss']; ?>">
	</div>
	<div class="text-center mt-3" id="btn1">
		 <button type="submit" class="btn btn-lg btn-primary" name="submit">update</button> <br><br>
	</div>
</form>
 
Php:
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
   	 if(isset($_POST['submit']))
	{
		$u_name = $_POST['u_name'];
		$name = $_POST['name'];
		$u_email = $_POST['u_email'];
		$u_phone = $_POST['u_phone'];
		$u_add = $_POST['u_add'];
		$u_dob = $_POST['u_dob'];
		$u_bloodgrp = $_POST['u_bloodgrp'];
		$u_mediss = $_POST['u_mediss'];
        		$u_id=$user_data['u_id'];
		if(!empty($u_name) && !is_numeric($u_name) && !empty($name) && !empty($u_bloodgrp) && !empty($u_email) && !empty($u_phone) && !empty($u_add) && !empty($u_dob) && !empty($u_mediss) )
        {
            if($u_bloodgrp=="A" || $u_bloodgrp=="A+" || $u_bloodgrp=="A-" || $u_bloodgrp=="AB" || $u_bloodgrp=="AB+" || 	$u_bloodgrp=="AB-" || $u_bloodgrp=="B" || $u_bloodgrp=="B+" || $u_bloodgrp=="B-" || $u_bloodgrp=="O" || 	$u_bloodgrp=="O+" || $u_bloodgrp=="O-"){
                	$query = "update users set name = '".$name."', u_name = '".$u_name."', u_email = '".$u_email."', u_phone = 	'".$u_phone."', u_add = '".$u_add."', u_dob = '".$u_dob."', u_bloodgrp = '".$u_bloodgrp."', u_mediss = 	'".$u_mediss."'where u_id='".$u_id."'";
            	mysqli_query($con, $query);
            	header("Location: profile.php");
            	die;
            }
        }
        else {
                echo "Please enter some valid information!";
            }
    }
    else
        {
            echo "Please enter some valid information!";
        }
?>
