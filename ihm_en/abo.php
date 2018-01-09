<?php




try

{


$bdd = new PDO('mysql:host=localhost;dbname=ef_en;charset=utf8', 'root', '');




    }

catch(Exception $e)

{

        die('Erreur : '.$e->getMessage());

}





if(isset($_POST['submit'])){
     $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
     $telephone = htmlspecialchars($_POST['telephone']);
     $email = htmlspecialchars($_POST['email']);
     $etablissement = htmlspecialchars($_POST['etablissement']);
     $ville = htmlspecialchars($_POST['ville']);
      $guide = htmlspecialchars($_POST['guide']);
      $maison_hote = htmlspecialchars($_POST['maison_hote']);
    $maison_hote1 = htmlspecialchars($_POST['maison_hote1']);
     $activite = htmlspecialchars($_POST['activite']);
    $activite = htmlspecialchars($_POST['activite1']);
     $commentaire = htmlspecialchars($_POST['commentaire']);




if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['telephone']) AND !empty($_POST['email']) AND !empty($_POST['etablissement']) AND !empty($_POST['ville'])  AND !empty($_POST['maison_hote1'])  AND !empty($_POST['activite1']) AND  !empty($_POST['commentaire']) ){
       
        
       
            
            
 


$requete = $bdd->prepare("INSERT INTO demande_admission ( nom , prenom , telephone , email , etablissement , ville   , guide , maison_hote ,maison_hote1 , activite , activite1 , commenetaire ) VALUES ( ? , ? , ? , ? , ? , ? , ? )");
$requete->execute(array($nom , $prenom ,  $telephone , $email , $etablissement , $ville  , $guide , $maison_hote , $maison_hote1 , $activite   , $activite1 , $commentaire ));
                 $erreur= "Votre Demande d'admission a été prise en compte" ;

    
       
   



   $requete->closeCursor ();
    
    
    
      

   
    }
    
    else{

        $erreur= "veuiller remplir toute les cases";
       
    }


 

}
  

 
    
    
    




        




?>

 





<!DOCTYPE html>
<html>
	<head>
		<title>Abonnement</title>
    <meta charset="utf-8"> 
		<link rel="stylesheet" type="text/css" href="css/abo.css"/>
    <link rel="stylesheet" type="text/css" href="css/boostrap.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		
    <!-- add jquery ficher for head-->
    <link rel="stylesheet" type="text/css" href="js/jquery.min.js">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/Sunny/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="js/abo.js">
     

    <!--I link script jquery in head-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous">
    </script>
    <!--end script in heade-->
    <style>
#myDIV {
    width: 100%;
    padding: 50px 0;
    text-align: center;
    background-color: lightblue;
    margin-top:20px;
}
</style>

	</head><!--end head-->

	<body><!--body stat-->

		<?php include 'navbar.php'; ?>

        
        
        
        
        
    <div class="background">    
        
        
			<div class="case1 background">
				<div class="carre1">
					<h2 style="font-size: 60px;">Maître de maison d'hôtes <br><br> ou opérateur de loisirs? <br><br> Abonnez vous et devenez <br><br> membre de la collection <br><br> Escapade Française. </h2>
        </div>
        
        
        
        
      </div>
		  <!--strat pannel for form-->
      <!--case 2-->
     <div class="case2">
        <div class="partie1">
          <h3 class="tarif_title" > Plus de réservations</h3>
            <h3 class="tarif_title"> Clients satisfaits</h3>
            <br>
                <div class="box1 col-md-4">

                  <h1>01</h1>
                    <div class="trait"></div>
                    <br>
                      <p>SANS <br>ENGAGEMENT</p>
                      <br>
                      <p id="s">-Aucuns frais d'adhesions<br><br>-Sur simple demande <br> par mail, en cas <br> d'insatisfactions vous <br> êtes libre de nous quitter.</p>
                    </div>

                    <div class="box2 col-md-4">

                        <h1>02</h1>
                        <div class="trait"></div>
                        <br>
                        <p>VISIBILITE ET  <br> COMMUNICATION</p>
                        <br>
                        <p id="s">-Augmentation de votre <br> visibilité a échelle <br> international,</p>
                        <p id="s">-Votre annonce est <br> diffuse en anglais et <br> traduits par nos soins <br> (bientôt chinois et espagnol).</p>
                    </div>

                    <div class="box3 col-md-3">
                        <h1>03</h1>
                        <div class="trait"></div>
                        <br>
                        <p>RESERVATION <br> CLIENT</p>
                        <br>
                        <br>
                        <p id="s">-Hausse de vos <br> réservations <br> supplémentaires par an.</p>
                        <br>
                        <p id="s">-Mise en relation directe <br> du client avec vous.</p>
                        <br>
                        <p id="s">-Participation active <br> sur les réseaux sociaux <br> afin de promouvoir <br> votre image.</p>
                        <br>
                        <br>
                    </div>
         </div>
      </div>
     
     
     
