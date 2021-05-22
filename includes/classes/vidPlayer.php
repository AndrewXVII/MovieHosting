<?php


class vidPlayer {

    private $movie;
    public function __construct($movie){
        $this->movie=$movie;

    }

    public function stream($play){
        if($play){
            $play = "play";
        }
        else{
            $play = "";
        }
        $filePath  = $this->movie->getFilePath();
        $moviePoster  = $this->movie->getVideoStream();
        $movieTitle = $this->movie->getTitle();
        $movieDescription = $this->movie->getDescription();

        return " 
        <title>'$movieTitle'</title>
       
        <video poster = '$moviePoster'   width='1213' height='508' controls $play>
        <source src = '$filePath' type = 'video/mp4'>
        </video>
        <div class = 'gradient-border' id = 'movieDescription' style=''>

        $movieDescription
        </div>

        "


        ;

        
    }
}


?>