<?php 

class Sassdata{

 public static function nameCorrection ($inputBox){  
//Объявление свойств и методов класса статическими позволяет обращаться к ним без создания экземпляра класса. Свойство класса, объявленное как статическое, не может быть доступно посредством экземпляра класса (но статический метод может быть вызван)
        
        $inputBox = str_replace(" ", "", $inputBox); 
        //trim don't remove spaces inside the string
        $inputBox = htmlentities($inputBox);
        $inputBox = ucfirst($inputBox);
        
        return $inputBox;
}
public static function usernameCorrection ($inputBox){  
    $inputBox = str_replace(" ", "", $inputBox); 
    $inputBox = htmlentities($inputBox);
            return $inputBox;

}

public static function lsnameCorrection ($inputBox){  
    $inputBox = str_replace(" ", "", $inputBox); 
    $inputBox = htmlentities($inputBox);
            return $inputBox;
}

public static function pwCorrection($inputBox){

    $inputBox = hash('haval256,4', $_POST["password"]);
    $inputBox = str_replace(" ", "", $inputBox); 
    return $inputBox;

}

public static function emailCorrection($inputBox){

    $inputBox = str_replace(" " , "" , $inputBox);
    $inputBox = htmlentities($inputBox);
    return $inputBox;

}


}

?>