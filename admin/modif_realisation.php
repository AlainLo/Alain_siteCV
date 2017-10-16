<?php require 'connexion.php'; ?>
<?php 

// mise à jour de la réalisation
if(isset($_POST['realisation'])) {// par le nom du premier input
	$realisation = addslashes($_POST['realisation']);
	$id_realisation = $_POST['id_realisation'];
	
	$pdoCV->exec(" UPDATE t_realisations SET realisation='$realisation' WHERE id_realisation='$id_realisation' ");
	header('location: realisations.php');
	exit();
}

//je récupère la réalisation
$id_realisation = $_GET['id_realisation'];// par l'id et $_GET
$sql = $pdoCV->query(" SELECT * FROM t_realisations WHERE id_realisation='$id_realisation' "); // la requête est égale à l'id
$ligne_realisation = $sql->fetch();

?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php 
		$sql = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1' "); 
		$ligne_utilisateur = $sql-> fetch(); 
	?>
	<title> Admin : <?php echo $ligne_utilisateur['prenom']; ?></title>
</head>
	<body>
		<h2>Modification d'une réalisation </h2>
		<!-- <?php echo $ligne_realisation['realisation']; ?> -->
		<form action="modif_realisation.php" method="post">
			<label for="realisation">Réalisation</label>
			<input type="text" name="realisation" value="<?php echo $ligne_realisation['realisation']; ?>">
			<input hidden name="id_realisation" value="<?php echo $ligne_realisation['id_realisation']; ?>">
			<input type="submit" value="Mettre à jour">
		</form>
	</body>
</html>

