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
        height:151px;
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
        background-color:white;
        color: #183e67;
        border: none;
        font-weight: bold;
        border-radius: 0px;
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
    #up {
   //position:relative;
   top:20%;
   left:40%;
   right:20px;
   background:#4169E1;
   
}
</style>

<br />
<br />
<br />


                <br>
<footer id="footer">
    
    <div class="footer3 droite">
        <br>
      
        <a href="contact_form.php"><input type="button" style="color:white; background-color:#183e67" value="CONTACT US" style='font-size:13px;width:118px;'></a>

        <a href="travel_agency.php?"><input type="button" style="color:white; background-color:#183e67" value="TRAVEL AGENCY" style='font-size:13px;width:118px;'></a>

            <a href="abo.php?"><input type="button" style="color:white; background-color:#183e67" value="DEVENIR MEMBRE ESCAPADE FRANCAISE" style='font-size:13px;width:118px;'></a>

            <a href="point.php?"><input type="button" style="color:white; background-color:#183e67" value="PRESSE" style='font-size:13px;width:118px;'></a>
    </div>
    <div class="footer3 milieu">
        <div class="sous_div_footer">
            <div class="form">
                <p>Be the first to discover our new members and new French destination.</p>
                <form action="newsletter_form_valid.php" method="POST">
                    <input type="email" name="email" placeholder="Email" style="color:black;">
                    <input type="submit" value="Subscribe"  style="background-color: #f7f7f9;color: #183e67" title="S'abonner à la newsletter" class="bouton_newsletter">
                </form>
                <br>
                <!--<a href="#" class="top"style="size:150px">^</a>-->
                
            </div>
        </div>
    </div>
    <div class="footer3 gauche">
        <div class="liens" style="left:73%">
            <span class="social_media"><a href="https://www.facebook.com/EscapadeFrancaise" target="_blank" title="Our Facebook page"><img src="../img/logos/fb_logo.svg"></a></span>
            <span class="social_media"><a href="http://instagram.com/escapadefrancaise" target="_blank" title="Our Instagram page"><img src="../img/logos/instagram.svg"></a></span>
            <span class="social_media"><a href="https://twitter.com/Fr_Escapade" target="_blank" title="Our Twitter page"><img src="../img/logos/Twitter%20Filled.svg"></a></span>
            <span class="social_media"><a href="https://vk.com/id422103524" target="_blank" title="Our VK page"><img src="../img/logos/VK.com-logo.svg"></a></span>
            <div style="float: float;position:absolute;     bottom: -93px; width: 400px;right: -47%;">
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     &copy; 2017 par escapadefrançaise.com &nbsp;|&nbsp; <a href="terms_of_use.php" style="text-decoration: underline; color:white;">Terms of use</a>
                </div>
        </div>
        
    </div>
</footer>
