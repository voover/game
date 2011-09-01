<?php
require_once('config.php');

$action = $_REQUEST['action'];
if(!$action) {
  $action = 'main';
}

require($action.'.php');
