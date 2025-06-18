<?php

require_once ("function/callpage.php");
callpage("header");
callpage("navbar");
if (isset($_GET['page'])) {
    callpage($_GET['page']);
}    
callpage("footer");
?>