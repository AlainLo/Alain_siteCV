<?php require 'connexion.php'; ?>
<?php 

// mise à jour de la réalisation
if(isset($_POST['r_titre'])) {// par le nom du premier input
	$r_titre = addslashes($_POST['r_titre']);
	$r_soustitre = addslashes($_POST['r_soustitre']);
	$r_dates = addslashes($_POST['r_dates']);
	$r_description = addslashes($_POST['r_description']);
	$id_realisation = $_POST['id_realisation'];
	
	$pdoCV->exec(" UPDATE t_realisations SET r_titre='$r_titre', r_soustitre='$r_soustitre', r_dates='$r_dates', r_description='$r_description' WHERE id_realisation='$id_realisation' ");
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
		<!-- <?php echo $ligne_realisation['t_realisations']; ?> -->
		<form action="modif_realisation.php" method="post">
			<label for="r_titre">Titre</label>
			<input type="text" name="r_titre" value="<?php echo $ligne_realisation['r_titre']; ?>">
			<label for="r_soustitre">Sous-Titre</label>
			<input type="text" name="r_soustitre" value="<?php echo $ligne_realisation['r_soustitre']; ?>">
			<label for="r_dates">Dates</label>
			<input type="text" name="r_dates" value="<?php echo $ligne_realisation['r_dates']; ?>">
			<label for="r_description">Description</label>
			<input type="text" name="r_description" value="<?php echo $ligne_realisation['r_description']; ?>">
			<input hidden name="id_realisation" value="<?php echo $ligne_realisation['id_realisation']; ?>">
			<input type="submit" value="Mettre à jour">
		</form>
	</body>
</html>

