<form  method="post">
	<div class="form-group">
		<label>username</label>
		<input class="form-control form-control-lg" type="text" name="user_name" placeholder="Enter your username">
	</div>
                    <div class="form-group">
	<label>Password</label>
		<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password">
	</div>
	<div class="text-center mt-3">
		 <button type="submit" class="btn btn-lg btn-primary">Sign in</button> <br>
	</div>
	<div class="text-center mt-3" id="head1">
		    not a member?
		 <a href="startpage.php " color="#fff" >startpage</a> <br><br>
	</div>
</form>

Php:
<?php 
session_start();
	include("connection.php");
	include("functions.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			$query = "select * from users where u_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);
			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);
					if($user_data['u_password1'] === $password)
					{
						$_SESSION['u_id'] = $user_data['u_id'];
						header("Location: home.php");
						die;
					}
				}
			}
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}
?>
