<?php $row=mysqli_fetch_assoc($result)?>
<div class="card">
<div class="card-body">
	<div class="m-sm-4">
		<form >
			
			<div class="form-group">
				<label>request id: <?php echo $row['req_id'] ?></label>
			</div>
           			 <div class="form-group">
			<div class="form-group">
				<label>price: <?php echo $row['price'] ?></label>
			</div>
			<div class="form-group">
				<label>quantity: <?php echo $row['quantity2'] ?></label>
			</div>
		</form>
	</div>
</div>



php:

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
	$query = " select * from  request order by req_id DESC LIMIT 1";
    $result = mysqli_query($con,$query);
?>
