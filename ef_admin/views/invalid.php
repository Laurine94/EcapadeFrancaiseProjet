<script>
  $(function() {
  
  <?php
      if (isset ($invalid)) {
          foreach ($invalid as $id => $error) {
              if ($error) {
                  echo "$('#$id').parent ().addClass ('has-error');";
              }	    
          }
      }
  ?>
  
  });
</script>
