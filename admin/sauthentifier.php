<?php require 'connexion.php'; ?>
<?php 
session_start(); //à mettre dans toutes les pages de l'admin (même cette page)
	$msg_auth_err=''; // on initialise la variable en cas d'erreur

if(isset($_POST['connexion'])){// on envoie le form avec le name du button(on a cliqué dessus et c'est ce qu'on obtient)
	$email = addslashes($_POST['email']);
	$mdp = addslashes($_POST['mdp']);
	$sql = $pdoCV->prepare(" SELECT * FROM t_utilisateurs WHERE email='$email' AND mdp='$mdp' ");
	$sql->execute();
	$nbr_utilisateur =$sql->rowCount(); // on compte les lignes correspondant à la requête de la table ; si le compte est égal à 1, un utilisateur-administrateur a été trouvé ; si le compte est égal à 0, l'utilisateur n'est pas reconnu comme administrateur.
		if($nbr_utilisateur==0){// pas d'utilisateur correspondant
		$msg_auth_err="Erreur d'authentification !";
	}else{//si on trouve l'utilisateur, il est inscrit
		$ligne_utilisateur = $sql->fetch(); // on cherche ses infos)

		$_SESSION['connexion']='connecté';
		$_SESSION['id_utilisateur']=$ligne_utilisateur['id_utilisateur'];
		$_SESSION['prenom']=$ligne_utilisateur['prenom'];
		$_SESSION['nom']=$ligne_utilisateur['nom'];
				
		header('location: index.php');
	}//fermeture du else
}// ferme le isset

?>

<!doctype html>
<html lang="fr">

<html>
	<head>
		<meta charset="utf-8">
		<title="Authentification : admin">
		<!-- Bootstrap -->
	    <link href="css/bootstrap.min.css" rel="stylesheet">
		<!--personal css-->
		<link href="css/styleadmin.css" rel="stylesheet">
	</head>
	<body>
		<h1>Admin : s'authentifier</h1>
		<hr>
		<!--formulaire de connexion à l'admin-->
		<form action="sauthentifier.php" method="post">
			<label for="email">Courriel</label>
				<input type="email" name="email" placeholder="Votre courriel" required>
				<br>
			<label for="mdp">Mot de Passe</label>
				<input type="password" name="mdp" placeholder="Votre Mot de Passe" required>
				<br>
			<button name="connexion" type="submit">
				Connexion à votre admin.
			</button>
		</form>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
		<?php include('inc/footer.php');?>   
	</body>
</html>