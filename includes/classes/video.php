<?php

class Video{

    protected $dbcon ; 
    protected $sqldata;
    


    public function __construct($dbcon ,$input){
        $this->dbcon = $dbcon;

        if(is_array($input)){
            $this->sqldata = $input;

        }

        else{
            $query = $this->dbcon->prepare("SELECT * FROM videos WHERE id=:id");
            $query->bindValue(":id" ,  $input);
            $query->execute();

            $this->sqldata = $query->fetch(PDO::FETCH_ASSOC);
        }


    }

   
public function getId (){
   return $this->sqldata['id'];
}
public function getTitle (){
    return $this->sqldata['title'];
 }

 public function getVideoStream (){
    
    return $this->sqldata['preview'];
 }
 public function getDescription (){
    return $this->sqldata['description'];
 }

 public function getFilePath (){
    return $this->sqldata['filePath'];
 }


}

?>