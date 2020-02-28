<?php /* Smarty version 3.1.27, created on 2020-01-20 17:53:09
         compiled from "/var/www/html/map/templates/Layout/TPL_Navbar.php" */ ?>
<?php
/*%%SmartyHeaderCode:4180913175e2586958047a4_95367011%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ceafe45bf4f9d10101ece047653f8da0a8dd280' => 
    array (
      0 => '/var/www/html/map/templates/Layout/TPL_Navbar.php',
      1 => 1578463238,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4180913175e2586958047a4_95367011',
  'variables' => 
  array (
    'module' => 0,
    'module_id' => 0,
    'k' => 0,
    'v' => 0,
    'action' => 0,
    's' => 0,
    'system' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5e25869587ece3_07651266',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5e25869587ece3_07651266')) {
function content_5e25869587ece3_07651266 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '4180913175e2586958047a4_95367011';
?>
<!-- Navbar -->
<div class="w3-bar w3-theme-d3" style="padding: 0px 16px;">
    <?php
$_from = $_smarty_tpl->tpl_vars['module']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
    <div class="w3-dropdown-hover">
        <a href="javascript:void(0)" class="menu-item <?php if ($_smarty_tpl->tpl_vars['module_id']->value == $_smarty_tpl->tpl_vars['k']->value) {?>active w3-theme-dark<?php } else { ?>w3-theme-d3<?php }?> w3-hover-theme-dark w3-hide-medium w3-hide-small" onclick="Dropdown('Demo-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
')">
            <?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
 <i class="fas fa-caret-down"></i>
        </a>
        <div id="Demo-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="w3-dropdown-content w3-bar-block w3-card-4" style="margin-top: 38px;">
            <?php
$_from = $_smarty_tpl->tpl_vars['action']->value[$_smarty_tpl->tpl_vars['k']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['s'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['s']->_loop = false;
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->_loop = true;
$foreach_s_Sav = $_smarty_tpl->tpl_vars['s'];
?>
            <a href="javascript:void(0);" onclick="GoMenu('<?php echo $_smarty_tpl->tpl_vars['v']->value['system_id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['s']->value['id'];?>
');" class="myDropdown w3-theme-d3 w3-hover-theme-dark w3-bar-item w3-button"><?php echo $_smarty_tpl->tpl_vars['s']->value['name'];?>
</a>
            <?php
$_smarty_tpl->tpl_vars['s'] = $foreach_s_Sav;
}
?>
        </div>
    </div>
    <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
    <a href="javascript:void(0)" class="w3-button w3-bar-item w3-button w3-right w3-hide-large w3-hover-theme-d5" onclick="myCollapse()">&#9776;</a>
    <div class="w3-dropdown-hover w3-right w3-theme-d3 w3-hide-medium w3-hide-small">
        <a href="javascript:void(0)" class="menu-item w3-theme-d3 w3-hover-theme-dark" onclick="Dropdown('Demo-User')">
            <i class="fas fa-user-circle"></i>
        </a>
        <div id="Demo-User" class="w3-dropdown-content w3-bar-block w3-card-4" style="margin-top: 38px; right: 0;">
            <a href="javascript:void(0);" onclick="UserLogout();" class="myDropdown w3-theme-d3 w3-hover-theme-dark w3-bar-item w3-button">Keluar</a>
        </div>
    </div>
    <div class="w3-dropdown-hover w3-right w3-theme-d3 w3-hide-medium w3-hide-small">
        <a href="javascript:void(0)" class="menu-item w3-theme-d3 w3-hover-theme-dark" onclick="Dropdown('Demo-System')">
            <i class="fas fa-map-marker-alt"></i>
        </a>
        <div id="Demo-System" class="w3-dropdown-content w3-bar-block w3-card-4" style="margin-top: 38px; right: 0;">
            <?php
$_from = $_smarty_tpl->tpl_vars['system']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
            <a href="javascript:void(0);" onclick="GoMenu('<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
', '', '', '');" class="myDropdown w3-theme-d3 w3-hover-theme-dark w3-bar-item w3-button"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a>
            <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
        </div>
    </div>
    
    <div class="w3-dropdown-click w3-right w3-theme-d3 w3-hide-large">
        <a href="javascript:void(0)" class="menu-item w3-theme-d3 w3-hover-theme-dark" onclick="Dropdown('Demo-User2')">
            <i class="fas fa-user-circle"></i>
        </a>
        <div id="Demo-User2" class="w3-dropdown-content w3-bar-block w3-card-4" style="margin-top: 38px; right: 0;">
            <a href="javascript:void(0);" onclick="UserLogout();" class="w3-theme-d3 w3-hover-theme-dark w3-bar-item w3-button">Keluar</a>
        </div>
    </div>
    <div class="w3-dropdown-click w3-right w3-theme-d3 w3-hide-large">
        <a href="javascript:void(0)" class="menu-item w3-theme-d3 w3-hover-theme-dark" onclick="Dropdown('Demo-System2')">
            <i class="fas fa-map-marker-alt"></i>
        </a>
        <div id="Demo-System2" class="w3-dropdown-content w3-bar-block w3-card-4" style="margin-top: 38px; right: 0;">
            <?php
$_from = $_smarty_tpl->tpl_vars['system']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
            <a href="javascript:void(0);" onclick="GoMenu('<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
', '', '', '');" class="w3-theme-d3 w3-hover-theme-dark w3-bar-item w3-button"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a>
            <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
        </div>
    </div>
</div>

<div id="collapsed" class="w3-bar-block w3-theme-d3 w3-hide w3-hide-large">
    <?php
$_from = $_smarty_tpl->tpl_vars['module']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
    <div class="w3-dropdown-click">
        <a href="javascript:void(0)" class="w3-button w3-bar w3-theme-d3 w3-hover-theme-dark" onclick="Dropdown('Demo2-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
')">
            <?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
 <i class="fas fa-caret-down"></i>
        </a>
        <div id="Demo2-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="w3-dropdown-content w3-bar-block w3-card-4">
            <?php
$_from = $_smarty_tpl->tpl_vars['action']->value[$_smarty_tpl->tpl_vars['k']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['s'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['s']->_loop = false;
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->_loop = true;
$foreach_s_Sav = $_smarty_tpl->tpl_vars['s'];
?>
            <a href="javascript:void(0);" onclick="GoMenu('<?php echo $_smarty_tpl->tpl_vars['v']->value['system_id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['s']->value['id'];?>
');" class="w3-theme-d1 w3-hover-theme-dark w3-bar-item w3-button"><?php echo $_smarty_tpl->tpl_vars['s']->value['name'];?>
</a>
            <?php
$_smarty_tpl->tpl_vars['s'] = $foreach_s_Sav;
}
?>
        </div>
    </div>
    <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
</div>
<!-- Navbar -->

<?php }
}
?>