<!--case3--><div class="ben"></div>
<!--case3-->
      <div class="case3">
        <div class="tarif_title">Les avantages <br> Escapade Française</div>
        <br>
        <br>
        <br>
          <div class="col-sm-6">
              <p><img src="../ihm_en/img/ima/test.jpg" width="250px" height="250px"></p>
          </div>
          <div class="col-sm-6">
              <h2>Gage de confiance clients-<br> établissement</h2>
              <br>
              <br>
              <p>- Liens direct vers votre site <br> personnel.</p>
              <p>- Les avis de vos hôtes.</p>
              <p>- Localisation de <br> votre établissement et <br> détails nécessaires.</p>
          </div>
          <br>
          <br>
          <br>
          <br>
        <div class="col-sm-6">
          <br><br><br><br>
            <p><img src="../ihm_en/img/ima/test2.jpg"  width="250px" height="250px"> </p>
        </div>
        
        
        <div class="pen"></div>
        
        
        <div class="col-sm-6">
            <h2>On s'occupe de tout!</h2>
            <br>
            <br>
            <p>- Photos et vidéos illimités pour dévoiler <br> votre établissement.</p>
            <p>- Une centrale de mise à jour de <br> disponibilite de votre établissement <br> assurer par nos soins.</p>
            <p>- L'intégration de votre établissement <br> dans notre réseau par nos soins.</p>
            
        </div>
        
        <br> <br>
        <br>
          <br>
        <div class="men"></div>
        <div class="col-sm-6">
            <p><img src="../ihm_en/img/ima/test3.jpg" width="250px" height="250px" /> </p>
        </div>
        <div class="col-sm-6">
            <h2>Gagner du temps.</h2>
            <br>
            <p>- Vous recevez automatiquement en cas de réservations <br> une notifications par e-mail et par sms.</p>
            <p>- Chaque semaine un fichier statistique vous est envoyer <br> afin de vous aider à améliorer votre établissement <br> comprenant le taux de visiteurs sur votre établissement, <br> les services les plus vendues, le nombre totale de <br> réservation de la semaine, le nombre totale de réservation <br> du mois et de l'année.</p>
            <p>- Votre chiffre d'affaires réalisé sur notre plateforme.</p>
            
        </div>
    </div>


    <div style="width:100%; height:100px">
    </div>
<!-- case4-->
        <div class="case4">
            <div class="tarif_title">AUCUN ENGAGEMENT - <br> AUCUN ABONNEMENT</div>
            <br>
            <div class="tarif_prix">Recevez 90% du montant des </div>
            <div class="mois_gratuit">prestations apportés par <br> Escapade Française</div>
            </div>
