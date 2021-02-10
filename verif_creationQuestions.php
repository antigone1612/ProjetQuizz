
<?php
  if(isset($_POST["Question"]) && !empty($_POST["Question"]) && isset($_POST["reponse1"]) && !empty($_POST["reponse1"]) && isset($_POST["reponse2"]) && !empty($_POST["reponse2"]) && isset($_POST["reponse3"]) && !empty($_POST["reponse3"]) && isset($_POST["reponse4"]) && !empty($_POST["reponse4"]))
  {
    include("requettes.php");
    $question = $_POST["Question"];
    $reponse1 = $_POST["reponse1"];
    $reponse2 = $_POST["reponse2"];
    $reponse3 = $_POST["reponse3"];
    $reponse4 = $_POST["reponse4"];
    $bonneReponse = 2;
    $idQuiz = recupererLastId();
    /* foreach(recupererLastId() as $donnee){
        var_dump($donnee);
        $idQuiz = (int)$donnee["IdQuiz"];
        break;
    } */
    creationQuestions($idQuiz, $question, $reponse1, $reponse2, $reponse3, $reponse4, $bonneReponse);
    header("location: infos_utilisateur.php");
  }

else{
  header("location: creationQuestions.php");
}