<?php

require_once('config/error.php');
require_once('config/db.php');
require_once('config/config.php');

if(isset($_POST['signup'])){
	echo "sattu";

  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $query = "INSERT INTO user (email,password) VALUES ('$email','$password')";
  
  if(mysqli_query($conn,$query)){
  	  header('Location: '.ROOT_URL);
  }
 else{
 	echo "error ".mysqli_error($conn);
 }
  

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
	<h2>Signup</h2>
	<div>
<form action="<?php  echo $_SERVER['PHP_SELF'] ?>" method="POST" onsubmit="return validateEmail();">
		<div class="form-group">
	   <label for="email"></label>
	   <input type="text" name="email" id="email" placeholder="Email" class="form-control">
	   </div>
	   <div class="form-group">
	   <label for="password"></label>
	   <input type="password" name="password" placeholder="password" class="form-control">
	   </div>
	   <div class="form-group">
	   <input type="submit" name="signup" class="btn btn-primary form-control" value="Signup">
		</div>
		
	</form>
	</div>



</div>


<div class="modal fade" id="invalidEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Email id is invalid, Please enter a valid emailId.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<script>
	
	function validateEmail(){
		  var flag=true;
		  var email = document.getElementById('email').value;
		   var atSymbol = email.indexOf("@");
               if(atSymbol < 1){
               	   flag = false;
               } 

           var dot = email.indexOf(".");
            if(dot <= atSymbol + 2){
              flag=false;
           } 
          if (dot === email.length - 1){
              flag=false;
          }

          if(flag==true) 
          {
          	// alert("email id is valid");
          	return true;
          }
          else
          {
          	$('#invalidEmail').modal('show');
          	 return false;
          	
          }
        
        return true;
          // return false;
	}
</script>


<script src="https://code.jquery.com/jquery-1.12.4.js"
			  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
			  crossorigin="anonymous"></script>
		
<script  src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>