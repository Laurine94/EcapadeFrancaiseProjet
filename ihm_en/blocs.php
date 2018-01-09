<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript">
    function redimensionner(selecteur){
        var hauteur=0;
        $(selecteur).each(function(){
            if($(this).height()>hauteur) hauteur = $(this).height();
        });

        $(selecteur).each(function(){ 
            $(this).height(hauteur);
        });
    }
</script>

<style>
    .bloc_1{
        width: 35%;
        background-color: #eeeeee;
        display: table-cell;
        text-align: center;
        float: left;
        margin: 0 10px 0;
        border-radius: 5px;
        color: #183e67;
        position:relative;
    }
    
    .bloc_3{
        width: 35%;
        background-color: #eeeeee;
        display: table-cell;
        text-align: center;
        float: left;
        margin: 0 10px 0;
        border-radius: 5px;
        color: #183e67;
        position:relative;
    }

    .bloc_2{
        width: 55%;
        background-color: #eeeeee;
        display: table-cell;
        float: left;
        margin: 0 10px 0;
        border-radius: 5px;
        color: #183e67;
        position:relative;
    }
    
    .bloc_4{
        width: 55%;
        background-color: #eeeeee;
        display: table-cell;
        float: left;
        margin: 0 10px 0;
        border-radius: 5px;
        color: #183e67;
        position:relative;
    }

    .bloc_1 p, .bloc_2 p, .bloc_3 p, .bloc_4 p{
        padding: 10px;
    }
    
    .bloc_2 img, .bloc_4 img{
        padding-left: 10px;
        padding-top: 10px;
    }
    
    .img_reduc{
        height: 60%;
    }
    
    .decale_gauche{
        color: #183e67;
    }
    
    .decale_droite{
        color: #183e67;
        /*float: right;*/
    }
    
    .container_1{
        margin: 0 auto;
        width: 70%;
    }
    
    .container_2{
        margin-left: auto;
        margin-right: auto;
        width: 70%;
    }
    
    .container_3{
        width: 70%;
        margin: 0 auto;
    }
    
    .container_4{
        background-color: #eeeeee;
        padding: 10px;
        width: 93.5%;
        border-radius: 5px;
        margin: 0 auto;
    }
    
    .img_70{
        width: 95%;
        border-radius: 5px;
    }
    
    .media-body a{
        color: #183e67;
    }

</style>

<div class="container_2">
    <h3 class="decale_gauche"><b>Owners</b></h3>
</div>

<div class="container_1">
    <div class="contenu1">
        <div class="bloc_1 toSize">
            <p>In love with our charming residence, a high taste for our luxury bedrooms, our owners will welcome you warm fully in their homes.<br /><br />
            Ready to welcome you with open arms, our owners are passionate in soul, they have the sense of hospitality, they love to share their homes, they will show you their passionate and charming home.<br /><br />
            Regardless their locations, they will know how to inform you about restaurants, shops and activities that cannot be missed in the neighbourhood.
            With them by your side, your stay will be more animated and all the small secrets that can make your stay better will be reveal.</p>
        </div>
        <div class="bloc_2 toSize">
            <div class="media">
                <div class="media-left media-top">
                    <img class="img_reduc media-object" src="img/owner.png" alt="...">
                </div>
                <div class="media-body">
                    <!--<h4 class="media-heading">TITLE HERE</h4>-->
                    <p>Isabelle and Jerome welcome you at number 3, in their mansion they completely renovated to become a guest house. Four luxurious guest rooms, tastefully blending classical and contemporary architecture and furnishings, offer the best comforts in an unparalleled atmosphere. After a restful night, you will enjoy a delicious breakfast in the beautiful private dining room or, on sunny days, on the small flowered terrace in the inner courtyard.
                    Leave your room and make Paris yours! Walk to Montmartre, stroll in Monceau Park or take the public transport to the major monuments and tourist sites of Paris. Isabelle and Jerome will be delighted to give you advice and share some of their secrets to make your stay in Paris a truly unforgettable one.</p>
                </div>
            </div>
        </div>
    </div>
    <br />
