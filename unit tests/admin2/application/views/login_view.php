<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Login SpotNet</title>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">   
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/style.css">
   <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
 </head>
 <body>
 
    <?php echo validation_errors(); ?> 
	<form action="http://localhost/monprojet/admin2/index.php/verifylogin" method="post" accept-charset="utf-8" class="login" > 
    <p>
      <label for="login">Username:</label>
      <input type="text" name="username" id="login" value="">
    </p>

    <p>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" value="">
    </p>

    <p class="login-submit">
      <button type="submit" class="login-button">Login</button>
    </p>

  </form>

  
 </body>
</html>
