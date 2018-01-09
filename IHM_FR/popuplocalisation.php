<link href="css/pop.css" rel="stylesheet">
<script src='js/pop.js'></script>
        <link rel="stylesheet" type="text/css" href="css/select_room.css">


<br />
<br />

<?php 
$nom_mh = (isset($donnees['nom_mh']))?$donnees['nom_mh']:'';

?>

<a>
    <div id="popupBtn_<?php  echo $donnees['nom_mh'] ?>" class="test">
        <input type="button" value="Voir sur la carte"/>

    </div>
</a>

<!-- The Modal -->
<div id="popupModal"  class="popup_modal">
    <!-- Modal content -->
        <span class="close">&times;</span>
         <div class="carte" id="afficherCarte"></div>
</div>  

<script>
    // Get the modal

    var popup_modal = document.getElementById('popupModal');

    // Get the button that opens the modal
    var btn = document.getElementById("popupBtn_<?php  echo $donnees['nom_mh'] ?>");

    var test = document.getElementsByClassName("test")[10];

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function()
    {
        $('#afficherCarte').html('');
        popup_modal.style.display = "block";

        var nom_mh = <?php echo (isset($donnees['nom_mh']))?'"'.$donnees['nom_mh'].'"':'""'; ?>;

        $.ajax(
        {
           type: 'POST',
           url: 'map_in_popup.php',
           data: "nom_mh=" + nom_mh,
           dataType:'text',
           success : function(response)
           {
               if (response!="error")
               {
                   $('#afficherCarte').append(response);
               }
               else alert("Error");
           }
        });
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