<?php
   session_start();
   
   if(session_destroy()) {
    ?>
    <script>
        alert('YOU ARE LOGGED OUT NOW!');
        location.href = '..//index.html';

        </script>
    <?php

   }
?>