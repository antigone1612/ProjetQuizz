<?php

$categorie = 0;
if(isset($_GET["categorie"]) || !empty($_GET["categorie"])){
    $categorie = $_GET["categorie"];
}

$all = 1;
if(isset($_GET["all"]) || !empty($_GET["all"])){
    $all = $_GET["all"];
}

$body = include("header.php");
$body .= include("requettes.php");
include "class/WebPage.class.php";
$body .= <<<HTML
            <h4 class="justify-content-center">Page Index</h4>
            <div class="container">
                <!--affichage des catégories -->
                <div class="row mt-5">
                    <div class="d-grid gap-5 mx-auto justify-content-md-end">
                        <a href="index.php" style="text-decoration:none">
                            <button class="btn btn-primary mx-1" type="button">Tout afficher</button>
                        </a>
HTML;

foreach(recupererCategorie() as $donnee){
    $body .= <<<HTML
                        <a href="index.php?categorie=$donnee[IdCategorie]&all=0" style="text-decoration:none">
                            <button class="btn btn-primary mx-1" type="button">$donnee[nom]</button>
                        </a>
HTML;
}   

$body .= <<<HTML
                   </div>
                </div>
                <!--Affichage des quizz selon la catégorie -->
                <div class="row mt-2">
HTML;

foreach(recupererQuizzCategorie($categorie, $all) as $donnee){
    $body .= <<<HTML
                    <div class="col-sm-6 py-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">$donnee[Titre]</h5>
                                <p class="card-text">$donnee[Description]</p>
                                <a href="quizz.php?id=$donnee[IdQuiz]" class="btn btn-primary">Jouer !</a>
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

//génère l'affichage
$page = new WebPage("Quizzz");
$page->appendContent($body);
$page->appendJsUrl("https://code.jquery.com/jquery-3.3.1.slim.min.js");
$page->appendJsUrl("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js");
$page->appendJsUrl("https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js");
echo $page->buildPage();