</div>

<div class="container_2">
    <br />
    <h3 class="decale_droite"><b>Guides</b></h3>
</div>

<div class="container_1">
    <div class="contenu2">
        <div class="bloc_4 toSize2">
            <!--<div class="media">
                <div class="media-left media-top">
                    <img class="img_reduc media-object" src="img/guide1.png" alt="...">
                </div>
                <div class="media-body">
                    <!--<h4 class="media-heading">TITLE HERE</h4>
                    <p>Adeline Marchand is a unique tour guide service offering visitors the opportunity to experience Paris from the eyes of a local and to be truly immersed in Parisian culture. Having grown up in the trendy, creative and historic Paris neighborhood of Upper Marais, Adeline shares her expertise and understanding of Parisian life in a way that cannot be found on the standard tour bus.<br />
                    Adeline has a master’s degree in 18th century French history from the Sorbonne.She enjoys sharing her passion and knowledge of the City of Lights with visitors with a strong awareness of what it’s like to be in a foreign country having traveled throughout the world herself. Her goal is to allow tourists to become locals during their holiday while catering to their particular interests.</p>
                </div>
            </div>-->
            <div class="media">
                <div class="media-left media-top">
                    <img class="img_reduc media-object" src="img/guide2.png" alt="...">
                </div>
                <div class="media-body">
                    <!--<h4 class="media-heading">TITLE HERE</h4>-->
                    <p>Originally from Moscow, Oxana found herself in the French capital as a teenager going to school. Little did she know that she would become a passionate spokeswoman for the city and a globe-trotter to boot! Sorbonne alumnus with a Fine Arts degree and professionally-licensed tour guide by decree of the French Ministry of Culture and Tourism, Oxana eventually found herself guiding international crowds in Paris and its neighbour regions. Her polyglot capabilities (English, French, Spanish, and Russian, evidently) have served her well on her journeys to over twenty countries and three different continents. Let her tell you what Montmartre is really made of or walk her steps through an Impressionist extravaganza at the Orsay museum. She’s in town and she’s up for adventure !</p>
                </div>
            </div>
        </div>
        <div class="bloc_3 toSize2">
            <p>Passionate by the cultures and the French history, our guides will reveal to you the most hidden secrets of the hexagon, and will take you in a time travel.
            Their roles are to make you discover the prettiest places in France, while answering to your requirements.<br /><br /> 
            We all share the same passion, they spread their knowledges and love to make you discover new places, new histories to our visitors. They are highly gratified and their diplomas are state certify.<br /><br />
            With our guides, you will live incredible moments, you will go to the unknow and you will not be disappointed. You cannot imagine how much you will learn.</p>
        </div>
    </div>
</div>

<div class="container_2">
    <br />
    <h3 class="decale_droite"><b>Would you like to join our network?</b></h3>
</div>

<!--<div class="container_3">
    <img class="img_70" src="img/charte1.png"><br /><br />
    <img src="img/pdf_big3.png"><a href="flyer_print.pdf" download="Charte.pdf">Télécharger la charte en version PDF</a>
</div>-->

<div class="container_3">
    <img class="img_70" src="img/charte1.png"><br /><br />
    <div class="media container_4">
        <div class="media-left media-top">
            <img class="img_reduc media-object" src="img/pdf_big3.png" alt="...">
        </div>
        <div class="media-body">
            <strong><a href="flyer_print.pdf" download="Charte.pdf">Télécharger la charte en version PDF</a></strong><br />
            <strong><a href="contrat.pdf" download="Contract.pdf">Télécharger la contrat en version PDF</a></strong>
        </div>
    </div>
</div>

<br />

<script type="text/javascript">
    redimensionner('div.toSize');
    redimensionner('div.toSize2');
</script>