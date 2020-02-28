<?php /* Smarty version 3.1.27, created on 2020-01-21 19:22:07
         compiled from "/var/www/html/map/templates/Layout/TPL_Paginate.php" */ ?>
<?php
/*%%SmartyHeaderCode:12850325755e26ecef6db734_08946949%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5b4da3164958556e71f87ea1b1c41b6e8b62fe6' => 
    array (
      0 => '/var/www/html/map/templates/Layout/TPL_Paginate.php',
      1 => 1578463238,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12850325755e26ecef6db734_08946949',
  'variables' => 
  array (
    'page' => 0,
    'custom' => 0,
    'previous' => 0,
    'snum' => 0,
    'enum' => 0,
    'foo' => 0,
    'total_page' => 0,
    'next' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5e26ecef73ca85_50759336',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5e26ecef73ca85_50759336')) {
function content_5e26ecef73ca85_50759336 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '12850325755e26ecef6db734_08946949';
?>
<div class="w3-row">
    <div class="w3-col l3 m3 s6">
        <div class="w3-left w3-margin-bottom">
            <?php if ($_smarty_tpl->tpl_vars['page']->value != 1) {?>
            <button type="button" class="btn-page<?php echo $_smarty_tpl->tpl_vars['custom']->value;?>
 w3-button w3-hover-theme-d1 w3-white w3-text-theme-d1 w3-border-theme-d1 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-small" style="width:50px;" data-page="1"><i class="fas fa-angle-double-left"></i></button>
            <button type="button" class="btn-page<?php echo $_smarty_tpl->tpl_vars['custom']->value;?>
 w3-button w3-hover-theme-d1 w3-white w3-text-theme-d1 w3-border-theme-d1 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-small" style="width:50px;" data-page="<?php echo $_smarty_tpl->tpl_vars['previous']->value;?>
"><i class="fas fa-angle-left"></i></button>
            <?php } else { ?>
            &nbsp;
            <?php }?>
        </div>
    </div>
    <div class="w3-col l6 m6 w3-hide-small">
        <div class="w3-center w3-margin-bottom">
            <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_smarty_tpl->tpl_vars['enum']->value+1 - ($_smarty_tpl->tpl_vars['snum']->value) : $_smarty_tpl->tpl_vars['snum']->value-($_smarty_tpl->tpl_vars['enum']->value)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = $_smarty_tpl->tpl_vars['snum']->value, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
            <button type="button" class="btn-page<?php echo $_smarty_tpl->tpl_vars['custom']->value;?>
 w3-button w3-hover-theme-d1 <?php if ($_smarty_tpl->tpl_vars['page']->value == $_smarty_tpl->tpl_vars['foo']->value) {?>w3-theme-d1 w3-text-white w3-disabled<?php } else { ?>w3-white w3-text-theme-d1<?php }?> w3-border-theme-d1 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-small" style="width:50px;" data-page="<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
</button>
            <?php }} ?>
        </div>
    </div>
    <div class="w3-col l3 m3 s6">
        <div class="w3-right w3-margin-bottom">
            <?php if ($_smarty_tpl->tpl_vars['page']->value != $_smarty_tpl->tpl_vars['total_page']->value && $_smarty_tpl->tpl_vars['total_page']->value > 1) {?>
            <button type="button" class="btn-page<?php echo $_smarty_tpl->tpl_vars['custom']->value;?>
 w3-button w3-hover-theme-d1 w3-white w3-text-theme-d1 w3-border-theme-d1 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-small" style="width:50px;" data-page="<?php echo $_smarty_tpl->tpl_vars['next']->value;?>
"><i class="fas fa-angle-right"></i></button>
            <button type="button" class="btn-page<?php echo $_smarty_tpl->tpl_vars['custom']->value;?>
 w3-button w3-hover-theme-d1 w3-white w3-text-theme-d1 w3-border-theme-d1 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-small" style="width:50px;" data-page="<?php echo $_smarty_tpl->tpl_vars['total_page']->value;?>
"><i class="fas fa-angle-double-right"></i></button>
            <?php } else { ?>
            &nbsp;
            <?php }?>
        </div>
    </div>
</div>


<?php echo '<script'; ?>
>
$(document).ready(function(){
    $('.btn-page<?php echo $_smarty_tpl->tpl_vars['custom']->value;?>
').on('click', function(){
        
        Search<?php echo $_smarty_tpl->tpl_vars['custom']->value;?>
($(this).attr('data-page'));
        
    });
});
<?php echo '</script'; ?>
>
<?php }
}
?>