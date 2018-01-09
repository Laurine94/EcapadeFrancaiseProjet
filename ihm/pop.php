<link href="css/pop.css" rel="stylesheet">
<script src='js/pop.js'></script>

<br />
<br />

<a>
    <div class="why_book_with_us" id="popupBtn">
        <div class="img_wgwu">
            <img id="img_height" src="img/logos/logo_v2.png">
        </div>
        <p>Why book with <strong>ESCAPADE FRANCAISE</strong> ?</p>
    </div>
</a>

<!-- The Modal -->
<div id="popupModal" class="popup_modal">
    <!-- Modal content -->
    <div class="popup_modal-content">
        <span class="close">&times;</span>
        <br />
        <div class="why_4">
            <h3>BOOKING</h3>
            <p> We help you to organize your own stay in France by offering you a wide range of exceptional places of accommodation as well as fabulous activities.<br />Your reservation is guaranteed.</p>
        </div>
        <div class="why_4">
            <h3>CONFIRMATION</h3>
            <p>A detailed confirmation and an invoice are sent to you by e-mail.<br />A reminder will be sent to you 24 hours before your scheduled activity.</p>
        </div>
        <div class="why_4">
            <h3>SECURE PAYMENT</h3>
            <p>We guarantee a secure online payment.<br />(Your personal informations are private.)</p>
        </div>
        <div class="why_4">
            <h3>NEED HELP?</h3>
            <p>An online support is available for you from Monday to Friday to help you and solve any problems encountered during your stay.</p>
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