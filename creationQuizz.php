<?php 
$body = include("header.php");
$body .= include("requettes.php");
include "class/WebPage.class.php";
$body .= <<<HTML
    <div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login1003">
                <div class="container">
                    <!--Création dun quizz par utilisateur-->
                    <div class="row">
                        <h4 class="justify-content-center">Créer un Quizz</h4>
                    </div>
                    <div class="row">
                        <div class="col">
                            <form method="get" action="creationQuestions.php">
                                <div class="row ">
                                    <div class="col input-group-lg">
                                        <input type="text" class="form-control" required name="titre" placeholder="Titre">
                                    </div>
                                    <div class="col input-group-lg">
                                        <input type="text" class="form-control" required name="description" placeholder="Description">
                                    </div>
                                    <div class="col">
                                        <select name="IDcategorie" class="custom-select custom-select-lg mb-3" aria-label=".form-select-lg example">
                                        
HTML;
                                foreach(recupererCategorie() as $donnee){
                                    $nomCategorie = $donnee["nom"];
                                    $idCategorie = $donnee["IdCategorie"];
$body .= <<<HTML
                                <option  value=$idCategorie>$nomCategorie</option>
HTML;
                            }
$body .= <<<HTML
                            </select>

                        </div>
                    </div>
                    <input name="submit" style="background-color : #707782; border: none" class="btn btn-lg btn-primary btn-block marge bordure" type="submit" value="Créer">
                </form>
            </div>
        </div>
    <div>
HTML;

//génère l'affichage
$page = new WebPage("Le quizz");
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
$page->appendJsUrl("https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js");
echo $page->buildPage();

