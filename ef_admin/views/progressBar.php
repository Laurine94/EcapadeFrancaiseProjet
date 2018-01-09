<style>
#progress-bar {
    display: none;
    position: fixed;
    list-style-type: none;
    top: 50%;
    left: 50%;
    transform: translateX(-50%);
}
</style>

<ul id="progress-bar">
  <li></li>
  <li></li>
  <li></li>
</ul>

<script>
      $("form").submit (function (event) {
          $("body").click (function (event) {
              event.preventDefault ();
              event.stopPropagation ();
          });
          $(".container").css ("opacity", "0.2");
          $("#progress-bar").show ();          
      });
</script>