<?php

class Validation{

    protected $dbcon ; 
    private $ERRORS = [  ];
    private $pattern = "/(?=.*[a-z])(?=.*[A-Z]).{6,}/";
    


    public function __construct($dbcon){
        $this->dbcon = $dbcon;


    }

    public function ValidationFunc($fn,$ln,$usn,$em,$pass,$pass2){
        $this->validateName($fn);
        $this->ValidateLastName($ln);
        $this->ValidateUsername($usn);
        $this->ValidateEmail($em);
        $this->ValidatePass($pass,$pass2);
        
        if(empty($this->ERRORS)){
            return $this->DbInsertion($fn,$ln,$usn,$em,$pass);
        }
        return false;
    }


    public function login($em,$pass){
        $pass = hash("haval160,4" , $pass);
        $query = $this->dbcon->prepare("SELECT * FROM userz WHERE email=:em AND password=:pass  ");

        $query->bindValue(":em" ,  $em);
        $query->bindValue(":pass" ,  $pass);

        $query->execute();

        if($query->rowCount() == 1){
            return true;
        }
        array_push($this->ERRORS , "LOGIN FAILED");
return false;
    }
    

private function DbInsertion($fn,$ln,$usn,$em,$pass){
    $pass = hash("haval160,4" , $pass);

    $query = $this->dbcon->prepare("INSERT INTO userz (firstName , lastName, 	callsign , email, password) VALUES (:fn , :ln , :usn , :em , :pass)   ");

    $query->bindValue(":fn" ,  $fn);
    $query->bindValue(":ln" ,  $ln);
    $query->bindValue(":usn" ,  $usn);
    $query->bindValue(":em" ,  $em);
    $query->bindValue(":pass" ,  $pass);

    return $query->execute();
}



  

private function ValidateName($fn){
        if (!preg_match($this->pattern , $fn)) {
            array_push($this->ERRORS , "Please match the requested format");  
    }

}

private function ValidateLastName($ln){
    if(!preg_match($this->pattern, $ln)){
        array_push($this->ERRORS , "Please match the requested format");  
    }
}


private function ValidateUsername($usn){
    $query = $this->dbcon->prepare("SELECT * FROM userz WHERE callsign =:usn");
    $query->bindValue(":usn" , $usn);

    $query ->execute();

    if($query->rowCount()!=0){
        array_push($this->ERRORS , "USERNAME ALREADY TAKEN");
    }
}

private function ValidateEmail($em){

    $query = $this->dbcon->prepare("SELECT * FROM userz WHERE email =:em");
    $query->bindValue(":em" , $em);
    $query->execute();

    if($query->rowCount()!=0){
        array_push($this->ERRORS , "EMAIL TAKEN");
    }
}

private function ValidatePass($pass,$pass2){
    if($pass != $pass2){
        array_push($this->ERRORS, "PASSWORDS DOESN'T MATCH!");
        return;
    }

}


public function ShowErrors($err){
    if(in_array($err, $this->ERRORS)){
        return " <span> $err </span> ";
    }

}

}
?>
