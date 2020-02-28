<?php /* Smarty version 3.1.27, created on 2020-01-21 19:03:41
         compiled from "/var/www/html/map/templates/View/TPL_LoadView.php" */ ?>
<?php
/*%%SmartyHeaderCode:7644929315e26e89dc7e928_05173628%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd17c24bfeb96fc18921b627e24bca6c46c9a1628' => 
    array (
      0 => '/var/www/html/map/templates/View/TPL_LoadView.php',
      1 => 1579607946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7644929315e26e89dc7e928_05173628',
  'variables' => 
  array (
    'kepemilikan_opt2' => 0,
    'kondisi_opt' => 0,
    'k' => 0,
    'kondisi_setup' => 0,
    'i' => 0,
    'kepemilikan_setup' => 0,
    'kondisi_setup_json' => 0,
    'system_id' => 0,
    'module_id' => 0,
    'action_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5e26e89dda11c2_64888072',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5e26e89dda11c2_64888072')) {
function content_5e26e89dda11c2_64888072 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once '/var/www/html/map/libs/smarty/plugins/function.html_options.php';

$_smarty_tpl->properties['nocache_hash'] = '7644929315e26e89dc7e928_05173628';
?>
<div class="w3-row">
    <!--Start Kriteria-->
    <div class="w3-col l2">
        <div class="w3-dropdown-click w3-hover-theme-l5">
            <!--Start Show/Hide Kriteria Form Button-->
            <button onclick="Dropdown('kriteria')" type="button" class="w3-button w3-hover-white w3-hover-text-theme-d2 w3-theme-d2 w3-text-white w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-padding-small" style="width: 150px;"><i class="fas fa-search-location"></i> Kriteria</button>
            <!--End Show/Hide Kriteria Form Button-->
            
            <div id="kriteria" class="w3-dropdown-content w3-card-4" style="width:300px">
                <div class="w3-container w3-padding-small w3-theme-l5">
                    <!--Start Kriteria Form-->
                    <form class="w3-margin-bottom" id="myForm">
                        <div class="w3-margin-bottom">
                            <label for="sts_kepemilikan">Status Kepemilikan</label>
                            <select class="w3-input w3-theme-l5 w3-border w3-border-theme w3-padding-small  w3-focus-border-blue" name="kepemilikan" onchange="RuasJalan(this.value);">
                                <option value="0">&nbsp;</option>
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['kepemilikan_opt2']->value),$_smarty_tpl);?>

                                <option value="99">Semua</option>
                            </select>
                        </div>
                        <div class="w3-margin-bottom">
                            <label for="id_jalan">Ruas Jalan</label>
                            <select class="w3-input w3-theme-l5 w3-border w3-border-theme w3-padding-small  w3-focus-border-blue" name="no_jalan" id="no_jalan" onfocus='this.size=10;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                <option value="0">&nbsp;</option>
                            </select>					
                        </div>
                        <div class="">
                            <input class="w3-check" type="checkbox" name="cari_jalan_provinsi" value="1">&nbsp;<label>Jalan Provinsi</label>
                        </div>
                        <div class="">
                            <input class="w3-check" type="checkbox" name="cari_perkerasan" value="1">&nbsp;<label>Tipe Perkerasan</label>
                        </div>
                        <div class="">
                            <input class="w3-check" type="checkbox" name="cari_kondisi" value="1">&nbsp;<label>Kondisi</label>
                        </div>
                        <div class="w3-margin-bottom">
                            <input class="w3-check" type="checkbox" name="cari_jembatan" value="1">&nbsp;<label>Jembatan</label>
                        </div>
                        
                        <button type="button" class="w3-button w3-hover-white w3-hover-text-theme-d2 w3-theme-d2 w3-text-white w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-padding-small" style="width: 150px;" onclick="SearchData();">Submit</button>
                    </form>
                    <!--End Kriteria Form-->
                    
                    <!--Start Summary-->
                    <div id="summary" style="display:none">
                        <legend style="font-weight: bold;">Summary</legend>
                        <div>Total Panjang Jalan: <span id="total-panjang" class="pull-right"></span></div>
                        <div id="panjang-beton-wrapper" style="display:none">Total Panjang Jalan Beton: <span id="total-panjang-beton" class="pull-right"></span></div>
                        <div id="panjang-aspal-wrapper" style="display:none">Total Panjang Jalan Aspal: <span id="total-panjang-aspal" class="pull-right"></span></div>
                        <div id="jembatan-wrapper" style="display:none">Total Jembatan: <span id="total-jembatan" class="pull-right"></span></div>
                        
                    </div>
                    <!--Start Summary-->
                </div>
            </div>
        </div>
    </div>
    <!--End Kriteria-->
    
    <!--Start Legend-->
    <div class="w3-col l10">
        <div class="w3-card w3-margin-bottom">
            <div class="w3-container w3-border w3-border-theme-d5 w3-theme-l5">
                <div class="w3-row">
                    <div class="w3-col l12"><strong>Legend:</strong></div>
                </div>
                <div class="w3-row">
                    <?php
$_from = $_smarty_tpl->tpl_vars['kondisi_opt']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['i']->_loop = false;
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
$foreach_i_Sav = $_smarty_tpl->tpl_vars['i'];
?>
                    <div class="w3-col l3 m3">
                        <svg height="18" width="20">
                            <polygon points="0,8 0,14 18,14 18,8" style="fill:<?php echo $_smarty_tpl->tpl_vars['kondisi_setup']->value[$_smarty_tpl->tpl_vars['k']->value];?>
;" />
                        </svg> <?php echo $_smarty_tpl->tpl_vars['i']->value;?>

                    </div>
                    <?php
$_smarty_tpl->tpl_vars['i'] = $foreach_i_Sav;
}
?>
                </div>
                <div class="w3-row">
                    <div class="w3-col l4 m4">
                        <svg height="18" width="20">
                            <polygon points="9,2 2,16 15,16" style="fill:#4681b4;stroke:#325c81;stroke-width:3" />
                        </svg> Titik Awal Ruas Jalan
                    </div>
                    <div class="w3-col l4 m4">
                        <svg height="18" width="20">
                            <circle cx="9" cy="9" r="7" style="fill:#4681b4;stroke:#325c81;stroke-width:3" />
                        </svg> Segmentasi
                    </div>
                    <div class="w3-col l4 m4">
                        <svg height="18" width="20">
                            <polygon points="9,2 2,9 9,16 16,9" style="fill:#4681b4;stroke:#325c81;stroke-width:3" />
                        </svg> Titik Awal Ruas Jalan
                    </div>
                </div>
            </div>      
        </div> 
    </div>
    <!--End Legend-->
</div>

<!--Star Map Area-->
<div class="map-bg">
    <div class="kotakpeta">
        <div id="map_canvas"></div>
    </div>
</div>
<!--Form Map Area-->

<?php echo '<script'; ?>
>
var DEFAULT_LATITUDE = <?php echo @constant('DEFAULT_LATITUDE');?>
;
var DEFAULT_LONGITUDE = <?php echo @constant('DEFAULT_LONGITUDE');?>
;

var width_opt = JSON.parse('<?php echo $_smarty_tpl->tpl_vars['kepemilikan_setup']->value;?>
');
var color_opt = JSON.parse('<?php echo $_smarty_tpl->tpl_vars['kondisi_setup_json']->value;?>
');
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="assets/js/map.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
var map = null;
map = initMap();
function RuasJalan(kepemilikan){
    
	var url = GoAjax('<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
', 'RuasJalan');
    
	var data = "kepemilikan="+kepemilikan;
     
    $("#no_jalan").load(url + '&' + data);
}
    
function SearchData(){
    map = initMap();
    var search = $('#myForm').serialize();
    var formdata = $('#myForm').serializeArray()
    var data = [];
    $(formdata ).each(function(index, obj){
        data[obj.name] = obj.value;
    });
    
    
    var url = GoAjax(<?php echo $_smarty_tpl->tpl_vars['system_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['module_id']->value;?>
, <?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
, "SearchData");
    
    $.post(url, search, function(reply){
        $('#summary').show();
        
        var total_panjang = 0;
        var total_panjang_perkerasan = [];
        $.each(reply.jalan, function(no_jalan, row){
            if(row.koordinat_awal != null){
                /*Start Meenghitung Total Panjang per Ruas Jalan*/
                var panjang = CountDistance(row.koordinat_awal.split(" "));
                /*End Meenghitung Total Panjang per Ruas Jalan*/
                
                /*Menambah Total Panjang*/
                total_panjang = Number(total_panjang) + Number(panjang);
                
                /*Star Menampilkan Jalan pada Map*/
                DrawLine(row.koordinat_awal.split(" "), width_opt[row.kepemilikan]);
                /*End Menampilkan Jalan pada Map*/
            }
        });
        total_panjang = total_panjang.toFixed(2);
        if(total_panjang > 0){
            $('#total-panjang').text(total_panjang + " km");
        }
        
        if(data['cari_kondisi'] != undefined){
            $.each(reply.kondisi, function(kepemilikan, row){
                $.each(row, function(item, koordinat_list){
                    $.each(koordinat_list, function(i, koordinat){
                        /*Start Menampilkan Jalan pada Map dengan kondisi*/
                        DrawLine(koordinat.split(" "), width_opt[kepemilikan], color_opt[item]);
                        /*End Menampilkan Jalan pada Map dengan kondisi*/
                    });
                });
            })
        }
        
//        console.log(total_panjang_perkerasan);
//        console.log(total_panjang);
    }, "JSON");
}
<?php echo '</script'; ?>
>
<?php }
}
?>