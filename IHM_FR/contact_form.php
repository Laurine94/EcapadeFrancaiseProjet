<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/contact_form.css" />
<br />
<div class="container"> 
    <div class="row">
         <div class="col-md-6 col-md-offset-3">
               <form method="post" name="aics" id="contact-formulaire" >
					<?php require_once("contact_form_valid.php"); ?>
                    <span style="text-align: center; color:#183e67;">Nous serons heureux d'avoir de vos nouvelles.<br /> Si vous êtes une agence de voyage, cliquez <a href="travel_agency.php">ici</a> pour remplir le formulaire d'adhésion.</span>
                    <br /><br />
                    <div class="form-group<?php echo $id_namecls;?>">
                        <input class="form-control" id="id_name" maxlength="100" name="id_name" placeholder="Nom" type="text" value="<?php echo $id_nameval;?>" />
                    </div>
                    <div class="form-group<?php echo $id_emailcls;?>">
                        <input class="form-control" id="id_email" name="id_email" placeholder="Email" type="Adresse mail" value="<?php echo $id_emailval;?>" />
                    </div>
                    <div class="form-group<?php echo $id_numbercls;?>">
                        <input class="form-control" id="id_number" name="id_number" placeholder="Numéro de téléphone" type="text" value="<?php echo $id_numberval;?>" />
                    </div>
                    <div class="form-group<?php echo $id_subjectcls;?>">
                        <input class="form-control" id="id_subject" maxlength="100" name="id_subject" placeholder="Sujet" value="<?php echo $id_subjectval;?>" type="text" />
                    </div>
                    <div class="form-group<?php echo $id_messagecls;?>">
                        <textarea class="form-control" cols="40" id="id_message" name="id_message" placeholder="Message" rows="10"><?php echo $id_messageval;?></textarea>
                    </div>
                    <button type="button" class="btn btn_bleu">Envoyer</button>
             </form>
        </div>
    </div>   
</div>
<br />