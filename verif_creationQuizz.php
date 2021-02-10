
<?php
  if(isset($_POST["titre"]) && isset($_POST["IDcategorie"]) && isset($_POST["description"]) && !empty($_POST["titre"]) && !empty($_POST["IDcategorie"]) && !empty($_POST["description"]))
  {
    include("requettes.php");
    $titre = $_POST["titre"];
    $description= $_POST["description"];
    $idcategorie = $_POST["IDcategorie"];
    creationQuizz($titre, $idcategorie, $description);
    header("location: creationQuestions.php");
  }

else{
  header("location: creationQuizz.php");
}