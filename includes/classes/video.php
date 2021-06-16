<?php

class Video{

    protected $dbcon ; 
    protected $sqldata;

    public function __construct($dbcon ,$id){
        $this->dbcon = $dbcon;

        
            $query = $this->dbcon->prepare("SELECT * FROM videos WHERE id=:id");  //Prepares an SQL statement for execution
            $query->bindValue(":id" ,  $id);
            $query->execute();

            $this->sqldata = $query->fetch(PDO::FETCH_ASSOC); //fetch the result so we can see it
               // $this keyword is used to access non-static members of a class(variables or functions) for the current object.
        

            //ASSOCIATIVE ARRAY IS AN ARRAY THAT HAVE A KEY AND VALUE
            //Returns an associative array that corresponds to the fetched row or null if there are no more rows. 
            //Return next row as an array indexed by column name
            // Fetches the next row from a result set
        }


    

   
public function getId (){
   return $this->sqldata['id']; //return sqldata ID
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
