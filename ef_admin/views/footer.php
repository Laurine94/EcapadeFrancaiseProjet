  <footer>
<?php if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1'): ?>
    <div class="pull-left hidden-xs">
      <b><a href="../../ef_tests/test.php">Tests</a></b>
    </div>
<?php endif; ?>
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.1
    </div>
    <strong>Copyright &copy; 2014-2017 <a href="http://escapadefrancaise.com">Escapade Française</a>.</strong> All rights
    reserved.
  </footer>
  <script>
  $(function() {
  
  <?php
      // Gestion des erreurs de formulaire
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

      <?php include "progressBar.php" ?>

  </body>
</html>
