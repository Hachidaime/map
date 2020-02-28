<?php /* Smarty version 3.1.27, created on 2020-01-20 17:53:09
         compiled from "/var/www/html/map/templates/Layout/TPL_Mainlayout.php" */ ?>
<?php
/*%%SmartyHeaderCode:1205234345e258695889ad7_98194996%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01c07f9e00d7ece965331af5fd51006b625cfc0c' => 
    array (
      0 => '/var/www/html/map/templates/Layout/TPL_Mainlayout.php',
      1 => 1578890254,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1205234345e258695889ad7_98194996',
  'variables' => 
  array (
    'PROJECT_NAME' => 0,
    't' => 0,
    'header' => 0,
    'navbar' => 0,
    'CurrentPage' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5e2586958a4496_95845684',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5e2586958a4496_95845684')) {
function content_5e2586958a4496_95845684 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1205234345e258695889ad7_98194996';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="favicon.ico">
<title><?php echo $_smarty_tpl->tpl_vars['PROJECT_NAME']->value;?>
</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="assets/css/reset.css" rel="stylesheet">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
<link href="assets/libs/colorpicker/css/evol-colorpicker.css" rel="stylesheet" type="text/css">
<link href="assets/libs/jquery-upload-file/css/uploadfile.css?t=<?php echo $_smarty_tpl->tpl_vars['t']->value;?>
" rel="stylesheet" type="text/css"/>
<link href="assets/css/w3.css" rel="stylesheet">
<link href="assets/css/w3-theme.css" rel="stylesheet">
<link href="assets/css/w3-colors-highway.css" rel="stylesheet">
<link href="assets/css/all.css" rel="stylesheet">
<link href="assets/css/custom.css?t=<?php echo $_smarty_tpl->tpl_vars['t']->value;?>
" rel="stylesheet">
<link href="assets/css/jquery-ui.min.css" rel="stylesheet">
<link href="assets/css/jquery-ui.theme.css" rel="stylesheet">

<?php echo '<script'; ?>
 src="assets/js/jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/custom.js?t=<?php echo $_smarty_tpl->tpl_vars['t']->value;?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/libs/jquery-upload-file/js/jquery.uploadfile.js?t=<?php echo $_smarty_tpl->tpl_vars['t']->value;?>
"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="http://maps.google.com/maps/api/js?v=3&libraries=geometry&key=<?php echo @constant('GMAPS_API_KEY');?>
" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="assets/js/v3_epoly.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src='https://npmcdn.com/@turf/turf/turf.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/map-font-icons.js"><?php echo '</script'; ?>
>
<!--
-->
</head>
<body class="w3-theme-l4">

<!-- Main Wrapper -->

<?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['navbar']->value;?>

<!-- Main Content -->
<div class="w3-margin">
    <div class="w3-card">
        <header class="w3-container w3-theme-d5">
            <h4><?php echo $_smarty_tpl->tpl_vars['CurrentPage']->value;?>
</h4>
        </header>
        <div class="w3-container w3-border w3-border-theme-d5 w3-theme-l5">
            <div class="w3-margin-top w3-margin-bottom">
            <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

            </div>
        </div>      
    </div> 
</div>
<!-- Main Content -->

<!-- Main Wrapper -->

<!-- JavaScript -->
<?php echo '<script'; ?>
 src="assets/js/jquery-ui.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/libs/colorpicker/js/evol-colorpicker.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>