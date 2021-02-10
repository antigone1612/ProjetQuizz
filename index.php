<?php 
$body = include("header.php");
include "class/WebPage.class.php";
$body .= <<<HTML
            <h4 class="justify-content-center">Page Index</h4>
            <div class="container">
                <!--affichage des catégories -->
                <div class="row mt-5">
                    <div class="d-grid gap-2 mx-auto justify-content-md-end">
                        <button class="btn btn-primary" type="button">Animaux</button>
                        <button class="btn btn-primary" type="button">Jeux vidéo</button>
                        <button class="btn btn-primary" type="button">Culture</button>
                        <button class="btn btn-primary" type="button">Reptiles</button>
                    </div>
                </div>
                <!--Affichage des quizz selon la catégorie -->
                <div class="row mt-2">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Jouer !</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Jouer !</a>
                            </div>
                        </div>
                    </div>
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