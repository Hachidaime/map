<?php /* Smarty version 3.1.27, created on 2020-01-21 19:22:12
         compiled from "/var/www/html/map/templates/Layout/TPL_Form.php" */ ?>
<?php
/*%%SmartyHeaderCode:20864860855e26ecf477d822_21695760%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'edf401bdbd53c2e82ac497df980b7bd638c75dc9' => 
    array (
      0 => '/var/www/html/map/templates/Layout/TPL_Form.php',
      1 => 1578982130,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20864860855e26ecf477d822_21695760',
  'variables' => 
  array (
    'data' => 0,
    'system_id' => 0,
    'module_id' => 0,
    'action_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5e26ecf48aca88_22412307',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5e26ecf48aca88_22412307')) {
function content_5e26ecf48aca88_22412307 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once '/var/www/html/map/libs/smarty/plugins/function.html_options.php';

$_smarty_tpl->properties['nocache_hash'] = '20864860855e26ecf477d822_21695760';
if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['a'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['a']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['name'] = 'a';
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total']);
?>
<div class="w3-row" id="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
-wrapper">
    <div class="w3-col m5 w3-display-container">
        <label class="w3-left w3-margin-right w3-padding-small"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['label'];
if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['required'] == 1) {?><sup><i class="w3-text-red fa fa-asterisk"></i></sup><?php }?>
        </label>
        <span class="w3-right w3-padding-small w3-display-topright w3-hide-small">:</span>
        
    </div>
    <div class="w3-col m7 w3-margin-bottom">
<?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['type'] == 'text') {?>
        <input class="w3-input w3-white w3-border w3-border-theme w3-padding-small " name="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
" type="text" />
<?php } elseif ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['type'] == 'password') {?>
        <input class="w3-input w3-white w3-border w3-border-theme w3-padding-small " name="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
" type="password" />
<?php } elseif ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['type'] == 'static') {?>
        <input class="w3-input w3-white w3-border w3-border-theme w3-padding-small " name="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
" type="text" readonly />
<?php } elseif ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['type'] == 'textarea') {?>
        <textarea class="w3-input w3-white w3-border w3-border-theme w3-padding-small " name="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
" rows="4" style="resize:none;"></textarea>
<?php } elseif ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['type'] == 'select') {?>
        <select class="w3-input w3-white w3-border w3-border-theme w3-padding-small  w3-focus-border-blue" name="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
">
        <option value="0">&nbsp;</option>
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['options']),$_smarty_tpl);?>

        </select>
<?php } elseif ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['type'] == 'date') {?>
        <input class="w3-input w3-white w3-border w3-border-theme w3-padding-small  datepicker" name="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
" type="text" readonly />
<?php } elseif ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['type'] == 'image') {?>
        <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
" />
		<div id="upload-<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
"></div>
		<div class="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
-container"></div>
        <?php echo '<script'; ?>
>
        UploadMyFile("image/*", '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['name'];?>
', true);
        <?php echo '</script'; ?>
>
<?php } elseif ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['type'] == 'video') {?>
        <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['name'];?>
" />
		<div id="upload-<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
"></div>
		<div class="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
-container"></div>
        <?php echo '<script'; ?>
>
        UploadMyFile("video/*", '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['name'];?>
', false);
        <?php echo '</script'; ?>
>
<?php } elseif ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['type'] == 'document') {?>
        <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['name'];?>
" />
		<div id="upload-<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
"></div>
		<div class="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
-container"></div>
        <?php echo '<script'; ?>
>
        UploadMyFile(".pdf", '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['name'];?>
', false);
        <?php echo '</script'; ?>
>
<?php } elseif ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['type'] == 'coordinate') {?>
        <div class="w3-row">
            <div class="w3-col l6 m12 w3-padding-small">
                <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['name'];?>
" />
                <div id="upload-<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
-arcgis"></div>
                <div class="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
-arcgis-container"></div>
            </div>
            <div class="w3-col l6 m12 w3-padding-small">
                <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['name'];?>
" />
                <div id="upload-<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
-tracker"></div>
                <div class="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
-tracker-container"></div>
            </div>
        </div>
        <?php echo '<script'; ?>
>
        /* Upload Cooroinate from ArcGIS */
        UploadCoordinate('ArcGIS', '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
');
        
        /* Upload Cooroinate from GPS Tracker */
        UploadCoordinate('Tracker', '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
');
        <?php echo '</script'; ?>
>
<?php } elseif ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['type'] == 'color') {?>
        <input class="w3-input w3-white w3-border w3-border-theme w3-padding-small  colorpicker" name="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
" type="text" readonly />
<?php } elseif ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['type'] == 'slider') {?>
        <div class="slider" style="margin: 7px 10px;">
              <div class="ui-slider-handle custom-handle"></div>
        </div>
        <input type="hidden" class="slider-value" name="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['id'];?>
" />
<?php }?>
    </div>
</div>
<?php endfor; endif;
}
}
?>