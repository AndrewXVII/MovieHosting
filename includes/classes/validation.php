<?php

class Validation{

    protected $dbcon ; 
    private $ERRORS = [];
    private $pattern = "/(?=.*[a-z])(?=.*[A-Z]).{6,}/";
    private $usnpattern = "/(?=.{6,25}$)/";


    public function __construct($dbcon){
        $this->dbcon = $dbcon;


    }


    public function ValidateName($fn){
        if (!preg_match($this->pattern , $fn)) {
            array_push($this->ERRORS , "Please match the requested format");  
    }

}

public function ValidateLastName($ln){
    if(!preg_match($this->pattern, $ln)){
        array_push($this->ERRORS , "Please match the requested format");  
    }
}


public function ValidateUsername($usn){
    if(!preg_match($this->usnpattern , $usn)){
        array_push($this->ERRORS , "Please match the requested format");
    }
}

public function ValidateEmail($em,$confem){
    
        if($em != $confem){
            array_push($this->ERRORS, "Emails doesn't match!");
        }

    
}


public function ShowErrors($err){
    if(in_array($err, $this->ERRORS)){
        return "<span class = 'errMsg'> $err </span>";
    }

}

}
?>