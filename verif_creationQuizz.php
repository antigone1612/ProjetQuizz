
<?php
session_start();
  if(isset($_POST["titre"]) && isset($_POST["IDcategorie"]) && isset($_POST["description"]) && !empty($_POST["titre"]) && !empty($_POST["IDcategorie"]) && !empty($_POST["description"]))
  {
    include("requettes.php");
    $titre = $_POST["titre"];
    $description= $_POST["description"];
    $idcategorie = $_POST["IDcategorie"];
    //récupère l'id de l'utilisateur
    $idUser = $_SESSION["IdUser"];
    $idQuizz = creationQuizz($titre, $idcategorie, $description, $idUser);
    header("location: creationQuestions.php?quizz=".$idQuizz);
  }

else{
  header("location: creationQuizz.php");
}