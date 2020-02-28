<?php /* Smarty version 3.1.27, created on 2020-02-06 22:24:07
         compiled from "/var/www/html/map/templates/Setup/TPL_LoadSetup.php" */ ?>
<?php
/*%%SmartyHeaderCode:134113255e3c2f979421a8_96212791%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5bd61db11b74eb5e3fd3855aec4db85c57d937a8' => 
    array (
      0 => '/var/www/html/map/templates/Setup/TPL_LoadSetup.php',
      1 => 1579486044,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134113255e3c2f979421a8_96212791',
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
  'unifunc' => 'content_5e3c2f97a7c3b0_35206517',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5e3c2f97a7c3b0_35206517')) {
function content_5e3c2f97a7c3b0_35206517 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '134113255e3c2f979421a8_96212791';
echo $_smarty_tpl->tpl_vars['title']->value;?>


<div id="msg" class="w3-padding-small"></div>
<form id="myForm">    
<div class="w3-row w3-margin-bottom">
    <div class="w3-col l3">
        &nbsp;
    </div>
    <div class="w3-col l6">
        <?php echo $_smarty_tpl->tpl_vars['form']->value;?>

    </div>
</div>
<div class="w3-row">
     <div class="w3-col">
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
        
        var url = GoAjax(<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
, 'SetupDetail');
        
        var data = {};
        data['id'] = id;
        $.post(url , data, function(reply){
            $.each(reply, function(i, r){
                if(r.category == 'kondisi')
                    $('#' + r.category + "_" + r.item).colorpicker({color: r.value});
                else
                    $('#' + r.category + "_" + r.item).val(r.value);
            });
        }, "json");
    }
}

function Submit(){
    var data = $('#myForm').serialize();
    console.log(data);
    
    $.post(GoAjax(<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
, 'SubmitSetup'), data, function(reply){
    
        $('#msg').html(reply.msg);
        GoTop();
		if(reply.id > 0){
			Detail();
		}
    }, "json");
}
<?php echo '</script'; ?>
>
<?php }
}
?>