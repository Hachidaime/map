<?php /* Smarty version 3.1.27, created on 2020-02-06 22:24:44
         compiled from "/var/www/html/map/templates/Jalan/TPL_LoadKoordinatSearch.php" */ ?>
<?php
/*%%SmartyHeaderCode:5255683465e3c2fbcac8a26_38219501%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac36ba9ff4d35ea0f3c183e304e95145ef26fd55' => 
    array (
      0 => '/var/www/html/map/templates/Jalan/TPL_LoadKoordinatSearch.php',
      1 => 1579231494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5255683465e3c2fbcac8a26_38219501',
  'variables' => 
  array (
    'list' => 0,
    'v' => 0,
    'k' => 0,
    'perkerasan_opt' => 0,
    'kondisi_opt' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5e3c2fbcc24b38_10553191',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5e3c2fbcc24b38_10553191')) {
function content_5e3c2fbcc24b38_10553191 ($_smarty_tpl) {
if (!is_callable('smarty_function_cycle')) require_once '/var/www/html/map/libs/smarty/plugins/function.cycle.php';

$_smarty_tpl->properties['nocache_hash'] = '5255683465e3c2fbcac8a26_38219501';
?>
<div class="w3-row w3-border-bottom w3-border-theme">
    <div class="w3-col l1 w3-center w3-hide-small w3-hide-medium">#</div>
    <div class="w3-col l1 w3-center w3-hide-small w3-hide-medium">Latitude</div>
    <div class="w3-col l1 w3-center w3-hide-small w3-hide-medium">Longitude</div>
    <div class="w3-col l1 w3-center w3-hide-small w3-hide-medium">Lebar (m)</div>
    <div class="w3-col l2 w3-center w3-hide-small w3-hide-medium">Tipe Perkerasan</div>
    <div class="w3-col l1 w3-center w3-hide-small w3-hide-medium">Kondisi</div>
    <div class="w3-col l2 w3-center w3-hide-small w3-hide-medium">Foto</div>
    <div class="w3-col l1 w3-center w3-hide-small w3-hide-medium">@segment</div>
    <div class="w3-col l1 w3-center w3-hide-small w3-hide-medium">IRI</div>
    <div class="w3-col l1 w3-center">
        <button type="button" class="w3-btn w3-text-highway-green w3-small w3-padding-small" onclick="AddCoordinate();" style="display:none;" id="btn-add-coord"><i class="fas fa-plus"></i></button>
    </div>
</div>
<?php
$_from = $_smarty_tpl->tpl_vars['list']->value;
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
<div class="w3-row w3-small w3-hover-theme-d1 <?php if ($_smarty_tpl->tpl_vars['v']->value['new'] > 0) {?>w3-yellow<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['segment'] > 0) {?>w3-pink<?php } else {
echo smarty_function_cycle(array('values'=>'w3-theme-l4,w3-theme-l5'),$_smarty_tpl);
}?>" id="row-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">
    <input type="hidden" class="coordinate-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" name="latitude" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['latitude'];?>
" id="">
    <input type="hidden" class="coordinate-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" name="longitude" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['longitude'];?>
">
    <input type="hidden" class="coordinate-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" name="lebar" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['lebar'];?>
">
    <input type="hidden" class="coordinate-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" name="perkerasan" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['perkerasan'];?>
">
    <input type="hidden" class="coordinate-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" name="kondisi" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['kondisi'];?>
">
    <input type="hidden" class="coordinate-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" name="iri" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['iri'];?>
">
    <input type="hidden" class="coordinate-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" name="segment" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['segment'];?>
">
    
    <div class="w3-col l1 text-coordinate-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 w3-padding-small">
        <div class="w3-row">
            <div class="w3-col m6 s6 w3-hide-large">#</div>
            <div class="w3-col m6 s6 w3-right-align"><span id="text-latitude-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</span></div>
        </div>
    </div>
    <div class="w3-col l1 text-coordinate-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 w3-padding-small">
        <div class="w3-row">
            <div class="w3-col m6 s6 w3-hide-large">Latitude</div>
            <div class="w3-col m6 s6 w3-right-align"><span id="text-latitude-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['latitude'];?>
</span></div>
        </div>
    </div>
    <div class="w3-col l1 text-coordinate-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 w3-padding-small">
        <div class="w3-row">
            <div class="w3-col m6 s6 w3-hide-large">Longitude</div>
            <div class="w3-col m6 s6 w3-right-align"><span id="text-longitude-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['longitude'];?>
</span></div>
        </div>
    </div>
    <div class="w3-col l1 text-coordinate-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 w3-padding-small">
        <div class="w3-row">
            <div class="w3-col m6 s6 w3-hide-large">Lebar (m)</div>
            <div class="w3-col m6 s6 w3-right-align"><span id="text-lebar-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['lebar'] > 0) {
echo (($tmp = @$_smarty_tpl->tpl_vars['v']->value['lebar'])===null||$tmp==='' ? '&nbsp;' : $tmp);
} else { ?>&nbsp;<?php }?></span></div>
        </div>
    </div>
    <div class="w3-col l2 text-coordinate-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 w3-padding-small">
        <div class="w3-row">
            <div class="w3-col m6 s6 w3-hide-large">Perkerasan</div>
            <div class="w3-col m6 s6"><span id="text-perkerasan-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['perkerasan_opt']->value[$_smarty_tpl->tpl_vars['v']->value['perkerasan']])===null||$tmp==='' ? '&nbsp;' : $tmp);?>
</span></div>
        </div>
    </div>
    <div class="w3-col l1 text-coordinate-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 w3-padding-small">
        <div class="w3-row">
            <div class="w3-col m6 s6 w3-hide-large">Kondisi</div>
            <div class="w3-col m6 s6"><span id="text-kondisi-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['kondisi_opt']->value[$_smarty_tpl->tpl_vars['v']->value['kondisi']])===null||$tmp==='' ? '&nbsp;' : $tmp);?>
</span></div>
        </div>
    </div>
    <div class="w3-col l2 text-coordinate-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 w3-padding-small">
        <div class="w3-row">
            <div class="w3-col m6 s6 w3-hide-large">Foto</div>
            <div class="w3-col m6 s6">
                <?php if ($_smarty_tpl->tpl_vars['v']->value['path'] != '') {?>
                <div class="w3-padding">
                    <img src="../upload/<?php echo $_smarty_tpl->tpl_vars['v']->value['path'];?>
" style="width:100%;cursor:pointer" onclick="openModal();currentDiv(1)" class="w3-hover-shadow">
                </div>
                <?php } else { ?>
                &nbsp;
                <?php }?>  
            </div>
        </div>
    </div>
    <div class="w3-col l1 text-coordinate-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 w3-padding-small">
        <div class="w3-row">
            <div class="w3-col m6 s6 w3-hide-large">@segment</div>
            <div class="w3-col m6 s6 w3-right-align"><span id="text-segment-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['segment'] > 0) {
echo (($tmp = @$_smarty_tpl->tpl_vars['v']->value['segment'])===null||$tmp==='' ? '&nbsp;' : $tmp);
} else { ?>&nbsp;<?php }?></span></div>
        </div>
    </div>
    <div class="w3-col l1 text-coordinate-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 w3-padding-small">
        <div class="w3-row">
            <div class="w3-col m6 s6 w3-hide-large">IRI</div>
            <div class="w3-col m6 s6"><span id="text-iri-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['iri'] > 0) {
echo (($tmp = @$_smarty_tpl->tpl_vars['v']->value['iri'])===null||$tmp==='' ? '&nbsp;' : $tmp);
} else { ?>&nbsp;<?php }?></span></div>
        </div>
    </div>
    <div class="w3-col l1">
        <button type="button" class="w3-btn w3-text-highway-yellow w3-small w3-padding-small" onclick="Change(<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
);"><i class="far fa-edit"></i></button>
        <button type="button" class="w3-btn w3-text-highway-red w3-small w3-padding-small" onclick="RemoveCoordinate(<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
)" data-id="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><i class="fas fa-minus"></i></button>
    </div>
</div>
<?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
if (!$_smarty_tpl->tpl_vars['v']->_loop) {
?>
<div class="w3-row w3-small w3-hover-theme-l3 w3-theme-l5">
    <div class="w3-col l12 w3-center">Data not found...</div>
</div>
<?php
}
?>

<div class="w3-margin-top"><?php echo $_smarty_tpl->tpl_vars['pager']->value;?>
</div><?php }
}
?>