<?php require 'connexion.php'; ?>
<?php 

// mise à jour de la compétence
if(isset($_POST['competence'])) {// par le nom du premier input
	$competence = addslashes($_POST['competence']);
	$c_niveau = addslashes($_POST['c_niveau']);
	$id_competence = $_POST['id_competence'];
	
	$pdoCV->exec(" UPDATE t_competences SET competence='$competence', c_niveau='$c_niveau' WHERE id_competence='$id_competence' ");
	header('location: competences.php');
	exit();
}

//je récupère la compétence
$id_competence = $_GET['id_competence'];// par l'id et $_GET
$sql = $pdoCV->query(" SELECT * FROM t_competences WHERE id_competence='$id_competence' "); // la requête est égale à l'id
$ligne_competence = $sql->fetch();

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
		<h2>Modification d'une compétence </h2>
		<!-- <?php echo $ligne_competence['competence']; ?> -->
		<form action="modif_competence.php" method="post">
			<label for="competence">Compétence</label>
			<input type="text" name="competence" value="<?php echo $ligne_competence['competence']; ?>">
			<input type="number" name="c_niveau" value="<?php echo $ligne_competence['c_niveau']; ?>">
			<input hidden name="id_competence" value="<?php echo $ligne_competence['id_competence']; ?>">
			<input type="submit" value="Mettre à jour">
		</form>
	</body>
</html>

