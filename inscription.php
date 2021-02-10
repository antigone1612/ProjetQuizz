<?php 
include "class/WebPage.class.php";
$body = include("header.php"); 
$body .= include("requettes.php");

$body .= <<<HTML
      <section class="cParallaxe1 cSection">
        <div  class="cConteneur">  
          <div class="wrapper ">
            <form style="opacity: 0.9;" class="form-signin" method="post" action="verif_inscription.php">  
              <img class="form-signin-heading" width="100" src="images/image-quizz.jpg" >
              <br>   
              <h1 class="centrer" style="font-size: 25px;">S\'inscrire</h1>
              <input  type="text" class="form-control " name="nom" placeholder="nom" >
              <input  type="text" class="form-control " name="prenom" placeholder="prenom" >
              <input  type="email" class="form-control " name="mail" placeholder="email" >
              <input type="password" class="form-control " name="password" placeholder="mot de Passe">   
              <input name="submit" class="btn btn-lg btn-primary btn-block marge bordure" type="submit" value="S\'inscrire">  
            </form>
          </div>
        </div>
      </section>
HTML;



//génère l'affichage
$page = new WebPage("Inscription");
$page->appendContent($body);
$page->appendCssUrl('CSS/style.css');
$page->appendJsUrl("https://code.jquery.com/jquery-3.3.1.slim.min.js");
$page->appendJsUrl("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js");
$page->appendJsUrl("https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js");
echo $page->buildPage();
		
