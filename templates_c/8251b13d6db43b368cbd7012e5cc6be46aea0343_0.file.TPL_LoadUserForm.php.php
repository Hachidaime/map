<?php /* Smarty version 3.1.27, created on 2020-01-21 19:22:12
         compiled from "/var/www/html/map/templates/User/TPL_LoadUserForm.php" */ ?>
<?php
/*%%SmartyHeaderCode:9604027725e26ecf48b5009_14015238%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8251b13d6db43b368cbd7012e5cc6be46aea0343' => 
    array (
      0 => '/var/www/html/map/templates/User/TPL_LoadUserForm.php',
      1 => 1578721380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9604027725e26ecf48b5009_14015238',
  'variables' => 
  array (
    'title' => 0,
    'form' => 0,
    'system_id' => 0,
    'module_id' => 0,
    'action_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5e26ecf48d6e33_39126522',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5e26ecf48d6e33_39126522')) {
function content_5e26ecf48d6e33_39126522 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '9604027725e26ecf48b5009_14015238';
echo $_smarty_tpl->tpl_vars['title']->value;?>



<div id="msg" class="w3-padding-small"></div>
<form id="myForm">    
<div class="w3-row w3-margin-bottom">
    <div class="w3-col l3">
        &nbsp;
    </div>
    <div class="w3-col l6">
        <input type="hidden" name="id" id="id" />
        <?php echo $_smarty_tpl->tpl_vars['form']->value;?>

    </div>
</div>
<div class="w3-row">
     <div class="w3-col">
        <button type="button" class="w3-button w3-hover-theme-d2 w3-white w3-text-theme-d2 w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-margin-bottom w3-left" style="width: 150px;" onclick="GoMenu(<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
, 'LoadUser');" id="back">
            Back
        </button>
        <button type="button" class="w3-button w3-hover-white w3-hover-text-theme-d2 w3-theme-d2 w3-text-white w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-margin-bottom w3-right" style="width: 150px;" onclick="Submit();">
            Submit
        </button>
     </div>
</div>
</form>


<?php echo '<script'; ?>
>
$(document).ready(function(){
    Detail();
});
    
function Detail(){
    var id = localStorage.getItem('id');
    if(id != '' || id != null){
        var data = {};
        data['id'] = id;
        
        $.post(GoAjax(<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
, 'UserDetail'), data, function(reply){
            $.each(reply, function(i, v){
                if(i != 'password')
                    $('#'+i).val(v);
            });
        }, "json");
        
    }
}

function Submit(){
    var data = $('#myForm').serialize();
    
    $.post(GoAjax(<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
, 'SubmitUser'), data, function(reply){
    
        $('#msg').html(reply.msg);
        GoTop();
		if(reply.id > 0){
			$('input[name="id"]').val(reply.id);
			setTimeout(function() {
                $('#back').click();
            }, 5000);
		}
    }, "json");
}
<?php echo '</script'; ?>
>
<?php }
}
?>