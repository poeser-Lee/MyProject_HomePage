<?php
  session_start();
  unset($_SESSION["userid"]);
  unset($_SESSION["username"]);
  
  echo("
       <script>
          location.href = 'http://{$_SERVER['HTTP_HOST']}/myproject_homepage/index.php';
         </script>
       ");
?>
