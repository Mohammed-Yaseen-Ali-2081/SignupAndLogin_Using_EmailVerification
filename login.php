<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  
<html xmlns="http://www.w3.org/1999/xhtml">
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
            if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['password']) && !empty($_POST['password'])) {
    $username = $_POST['name'];
 
    $result = mysql_fetch_assoc(mysql_query($con,"SELECT password FROM users WHERE active = '0' AND username = '" . $username . "'"));
    $password_hash = (isset($result['password']) ? $result['password'] : '');
    $result = password_verify($_POST['password'], $password_hash);
if($result){
    $msg = 'Login Complete! Thanks';
}else{
    $msg = 'Login Failed! Please make sure that you enter the correct details and that you have activated your account.';
}
}
                  
              
        ?>
 
        <h3>Login Form</h3>
        <p>Please enter your name and password to login</p>
          
        <?php 
            if(isset($msg)){ 
                echo '<div class="statusmsg">'.$msg.'</div>';
            } ?>
          
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" value="" />
            <label for="password">Password:</label>
            <input type="password" name="password" value="" />
              
            <input type="submit" class="submit_button" value="Sign up" />
        </form>

          
    </div>

</body>
</html>