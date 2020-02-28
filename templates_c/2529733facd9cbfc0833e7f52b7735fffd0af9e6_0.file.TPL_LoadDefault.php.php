<?php /* Smarty version 3.1.27, created on 2020-01-20 17:53:00
         compiled from "/var/www/html/map/templates/Dashboard/TPL_LoadDefault.php" */ ?>
<?php
/*%%SmartyHeaderCode:19148968955e25868c3fe7d3_86392460%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2529733facd9cbfc0833e7f52b7735fffd0af9e6' => 
    array (
      0 => '/var/www/html/map/templates/Dashboard/TPL_LoadDefault.php',
      1 => 1578463238,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19148968955e25868c3fe7d3_86392460',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5e25868c405a92_18561016',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5e25868c405a92_18561016')) {
function content_5e25868c405a92_18561016 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '19148968955e25868c3fe7d3_86392460';
?>
<div class="w3-row">
    <div class="w3-col l4 m6 w3-padding-small" id="last-activity-content"></div>
    <div class="w3-col l4 m6 w3-padding-small"></div>
    <div class="w3-col l4 m6 w3-padding-small"></div>
</div>


<?php echo '<script'; ?>
>
$(document).ready(function(){
    lastactivity();
    setInterval(function() {
        lastactivity();
    }, 60 * 1000); // 60 * 1000 milsec
});

function lastactivity(){
    var url = 'ajax.php?role=lastactivity';
    
    $('#last-activity-content').load(url);
    
}
<?php echo '</script'; ?>
>
<?php }
}
?>