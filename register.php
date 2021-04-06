<?php
require_once("includes/classes/Sassdata.php");

$errors = [];

if(isset($errors)){
    echo "<h1>Error</h1>";
    foreach($errors as $msg){
        echo "- $msg<br>\n";
    }
    echo "Try again";
}


if(isset($_POST['submit'])){
    $name = Sassdata::nameCorrection($_POST["username"]);
    $lastname = Sassdata::lsnameCorrection($_POST['lastname']);
    $email = Sassdata::emailCorrection($_POST['email']);
    $pass = Sassdata::pwCorrection($_POST['password']);
    $usernmaae = Sassdata::usernameCorrection($_POST["username"]);
    
    
}



?>


<!DOCTYPE html>
<html>
    <head>
<meta charset="utf-8">
<title>Registration</title>

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
  -webkit-box-shadow: 0 0 0px 1000px #000 inset;

}

</style>

<body>
<div class ="signIn">
    <div class = "column">


    <form method = "POST"    action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> ">


<input autocomplete="off"  type = "text" name = "username" placeholder = "Enter Name"  required pattern = "(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Username must contain at least 6 characters."  required>   <!-- placeholder создает серый текст в форме который указывает стиль ввода -->
<br><br> 

<input  autocomplete="off" type = "text" name = "lastname"  placeholder = "Enter Lastname" required pattern = "(?=.*[a-z])(?=.*[A-Z]).{6,}" title = "Lastname must contain at least 6 characters." required>
<br><br>

<input autocomplete = "off" type = "text" name = "username" placeholder = "Enter Username" required pattern = "(?=.*[a-z])(?=.*[A-Z]).{6,}" title =  "Nickname must cointain at least 6 characters"  required>

<br><br>

 <input  autocomplete="off" type="email" name="email"  placeholder = "Enter E-mail" required>
<br><br>

<input autocomplete="off"  type="email" name="email2"  placeholder = "Confirm E-mail" required>

<br><br>

<input autocomplete="off"  type = "password" name = "password" placeholder = "Enter password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{9,}" title="At least 9 characters" required  >

<br><br>

<input autocomplete="off"  type = "password" name = "confirmpassword" placeholder = "Confirm password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{9,}" title="At least 9 characters" required  > 

<br><br>
<input autocomplete="off" type = "submit" name = "submit" value = "Login">


<br><br>
<p>
  		Already a member? <a href="login.php">Sign in <a>
  	
    </p>


</div>
</div>



</body>





</html>

