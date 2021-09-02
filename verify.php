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
          
            mysql_connect("localhost", "Ali", "php") or die(mysql_error()); // Connect to database server(localhost) with username and password.
            mysql_select_db("ali") or die(mysql_error()); // Select registration database.
            mysql_connect("localhost", "Ali", "php") or die(mysql_error()); // Connect to database server(localhost) with username and password.
            mysql_select_db("ali") or die(mysql_error()); // Select database.
              
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = mysql_escape_string($_GET['email']);
    $hash = mysql_escape_string($_GET['hash']); 
                  
    $search = mysql_query("SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
    $match  = mysql_num_rows($search);
                  
    if($match > 0){

        mysql_query("UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
        echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
    }else{
        echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
    }
                  
}else{
    // Invalid approach
    echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
}
              
        ?>
        
    </div>
</body>
</html>