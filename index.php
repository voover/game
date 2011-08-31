<?php

require('libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('smarty/templates');
$smarty->setCompileDir('smarty/templates_c');
$smarty->setCacheDir('smarty/cache');
$smarty->setConfigDir('smarty/configs');

$action = $_REQUEST['action'];
if(!$action) {
  $action = 'main';
}

require($action.'.php');
