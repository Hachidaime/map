<?php /* Smarty version 3.1.27, created on 2020-02-06 22:24:44
         compiled from "/var/www/html/map/templates/Jalan/TPL_LoadKoordinat.php" */ ?>
<?php
/*%%SmartyHeaderCode:12819410115e3c2fbc708210_02802452%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f59e58e42f42a0f3dda816b1093b7323be99154' => 
    array (
      0 => '/var/www/html/map/templates/Jalan/TPL_LoadKoordinat.php',
      1 => 1579154570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12819410115e3c2fbc708210_02802452',
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
  'unifunc' => 'content_5e3c2fbc7a6b03_18257578',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5e3c2fbc7a6b03_18257578')) {
function content_5e3c2fbc7a6b03_18257578 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '12819410115e3c2fbc708210_02802452';
echo $_smarty_tpl->tpl_vars['title']->value;?>


<div id="msg" class="w3-padding-small"></div>
<form id="myForm">
<div class="w3-row w3-margin-bottom">
    <div class="w3-col l3">&nbsp;</div>
    <div class="w3-col l6">
        
        
        <!--Start Coordinate Form-->
        <?php echo $_smarty_tpl->tpl_vars['form']->value;?>

        <!--End Coordinate Form-->
        <div class="w3-row w3-margin-top w3-margin-bottom" id="segmentation-wrapper">
            <div class="w3-col m5 w3-display-container">&nbsp;</div>
            <div class="w3-col m7 w3-display-container">
                <button type="button" class="w3-button w3-hover-white w3-hover-text-theme-d2 w3-theme-d2 w3-text-white w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-margin-bottom w3-display-middle" style="width: 250px;" onclick="LoadCoordinateWithSegment('<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
');">
                    Terapkan Segmentasi
                </button>
            </div>
        </div>
    </div>
</div>
</form>
<dif class="w3-row w3-margin-bottom">
    <!--Start Coordinate List-->
    <div class="w3-col m12" id="data-content"></div>
    <!--End Coordinate List-->
</dif>
<div class="w3-row">
     <div class="w3-col">
        <button type="button" class="w3-button w3-hover-theme-d2 w3-white w3-text-theme-d2 w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-margin-bottom w3-left" style="width: 150px;" onclick="GoMenu(<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
, 'LoadJalan');" id="back">
            Back
        </button>
        <button type="button" class="w3-button w3-hover-white w3-hover-text-theme-d2 w3-theme-d2 w3-text-white w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-margin-bottom w3-right" style="width: 150px;" onclick="Submit();">
            Submit
        </button>
     </div>
</div>



<?php echo '<script'; ?>
>
$(document).ready(function(){
    localStorage.removeItem('coord');
//    localStorage.removeItem('is_new');
    localStorage.removeItem('flightPlanCoordinates');
    localStorage.removeItem('key');
    
    Detail();
    Search();
    
    /*Check Segmentation Exist*/
    ShowHideSegmentationButton($('#segmentasi').val());
    $('#segmentasi').on('keyup', function(){
        ShowHideSegmentationButton($(this).val());
    });
});
    
/*Show Hide Apply Segmentation Button*/
function ShowHideSegmentationButton(param){
    param = param.trim();
    if(!isNaN(param))
        if(param != '')
            $('#segmentation-wrapper').show();
        else
            $('#segmentation-wrapper').hide();
    else
        $('#segmentation-wrapper').hide();
}

/*Detail Jalan*/
function Detail(){
    var id = localStorage.getItem('id');
    if(id != '' || id != null){
        var data = {};
        data['id'] = id;
        
        $.post(GoAjax(<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
, 'KoordinatJalan'), data, function(reply){
            $.each(reply, function(i, v){
                $('#text_'+i).text(v);
                $('#'+i).val(v);
                if(i == 'segmentasi')
                    ShowHideSegmentationButton(v);
            });
        }, "json");
        
    }
}

/*Coordinate List*/
function Search(page = 1){
    var search = {};
    var id = localStorage.getItem('id');
    var is_new = localStorage.getItem('is_new');
    search['id'] = id;
    search['is_new'] = is_new;
    
    $('#data-content').load(GoAjax('<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
','LoadKoordinatSearch')+'&page='+page+'&'+$.param(search));
    
    if(localStorage.getItem('after_modify') != 1)
        localStorage.removeItem('is_new');
}

/*Submit Coordinate*/
function Submit(){
    var data = $('#myForm').serialize();
    console.log(data);
    
    $.post(GoAjax(<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
, 'SubmitKoordinat'), data, function(reply){
    
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
    
function Change(key){
    localStorage.setItem('key', key);
    
    GoMenu('<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
','LoadKoordinatForm');
    
}
<?php echo '</script'; ?>
>
<?php }
}
?>