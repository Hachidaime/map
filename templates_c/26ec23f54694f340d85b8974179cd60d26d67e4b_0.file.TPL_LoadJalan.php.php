<?php /* Smarty version 3.1.27, created on 2020-02-06 22:24:33
         compiled from "/var/www/html/map/templates/Jalan/TPL_LoadJalan.php" */ ?>
<?php
/*%%SmartyHeaderCode:5735293745e3c2fb142baf8_45677451%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26ec23f54694f340d85b8974179cd60d26d67e4b' => 
    array (
      0 => '/var/www/html/map/templates/Jalan/TPL_LoadJalan.php',
      1 => 1579148456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5735293745e3c2fb142baf8_45677451',
  'variables' => 
  array (
    'title' => 0,
    'system_id' => 0,
    'module_id' => 0,
    'action_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5e3c2fb1488ea9_31977878',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5e3c2fb1488ea9_31977878')) {
function content_5e3c2fb1488ea9_31977878 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '5735293745e3c2fb142baf8_45677451';
echo $_smarty_tpl->tpl_vars['title']->value;?>


<div class="w3-row">
    <div class="w3-col l12 m12 s12 w3-padding-small">
        <button type="button" class="w3-button w3-hover-white w3-hover-text-theme-d2 w3-theme-d2 w3-text-white w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-margin-bottom" onclick="GoMenu(<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
, 'LoadJalanForm');" style="width: 150px;" >Tambah Jalan</button>
    </div>
</div>

<!-- START SEARCH FORM -->
<form id="mySearch">
<div class="w3-bar w3-margin-bottom">
    <button type="button" class="w3-bar-item w3-button w3-hover-theme-d2 w3-white w3-text-theme-d2 w3-border-theme-d2 w3-border w3-ripple w3-circle w3-small w3-padding-small w3-margin-bottom w3-margin-left w3-right" onclick="Search();">
        <i class="fa fa-search"></i>
    </button>
    <button type="button" class="w3-bar-item w3-button w3-hover-red w3-white w3-text-red w3-border-red w3-border w3-ripple w3-circle w3-small w3-padding-small w3-margin-bottom w3-margin-left w3-right" onclick="Reset('#mySearch');">
        <i class="fa fa-times"></i>
    </button>
    <input type="text" class="w3-bar-item w3-theme-l5 w3-border w3-border-theme w3-padding-small w3-right" id="keyword" name="keyword" placeholder="Name" />
</div>    
</form>
<!-- END SEARCH FORM -->

<!-- START DISPLAY DATA -->
<div id="data-content"></div>
<!-- END DISPLAY DATA -->


<?php echo '<script'; ?>
>
$(document).ready(function(){
    Search();
    localStorage.clear();
});

/* Search Data */
function Search(page = "1"){
    var search = $('#mySearch').serialize();
    
    $('#data-content').load(GoAjax('<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
','LoadJalanSearch')+'&page='+page+'&'+search);
    
}

/* Change Data */
function Change(id){
    localStorage.setItem('id', id);
    
    GoMenu('<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
','LoadJalanForm');
    
}
    
/* Delete Data */
function confirmDeletion(params){
	if(confirm("Are you sure to delete this action?")) 
	{
		Delete(params);
	}
}

function Delete(params){
	var data = "id="+params;
    
	var url = GoAjax('<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
','DeleteJalan');
    
	$.post(url, data, function(res){
		alert(res.msg);
        Search();
//		window.location.reload();
	}, "JSON");
}
    
/*Load Coodinate*/
function LoadCoordinate(id){
    localStorage.setItem('id', id);
    
    GoMenu('<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
','LoadKoordinat');
    
}
<?php echo '</script'; ?>
>
<?php }
}
?>