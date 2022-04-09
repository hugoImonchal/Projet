<!-- Cette page deconnect l'utilisateur-->
<?php

session_start();

session_destroy();
echo '<meta http-equiv="refresh" content="0;url=index.php"/>';

exit;
?>