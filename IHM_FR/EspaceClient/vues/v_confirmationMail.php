<p>Nous vous remercions de vous être inscrit sur notre site.</p>
<p>Vous allez recevoir un mail de confirmation</p> 

<?php
   if(isset($_POST['mail'],$_POST['key'])AND !empty($_POST['mail'])AND !empty($_POST['key'])){
       $mail= htmlspecialchars(ulrdecode($_POST['mail']));
       $requser=getClient($mail);
       $userexist=$requser->rowcount();
       
       if($userexist==1){
           $user=$requser->fetch();
           if($user['confirme']==0){
               $updateuser=majKey()
           }
           else{
               echo "Votre compte a déjà été confirmé!";
           }
           
       }
       else{
           echo"L'utilisateur n'existe pas."
       }
   }
?>