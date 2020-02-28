<?php /* Smarty version 3.1.27, created on 2020-02-06 22:24:33
         compiled from "/var/www/html/map/templates/Jalan/TPL_LoadJalanSearch.php" */ ?>
<?php
/*%%SmartyHeaderCode:289821955e3c2fb17765f8_47818984%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0a27e419db9ca6a412ac0ca9333c6f688188450' => 
    array (
      0 => '/var/www/html/map/templates/Jalan/TPL_LoadJalanSearch.php',
      1 => 1578724920,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '289821955e3c2fb17765f8_47818984',
  'variables' => 
  array (
    'list' => 0,
    'page' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5e3c2fb17f5697_04378789',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5e3c2fb17f5697_04378789')) {
function content_5e3c2fb17f5697_04378789 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '289821955e3c2fb17765f8_47818984';
?>
<div class="w3-margin-bottom">
    <table class="w3-table-all w3-small">
        <thead>
            <tr class="w3-theme-l1">
                <th width="50px" class="w3-right-align">#</th>
                <th width="15%">Status Kepemilikan</th>
                <th width="10%">Nomor Jalan</th>
                <th width="*">Nama Jalan</th>
                <th width="10%">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['outer'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['name'] = 'outer';
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['total']);
?>
            <tr>
                <td class="w3-right-align"><?php echo ($_smarty_tpl->tpl_vars['page']->value-1)*@constant('PAGER_PER_PAGE_CONSOLE')+$_smarty_tpl->getVariable('smarty')->value['section']['outer']['index']+1;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['outer']['index']]['status_kepemilikan'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['outer']['index']]['no_jalan'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['outer']['index']]['nama_jalan'];?>
</td>
                <td>
                    <div class="w3-dropdown-hover w3-right">
                        <button class="w3-button w3-hover-white w3-hover-text-theme-d2 w3-theme-d2 w3-text-white w3-border-theme-d2 w3-border w3-tiny w3-padding-small">
                            <i class="fas fa-caret-down"></i>
                        </button>
                        <div class="w3-dropdown-content w3-bar-block w3-border w3-border-theme-d2" style="right: 0;">
                          <button class="w3-bar-item w3-button w3-hover-theme-d2" onclick="LoadCoordinate(<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['outer']['index']]['id'];?>
);">Koordinat</button>
                          <button class="w3-bar-item w3-button w3-hover-theme-d2" onclick="Change(<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['outer']['index']]['id'];?>
);">Change</button>
                          <button class="w3-bar-item w3-button w3-hover-theme-d2" onclick="confirmDeletion(<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['outer']['index']]['id'];?>
)">Remove</button>
                        </div>
                    </div> 
                </td>
            </tr>
            <?php endfor; else: ?>
            <tr>
                <td class="w3-center" colspan="6">Data not found...</td>
            </tr>
            <?php endif; ?>      
        </tbody>
    </table>
</div>
<?php echo $_smarty_tpl->tpl_vars['pager']->value;

}
}
?>