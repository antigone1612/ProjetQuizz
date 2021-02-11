
<?php
//die(var_dump($_POST));
  if(isset($_POST["Question"]) && !empty($_POST["Question"]) && isset($_POST["reponse1"]) && !empty($_POST["reponse1"]) && isset($_POST["reponse2"]) && !empty($_POST["reponse2"]) && isset($_POST["reponse3"]) && !empty($_POST["reponse3"]) && isset($_POST["reponse4"]) && !empty($_POST["reponse4"]) && isset($_POST["idQuizz"]) && !empty($_POST["idQuizz"]))
  {
    include("requettes.php");
    //on récupère la valeur des champs
    $idQuizz = $_POST["idQuizz"];
    $questions = $_POST["Question"];
    $reponses = array($_POST["reponse1"], $_POST["reponse2"], $_POST["reponse3"], $_POST["reponse4"]);
    
    
    //Pour chaque questions
    foreach($questions as $key=>$question){
      $choixReponse = $_POST["choix".$key];
        //on insère la question en bdd
        $idQuestion = creationQuestions($idQuizz, $question);
        //on insère les réponses potentielles en bdd
        for($i = 0; $i < 4 ; $i++){
            $idReponse = creationReponses($idQuestion, $reponses[$i][$key]);
            //si la réponse en cours à été coché alors c'est la bonne réponse
            if($choixReponse == "reponse".($i+1)){
                //on maj la question avec la bonne reponse
                majBonneReponse($idQuestion,$idReponse);
            }
        }
    }
    header("location: creationQuizz.php");
  }

else{
  header("location: index.php");
}