<?php
include("requetes.php");
$idQuizz;
session_start();

//on insère en premier les infos du quizz
if(isset($_POST["titre"]) && isset($_POST["IDcategorie"]) && isset($_POST["description"]) 
&& !empty($_POST["titre"]) && !empty($_POST["IDcategorie"]) && !empty($_POST["description"])) {
    $titre = $_POST["titre"];
    $description= $_POST["description"];
    $idcategorie = $_POST["IDcategorie"];

    //récupère l'id de l'utilisateur
    $idUser = $_SESSION["IdUser"];

    //on récupère l'id du quizz renvoyé par notre requette d'insertion
    $idQuizz = creationQuizz($titre, $idcategorie, $description, $idUser);
    
    //Ensuite on insère les questions
    if(isset($_POST["Question"]) && !empty($_POST["Question"]) && isset($_POST["reponse1"]) && !empty($_POST["reponse1"]) 
	&& isset($_POST["reponse2"]) && !empty($_POST["reponse2"]) && isset($_POST["reponse3"]) && !empty($_POST["reponse3"]) 
	&& isset($_POST["reponse4"]) && !empty($_POST["reponse4"])) {     
		//on récupère la valeur des champs
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

				//si la réponse en cours à été cochée alors c'est la bonne réponse
				if($choixReponse == "reponse".($i+1)){
					//on maj la question avec la bonne reponse
					majBonneReponse($idQuestion,$idReponse);
				}
			}
      }
      header("location: creationQuizz.php");
    }
} else {
  header("location: index.php");
}