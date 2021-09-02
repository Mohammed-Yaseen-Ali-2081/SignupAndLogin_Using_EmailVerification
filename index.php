<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
    <title>NETTUTS > Sign up</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <div id="header">
        <h3>NETTUTS > Sign up</h3>
    </div>
    <div id="wrap">


<?php
$con=mysqli_connect("localhost","Ali","php","ali");

	if(!$con){
		die("Connection Failed : ".mysqli_connect_error());

	}

	$sql="CREATE DATABASE IF NOT EXISTS ali";

	if(mysqli_query($con,$sql)){
		$con=mysqli_connect("localhost","Ali","php","ali");

		$sql="CREATE TABLE IF NOT EXISTS users (
        id INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
        username VARCHAR( 32 ) NOT NULL ,
        password VARCHAR( 255 ) NOT NULL ,
        email TEXT NOT NULL ,
        hash VARCHAR( 32 ) NOT NULL ,
        active INT( 1 ) NOT NULL DEFAULT '0')";

		if(!mysqli_query($con,$sql)){
			echo "Error creating table:".mysqli_error($con);

		}
	}


?>

          <?php
  
    if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email'])){
    $name = $_POST['name']; 
    $email = $_POST['email']; 

if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)==0){
    $msg = 'The email you have entered is invalid, please try again.';
}else{
    $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
$hash = md5( rand(0,1000) );
$password = rand(1000,5000);
$con=mysqli_connect("localhost","Ali","php","ali");

    if(!$con){
        die("Connection Failed : ".mysqli_connect_error());

    }

    $sql="CREATE DATABASE IF NOT EXISTS ali";

    if(mysqli_query($con,$sql)){
        $con=mysqli_connect("localhost","Ali","php","ali");

        $sql="INSERT INTO users (username, password, email, hash) VALUES(
             '". mysqli_real_escape_string($con,$name) ."', 
             '". mysqli_real_escape_string($con,password_hash($password,null)) ."', 
             '". mysqli_real_escape_string($con,$email) ."', 
             '". mysqli_real_escape_string($con,$hash) ."') ";

        if(!mysqli_query($con,$sql)){
            echo "Error creating table:".mysqli_error($con);

        }
        else{
                $to      = $email;
$subject = 'Signup | Verification'; 
$message = '
  
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
  
------------------------
Username: '.$name.'
Password: '.$password.'
------------------------
  
Please click this link to activate your account:
http://www.yourwebsite.com/verify.php?email='.$email.'&hash='.$hash.''; 
                      
$headers = 'From:noreply@yourwebsite.com' . "\r\n"; 
mail($to, $subject, $message, $headers);
        }
    }


}
}         
?>
  
        <h3>Signup Form</h3>
        <p>Please enter your name and email addres to create your account</p>
          <?php 
    if(isset($msg)){  
        echo '<div class="statusmsg">'.$msg.'</div>'; 
    } 
?>
        <!-- start sign up form -->  
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" value="" />
            <label for="email">Email:</label>
            <input type="text" name="email" value="" />
              
            <input type="submit" class="submit_button" value="Sign up" />
        </form>
 
          
    </div>
 
</body>
</html>