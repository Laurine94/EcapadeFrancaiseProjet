
<head>
    <meta charset="UTF-8">
    <link href="../css/index.css" rel="stylesheet">

    <!--<link href="css/styles.css" rel="stylesheet">-->
    <!-- animsition.css -->
    <!--<link rel="stylesheet" href="css/animsition.min.css">-->
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- animsition.js -->
    <script src="../../js/animsition.min.js"></script>

    <title>ESCAPADE FRANCAISE</title>

</head>
<body>
    <div class="row">
        <div class="col-md-5 col-xs-3 col-md-offset-1 col-xs-offset-1" id="conormale">
            <article>


                <?php
                //formulaire qui s'affiche apres avoir recu le code de vérification
                if ($section == 'code') {
                    ?>
                    <span style='color:green'> You will receive a code on your e-mail adress.</span>
                    <h4 class="title-element">Retrieval of password</h4>

                    <form  method="POST" class="default-form">

                        <div class="form-group">
                            Retrieval of password for <?= $_SESSION['recup_mail'] ?>
                            <input id= "mail" type= "text" name= "verif_code" class="form-control" placeholder="Verification code ">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary submit" name="verif_submit" value="confirm">
                        </div>
                    </form>
                    <?php
                    
                    
                    //formulaire pour changer le mot de passe 
                } elseif ($section == 'changemdp') {?>
                      <h4 class="title-element">Password change</h4>
                    <form  method="POST" class="default-form">

                        <div class="form-group">
                          Nouveau mot de passe pour <?= $_SESSION['recup_mail'] ?><br/><br/>
                          <input id= "mail" type= "password" name= "change_mdp" class="form-control" placeholder="New password">
                          <br/><input id= "mail" type= "password" name= "change_mdpc" class="form-control" placeholder="Confirm password">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary submit" name="change_submit" value="Confirm">
                        </div>
                    </form>
                    <?php

//formulaire qui s'affiche au moment ou le client veut recuperer le code de récupération de mdp
                } else {
                    ?>
                    <h4 class="title-element">">Retrieval of password</h4>
                    <form  method="POST" class="default-form">
                        <div class="form-group">
                            <input id= "mail" type= "email" name= "recup_mail" class="form-control" placeholder="Enter your e-mail adress">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary submit" name="recup_submit" value="Confirm">
                        </div>
                    </form>
                <?php } ?>
            </article>
        </div>
    </div>
</body>
