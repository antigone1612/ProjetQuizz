<?php 

// on fait nos inclusions
include "class/WebPage.class.php";
$body = include("header.php"); 
$body .= include("requetes.php");

$body.= <<<HTML
	<!-- Création du formulaire de connexion -->
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="connexion.php">
					<span class="login100-form-logo">
						<img class="form-signin-heading" width="100" src="images/image-quizz.jpg" >
					</span>

					<span class="login100-form-title p-b-34 p-t-27"> Connexion </span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="email" name="mail" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Mot de Passe">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn"> Login </button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div id="dropDownSelect1"></div>
HTML;

//on vérifie si les données ont été renseignées 
if(isset($_POST['mail']) && isset($_POST['password']) && !empty($_POST['mail']) && !empty($_POST['password'])) {
	//on vérifie si les données correspondent à celles présentes en BDD
	foreach (recupererUtilisateur($_POST['mail']) as $donnee){
    	//on utilise password_verify pour comparer les hashs, celui du mot de passe saisi pour se connecter et celui en BDD
		if (($_POST['mail'] == $donnee["Mail"]) && (password_verify($_POST['password'],$donnee["MotDePasse"]) )){
			//on lance la session
			session_start();
			$_SESSION["IdUser"] = $donnee["IdUser"];
			$_SESSION["nom"] = $donnee["Prenom"];
			header("location: index.php");
			exit();
		}
	}
}        

//génère l'affichage
$page = new WebPage("Connexion");
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