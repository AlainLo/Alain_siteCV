<?php require 'connexion.php'; 

session_start();// à mettre dans toutes les pages de l'admin
  if(isset($_SESSION['connexion']) && $_SESSION['connexion'] =='connecté'){ // on établit que la variable de session est passée et contient bien le terme "connexion"
    $id_utilisateur=$_SESSION['id_utilisateur'];
    $prenom=$_SESSION['prenom'];
    $nom=$_SESSION['nom'];

    //echo $_SESSION['connexion'];
    //var_dump
  }else{
      //l'utilisateur n'est pas connecté 
      header('location: sauthentifier.php');
  }// ferme le else du if isset

?>
<?php 
// gestion des contenus de la BDD

if(!empty($_POST)){// insertion d'une formation
	// si on a posté une nouvelle formation
	if ($_POST['titre']!='' && $_POST['soustitre']!='' && $_POST['dates']!='' && $_POST['description']!='' ){ //si on a posté une formation qui n'est pas vide
			$titre= addslashes($_POST['titre']);
			$soustitre= addslashes($_POST['soustitre']);
			$dates= addslashes($_POST['dates']);
			$description= addslashes($_POST['description']);
			$pdoCV->exec(" INSERT INTO t_formations VALUES (NULL, '$titre', '$soustitre', '$dates', '$description', '1')");// mettre $id_utilisateur quand on l'aura dans la variable de session.
		//	header("location: formation.php");//pour revenir sur la page
		//	exit();
	} //ferme le "if n'est pas vide"
}// ferme le if(isset) du FORM

// suppression d'une formation
if(isset($_GET ['id_formation'])){// on récupére l'expérience par son id dans l'url
$efface = $_GET['id_formation'];
$sql = "DELETE FROM t_formations WHERE id_formation = '$efface' ";
$pdoCV->query($sql);// on peut aussi utiliser exec si on le souhaite
header("location: formation.php"); // pour revenir sur la page
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
	<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!--personal css-->
	<link href="css/styleadmin.css" rel="stylesheet">
    <!--CKEditor-->
    <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
</head>
<html>
	<body>
		<!--nav en include -->
		<?php include('inc/navbar.php');?>
	<section>
      	<div class="container">
			<h1>Admin du site cv de <?php echo($ligne_utilisateur['prenom'].' '.$ligne_utilisateur['nom']); ?></h1>
			<!--<p>texte</p>-->
			<hr>
			<?php
					$sql = $pdoCV->prepare("SELECT * FROM t_formations WHERE utilisateur_id='1'");
					$sql->execute();
					$nbr_formations = $sql->rowCount();
					//$ligne_formation = $sql->fetch();
			?>
			<div class="row">	
		        	<div class="col-md-8">
		        		<h2> il y a <?php echo $nbr_formations; ?> formations </h2>
						<table class="table  table-hover table-condensed">
							<tr>
								<th>titre</th>
								<th>sous-titre</th>
								<th>dates</th>	
								<th>description</th>
								<th>Supression</th>
								<th>Modification</th>
							</tr>
							<tr>
								<?php while ($ligne_formation = $sql->fetch()){ ?>
								<td><?php echo $ligne_formation['f_titre']; ?></td>
								<td><?php echo $ligne_formation['f_soustitre']; ?></td>
								<td><?php echo $ligne_formation['f_dates']; ?></td>
								<td><?php echo $ligne_formation['f_description']; ?></td>
								<td><a href="formation.php?id_formation=<?php echo $ligne_formation['id_formation']; ?> "><button type= "button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></button></a></td>
								<td><a href="modif_formation.php?id_formation=<?php echo $ligne_formation['id_formation']; ?> "><button type= "button" class="btn btn-success"><span class="glyphicon glyphicon-edit"></button></a></td>
								<td></td>
							</tr>
							<?php } ?>
						</table>
					</div>
					<div class="col-md-4">
						<h2> </h2>
						<table class="table  table-hover table-condensed">
							<h3>Insertion d'une formation</h3>
								<hr>
								<div class="form-group">
									<form action="formation.php" method="post">
								    <label for="titre">Titre</label>
								    <input type="text" name="titre" id="titre" placeholder="Insérer un titre" class="form-control">
								</div>

								<div class="form-group">
								    <label for="soustitre">Sous-Titre</label>
								    <input type="text" name="soustitre" id="soustitre" placeholder="Insérer un sous-titre" class="form-control">
								</div>

								<div class="form-group">
								    <label for="dates">Dates</label>
								    <input type="text" name="dates" id="dates" placeholder="Insérer des dates" class="form-control">
								</div>

								<div class="form-group">
								    <label for="description"> Description </label>
                                    <textarea name="description"  class="form-control" id="editor1"></textarea>
								</div>
                                <script>
                                    CKEDITOR.replace('editor1');
                                </script>
										
								<div>
									<input type="submit" value="Insérer">
									</form>
								</div>
						</table>
					</div>
				</div>			
		</div>
	</section>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
		<?php include('inc/footer.php');?>   
	</body>
</html>

