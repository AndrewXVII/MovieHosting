<?php

require_once("includes/classes/Sassdata.php");
require_once("includes/classes/connection.php");
require_once('includes/classes/validation.php');





$validate = new Validation($dbcon);

if(isset($_POST['submit'])){

    
    $email = Sassdata::emailCorrection($_POST['email']);
    $password = Sassdata::pwCorrection($_POST['password']);
  
    
    $loginsuccess = $validate->login($email,$password);
    
    if($loginsuccess){

        $_SESSION["userLoggedIn"] == $email;
       
        header("Location: indexo.php");


}


}
?>


<!DOCTYPE html>
<html>
    <head>
<meta charset="utf-8">
<title>Log In</title>
<link rel="stylesheet" type = "text/css" href="assets/signin.css">
<link rel="shortcut icon" href="ikon.ico" type="image/x-icon" />

</head>

<style>
input:-webkit-autofill,
input:-webkit-autofill:hover, 
input:-webkit-autofill:focus,
textarea:-webkit-autofill,
textarea:-webkit-autofill:hover,
textarea:-webkit-autofill:focus,
select:-webkit-autofill,
select:-webkit-autofill:hover,
select:-webkit-autofill:focus {
    border:none;
border-bottom:black;
  -webkit-text-fill-color: rgb(222,184,135);


}

</style>

<body>
<div class ="signIn">
    <div class = "column">

    <form method="POST"   >



    <?php   echo $validate->ShowErrors("LOGIN FAILED"); ?>
 <input   type="email" name="email"  placeholder = "Enter E-mail" required>
<br><br>



<input   type = "password" name = "password" placeholder = "Enter password"  required  >

<br><br>


<input  type = "submit" name = "submit" value = "Login">

    </form>


<br><br>
<p>
  		Don't have an account yet? <a href="register.php">Sign UP! <a>
  	
    </p>


</div>
</div>



</body>





</html>

