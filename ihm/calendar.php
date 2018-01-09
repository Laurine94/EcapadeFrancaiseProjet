<br />        
<br />        
<br />        
<br />        
<br />        
<br />        
<br />        
<br />        
<br />        
<br />        
<br />        
<br />        
<br />        
<br />        
<br />        
<br />        
<br />        
<br />        
<br />        
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/datepicker.css">



        <input type="text" id="exemple1">
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#exemple1').datepicker({
                    format: "dd/mm/yyyy",
                    startDate: "today",
                    autoclose: true
                    
                });  
            });
        </script>