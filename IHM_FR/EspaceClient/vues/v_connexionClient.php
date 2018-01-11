<head>
        <meta charset="UTF-8">
        <link href="../css/index.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
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

   <!--SDK Facebook pour JS-->

    <div id = "contenu">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-md-offset-1 col-xs-offset-1" id="titreconnormale">
                    <h2>Identifiez vous :</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-xs-3 col-md-offset-1 col-xs-offset-1" id="connormale">
                    <form action="indexClient.php?uc=connexion&action=valideConnexion" method="POST">
                        <div class="form-group">
                            <label for= "mail">Adresse email*</label>
                            <input id= "mail" type= "email" name= "mail" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for= "mdp">Mot de passe*</label>
                            <input id= "mdp" type= "password" name= "mdp" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary submit" value="Se connecter">
                            <a href="#" >mot de pass oublié ?</a>
                        </div>
                    </form>
                   
                </div>
                <div class="col-md-3 col-xs-3" id="connetwork" align="center">
                    <div class="row">
                        <div class="col-md-12 col-xs-12coFacebook">
                            <input type="button" class="btn btn-primary coFacebook" value="Se connecter avec Facebook"><br><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <input type="button" class="btn btn-danger coGoogle" value="Se connecter avec Google+"><br><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <a href="indexClient.php?uc=connexion&action=inscription" type="button" class="btn btn-default"> s'inscrire </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