<!--case5-->
     
        
     
     
     
     
     
      <div class="case5">
          <div class="pave">
            <div class="cand_title">La candidature</div>
            <br><br>

               <div class="col-sm-4">
                  <div class="pave1">
                    <p><b>Faites nous parvenir <br> vos demande<br> d'admission au sein du <br> réseau Escapade <br> Française en <br>remplissant le <br> formulaire ci dessous<br> par le gérant de <br> l'établissement.</p>
                  </div>
                  <div class="border"> </div>
              </div>
         
          
              <div class="col-sm-4">
                    <div class="pave2">
                      <p>Suite à l'étude du <br> dossier de la <br> candidature, une <br> réponse vous est <br> envoyer sous 48h. Selon <br> si votre candidature est <br> maintenue, nous vous <br> prierons de bien vouloir <br> nous faire parvenir les <br> dernières pièces <br> nécessaire à la création <br> de votre dossier.</p>
                    </div>
                    <div class="border"></div>
              </div>
          
             <div class="col-sm-4">
                 <div class="pave3">
                    <p>Une fois admis , dans le <br> cadre des normes de nos <br> critères d'adhésions, une <br> visite est effectué tous les <br> 1 an et demi afin de <br> continuer de garantir le <br> même niveau de conforts <br> aux clients <br> (hébergements et <br> activités testés par notre <br> équipe). L'établissement <br> pourra désormais <br> bénéficier de plein droit <br> de tous les avantages <br> Escapade Française de <br> même il sera convier aux <br> dîners et séminaires <br> Escapade.</p>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <script src="js/abo.js">
        $(function() {
    $('p').first().fadeOut(2000, function suivante() {
        $(this).next('p').fadeOut(2000,suivante);
    });
  });
        
        
        </script>
    
    <!--case 6-->  
    
    
    
    
    <div class="case6">
        <h4>Demande d'admission</h4>
           <!-- start form-->
           
           
           
           
            <form class="form-horizontal" action="" method="post">

                <div class="form-group">
                    <label class="control-label col-sm-4" for="nom">Nom :</label>
                      <div class="col-sm-6">          
                          <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom" value="<?php if(isset($nom))  {  echo  $nom  ;}   ?>">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-sm-4" for="prenom">Prénom :</label>
                        <div class="col-sm-6">          
                          <input type="text" class="form-control" id="prenom" placeholder="Prénom" name="prenom" value="<?php if(isset($prenom))  {  echo  $prenom ;}   ?>">
                        </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-sm-4" for="telephone">Téléphone :</label>
                        <div class="col-sm-6">          
                          <input type="number" class="form-control" id="telephone" placeholder="Téléphone" name="telephone" value="<?php if(isset($telephone))  {  echo  $telephone  ;}   ?>">
                        </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-sm-4" for="email">Email :</label>
                        <div class="col-sm-6">
                          <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php if(isset($email))  {  echo  $email ;}   ?>">
                        </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-sm-4" for="etablissement">Nom de l'établissement :</label>
                        <div class="col-sm-6">          
                          <input type="text" class="form-control" id="etablissement" placeholder="Nom de l'établissement" name="etablissement" value="<?php if(isset($etablissement))  {  echo  $etablissement ;}   ?>">
                        </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-sm-4" for="ville">Ville :</label>
                        <div class="col-sm-6">          
                          <input type="text" class="form-control" id="ville" placeholder="Ville" name="ville" value="<?php if(isset($ville))  {  echo  $ville ;}   ?>">
                        </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-sm-4" name = "guide" class="checkbox-inline" for="activités">Guide :</label> </label>
                        <div class="col-sm-6">
                           <input type="checkbox" name="guide" id="checkbox2" value="<?php if(isset($guide))  {  echo  $guide ; }   ?>" >   
                        </div> 
                  </div>
                  
                   <script src="./js/ken3.js">
                           
                            </script>

                  
                  
                  
                  
                  
                <!--button oiu or no-->
                  <div class="form-group">
                      <label class="control-label col-sm-4" class="checkbox-inline" for="Mhote">Maison d'hotes   :</label> </label>
                        <div class="col-sm-6">
                          
                          <div class="col-sm-6">
                           <input type="checkbox" name="maison_hote" style="margin-left: -5%;" id="checkbox" value="<?php if(isset($maison_hote))  {  echo  $maison_hote ; }   ?>" >   
                        </div> 
                           
                             <div id="delivery" style="display:none;">
                          <div class="col-sm-6" >
                             <p style="padding-top:7%">
                                 <label for="maison_hote1">Combien de chambre avez-vous?</label><br />
                                 
                                    <input type="number" name="maison_hote1" id="checkbox" placeholder="" size="30" maxlength="10" />
                                     
                                     
                                
                             </p>  
                          </div>
                           </div>


                            <script src="./js/ken.js">
                           
                            </script>
                        
                        
                         
                          
                          
                        </div>   
                       </div>
                  
                 
                
                  <!--end-->
                  <!-- button for activites-->
                  <div class="form-group">
                      <label class="control-label col-sm-4" class="checkbox-inline" for="activite ">Prestataire de loisirs:</label> </label>
                         <div class="col-sm-6">
                           <input type="checkbox" id="checkbox1" name="Mhote" value="<?php if(isset($activite))  {  echo  $activite ; }   ?>" >     
                        </div> 
                        
                             <div id="delivery1" style="display:none;">
                          <div class="col-sm-6" >
                             <p  style="padding-left:53%">
                                 <label for="activite1">Choisissez le secteur d'activité</label><br />
                                    <select name="genre" id="genre">
                                           <option value="1">Canyoning</option>
                                           <option value="2">Randonnées aquatiques</option>
                                           <option value="3">Escalade</option>
                                           <option value="4">Balades en bateaux</option>
                                           <option value="5">Parapente</option>
                                           <option value="6">Cuisine</option>
                                           <option value="7">Golf</option>
                                           <option value="8">Surf</option>
                                           <option value="9">Via Ferrata</option>
                                           <option value="10">Rafting</option>
                                           <option value="11">Via Cordata</option>
                                           <option value="12">Parachute</option>
                                           <option value="13">Visites</option>
                                           <option value="14">Detente</option>
                                           <option value="15">Velo</option>
                                           <option value="16">Equitation</option>
                                           <option value="17">Spéléologie</option>
                                           <option value="18">Pêche</option>
                                           <option value="15">Extreme</option>
                                           <option value="16">Randonnée</option>
                                           <option value="17">Natation</option>
                                           <option value="18">Musées</option>
                                       </select>
                                     
                                     
                                
                             </p>  
                          </div>
                           </div>


                            <script src="./js/ken2.js">
                            
                           
                            </script>
                        
                        
                                
                    
                                                                            
                  </div>



                  
                  <!-- end-->  
                  <div class="form-group">
                      <label class="control-label col-sm-4" name="commentaire"for="Commentaire" value="<?php if(isset($commentaire))  {  echo  $commentaire ; }   ?>"> Commentaire:</label>
                        <div class="col-sm-6">          
                          <!--<textarea type="textarea"class="form-control" id="Commentaire"  name="Commentaire" placeholder="Parlez nius de vous et de vous motivations, de l'histoire de votre établishment">
                          </textarea> -->     
                          <input type="textarea" class="form-control" id="comentaire" placeholder="Parlez nous de vous et de vos motivations, de l'histoire de votre établissement..." name="commentaire" >   
                        </div>     
                  </div>
    
                  <div class="form-group">        
                      <div class="col-sm-offset-4 col-sm-6">
                        <button  type="submit" class="btn btn-primary btn-lg" style="color: white; border-radius:0px" value="valide" name="submit">Envoyer</button>
                      </div>
                  </div>
              </form>
           
              
<?php
 if(isset($erreur))
 {
     echo '<font color="red"  disposition: "center" >' .$erreur. '</font>';
 }



?>

              
          <!-- pannel for form-->
         </div>


         <div style="width:100%; height:350px;">
       </div>


       </div>
	
		<?php include 'footer.php'; ?>
    
  <script src="js/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  

<!--sratr jquery for animation-->

<script>
function myFunction() {
    var x = document.getElementById('myDIV');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
</script>

<!--end jquery animation with paragraphe-->
</body>
</html>


