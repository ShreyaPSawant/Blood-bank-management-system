 <form action="insert4.php"  method="post">
		<div class="form-group">
			<label>quantity</label>
			<input class="form-control form-control-lg" type="text" name="quantity" placeholder="Enter 			your quantity">
		</div>
		<div class="text-center mt-3">
			 <button type="submit" class="btn btn-lg btn-primary">request</button> <br><br>
		</div>
	</form>
<table class="table table-bordered">
<tr>
    <td> User ID </td>
    <td> blood group</td>
    <td> quantity </td>
    <td> donation id </td>
</tr>
<?php 
        while($row=mysqli_fetch_assoc($result))
        {
            $UserID = $row['u_id'];
            $bloodgrp = $row['u_bloodgrp'];
            $quantity = $row['quantity'];
            $d_id = $row['d_id'];
?>
        <tr>
            <td><?php echo $UserID ?></td>
            <td><?php echo $bloodgrp ?></td>
            <td><?php echo $quantity ?></td>
            <td><?php echo $d_id ?></td>
        </tr>        
<?php 
        }  
?>      

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
	$quantity1 = $_POST['quantity'];
	$uid=$user_data['u_id'];
	$bloodgrp1=$user_data['u_bloodgrp'];
	$u_mediss1=$user_data['u_mediss'];
	$user_data = check_login($con);
$query = " select * from stock ";
$result = mysqli_query($con,$query);
	$c=$user_data['u_count'];
	$count1=0;
	$q2=0;
	$q=array();
	$x=0;
	$flag=0;
	if($quantity1>=450){
		while($row=mysqli_fetch_assoc($result))
		{
		$UserID = $row['u_id'];
		$bloodgrp =$row['u_bloodgrp'];
		$quantity = $row['quantity'];
		$d_id = $row['d_id'];
		$query5 = " select * from users where u_id = '".$UserID."'" ;
    		result5 = mysqli_query($con,$query5);
		$row5 = mysqli_fetch_assoc($result5);
		$mediss = $row5['u_mediss'];
		if((($bloodgrp1===$bloodgrp) || ($bloodgrp==="O" || ($bloodgrp==="O"))) && ($mediss=="none" || 		$mediss===$u_mediss1)){
			$q2+=450;
			$count1++;
			$q[$x]=$d_id;
			$x++;
			if($q2==$quantity1){
				$flag=1;
				break;
			}
		}
		}
		if($flag==1){
			for($i=0;$i<$x;$i++){
			$d_id=$q[$i];
			$query = "delete from stock where d_id = '".$d_id."' "  ;
			$result1 = mysqli_query($con,$query);
			// $query = "delete from donation where u_id = '".$UserID."'";
			// $result1 = mysqli_query($con,$query);
			}
			$c++;
			$query = "UPDATE users SET u_count='".$c."' where u_id='".$uid."'";
			mysqli_query($con, $query);
			$price=300*$count1;
			if($c>=10){
				$price-=100;
			}
			$query = "insert into request (quantity2,price) VALUES ( '$quantity1','$price')";
			mysqli_query($con, $query);
			header("Location: final.php");
		}
		else{
			echo "Please enter some valid information!";
			header("Location: request.php");
		}
	}
	else{
		echo "Please enter some valid information!";
			header("Location: request.php");
	}
 mysqli_close($con); 
?>
