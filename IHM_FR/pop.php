<link href="css/pop.css" rel="stylesheet">
<script src='js/pop.js'></script>

<br />
<br />

<a>
    <div class="why_book_with_us" id="popupBtn">
        <div class="img_wgwu">
            <img id="img_height" src="img/logos/logo_v2.png">
        </div>
        <p>Pourquoi réserver avec  <strong>ESCAPADE FRANCAISE</strong> ?</p>
    </div>
</a>

<!-- The Modal -->
<div id="popupModal" class="popup_modal">
    <!-- Modal content -->
    <div class="popup_modal-content">
        <span class="close">&times;</span>
        <br />
        <div class="why_4">
            <h3>RESERVATION</h3>
            <p> Nous vous aidons à organiser votre propre séjour en France en vous proposant un large éventail de lieux exceptionnels d'hébergement ainsi que de fabuleuses activités.<br />Votre reservation est garantie.</p>
        </div>
        <div class="why_4">
            <h3>CONFIRMATION</h3>
            <p>Une confirmation détaillée et une facture vous sont envoyées par mail.<br />Un rappel vous sera envoyé 24 heures avant votre activité programmée.</p>
        </div>
        <div class="why_4">
            <h3>PAIEMENT SECURISE</h3>
            <p>Nous vous garantissons un paiement en ligne sécurisé.<br />(Vos données personnelles sont privées.)</p>
        </div>
        <div class="why_4">
            <h3>BESOIN D'AIDE</h3>
            <br>
            <p>Une assistance en ligne est disponible pour vous du lundi au vendredi pour vous aider et régler tous les problèmes rencontrés lors de votre séjour.</p>
        </div>
    </div>
</div>

<script>
    // Get the modal
    var popup_modal = document.getElementById('popupModal');

    // Get the button that opens the modal
    var btn = document.getElementById("popupBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        popup_modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        popup_modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == popup_modal) {
            popup_modal.style.display = "none";
        }
    }
</script>