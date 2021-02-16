<?php 
$body = include("header.php");
$body .= include("requettes.php");
include "class/WebPage.class.php";
//on récupère l'idUser mis en session
$idUser = $_SESSION["IdUser"];
//on stock les données de l'utilisateurs
$donne = recupererInfosUtilisateurs($idUser)[0];
//quizs joués par l'utilisateur
$quizsJoues = $donne['QuizsJoues'];
//quizs gagnés par l'utilisateur
$quizsGagnes = $donne['QuizsGagnes'];
$nom = $_SESSION['nom'];
//on récupère le nrb de quizz créer par l'utilisateur
$nbrQuizz = recupererNbrQuizzUtilisateur($idUser)[0];
$nbrQuizzCrea = $nbrQuizz['COUNT(*)'];
var_dump($nbrQuizzCrea);
$body .=  
<<<HTML
<div class="limiter">
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login1002">
            <h4 class="justify-content-center"> $nom </h4>
            <!--affichage des informations du joueurs -->
            <div class="row mt-5">
                <div class="col">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Quizz joués 
                            <span class="badge bg-primary rounded-pill">$quizsJoues</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Quizz gagnés
                            <span class="badge bg-primary rounded-pill">$quizsGagnes</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Quizz créés
                            <span class="badge bg-primary rounded-pill">$nbrQuizzCrea</span>
                        </li>
                    </ul>
                </div>
            </div>
        <div>
    </div>
</div>
<div id="dropDownSelect1"></div>
HTML;

//génère l'affichage
$page = new WebPage("Mes infos");
$page->appendContent($body);
$page->appendCssUrl('CSS/style.css');
$page->appendCssUrl('css/util.css');
$page->appendCssUrl('css/main.css');
$page->appendCssUrl('vendor/daterangepicker/daterangepicker.css');
$page->appendCssUrl('vendor/select2/select2.min.css');
$page->appendCssUrl('vendor/animsition/css/animsition.min.css');
$page->appendCssUrl('vendor/css-hamburgers/hamburgers.min.css');
$page->appendCssUrl('vendor/animate/animate.css');
$page->appendCssUrl('fonts/iconic/css/material-design-iconic-font.min.css');
$page->appendCssUrl('fonts/font-awesome-4.7.0/css/font-awesome.min.css');
$page->appendCssUrl('vendor/bootstrap/css/bootstrap.min.css');
$page->appendJsUrl("https://code.jquery.com/jquery-3.3.1.slim.min.js");
$page->appendJsUrl("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js");
$page->appendJsUrl("https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js");
echo $page->buildPage();

