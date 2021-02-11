<?php 
//on vérifie que l'id du quizz est bien présent dans l'URL
if(!isset($_GET["quizz"]) || empty($_GET["quizz"])){
    header("location: index.php?IDQuiZZManquant");
    exit;
}
$idQuizz = intval($_GET["quizz"]);
$body = include("header.php");
include "class/WebPage.class.php";
$body .= 
<<<HTML
    <div class="container mt-5">
        <!--Création dun quizz par utilisateur-->
        <div class="row mt-5">
            <h4 class="justify-content-center mt-5">Créer un Quizz</h4>
        </div>
HTML;
         for( $i=0; $i<=3;$i++){
$body.= 
<<<HTML
            <form method="post"  class="cConteneur" action="verif_creationQuestions.php">
                <input type="hidden" name="idQuizz" value="$idQuizz" > 
                <div class="row mt-5">
                    <div class="col">
                        <input type="text" class="form-control" name="Question[]" placeholder="Question1">
                    </div>
                    <div class="col">
                        <input type="radio" id="coding" name="choix[]" value="reponse1">
                        <input type="text" class="form-control" name="reponse1[]" placeholder="Reponse1">
                    </div>
                    <div class="col">
                        <input type="radio" id="coding" name="choix[]" value="reponse2">
                        <input type="text" class="form-control" name="reponse2[]" placeholder="Reponse2">
                    </div>
                    <div class="col">
                        <input type="radio" id="coding" name="choix[]" value="reponse3">
                        <input type="text" class="form-control" name="reponse3[]" placeholder="Reponse3">
                    </div>
                    <div class="col">
                        <input type="radio" id="coding" name="choix[]" value="reponse4">
                        <input type="text" class="form-control" name="reponse4[]" placeholder="Reponse4">
                    </div>
                </div>
HTML;
        }
        $body .= <<<HTML
                <input name="submit" class="btn btn-lg btn-primary btn-block marge bordure" type="submit" value="Créer">
            </form>
    <div>
HTML;

//génère l'affichage
$page = new WebPage("Mes infos");
$page->appendContent($body);
$page->appendJsUrl("https://code.jquery.com/jquery-3.3.1.slim.min.js");
$page->appendJsUrl("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js");
$page->appendJsUrl("https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js");
echo $page->buildPage();

