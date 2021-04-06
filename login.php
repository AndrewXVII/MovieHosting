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
  -webkit-box-shadow: 0 0 0px 1000px #000 inset;

}

</style>

<body>
<div class ="signIn">
    <div class = "column">


    <form method = "POST"  action = "validation.php"  action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> ">


 <input  autocomplete="off" type="email" name="email"  placeholder = "Enter E-mail" required>
<br><br>



<input autocomplete="off"  type = "password" name = "password" placeholder = "Enter password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{9,}" title="At least 9 characters" required  >

<br><br>


<input autocomplete="off" type = "submit" name = "submit" value = "Login">


<br><br>
<p>
  		Don't have an account yet? <a href="register.php">Log In <a>
  	
    </p>
</div>
</div>
</body>
</html>
