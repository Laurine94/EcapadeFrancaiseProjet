console.log("Ce programme JS vient d'être chargé");
$(document).ready(function()
{
	console.log("Le document est prêt");

	$('#first_name').keyup(function(event)
		{
			var texte=$("#first_name").val();
			if (/[^a-zA-Z '-]/.test(texte)){
                $('#first_name').addClass("erreur");
                $('#first_name').removeClass("bon");
            }
            else{
                $('#first_name').addClass("bon");
                $('#first_name').removeClass("erreur");
            }
		});
    
    $('#first_name').focusout(function(event)
		{
			$('#first_name').removeClass("bon");
            if ($('#first_name').val() == "")
                $('#first_name').removeClass("erreur");
		});
    
    $('#last_name').keyup(function(event)
		{
			var texte=$("#last_name").val();
			if (/[^a-zA-Z '-]/.test(texte)){
                $('#last_name').addClass("erreur");
                $('#last_name').removeClass("bon");
            }
            else{
                $('#last_name').addClass("bon");
                $('#last_name').removeClass("erreur");
            }
		});
    
    $('#last_name').focusout(function(event)
		{
			$('#last_name').removeClass("bon");
            if ($('#last_name').val() == "")
                $('#last_name').removeClass("erreur");
		});

	$('#email').keyup(function(event)
		{
			var email=$('#email').val();
            if (/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i.test(email)){
                $('#email').addClass("bon");
                $('#email').removeClass("erreur");
            }
            else{
                $('#email').addClass("erreur");
                $('#email').removeClass("bon");
            }
		});
    
    $('#email').focusout(function(event)
		{
			$('#email').removeClass("bon");
            if ($('#email').val() == "")
                $('#email').removeClass("erreur");
		});
    
    $('#phone').keyup(function(event)
		{
			var phone=$('#phone').val();
            if (/^0[1-68]([-. ]?\d{2}){4}$/.test(phone)){
                $('#phone').addClass("bon");
                $('#phone').removeClass("erreur");
            }
            else{
                $('#phone').addClass("erreur");
                $('#phone').removeClass("bon");
            }
		});
    
    $('#phone').focusout(function(event)
		{
			$('#phone').removeClass("bon");
            if ($('#phone').val() == "")
                $('#phone').removeClass("erreur");
		});
    
     $('#zip_code').keyup(function(event)
		{
			var zip_code=$('#zip_code').val();
            if (/\d{5}$/.test(zip_code)){
                $('#zip_code').addClass("bon");
                $('#zip_code').removeClass("erreur");
            }
            else{
                $('#zip_code').addClass("erreur");
                $('#zip_code').removeClass("bon");
            }
		});
    
    $('#zip_code').focusout(function(event)
		{
			$('#zip_code').removeClass("bon");
            if ($('#zip_code').val() == "")
                $('#zip_code').removeClass("erreur");
		});

	console.log("La mise en place est finie. En attente d'événements...");
});