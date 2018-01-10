<style>
    body{
        margin: 0;
        padding: 0;
        min-height: 100%;
    }
    
    footer{
        background-color: #183e67;
        position:relative;
        bottom:0;
        width:100%;
        padding-top:10px;
        padding-bottom:10px;
        text-align: center;
        font-size: 15px;
        font-family: 'Montserrat', sans-serif;
    }
    
    .footer3{
        width: 33%;
        display: inline-block;
        color: white;
    }
    
    .droite p{
        padding: 0 10px 0px;
        float: right;
        margin: 0;
    }
    
    .form{
        text-align: center;
        margin: 0;
        padding: 0;
        top: 10px;
        position: absolute;
        width: 33%;
    }
    
    .form input[type=text]{
        width: 75%;
        padding: 5px;
        border: none;
        outline: none;
    }
    
    .form input[type=submit]{
        width: 20%;
        padding: 5px;
        background-color: #6666ff;
        color: white;
        border: none;
        font-weight: bold;
        border-radius: 2px;
        cursor: pointer;
    }
    
    .partenaires{
        position: absolute;
        bottom: 5px;
        left: 43%;
        margin: 0 auto;
        text-align: center;
    }
    
    /*.bouton_newsletter: hover{
        background-color: red;
        color: white;
    }*/
    
    .social_media img{
        width: auto;
        height: 40px;
    }
    
    .social_media{
        padding-right: 10px;
        padding-top: 0;
        margin-top: 0;
    }
    
    .liens{
        float: left;
        top: 10px;
        position: absolute;
    }
    
    .sous_div_footer{
        text-align: center;
    }
    
</style>

<br />
<br />
<br />

<footer id="footer">
    <div class="footer3 droite">
        <p>Telephone : +33 7 69 50 95 88</p><br />
        <p><a href="mailto:info@escapadefrancaise.com" style="text-decoration:underline;color:white;">info@escapadefrancaise.com</a></p><br />
        <p>76 Bis Rue de Rennes</p><br />
        <p>75006 Paris, FRANCE</p>
    </div>
    <div class="footer3 milieu">
        <div class="sous_div_footer">
            <div class="form">
                <form>
                    <input type="text" placeholder="Email" style="color:black;">
                    <input type="submit" value="S'abonner" title="S'abonner à la newsletter" class="bouton_newsletter">
                </form>
            </div>
            <div class="partenaires">
                <span class="social_media"><a href="https://www.emirates.com" target="_blank" title="Fly Emirates"><img src="../img/logos/Emirates_Airlines_logotype_emblem_logo_4.png"></a></span>
                <span class="social_media"><a href="http://www.chauffeur-prive.com/" target="_blank" title="Chauffeur Privé"><img src="../img/logos/logo_chauffeur-prive.svg"></a></span>
                <span class="social_media"><a href="http://www.sncf.com/" target="_blank" title="SNCF"><img src="../img/logos/Logo_SNCF.svg"></a></span>
                <span class="social_media"><a href="https://fr-fr.facebook.com/Restominute-1173396446101870/" target="_blank" title="Restominute"><img src="../img/logos/K0FixtoB.jpg"></a></span>
            </div>
        </div>
    </div>
    <div class="footer3 gauche">
        <div class="liens">
            <span class="social_media"><a href="https://www.facebook.com/EscapadeFrancaise" target="_blank" title="Our Facebook page"><img src="../img/logos/fb_logo.svg"></a></span>
            <span class="social_media"><a href="http://instagram.com/escapadefrancaise" target="_blank" title="Our Instagram page"><img src="../img/logos/instagram.svg"></a></span>
            <span class="social_media"><a href="https://twitter.com/Fr_Escapade" target="_blank" title="Our Twitter page"><img src="../img/logos/Twitter%20Filled.svg"></a></span>
            <span class="social_media"><a href="https://vk.com/id422103524" target="_blank" title="Our VK page"><img src="../img/logos/VK.com-logo.svg"></a></span>
        </div>
        <div style="float: left;position:absolute; bottom:10px;">
            &copy; 2017 par escapadefrançaise.com &nbsp;|&nbsp; <a href="../terms_of_use.php" style="text-decoration: underline; color:white;">Conditions d'utilisation</a>
        </div>
    </div>
</footer>