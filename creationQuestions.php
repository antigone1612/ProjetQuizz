<?php 
//on vérifie que les infos du quizz sont bien présentes en POST
if(!isset($_POST["titre"]) || empty($_POST["titre"]) && !isset($_POST["description"]) 
|| empty($_POST["description"]) && !isset($_POST["IDcategorie"]) || empty($_POST["IDcategorie"])) {
    header("location: index.php?InfoQuizzManquantes");
    exit;
}

//on affecte les valeurs à nos variables
$titre = $_POST["titre"]; 
$description = $_POST["description"]; 
$IdCategorie = intval($_POST["IDcategorie"]); 

//on fait nos inclusions
$body = include("header.php");
include "class/WebPage.class.php";

$body .= <<<HTML
<div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login1000">
        <!-- Formulaire de création des questions d'un quizz par un utilisateur -->
            <div class="row mt-5">
                <h4 class="justify-content-center mt-5">Créer les questions</h4>
            </div>
            <form method="post"  class="cConteneur" action="verif_creationQuestions.php">
                <input type="hidden" name="titre" value="$titre">
                <input type="hidden" name="description" value="$description">
                <input type="hidden" name="IDcategorie" value="$IdCategorie">
HTML;

for( $i=0; $i<=3;$i++){
    //permet d'afficher dynamiquement le numéro de la question
    $num = $i+1;
    $body.= <<<HTML
                <div class="row mt-5">
                    <div class="col wrap-input100">
                        <input type="text" class="form-control" required maxlength=200 name="Question[]" placeholder="Question$num">
                    </div>

                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" required name="choix$i" value="reponse1">
                                </div>
                            </div>
                            <input type="text" class="form-control" required maxlength=200 name="reponse1[]" placeholder="Reponse1">
                        </div>
                    </div>

                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                <input type="radio" required name="choix$i" value="reponse2">
                                </div>
                            </div>
                            <input type="text" class="form-control" required maxlength=200 name="reponse2[]" placeholder="Reponse2">
                        </div>
                    </div>

                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" required name="choix$i" value="reponse3">
                                </div>
                            </div>
                            <input type="text" class="form-control" required maxlength=200 name="reponse3[]" placeholder="Reponse3">
                        </div>
                    </div>

                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" required name="choix$i" value="reponse4">
                                </div>
                            </div>
                            <input type="text" class="form-control" required maxlength=200 name="reponse4[]" placeholder="Reponse4">
                        </div>
                    </div>
                </div>
HTML;
}
        
$body .= <<<HTML
                <input name="submit" class="btn btn-lg btn-primary btn-block marge bordure" type="submit" value="Créer">
            </form>
        </div>
    </div>
</div>
HTML;

//génère l'affichage
$page = new WebPage("Les questions");
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
$page->appendJsUrl("https://code.jquery.com/jquery-3.3.1.slim.min.js");
$page->appendJsUrl("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js");
$page->appendJsUrl("https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js");
echo $page->buildPage();

