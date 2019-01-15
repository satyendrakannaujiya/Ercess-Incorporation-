<?php

require_once('config/error.php');
require_once('config/db.php');
require_once('config/config.php');
$flag = false;

if(isset($_POST['login'])){
	// echo "sattu";
	

  $email = $_POST['email'];
  $password = $_POST['password'];
  // echo $email."  ".$password;

  $query = "SELECT email from user where email='$email' and password='$password' ";
  $result = mysqli_query($conn,$query);
  $rowCount =  mysqli_num_rows($result);

  if($rowCount>0){
  	$flag = false;
  	
  	
  	  // echo "Successfuly logged in ...";
  	  header('Location: '."success.php".'');
  	 

  	  // header("Location : ".ROOT_URL.'');
  }else{
  	$flag=true;
  	 // echo "<script>$('#myModal').modal('show')</script>";
  	// $('#myModal').fadeIn('show');
  	// echo "Username or password are wrong ";
  	  if($flag == true){
  	  	echo "

  	         <div class=\"container\">
  	        <div class=\"alert alert-warning\">
           <strong>Failure!</strong> Username or Password is wrong.
         </div></div>";

  	  }
  	 
  }
  // $row = mysqli_fetch_assoc($result);

  // echo count($row);
  // var_dump($row);






  

}


?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Login System</title>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
</head>
<body>

<div class="container col-md-5 card mt-5">
	<br>
	<br>
	<h2>Login</h2>
	<div>
	<form action="<?php  echo $_SERVER['PHP_SELF'] ?>" method="POST">
		<div class="form-group">
	   <label for="email"></label>
	   <input type="email" name="email" placeholder="Email" class="form-control">
	   </div>
	   <div class="form-group">
	   <label for="password"></label>
	   <input type="password" name="password" placeholder="password" class="form-control">
	   </div>
	   <div class="form-group">
	   <input type="submit" name="login" class="btn btn-primary form-control" value="Login">
		</div>
		<div class="form-group">
			<a href="signup.php" class="btn btn-success form-control">Sign up</a>
		</div>
	</form>
	</div>
</div>




<script src="https://code.jquery.com/jquery-1.12.4.js"
			  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
			  crossorigin="anonymous"></script>
		
<script  src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>