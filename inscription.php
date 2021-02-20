<?php

//on fait nos inclusions
include "class/WebPage.class.php";
$body = include("header.php"); 
$body .= include("requetes.php");

$body .= <<<HTML
<div class="limiter">
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100">
			<!-- Formulaire d'inscription -->
			<form class="login100-form validate-form"  method="post" action="verif_inscription.php">
				<span class="login100-form-logo">
					<img class="form-signin-heading" width="100" src="images/image-quizz.jpg" >
				</span>

				<span class="login100-form-title p-b-34 p-t-27">
					Inscription
				</span>

				<div class="wrap-input100 validate-input" data-validate = "Entrez Prenom">
					<input class="input100" type="text" name="prenom" placeholder="Prenom">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Entrez Nom">
					<input class="input100" type="text" name="nom" placeholder="Nom">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Entrez mot de passe">
					<input class="input100" type="password" name="password" placeholder="Mot de Passe">
					<span class="focus-input100" data-placeholder="&#xf191;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Entrez Email">
					<input class="input100" type="email" name="mail" placeholder="Email">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn"> S'inscrire </button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="dropDownSelect1"></div>
HTML;

//génère l'affichage
$page = new WebPage("Inscription");
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