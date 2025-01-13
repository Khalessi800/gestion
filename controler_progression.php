<?php
include 'connect.php'
include 'pregression_model.php'
include 'track_form.php'

class ProgressionColtroler{
    private Progression $progression;

    public function __construct($progression){
        $this->progression=new Progression;
        $this->addProgression();
    }
_
    public function add_Progression($participant_id,$formation_id,$score_quiz,$termine=false){
        if("REQUEST_METHOD"!=='POST'){
            header('Location: ../helper/error.php?error=1&message=Invalid request method.');
            // echo "Invalid request method";
            return;
        }
        try{
            $result=$this->progression->addProgression($participant_id,$formation_id,$score_quiz,$termine=false));
            if($result){
                header('Location: ../helper/sucess');
                exit();
            }else{
                header('Location: ../helper/error');
            }
        }
    }
}
?>
