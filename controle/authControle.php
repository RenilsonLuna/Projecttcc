<?php

if (isset($_SESSION['auth']) && $_SESSION['auth'] == true) {
  $auth = true;
}else {
  $auth = false;
}

?>
