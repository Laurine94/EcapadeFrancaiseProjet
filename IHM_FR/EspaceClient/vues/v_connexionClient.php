<?php
require_once ("../connexion.php");
?>
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
    <div id = "contenu">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-xs-3 col-md-offset-1 col-xs-offset-1">
                    <h2>Identifiez vous:</h2>
                    <form action="indexClient.php?uc=connexion&action=valideConnexion" method="post">
                        <div class="form-group">
                            <label for = "mail">Adresse email*</label>
                            <input id = "mail" type = "email" name = "mail" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for = "mdp">Mot de passe*</label>
                            <input id = "mdp" type = "password" name = "mdp" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-default submit" value="Se connecter">
                            <a href="#collapse" data-toggle="collapse" type="button" class="btn btn-primary"> s'inscrire </a>
                        </div>
                    </form>
                </div>
            </div>
       
            <div class="row">
            <div id="collapse" class="collapse">
            <form>
                <div class="col-md-3 col-xs-3 col-md-offset-1 col-xs-offset-1">
                            <div class="form-group">
                                <label>Nom*</label><input type="text" name="nomCli" class="form-control" id="" placeholder=" Saisissez votre nom" required>
                            </div>
                            <div class="form-group">
                                <label>Prenom*</label><input type="text" name="prenomCli" class="form-control" id="" placeholder=" Saisissez votre prenom" required>
                            </div>
                            <label>Sexe </label>
                            <div class="row">
                                <div class="col-md-4 col-xs-4">
                                    <div class="form-group">
                                         <label>M <input type="radio" name="sexeCli" class="" ></label> 
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <div class="form-group">
                                        <label>F <input type="radio" name="sexeCli" class="" ></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Adresse email*</label><input type="email" name="mailCli" class="form-control" placeholder="ex : un.mail@gmail.com" required>
                            </div>
                            <div class="form-group">
                                <label>Confirmation email*</label><input type="text" name="ConfirmMailCli" class="form-control" id="" placeholder="Saisir à nouveau email" required>
                            </div>
                            <div class="form-group">
                                <label>Téléphone</label><input type="text" name="telCli" class="form-control" id="" placeholder="mobile/fixe">
                            </div>
                            <div class="form-group">
                                <label>Adresse*</label><input type="email" name="adresseCli" class="form-control" id="" placeholder="Saisissez votre adresse" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Ville*</label><input type="text" name="villeCli" class="form-control" id="" placeholder="Saisissez votre ville" required>
                            </div>
                            <label>Pays*</label>
                            <div class="form-group">
                                <select name="paysCli" class="form-control" required>
                                    <option>selectionner pays</option>
                                    <option value="af">Afghanistan </option> 
                                    <option value="al">Albania </option> 
                                    <option value="dz">Algeria </option> 
                                    <option value="as">American Samoa </option> 
                                    <option value="ad">Andorra </option> 
                                    <option value="ao">Angola </option> 
                                    <option value="ai">Anguilla </option> 
                                    <option value="aq">Antarctica </option> 
                                    <option value="ag">Antigua and Barbuda </option> 
                                    <option value="ar">Argentina </option> 
                                    <option value="am">Armenia </option> 
                                    <option value="aw">Aruba </option> 
                                    <option value="au">Australia </option> 
                                    <option value="at">Austria </option> 
                                    <option value="az">Azerbaijan </option> 
                                    <option value="bs">Bahamas </option> 
                                    <option value="bh">Bahrain </option> 
                                    <option value="bd">Bangladesh </option> 
                                    <option value="bb">Barbados </option> 
                                    <option value="by">Belarus </option> 
                                    <option value="be">Belgium </option> 
                                    <option value="bz">Belize </option> 
                                    <option value="bj">Benin </option> 
                                    <option value="bm">Bermuda </option> 
                                    <option value="bt">Bhutan </option> 
                                    <option value="bo">Bolivia </option> 
                                    <option value="ba">Bosnia and Herzegovina </option> 
                                    <option value="bw">Botswana </option> 
                                    <option value="bv">Bouvet Island </option> 
                                    <option value="br">Brazil </option> 
                                    <option value="io">British Indian Ocean Territory </option> 
                                    <option value="vg">British Virgin Islands </option> 
                                    <option value="bn">Brunei </option> 
                                    <option value="bg">Bulgaria </option> 
                                    <option value="bf">Burkina Faso </option> 
                                    <option value="bi">Burundi </option> 
                                    <option value="kh">Cambodia </option> 
                                    <option value="cm">Cameroon </option> 
                                    <option value="ca">Canada </option> 
                                    <option value="cv">Cape Verde </option> 
                                    <option value="ky">Cayman Islands </option> 
                                    <option value="cf">Central African Republic </option> 
                                    <option value="td">Chad </option> 
                                    <option value="cl">Chile </option> 
                                    <option value="cn">China </option> 
                                    <option value="cx">Christmas Island </option> 
                                    <option value="cc">Cocos Islands </option> 
                                    <option value="co">Colombia </option> 
                                    <option value="km">Comoros </option> 
                                    <option value="cg">Congo </option> 
                                    <option value="ck">Cook Islands </option> 
                                    <option value="cr">Costa Rica </option> 
                                    <option value="hr">Croatia </option> 
                                    <option value="cu">Cuba </option> 
                                    <option value="cy">Cyprus </option> 
                                    <option value="cz">Czech Republic </option> 
                                    <option value="dk">Denmark </option> 
                                    <option value="dj">Djibouti </option> 
                                    <option value="dm">Dominica </option> 
                                    <option value="do">Dominican Republic </option> 
                                    <option value="tp">East Timor </option> 
                                    <option value="ec">Ecuador </option> 
                                    <option value="eg">Egypt </option> 
                                    <option value="sv">El Salvador </option> 
                                    <option value="gq">Equatorial Guinea </option> 
                                    <option value="er">Eritrea </option> 
                                    <option value="ee">Estonia </option> 
                                    <option value="et">Ethiopia </option> 
                                    <option value="fk">Falkland Islands </option> 
                                    <option value="fo">Faroe Islands </option> 
                                    <option value="fj">Fiji </option> 
                                    <option value="fi">Finland </option> 
                                    <option value="fr">France </option> 
                                    <option value="gf">French Guiana </option> 
                                    <option value="pf">French Polynesia </option> 
                                    <option value="tf">French Southern Territories </option> 
                                    <option value="ga">Gabon </option> 
                                    <option value="gm">Gambia </option> 
                                    <option value="ge">Georgia </option> 
                                    <option value="de">Germany </option> 
                                    <option value="gh">Ghana </option> 
                                    <option value="gi">Gibraltar </option> 
                                    <option value="gr">Greece </option> 
                                    <option value="gl">Greenland </option> 
                                    <option value="gd">Grenada </option> 
                                    <option value="gp">Guadeloupe </option> 
                                    <option value="gu">Guam </option> 
                                    <option value="gt">Guatemala </option> 
                                    <option value="gn">Guinea </option> 
                                    <option value="gw">Guinea-Bissau </option> 
                                    <option value="gy">Guyana </option> 
                                    <option value="ht">Haiti </option> 
                                    <option value="hm">Heard and McDonald Islands </option> 
                                    <option value="hn">Honduras </option> 
                                    <option value="hk">Hong Kong </option> 
                                    <option value="hu">Hungary </option> 
                                    <option value="is">Iceland </option> 
                                    <option value="in">India </option> 
                                    <option value="id">Indonesia </option> 
                                    <option value="ir">Iran </option> 
                                    <option value="iq">Iraq </option> 
                                    <option value="ie">Ireland </option> 
                                    <option value="il">Israel </option> 
                                    <option value="it">Italy </option> 
                                    <option value="ci">Ivory Coast </option> 
                                    <option value="jm">Jamaica </option> 
                                    <option value="jp">Japan </option> 
                                    <option value="jo">Jordan </option> 
                                    <option value="kz">Kazakhstan </option> 
                                    <option value="ke">Kenya </option> 
                                    <option value="ki">Kiribati </option> 
                                    <option value="kp">Korea, North </option> 
                                    <option value="kr">Korea, South </option> 
                                    <option value="kw">Kuwait </option> 
                                    <option value="kg">Kyrgyzstan </option> 
                                    <option value="la">Laos </option> 
                                    <option value="lv">Latvia </option> 
                                    <option value="lb">Lebanon </option> 
                                    <option value="ls">Lesotho </option> 
                                    <option value="lr">Liberia </option> 
                                    <option value="ly">Libya </option> 
                                    <option value="li">Liechtenstein </option> 
                                    <option value="lt">Lithuania </option> 
                                    <option value="lu">Luxembourg </option> 
                                    <option value="mo">Macau </option> 
                                    <option value="mk">Macedonia, Yugoslav Republic of </option> 
                                    <option value="mg">Madagascar </option> 
                                    <option value="mw">Malawi </option> 
                                    <option value="my">Malaysia </option> 
                                    <option value="mv">Maldives </option> 
                                    <option value="ml">Mali </option> 
                                    <option value="mt">Malta </option> 
                                    <option value="mh">Marshall Islands </option> 
                                    <option value="mq">Martinique </option> 
                                    <option value="mr">Mauritania </option> 
                                    <option value="mu">Mauritius </option> 
                                    <option value="yt">Mayotte </option> 
                                    <option value="mx">Mexico </option> 
                                    <option value="fm">Micronesia, Federated States of </option> 
                                    <option value="md">Moldova </option> 
                                    <option value="mc">Monaco </option> 
                                    <option value="mn">Mongolia </option> 
                                    <option value="ms">Montserrat </option> 
                                    <option value="ma">Morocco </option> 
                                    <option value="mz">Mozambique </option> 
                                    <option value="mm">Myanmar </option> 
                                    <option value="na">Namibia </option> 
                                    <option value="nr">Nauru </option> 
                                    <option value="np">Nepal </option> 
                                    <option value="nl">Netherlands </option> 
                                    <option value="an">Netherlands Antilles </option> 
                                    <option value="nc">New Caledonia </option> 
                                    <option value="nz">New Zealand </option> 
                                    <option value="ni">Nicaragua </option> 
                                    <option value="ne">Niger </option> 
                                    <option value="ng">Nigeria </option> 
                                    <option value="nu">Niue </option> 
                                    <option value="nf">Norfolk Island </option> 
                                    <option value="mp">Northern Mariana Islands </option> 
                                    <option value="no">Norway </option> 
                                    <option value="om">Oman </option> 
                                    <option value="pk">Pakistan </option> 
                                    <option value="pw">Palau </option> 
                                    <option value="pa">Panama </option> 
                                    <option value="pg">Papua New Guinea </option> 
                                    <option value="py">Paraguay </option> 
                                    <option value="pe">Peru </option> 
                                    <option value="ph">Philippines </option> 
                                    <option value="pn">Pitcairn Island </option> 
                                    <option value="pl">Poland </option> 
                                    <option value="pt">Portugal </option> 
                                    <option value="pr">Puerto Rico </option> 
                                    <option value="qa">Qatar </option> 
                                    <option value="re">Reunion </option> 
                                    <option value="ro">Romania </option> 
                                    <option value="ru">Russia </option> 
                                    <option value="rw">Rwanda </option> 
                                    <option value="gs">S. Georgia and S. Sandwich Isls. </option> 
                                    <option value="kn">Saint Kitts &amp; Nevis </option> 
                                    <option value="lc">Saint Lucia </option> 
                                    <option value="vc">Saint Vincent and The Grenadines </option> 
                                    <option value="ws">Samoa </option> 
                                    <option value="sm">San Marino </option> 
                                    <option value="st">Sao Tome and Principe </option> 
                                    <option value="sa">Saudi Arabia </option> 
                                    <option value="sn">Senegal </option> 
                                    <option value="sc">Seychelles </option> 
                                    <option value="sl">Sierra Leone </option> 
                                    <option value="sg">Singapore </option> 
                                    <option value="sk">Slovakia </option> 
                                    <option value="si">Slovenia </option> 
                                    <option value="so">Somalia </option> 
                                    <option value="za">South Africa </option> 
                                    <option value="es">Spain </option> 
                                    <option value="lk">Sri Lanka </option> 
                                    <option value="sh">St. Helena </option> 
                                    <option value="pm">St. Pierre and Miquelon </option> 
                                    <option value="sd">Sudan </option> 
                                    <option value="sr">Suriname </option> 
                                    <option value="sj">Svalbard and Jan Mayen Islands </option> 
                                    <option value="sz">Swaziland </option> 
                                    <option value="se">Sweden </option> 
                                    <option value="ch">Switzerland </option> 
                                    <option value="sy">Syria </option> 
                                    <option value="tw">Taiwan </option> 
                                    <option value="tj">Tajikistan </option> 
                                    <option value="tz">Tanzania </option> 
                                    <option value="th">Thailand </option> 
                                    <option value="tg">Togo </option> 
                                    <option value="tk">Tokelau </option> 
                                    <option value="to">Tonga </option> 
                                    <option value="tt">Trinidad and Tobago </option> 
                                    <option value="tn">Tunisia </option> 
                                    <option value="tr">Turkey </option> 
                                    <option value="tm">Turkmenistan </option> 
                                    <option value="tc">Turks and Caicos Islands </option> 
                                    <option value="tv">Tuvalu </option> 
                                    <option value="um">U.S. Minor Outlying Islands </option> 
                                    <option value="ug">Uganda </option> 
                                    <option value="ua">Ukraine </option> 
                                    <option value="ae">United Arab Emirates </option> 
                                    <option value="uk">United Kingdom </option> 
                                    <option value="us">United States of America</option> 
                                    <option value="uy">Uruguay </option> 
                                    <option value="uz">Uzbekistan </option> 
                                    <option value="vu">Vanuatu </option> 
                                    <option value="va">Vatican City </option> 
                                    <option value="ve">Venezuela </option> 
                                    <option value="vn">Vietnam </option> 
                                    <option value="vi">Virgin Islands </option> 
                                    <option value="wf">Wallis and Futuna Islands </option> 
                                    <option value="eh">Western Sahara </option> 
                                    <option value="ye">Yemen </option> 
                                    <option value="yu">Yugoslavia (Former) </option> 
                                    <option value="zr">Zaire </option> 
                                    <option value="zm">Zambia </option> 
                                    <option value="zw">Zimbabwe </option> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mot de passe*</label><input type="password" name="mdpCli" class="form-control" placeholder="Saisissez un mot de passe" required>
                            </div>
                            <div class="form-group">
                                <label>Confirmation mot de passe*</label><input type="password" name="ConfirmMdpCli" class="form-control" id="" placeholder="Saisir à nouveau mot de passe" required>
                            </div>
                            <p>* Champs obligatoire</p>
                            <div>
                                <a href='#'><button type="submit" class="btn btn-default submit">S'inscrire</button></a>
                            </div>
                </div>
            </form>
            </div>
            </div>
        </div>
    </div>
    <script>
        $('#collapse').collapse({
        show: true
        });
    </script>
        
</body>