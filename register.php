
<?php
include("includes/classes/Sassdata.php");
include("includes/classes/connection.php");
include('includes/classes/validation.php');





$validate = new Validation($dbcon);

if(isset($_POST['submit'])){

   

$name = Sassdata::nameCorrection($_POST['first_name']);
$lastname = Sassdata::lsnameCorrection($_POST['lastname']);
$username = Sassdata::usernameCorrection($_POST["username"]);
$email = Sassdata::emailCorrection($_POST['email']);
$email2= Sassdata::email2Correction($_POST['email2']);
$pass = Sassdata::pwCorrection($_POST['pass']);
$confirmpassword = Sassdata::pw2Correction($_POST["confirmpassword"]);

$validate->ValidateName($name);
$validate->ValidateLastName($lastname);
$validate->ValidateUsername($username);
$validate->ValidateEmail($email,$email2);


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


    <form method = "POST">


    <?php
    echo($validate->ShowErrors("Please match the requested format"));
    ?>
 
<input autocomplete="off"  type = "text" name = "first_name" placeholder = "Enter Name"  required>   <!-- placeholder создает серый текст в форме который указывает стиль ввода -->
<br><br> 

<?php   echo($validate->ShowErrors("Please match the requested format")); ?>

<input  autocomplete="off" type = "text" name = "lastname"  placeholder = "Enter Lastname" required>
<br><br>



<?php   echo($validate->ShowErrors("Please match the requested format")); ?>



<input autocomplete = "off" type = "text" name = "username" placeholder = "Enter Username" required>

<br><br>


<?php   echo($validate->ShowErrors("Emails doesn't match")); ?>

 <input  autocomplete="off" type="email" name="email"  placeholder = "Enter E-mail" required>
<br><br>

<input autocomplete="off"  type="email" name="email2"  placeholder = "Confirm E-mail" required>

<br><br>

<input autocomplete="off"  type = "password" name = "pass" placeholder = "Enter password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{9,}" title="At least 9 characters" required  >

<br><br>

<input autocomplete="off"  type = "password" name = "confirmpassword" placeholder = "Confirm password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{9,}" title="At least 9 characters" required  > 

<br><br>
<input autocomplete="off" type = "submit" name = "submit" value = "Login">


<br><br>
<p>
  		Already a member? <a href="login.php">Sign in <a>
  	
    </p>

    </form>


</div>
</div>

</body>
</html>



