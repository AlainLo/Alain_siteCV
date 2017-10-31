 <?php require 'connexion.php'; ?>
<?php 
// gestion des contenus de la BDD

if(isset($_POST ['competence'])){// insertion d'une compétence
	// si on a posté une nouvelle compétence
	if ($_POST['competence']!='' && $_POST['c_niveau']!=''){ //si on a posté une compétence qui n'est pas vide
			$competence= addslashes($_POST['competence']);
			$c_niveau= addslashes($_POST['c_niveau']);
			$pdoCV->exec(" INSERT INTO t_competences VALUES (NULL, '$competence', '$c_niveau', '1')");// mettre $id_utilisateur quand on l'aura dans la variable de session.
			header("location: competences.php");//pour revenir sur la page
			exit();
	} //ferme le "if n'est pas vide"
}// ferme le if(isset) du FORM

// suppression d'une compétence
if(isset($_GET ['id_competence'])){// on récupére la compétence par son id dans l'url
$efface = $_GET['id_competence'];
$sql = "DELETE FROM t_competences WHERE id_competence = '$efface' ";
$pdoCV->query($sql);// on peut aussi utiliser exec si on le souhaite
header("location: competences.php"); // pour revenir sur la page
}// ferme le if(isset)
?>

<!Doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php 
		$sql = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1' "); 
		$ligne_utilisateur = $sql -> fetch(PDO::FETCH_ASSOC); 
	?>
	<title> Admin : <?= $ligne_utilisateur['prenom']; ?> <?= $ligne_utilisateur['nom']; ?></title>
</head>
<html>
	<body>
		<h1>Admin du site cv de <?php echo($ligne_utilisateur['prenom'].' '.$ligne_utilisateur['nom']); ?></h1>
		<!--<p>texte</p>-->
		<hr>
		<?php
				$sql = $pdoCV->prepare("SELECT * FROM t_competences WHERE utilisateur_id='1'");
				$sql->execute();
				$nbr_competences = $sql->rowCount();
				//$ligne_competence = $sql->fetch();
		?>
		<h2> il y a <?php echo $nbr_competences; ?> compétences</h2>
		<table border="1">
			<tr>
				<th>Compétences</th>
				<th>Niveau</th>
				<th>Suppression</th>
				<th>Modification</th>
			</tr>
			<tr>
				<?php while ($ligne_competence = $sql->fetch()){ ?>
				<td><?php echo $ligne_competence['competence']; ?></td>
				<td><?php echo $ligne_competence['c_niveau']; ?></td>
				<td><a href="competences.php?id_competence=<?php echo $ligne_competence['id_competence']; ?> ">supprimer</a></td>
				<td><a href="modif_competence.php?id_competence=<?php echo $ligne_competence['id_competence']; ?> ">modifier</a></td>
				<td></td>
			</tr>
			<?php } ?>
		</table>
		<hr>
		<h3>Insertion d'une compétence</h3>
		<form action="competences.php" method="post">
			<label for="competence">Compétence</label>
			<input type="text" name="competence" id="competence" placeholder="Insérer une compétence">
			<input type="text" name="c_niveau" id="c_niveau" placeholder="Insérer le niveau">
			<input type="submit" value="Insérer">
		</form>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
		<?php include('inc/footer.php');?>   
	</body>
</html>

