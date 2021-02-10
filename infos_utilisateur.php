<?php 
$body = include("header.php");
include "class/WebPage.class.php";
$body .= 
    '<h4 class="justify-content-center">Page info </h4>
    <div class="container">
        <!--affichage des informations du joueurs -->
        <div class="row mt-5">
            <div class="col">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Quizz joués 
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Quizz gagnés
                        <span class="badge bg-primary rounded-pill">2</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Quizz perdus
                        <span class="badge bg-primary rounded-pill">1</span>
                    </li>
                </ul>
            </div>
        </div>
    <div>';

//génère l'affichage
$page = new WebPage("Mes infos");
$page->appendContent($body);
$page->appendJsUrl("https://code.jquery.com/jquery-3.3.1.slim.min.js");
$page->appendJsUrl("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js");
$page->appendJsUrl("https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js");
echo $page->buildPage();

