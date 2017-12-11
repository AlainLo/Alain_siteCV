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

if(isset($_POST ['reseau'])){// insertion d'un réseau
	// si on a posté une nouveau réseau
	if ($_POST['reseau']!='' && $_POST['re_lien']!=''){ //si on a posté un réseau qui n'est pas vide
			$competence= addslashes($_POST['reseau']);
			$c_niveau= addslashes($_POST['re_lien']);
			$pdoCV->exec(" INSERT INTO t_reseaux VALUES (NULL, '$reseau', '$re_lien', '1')");// mettre $id_utilisateur quand on l'aura dans la variable de session.
			header("location: reseaux.php");//pour revenir sur la page
			exit();
	} //ferme le "if n'est pas vide"
}// ferme le if(isset) du FORM

// suppression d'un réseau
if(isset($_GET ['id_reseau'])){// on récupére le réseau par son id dans l'url
$efface = $_GET['id_reseau'];
$sql = "DELETE FROM t_reseau WHERE id_reseau = '$efface' ";
$pdoCV->query($sql);// on peut aussi utiliser exec si on le souhaite
header("location: reseaux.php"); // pour revenir sur la page
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
						$sql = $pdoCV->prepare("SELECT * FROM t_reseaux WHERE utilisateur_id='1'");
						$sql->execute();
						$nbr_reseaux = $sql->rowCount();
						//$ligne_competence = $sql->fetch();
				?>
				<div class="row">
		        	<div class="col-md-8">
						<h2> il y a <?php echo $nbr_reseaux; ?> réseaux</h2>
						<table class="table table-hover table-condensed">
							<tr>
								<th>Réseau</th>
								<th>Lien</th>
								<th>Suppression</th>
								<th>Modification</th>
							</tr>
							<tr>
								<?php while ($ligne_reseau = $sql->fetch()){ ?>
								<td><?php echo $ligne_reseau['reseau']; ?></td>
								<td><?php echo $ligne_reseau['re_lien']; ?></td>
								<td><a href="reseaux.php?id_reseau=<?php echo $ligne_reseau['id_reseau']; ?> "><button type= "button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a></td>
								<td><a href="modif_reseau.php?id_reseau=<?php echo $ligne_reseau['id_reseau']; ?> "><button type= "button" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></button></a></td>
								<td></td>
							</tr>
							<?php } ?>
						</table>
					</div>
					<div class="col-md-4">
						<h2></h2>
		    			<table class="table table-hover table-condensed">
							<h3>Insertion d'un réseau</h3>
							<hr>
							<div class="form-group">
								<form action="reseaux.php" method="post">
									<label for="reseau">Réseau</label>
									<input type="text" name="reseau" id="reseau" placeholder="Insérer un reseau" class="form-control">
                                </form>
							</div>

							<div class="form-group">
                                <form action="reseaux.php" method="post">
									<label for="lien">Lien</label>
									<input type="text" name="re_lien" id="re_lien" placeholder="Insérer le lien" class="form-control">
                                </form>
							</div>
							<div>
                                <form action="reseaux.php" method="post">
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
