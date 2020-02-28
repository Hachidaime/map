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
                                {html_options options=$kepemilikan_opt2}
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
                        {*
                        <div class="">
                            <input class="w3-check" type="checkbox" name="saluran_air" value="1">&nbsp;<label>Saluran Air</label>
                        </div>
                        <div class="w3-margin-bottom">
                            <input class="w3-check" type="checkbox" name="gorong" value="1">&nbsp;<label>Gorong-Gorong</label>
                        </div>
                        *}
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
                        {*
                        <div id="panjang-saluran-air-wrapper" style="display:none">Total Panjang Saluran Air: <span id="total-panjang-saluran-air" class="pull-right"></span></div>
                        <div id="gorong-wrapper" style="display:none">Total Gorong-Gorong: <span id="total-gorong" class="pull-right"></span></div>
                        *}
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
                    {foreach from=$kondisi_opt key=k item=i}
                    <div class="w3-col l3 m3">
                        <svg height="18" width="20">
                            <polygon points="0,8 0,14 18,14 18,8" style="fill:{$kondisi_setup[$k]};" />
                        </svg> {$i}
                    </div>
                    {/foreach}
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

<script>
var DEFAULT_LATITUDE = {$smarty.const.DEFAULT_LATITUDE};
var DEFAULT_LONGITUDE = {$smarty.const.DEFAULT_LONGITUDE};

var width_opt = JSON.parse('{$kepemilikan_setup}');
var color_opt = JSON.parse('{$kondisi_setup_json}');
</script>
{literal}
<script src="assets/js/map.js"></script>
<script>
var map = null;
map = initMap();
function RuasJalan(kepemilikan){
    {/literal}
	var url = GoAjax('{$system_id}', '{$module_id}', '{$action_id}', 'RuasJalan');
    {literal}
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
    
    {/literal}
    var url = GoAjax({$system_id}, {$module_id}, {$action_id}, "SearchData");
    {literal}
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
</script>
{/literal}