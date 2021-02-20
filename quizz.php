<?php

//on vérifie que l'id du quizz est en POST
if(isset($_POST["id"]) || !empty($_POST["id"])){
    $id = $_POST["id"];
}

$nbQuestions = 3;
$questionsPosees = array();

//on fait nos inclusions
include "class/WebPage.class.php";
include "requetes.php";

foreach(recupererQuizz($id) as $donnee){
    $body = <<<HTML
                <h1 class="pt-2 ml-4">Quizz : $donnee[Titre]</h1>
                <form class="mx-4" method="post" action="resultat.php">
                    <input type="hidden" name="nbQuestions" value="$nbQuestions"/>
                    <input type="hidden" name="id" value="$id"/>
HTML;
}

for($i = 1; $i <= $nbQuestions; $i++) {
    //les questions sont choisies aléatoirement
    $n = rand(0,3);
    //on vérifie que la question n'a pas déjà été posée
    while(in_array($n, $questionsPosees)) {
        $n = rand(0,3);
    }
    array_push($questionsPosees, $n);

    foreach(recupererQuestions($id) as $donnee){
        if($donnee["IdQuestion"] % 4 == $n) {
            $body.= <<<HTML
                    <!-- Affichage des questions -->
                    <h4 class="justify-content-center text-center">Question n°$i</h4><br>
                    <div class="container">
                        <div class="row m-2" style=" border: 1px solid rgba(0,0,0,.125); border-radiu: .25rem">
                            <div class="col-2">
                                <img class="mt-1" src="images/$i.png" >
                            </div>
                            <div class="col-10">
                                <p>$donnee[Question]</p>
HTML;
            foreach(recupererReponses($donnee["IdQuestion"]) as $reponse){
                $body.= <<<HTML
                                <div class="ml-4">
                                    <input type="radio" id="reponse$reponse[IdReponse]" name="question$i" value="$reponse[IdReponse]" required>
                                    <label for="reponse$reponse[IdReponse]">$reponse[Reponse]</label>
                                </div>
HTML;
            }
            $body .= <<<HTML
                            </div>
                        </div>
                    </div>
HTML;
        }
    }
    $body .= "<br>";
}

$body .= <<<HTML
                    <div class="text-center">
                        <button class="btn btn-primary mx-1 mb-4" type="submit" name="submit">Valider</button>
                    </div>
                </form>
HTML;

//génère l'affichage
$page = new WebPage("Quizzz");
$page->appendContent($body);
$page->appendJsUrl("https://code.jquery.com/jquery-3.3.1.slim.min.js");
$page->appendJsUrl("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js");
$page->appendJsUrl("https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js");
echo $page->buildPage();