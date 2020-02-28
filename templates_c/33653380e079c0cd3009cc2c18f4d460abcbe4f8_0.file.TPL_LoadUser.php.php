<?php /* Smarty version 3.1.27, created on 2020-01-21 19:22:07
         compiled from "/var/www/html/map/templates/User/TPL_LoadUser.php" */ ?>
<?php
/*%%SmartyHeaderCode:16839699335e26ecef117846_54913881%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33653380e079c0cd3009cc2c18f4d460abcbe4f8' => 
    array (
      0 => '/var/www/html/map/templates/User/TPL_LoadUser.php',
      1 => 1578463238,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16839699335e26ecef117846_54913881',
  'variables' => 
  array (
    'title' => 0,
    'system_id' => 0,
    'module_id' => 0,
    'action_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5e26ecef147be1_52039166',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5e26ecef147be1_52039166')) {
function content_5e26ecef147be1_52039166 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '16839699335e26ecef117846_54913881';
echo $_smarty_tpl->tpl_vars['title']->value;?>


<div class="w3-row">
    <div class="w3-col l12 m12 s12 w3-padding-small">
        <button type="button" class="w3-button w3-hover-white w3-hover-text-theme-d2 w3-theme-d2 w3-text-white w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-margin-bottom" onclick="GoMenu(<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
, 'LoadUserForm');" style="width: 150px;" >Add User</button>
    </div>
</div>

<!-- START SEARCH FORM -->
<form id="mySearch">
<div class="w3-bar w3-margin-bottom">
    <button type="button" class="w3-bar-item w3-button w3-hover-theme-d2 w3-white w3-text-theme-d2 w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-small w3-padding-small w3-margin-bottom w3-margin-left w3-right" onclick="Search();">
        <i class="fa fa-search"></i>
    </button>
    <button type="button" class="w3-bar-item w3-button w3-hover-red w3-white w3-text-red w3-border-red w3-border w3-ripple w3-round-xxlarge w3-small w3-padding-small w3-margin-bottom w3-margin-left w3-right" onclick="Reset('#mySearch');">
        <i class="fa fa-times"></i>
    </button>
    <input type="text" class="w3-bar-item w3-theme-l5 w3-border w3-border-theme w3-padding-small w3-right" id="keyword" name="keyword" placeholder="Username" />
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
    localStorage.removeItem('id');
});

/* Search Data */
function Search(page = "1"){
    var search = $('#mySearch').serialize();
    
    $('#data-content').load(GoAjax('<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
','LoadUserSearch')+'&page='+page+'&'+search);
    
}

/* Change Data */
function Change(id){
    localStorage.setItem('id', id);
    
    GoMenu('<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
','LoadUserForm');
    
}
    
/* Delete Data */
function confirmDeletion(params){
	if(confirm("Are you sure to delete this user?")) 
	{
		Delete(params);
	}
}

function Delete(params){
	var data = "id="+params;
    
	var url = GoAjax('<?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
','DeleteUser');
    
	$.post(url, data, function(res){
		alert(res.msg);
        Search();
//		window.location.reload();
	}, "JSON");
}
<?php echo '</script'; ?>
>
<?php }
}
?>