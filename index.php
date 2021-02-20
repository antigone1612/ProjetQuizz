<?php

//id de la categorie à afficher
$categorie = 0;
if(isset($_POST["categorie"]) || !empty($_POST["categorie"])){
    $categorie = $_POST["categorie"];
}

//variable permettant d'afficher toutes les catégories
$all = 1;
if(isset($_POST["all"]) || !empty($_POST["all"])){
    $all = $_POST["all"];
}

//on fait nos inclusions
include "class/WebPage.class.php";
$body = include("header.php");
$body .= include("requetes.php");

$body .= <<<HTML
        <br><br>
        <div class="container">
            <div class="row mt-5">
                <div class="d-grid gap-5 mx-auto justify-content-md-end">
                    <!-- affichage de la catégorie "Tout Afficher" -->
                    <a href="index.php" style="text-decoration:none">
                        <button class="btn btn-primary mx-1" type="button">Tout afficher</button>
                    </a>
HTML;

foreach(recupererCategorie() as $donnee){
    $body .= <<<HTML
                    <!-- affichage de chaque catégorie -->
                    <form style="display: none" id="categorie$donnee[IdCategorie]" action="index.php" method="post">
                        <input type="hidden" name="categorie" value="$donnee[IdCategorie]"/>
                        <input type="hidden" name="all" value="0"/>
                    </form>
                    <a href='#' onclick='document.getElementById("categorie$donnee[IdCategorie]").submit()' style="text-decoration: none">
                        <button class="btn btn-primary mx-1" type="button">$donnee[nom]</button>
                    </a>
HTML;
}   

$body .= <<<HTML
                </div>
            </div>
            <div class="row mt-2">
HTML;


foreach(recupererQuizzCategorie($categorie, $all) as $donnee){
    $body .= <<<HTML
                <!-- Affichage des quizz selon la catégorie -->
                <div class="col-sm-6 py-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">$donnee[Titre]</h5>
                            <p class="card-text">$donnee[Description]</p>
                            <form style="display: none" id="quizz$donnee[IdQuiz]" action="quizz.php" method="post">
                                <input type="hidden" name="id" value="$donnee[IdQuiz]"/>
                            </form>
                            <a href='#' onclick='document.getElementById("quizz$donnee[IdQuiz]").submit()' class="btn btn-primary">Jouer !</a>
                        </div>
                    </div>
                </div>
HTML;
}

$body .= <<<HTML
            </div>
        </div>
    </body>
</html>
HTML;

// génère l'affichage
$page = new WebPage("Quizzz");
$page->appendContent($body);
$page->appendJsUrl("https://code.jquery.com/jquery-3.3.1.slim.min.js");
$page->appendJsUrl("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js");
$page->appendJsUrl("https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js");
echo $page->buildPage();