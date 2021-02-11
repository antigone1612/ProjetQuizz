<?php 
$body = include("header.php");
$body .= include("requettes.php");
include "class/WebPage.class.php";
$body .= <<<HTML
    <div class="container mt-5 cConteneur">
        <!--Création dun quizz par utilisateur-->
        <div class="row mt-5 wrapper">
            <h4 class="justify-content-center mt-5">Créer un Quizz</h4>
        </div>
        <div class="row mt-5">
            <div class="col">
                <form method="post" action="verif_creationQuizz.php">
                    <div class="row mt-5">
                        <div class="col">
                            <input type="text" class="form-control" name="titre" placeholder="Titre">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="description" placeholder="Description">
                        </div>
                        <div class="col">
                            <select name="IDcategorie" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option selected>Choisir Catégorie</option>
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
                    <input name="submit" class="btn btn-lg btn-primary btn-block marge bordure" type="submit" value="Créer">
                </form>
            </div>
        </div>
    <div>
HTML;

//génère l'affichage
$page = new WebPage("Mes infos");
$page->appendContent($body);
$page->appendCssUrl('CSS/style.css');
$page->appendJsUrl("https://code.jquery.com/jquery-3.3.1.slim.min.js");
$page->appendJsUrl("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js");
$page->appendJsUrl("https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js");
echo $page->buildPage();

