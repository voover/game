<?php /* Smarty version Smarty-3.0.8, created on 2011-08-31 22:43:33
         compiled from "smarty/templates/achievement.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19117793854e5eb915112ed1-02429790%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d8f9dfe9c49813e20a907c1ef53bd5303a30f34' => 
    array (
      0 => 'smarty/templates/achievement.tpl',
      1 => 1314830110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19117793854e5eb915112ed1-02429790',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="https://www.facebook.com/2008/fbml">
  <head>
    <title><?php echo $_smarty_tpl->getVariable('achievement')->value['title'];?>
</title>
    <meta property="og:type" content="og:games.achievement"/>
    <meta property="og:url" content="apps.facebook.com/mwawro_game/?action=achievement&id=<?php echo $_smarty_tpl->getVariable('achievement')->value['id'];?>
"/>
    <meta property="og:title" content="<?php echo $_smarty_tpl->getVariable('achievement')->value['title'];?>
"/>
    <meta property="og:description" content="<?php echo $_smarty_tpl->getVariable('achievement')->value['desc'];?>
"/>
    <meta property="og:image" content="<?php echo $_smarty_tpl->getVariable('achievement')->value['image'];?>
" />
    <meta property="og:points" content="<?php echo $_smarty_tpl->getVariable('achievement')->value['points'];?>
" />
  </head>
  <body>
    <img src="<?php echo $_smarty_tpl->getVariable('achievement')->value['image'];?>
" />
  </body>
</html>
