<?php
require'connexion.php';
$sql = $pdoCV->query(" SELECT * FROM t_titre_cv WHERE utilisateur_id ='1'"); 
//ORDER BY id_titre_cv DESC LIMIT 1
$ligne_titre_cv = $sql->fetch();

$sql = $pdoCV->query(" SELECT prenom, nom, email, ville FROM t_utilisateurs WHERE id_utilisateur ='1'");
$ligne_utilisateurs = $sql->fetch(PDO::FETCH_ASSOC);

$sql = $pdoCV->query(" SELECT * FROM t_competences WHERE utilisateur_id ='1'");
$ligne_competences = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdoCV->query(" SELECT * FROM t_realisations WHERE utilisateur_id ='1' ");
$ligne_realisations = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdoCV->query(" SELECT * FROM t_experiences WHERE utilisateur_id ='1'");
$ligne_experiences = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdoCV->query(" SELECT * FROM t_formations WHERE utilisateur_id ='1'");
$ligne_formations = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdoCV->query(" SELECT * FROM t_reseaux WHERE utilisateur_id ='1'");
$ligne_reseaux = $sql->fetchAll(PDO::FETCH_ASSOC);
    
$sql = $pdoCV->query(" SELECT * FROM t_plus WHERE utilisateur_id ='1'");
$ligne_plus = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdoCV->query(" SELECT * FROM t_loisirs WHERE utilisateur_id ='1'");
$ligne_loisirs = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		
		<!--personal css-->
		<link href="css/stylepublicjs.css" rel="stylesheet">
        <!-- fonts for this site-->
        <link href="https://fonts.googleapis.com/css?family=Exo|Alegreya+Sans|Fira+Sans|Kanit+Sans:300,400,700,800" rel="stylesheet"> 
	</head>
   
	<body>
        <header>
            <h1>le site de Alain </h1>
            <?php include('navbar.php');?>  
        </header>
        <section class="base">
            <div class="wallpaper"> 
                <div class="page">
                    <div class="main">
                        <div class= svg-container>
                            <object type="image/svg+xml" data="svg/a_propos_fond.svg" class="svg-content">
                            </object>
                        </div>
                    </div> 
                </div>

                <div id="page_7" class="page">
                    <div class="main">
                        <div class= svg-container>
                            <object type="image/svg+xml" data="svg/plus.svg" class="svg-content">
                            </object>
                        </div>
                        <div class="svg-text">
                            <p>
                                <?php foreach($ligne_plus as $ligne_plus) : ?>
                            
                                <span class="dates"><?= $ligne_plus['p_dates']; ?></span><br>

                                <span class="titre"><?= $ligne_plus['p_titre']; ?></span><span class="marge"></span>

                                <span class="soustitre"><?= $ligne_plus['p_soustitre']; ?></span>

                                <span class="description"><?= $ligne_plus['p_description']; ?></span><br>
                            
                                <?php endforeach; ?>
                            </p>
                        </div>
                    </div> 
                    <div id="plus" class="onglet">
                        <p>Plus</p>
                    </div>
                </div>

                <div id="page_6" class="page">
                    <div class="main">
                        <div class= svg-container>
                            <object type="image/svg+xml" data="svg/loisirs.svg" class="svg-content">
                            </object>
                        </div>
                        <div class="svg-text">
                            <p>
                            <?php foreach($ligne_loisirs as $ligne_loisir) : ?>

                                    <span class="titre"><?= $ligne_loisir['loisir']; ?></span><br>

                                    <span class="titre"><?= $ligne_loisir['l_description']; ?></span><span class="marge"></span><br>

                            <?php endforeach; ?>
                            </p>
                        </div>
                    </div> 
                    <div id="loisirs" class="onglet">
                        <p>Loisirs</p>
                    </div>  
                </div>

                <div id="page_5" class="page">
                    <div class="main">
                        <div class= svg-container>
                            <object type="image/svg+xml" data="svg/formation.svg"  class="svg-content" >
                            </object>
                        </div>
                        <div class="svg-text">
                            <p>
                                <?php foreach($ligne_formations as $ligne_formation) : ?>

                                    <span class="dates"><?= $ligne_formation['f_dates']; ?></span><br>

                                    <span class="titre"><?= $ligne_formation['f_titre']; ?></span><span class="marge"></span>

                                    <span class="soustitre"><?= $ligne_formation['f_soustitre']; ?></span>

                                    <span class="description"><?= $ligne_formation['f_description']; ?></span><br>

                                <?php endforeach; ?>
                            </p>
                        </div> 
                        <div id="formation" class="onglet">
                            <p>Formation</p>
                        </div>  
                    </div>
                </div>

                <div id="page_4" class="page">
                    <div class="main">
                        <div class= svg-container>
                            <object type="image/svg+xml" data="svg/realisations.svg"  class="svg-content">
                        </object>
                        </div>
                        <div class="svg-text">
                            <p>
                                <?php foreach($ligne_realisations as $ligne_realisation) : ?>
                            
                                <span class="dates"><?= $ligne_realisation['r_dates']; ?></span><br>

                                <span class="titre"><?= $ligne_realisation['r_titre']; ?></span><span class="marge"></span>

                                <span class="soustitre"><?= $ligne_realisation['r_soustitre']; ?></span>

                                <span class="description"><?= $ligne_realisation['r_description']; ?></span><br>
                            
                                <?php endforeach; ?>
                            </p>
                        </div>
                    </div> 
                    <div id="realisations" class="onglet">                      <p>Réalisations</p>
                    </div> 
                </div>
                
                <div id="page_3" class="page">
                    <div class="main">
                        <div class= svg-container>
                            <object type="image/svg+xml" data="svg/experiences.svg"  class="svg-content" >
                            </object>
                        </div>
                        <div>
                            <p>
                                <?php foreach($ligne_experiences as $ligne_experience) : ?>

                                    <span class="dates"><?= $ligne_experience['e_dates']; ?></span><br>

                                    <span class="titre"><?= $ligne_experience['e_titre']; ?></span><span class="marge"></span>

                                    <span class="soustitre"><?= $ligne_experience['e_soustitre']; ?></span>

                                    <span class="description"><?= $ligne_experience['e_description']; ?></span><br>

                                <?php endforeach; ?>
                            </p>
                        </div>
                    </div> 
                    <div id="experiences" class="onglet">
                        <p>Expériences</p>
                    </div>  
                </div>

                <div id="page_2" class="page active">
                    <div class="main">
                        <div class= svg-container>
                            <object type="image/svg+xml" data="svg/competences.svg"  class="svg-content">
                            </object>
                        </div>
                        <div class="svg-text">
                            <p>
                                <?php foreach($ligne_competences as $ligne_competence) : ?>
                            
                                <span class="titre"><?= $ligne_competence['competence']; ?></span><br>

                                <span class="titre"><?= $ligne_competence['c_niveau']; ?></span><span class="marge"></span><br>
                            
                                <?php endforeach; ?>
                            </p>
                        </div>
                    </div> 
                    <div id="competences" class="onglet">
                        <p>Compétences</p>
                    </div>  
                </div>

               <div id="page_1" class="page">
                    <div class="main">
                        <div class= svg-container>
                            <object type="image/svg+xml" data="svg/a_propos.svg"  class="svg-content">
                            </object>
                        </div>
                        <div class="svg-text">
                            <div>
                                <p>
                                    <?php foreach($ligne_utilisateurs as $key => $value) : ?>

                                    <span class="<?= $key; ?>", ><?= $value; ?></span><br>

                                    <?php endforeach; ?>
                                </p>
                            </div>
                        </div>
                        <div class="svg-text">
                            <p>
                                <?php foreach($ligne_reseaux as $ligne_reseau) : ?>

                                <span class="reseau"><a href="<?= $ligne_reseau['rs_lien']; ?>"><img src="<?= $ligne_reseau['rs_logo']; ?>"></a></span><br>
                                <br>

                                <?php endforeach; ?>
                            </p>
                        </div>
                    </div> 
                    <div id="a-propos" class="onglet">
                        <p>à propos</p>
                    </div>  

                </div>
            </div>         
        </section>
        <script >var pages = document.getElementsByClassName("onglet")
            // console.log(pages)
            for(var i=0; i<pages.length; i++){
              pages[i].addEventListener("click",function(){
                console.log(this)
                for (var j=0; j<pages.length; j++){
                  // console.log(pages[j].parentNode)
                  pages[j].parentNode.classList.remove("active")
                }
               this.parentNode.classList.add("active")
              })
        }</script>
		<!-- jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<?php include('footer.php');?>  
	</body>
</html>