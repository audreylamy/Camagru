<?php
session_start();
?>
<html lang="fr">
		<head>
		  <meta charset="utf-8">
			 <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <title>Camagru</title>   
		  <link href="activation.css" rel="stylesheet"> 
		  <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
		  <link href="https://fonts.googleapis.com/css?family=Allerta+Stencil|Bungee+Hairline" rel="stylesheet">
	   </head>
	  <body>
		 	<header>
				<div id="camagru">
						<h1>CAMAGRU</h1>
				</div>
			</header>
			<?php
			if ($_SESSION['activate_already'] == TRUE)
				echo "<p>Votre compte est déjà actif !</p>";
			else if ($_SESSION['activate_account'] == TRUE)
				echo "<p>Votre compte a bien été activé !</p>";
			else if ($_SESSION['activate_account'] == FALSE)
				echo "<p>Erreur ! Votre compte ne peut être activé...</p>";
			?>
		</body>
</html>