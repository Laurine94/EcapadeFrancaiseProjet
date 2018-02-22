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
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        
        <title>ESCAPADE FRANCAISE</title>
        
</head>
<body>

   <!--SDK Facebook pour JS-->

    <div id = "contenu">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-1 col-xs-offset-1" id="titreconormale">
                    <h2>Identify yourself :</h2>
                </div>
            </div>
            <div class="row">

                <div class="col-md-3 col-xs-3 col-md-offset-1 col-xs-offset-1" id="conormale">
                    <form action="indexClient.php?uc=connexion&action=valideConnexion" method="POST">

                        <div class="form-group">
                            <label for= "mail">Email address*</label>
                            <input id= "mail" type= "email" name= "mail" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for= "mdp">Password*</label>
                            <input id= "mdp" type= "password" name= "mdp" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary submit" value="Sign in"  name="client_submit">
                            <a href="indexClient.php?uc=connexion&action=valideEmailMdpOublie" >forgotten password ?</a>
                        </div>
                    </form>
                   
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3 connetwork" id="" align="center">
                    <blockquote id="blockquote">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button type="button" class="btn btn-primary" id="coFacebook" ><span class="iconNetwork"><i class="fab fa-facebook-f"></i></span> sign in with Facebook</button><br><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button type="button" class="btn btn-danger" id="coGoogle"><span class="iconNetwork"><i class="fab fa-google-plus-g"></i></span>sign in with Google+</button><br><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <a href="indexClient.php?uc=connexion&action=inscription" type="button" class="btn btn-default"> sign up </a>
                           
                        </div>
                    </div>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</body>

