<head>
    <title>Agence de Voyage</title>
    <link rel="stylesheet" type="text/css" href="css/travel_agency.css">
    <style>.rederror input, .rederror textarea, .rederror select {border-color:#c00;}</style>
</head>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
<!--<script src="js/form.js"></script>-->

<body>
    <?php require_once("contact_form_valid.php"); ?>
    <?php require_once("travel_agency_valid.php"); ?>
    <div>
        <?php include 'navbar.php'; ?>
    </div>

    <div class="grande_div">
        <br />
        <br />
        <div class="sous_div1">
            <p>Bienvenue sur Escapade Française. Si vous n'avez pas encore de partenariat avec nous, complétez le formulaire suivant et envoyez le nous, s'il vous plaît. Vous pourrez voir les prix et la disponibilité de nos propriétés et faire des réservations en ligne pour vos clients.</p>
        </div>
        <form method="post" name="aics">
            <div class="espace<?php echo $titlecls;?>">
                <label for="title">
                    Titre:<br />
                    <select id="title" name="title" class="">
                        <option value="Mr"<?php echo ($titleval=='Mr')?'selected':'';?>>M.</option>
                        <option value="M"<?php echo ($titleval=='M')?'selected':'';?>>Mme.</option>
                        <option value="M"<?php echo ($titleval=='M')?'selected':'';?>>Mlle.</option>

                    </select>
                </label>
            </div>

            <div class="espace">
                <div class="moyenne_div">
                    <div class="petite_div_50<?php echo $first_namecls;?>">
                        <label for="first_name">
                            Prénom:<br />
                            <input type="text" id="first_name" name="first_name" placeholder="Prénom" class="bleu" value="<?php echo $first_nameval;?>"/>
                        </label>
                    </div>
                    <div class="petite_div_50<?php echo $last_namecls;?>">
                        <label for="last_name">
                            Nom:<br />
                            <input type="text" id="last_name" name="last_name" placeholder="Nom" class="bleu" value="<?php echo $last_nameval;?>"/>
                        </label>
                    </div>
                </div>

                <div class="moyenne_div">
                    <div class="petite_div_50<?php echo $emailcls;?>">
                        <label for="email">
                            Adresse mail:<br />
                            <input type="text" id="email" name="email" placeholder="Adresse mail" class="bleu" value="<?php echo $emailval;?>"/>
                        </label>
                    </div>
                    <div class="petite_div_50<?php echo $phonecls;?>">
                        <label for="phone">
                            Numéro de téléphone:<br />
                            <input type="text" id="phone" name="phone" placeholder="numéro de téléphone" class="bleu" value="<?php echo $phoneval;?>"/>
                        </label>
                    </div>
                </div>
            </div>

            <div class="espace">
                <div class="moyenne_div">
                    <div class="petite_div_50<?php echo $functioncls;?>">
                        <label for="function">
                            Fonction:<br />
                            <input type="text" id="function" name="function" placeholder="Fonction" class="bleu" value="<?php echo $functionval;?>"/>
                        </label>
                    </div>
                    <div class="petite_div_50<?php echo $agency_namecls;?>">
                        <label for="agency_name">
                            Nom de l'agence:<br />
                            <input type="text" id="agency_name" name="agency_name" placeholder="Nom de l'agence" class="bleu" value="<?php echo $agency_nameval;?>"/>
                        </label>
                    </div>
                </div>

                <div class="moyenne_div">
                    <div class="petite_div_50<?php echo $companycls;?>">
                        <label for="company">
                            Compagnie:<br />
                            <input type="text" id="company" name="company" placeholder="Compagnie" class="bleu" value="<?php echo $companyval;?>"/>
                        </label>
                    </div>
                    <div class="petite_div_50<?php echo $specializationcls;?>">
                        <label for="specialization">
                            Agence spécialisée dans...<br />
                            <input type="text" id="specialization" name="specialization" placeholder="Agence spécialisée dans..." class="bleu" value="<?php echo $specializationval;?>"/>
                        </label>
                    </div>
                </div>

                <div class="moyenne_div">
                    <div class="petite_div_75<?php echo $addresscls;?>">
                        <label for="address">
                            Addresse:<br />
                            <input type="text" id="address" name="address" placeholder="Addresse" class="bleu" value="<?php echo $addressval;?>"/>
                        </label>
                    </div>
                    <div class="petite_div_25<?php echo $zip_codecls;?>">
                        <label for="zip_code">
                            Code Postal:<br />
                            <input type="text" id="zip_code" name="zip_code" placeholder="Code Postal" class="bleu" value="<?php echo $zip_codeval;?>"/>
                        </label>
                    </div>
                </div>

                <div class="moyenne_div">
                    <div class="petite_div_50<?php echo $citycls;?>">
                        <label for="city">
                            Ville/Région:<br />
                            <input type="text" id="city" name="city" placeholder="Ville" class="bleu" value="<?php echo $cityval;?>"/>
                        </label>
                    </div>
                    <div class="petite_div_50<?php echo $countrycls;?>">
                        <label for="country">
                            Pays:<br />
                            <input type="text" id="country" name="country" placeholder="Pays" class="bleu" value="<?php echo $countryval;?>"/>
                        </label>
                    </div>
                </div>

                <div class="moyenne_div">
                    <div class="petite_div_50<?php echo $faxcls;?>">
                        <label for="fax">
                            Fax:<br />
                            <input type="text" id="fax" name="fax" placeholder="Fax" class="bleu" value="<?php echo $faxval;?>"/>
                        </label>
                    </div>
                    <div class="petite_div_50<?php echo $iatacls;?>">
                        <label for="iata">
                            Numéro IATA:<br />
                            <input type="text" id="iata" name="iata" placeholder="Numéro IATA" class="bleu" value="<?php echo $iataval;?>"/>
                        </label>
                    </div>
                </div>
            </div>

            <div class="sous_div2">
                <p><em>Si vous ne disposez pas d'un numéro IATA/TIDS, s'il vous plaît, contactez nous. Nous nous efforcerons de répondre dans les 48 à 72 heures suivantes:</em> <strong>travelagency@escapadefrancaise.com</strong></p>
            </div>

            <div class="espace">
                <div class="moyenne_div">
                    <div class="petite_div_100<?php echo $messagecls;?>">
                        <label for="message">
                            Ajoutez un commentaire:<br />
                            <textarea name="message" id="message" placeholder="Tapez votre message ici" class="bleu"><?php echo $messageval;?></textarea>
                        </label>
                    </div>
                </div>
            </div>

            <div class="decale_droite">
                <input type="submit" value="Envoyer"/>
            </div>
        </form>

        <div class="sous_div1">
            <br /><br />
            <p><strong>Mentions legals</strong></p>
            <p>Votre vie privée est très importante pour nous. Les informations que vous nous fournissez sont conservées avec le plus grand soin et sécurité, et ne seront pas utilisées sans consentement. Nous ne partageons jamais ou ne vendons aucune donnée client avec un tiers. Conformément à la loi française sur la protection des données du 6 janvier 1978, vous avez le droit d'accéder et de corriger toute information vous concernant en envoyant un message à travelagency@escapadefrancaise.com</p>
            <p>J'ai lu et j'accepte les <a href="terms_of_use.php">conditions d'utilisation.</a></p>
            <p>* Champs obligatoires</p>
        </div>
    </div>
<?php include 'footer.php'; ?>
</body>