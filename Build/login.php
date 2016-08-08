<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,md5($_POST['password'])); 
      
      $sql = "SELECT id FROM members WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: index.php");
      }else {
         $error = "Kirjautuminen epäonnistui.";
      }
   }
?>
<!DOCTYPE html>
<html lang="fi">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Miehetovelle, Extranet">
		<meta name="author" content="ByTS">
		<title>MIEHETOVELLE.COM - kirjaudu</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
		<style>
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
		</style>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
    <body>
		<div class="container">
			<form class="form-signin" action="" method="post" name="login_form">
				<h2 class="form-signin-heading">Kirjaudu sisään</h2>
				<label for="email" class="sr-only">Sähköposti</label>
				<input type="email" name="email" class="form-control" placeholder="Sähköposti" required autofocus>
				<label for="password" class="sr-only">Salasana</label>
				<input type="password" name="password" class="form-control" placeholder="Salasana">
				<button class="btn btn-lg btn-primary btn-block" type="submit" onclick="formhash(this.form, this.form.password);">Kirjaudu</button>
			</form>
			<div class="form-signin">
				<?php echo $error;?><br>&copy; <a href="http://byts.fi">ByTS</a> 2016
			</div>
		</div>
	</body>
</html>