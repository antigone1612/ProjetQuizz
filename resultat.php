<?php

//on fait nos inclusions
include "requetes.php";
include "class/WebPage.class.php";

if(!empty($_POST["nbQuestions"]) && isset($_POST["nbQuestions"]) && !empty($_POST["id"]) && isset($_POST["id"])){
    $point = 0;
    $nbQuestions = $_POST["nbQuestions"];
    
    $bonnesReponses = array();
    foreach(recupererQuestions($_POST["id"]) as $donnee) {
        array_push($bonnesReponses, $donnee["IdBonneReponse"]);
    }

    //on compte le nombre de points de l'utilisateur
    for($i = 1; $i <= $_POST["nbQuestions"]; $i++) {
        if(in_array($_POST["question$i"], $bonnesReponses)) {
            $point++;
        }
    }
}

$body = include("header.php");
$body .= <<<HTML
    <div class="row w-100" style="height : 90vh">
        <div class="m-auto">
HTML;

//on maj les données si l'utilisateur est connecté à son compte
if(isset($_SESSION["IdUser"])) {
    updateJeu($_SESSION['IdUser']);
}

//on vérifie que l'utilisateur a un score supérieur à la moyenne
if($point >= $_POST["nbQuestions"] / 2) {
    //on maj les données si l'utilisateur est connecté à son compte
    if (isset($_SESSION['IdUser'])) { 
        updateScore($_SESSION['IdUser']);
    }
    $body .= <<<HTML
            <h4 class="justify-content-center text-center">Félicitation, vous avez réussi le quizz !</h4>
HTML;
} else {
    $body .= <<<HTML
            <h4 class="justify-content-center text-center">Oups, vous ferez peut-être mieux la prochaine fois.</h4>
HTML;
}

$body .= <<<HTML
            <p class="justify-content-center text-center">Vous avez un score de $point sur $nbQuestions</p>
            <div class="container">
                <div class="row mt-5">
                    <div class="d-grid gap-5 mx-auto justify-content-md-end">
                        <a href="index.php" style="text-decoration:none">
                            <button class="btn btn-primary mx-1" type="button"> Retour à l'accueil </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
HTML;
            
//génère l'affichage
$page = new WebPage("Quizzz");
$page->appendContent($body);
$page->appendJsUrl("https://code.jquery.com/jquery-3.3.1.slim.min.js");
$page->appendJsUrl("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js");
$page->appendJsUrl("https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js");
echo $page->buildPage();