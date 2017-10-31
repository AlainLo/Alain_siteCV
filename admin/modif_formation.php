<?php require 'connexion.php'; ?>
<?php 
// mise à jour de la formation

if(isset($_POST['f_titre'])) {// par le nom du premier input
	$f_titre = addslashes($_POST['f_titre']);
	$f_soustitre = addslashes($_POST['f_soustitre']);
	$f_dates = addslashes($_POST['f_dates']);
	$f_description = addslashes($_POST['f_description']);
	$id_formation = $_POST['id_formation'];
	
	$pdoCV->exec(" UPDATE t_formations SET f_titre='$f_titre', f_soustitre='$f_soustitre', f_dates='$f_dates', f_description='$f_description' WHERE id_formation='$id_formation' ");
	header('location: formation.php');
	exit();
}

//je récupère la formation
$id_formation = $_GET['id_formation'];// par l'id et $_GET
$sql = $pdoCV->query(" SELECT * FROM t_formations WHERE id_formation='$id_formation' "); // la requête est égale à l'id
$ligne_formation = $sql->fetch();

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
		<h2>Modification d'une formation </h2>
		<!-- <?php echo $ligne_formation['t_formations']; ?> -->
		<form action="modif_formation.php" method="post">
			<label for="f_titre">Titre</label>
			<input type="text" name="f_titre" value="<?php echo $ligne_formation['f_titre']; ?>">
			<label for="f_soustitre">Sous-Titre</label>
			<input type="text" name="f_soustitre" value="<?php echo $ligne_formation['f_soustitre']; ?>">
			<label for="f_dates">Dates</label>
			<input type="text" name="f_dates" value="<?php echo $ligne_formation['f_dates']; ?>">
			<label for="f_description">Description</label>
			<input type="text" name="f_description" value="<?php echo $ligne_formation['f_description']; ?>">
			<input hidden name="id_formation" value="<?php echo $ligne_formation['id_formation']; ?>">
			<input type="submit" value="Mettre à jour">
		</form>
	</body>
</html>

