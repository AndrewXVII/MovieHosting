<?php

class Validation{

    protected $dbcon ; 
    private $ERRORS = [  ];
    private $pattern = '/^[a-zA-Z0-9_]+$/';
     //^ asserts position at start of a line
     //a-z matches a single character in the range between a and z; A-Z matches a single character in the range between A and Z;
    //0-9 matches a single character in the range between 0  and 9;_ matches the character _ literally (case sensitive)
    //$ asserts position at the end of a line
   
    


    public function __construct($dbcon){   //По сути конструктор нужен для автоматической инициализации переменных.
        $this->dbcon = $dbcon; //dbcon property of class is set to variable $dbcon


    //когда мы создаём объект,всё что написано в конструкторе автоматически выполняется без принудительного вызова метода    
    //SO NOW ALL FUNCTIONS WITHIN THIS CLASS CAN USE $dbcon variable

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
        $query = $this->dbcon->prepare("SELECT * FROM users WHERE email=:em AND password=:pass  ");

        $query->bindValue(":em" ,  $em);
        $query->bindValue(":pass" ,  $pass);

        $query->execute();

        if($query->rowCount() == 1){  //WE can use rowCount() to know number of rows or records affected by the latest sql statement involving any Delete , update , insert command. 
            return true;
        }
        array_push($this->ERRORS , "LOGIN FAILED");
            return false;
    }
    

private function DbInsertion($fn,$ln,$usn,$em,$pass){
    $pass = hash("haval160,4" , $pass);

    $query = $this->dbcon->prepare("INSERT INTO users (firstName , lastName, 	callsign , email, password) VALUES (:fn , :ln , :usn , :em , :pass) ");

    $query->bindValue(":fn" ,  $fn); // Binds a value to a parameter
    $query->bindValue(":ln" ,  $ln);
    $query->bindValue(":usn" ,  $usn);
    $query->bindValue(":em" ,  $em);
    $query->bindValue(":pass" ,  $pass);

    return $query->execute(); //return the result of query execution
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
   
    $query = $this->dbcon->prepare("SELECT * FROM users WHERE callsign =:usn");
    $query->bindValue(":usn" , $usn);

    $query ->execute();
    if(!preg_match($this->pattern , $usn)){
        array_push($this->ERRORS, "Please match the requested format");
    }

    if($query->rowCount()!=0){ // username has been used by somebody
        array_push($this->ERRORS , "USERNAME ALREADY TAKEN");
    }
    
    
}

private function ValidateEmail($em){

    $query = $this->dbcon->prepare("SELECT * FROM users WHERE email =:em");
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
