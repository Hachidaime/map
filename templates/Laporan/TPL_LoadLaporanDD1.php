<div class="w3-display-container w3-margin-bottom">
    <span class="w3-display-topmiddle">DATA DASAR PRASARANA JALAN PROVINSI, KABUPATEN/KOTA</span>
    <span class="w3-panel w3-display-topright w3-black">&nbsp;&nbsp;&nbsp;DD1&nbsp;&nbsp;&nbsp;</span>
</div>
<br>
<table class="w3-margin-bottom w3-tiny" width="300px">
<tbody>
    <tr>
        <td>PROVINSI</td>
        <td>: {$smarty.const.PROVINCE}</td>
    </tr>
    <tr>
        <td>KABUPATEN/KOTA</td>
        <td>: {$smarty.const.CITY}</td>
    </tr>
    <tr>
        <td>TAHUN</td>
        <td>: {$smarty.now|date_format:"%Y"}</td>
    </tr>
</tbody>
</table>

<!-- START DISPLAY DATA -->
<div id="data-content"></div>
<!-- END DISPLAY DATA -->

{literal}
<script>
$(document).ready(function(){
    Search();
    localStorage.clear();
});

/* Search Data */
function Search(page = "1"){
    var search = $('#mySearch').serialize();
    {/literal}
    $('#data-content').load(GoAjax('{$system_id}','{$module_id}','{$action_id}','LoadDD1Search')+'&'+search).ajaxComplete(DD1Data());
    {literal}
}
    
function DD1Data(){
    {/literal}
    var url = GoAjax('{$system_id}','{$module_id}','{$action_id}','DD1Data');
    {literal}
    $.post(url, function(reply){
        $.each(reply, function(no_jalan, row){
            if(row.koordinat_awal != null){
                /*Start Meenghitung Total Panjang*/
                var panjang = CountDistance(row.koordinat_awal.split(" "));
                $("#panjang-" + row.id).text(panjang);
                /*End Meenghitung Total Panjang*/
                
                /*Start Menghitung Panjang tiap Perkerasan*/
                $.each(row.perkerasan, function(code, koordinat){
                    if(code > 0){
                        var panjang_segment = 0;
                        $.each(koordinat, function(j, koordinat_awal){
                            panjang_segment += Number(CountDistance(koordinat_awal.split(" ")));
                        });
                        $("#perkerasan-" + code + "-" + row.id).text(panjang_segment.toFixed(2));
                    }
                });
                /*End Menghitung Panjang tiap Perkerasan*/
                
                /*Start Menghitung Panjang tiap Kondisi*/
                $.each(row.kondisi, function(code, koordinat){
                    if(code > 0){
                        var panjang_segment = 0;
                        $.each(koordinat, function(j, koordinat_awal){
                            panjang_segment += Number(CountDistance(koordinat_awal.split(" ")));
                        });
                        $("#kondisi-" + code + "-" + row.id).text(panjang_segment.toFixed(2));
                        var panjang_segment_percent = panjang_segment/panjang*100;
                        $("#kondisi-persen-" + code + "-" + row.id).text(panjang_segment_percent.toFixed(2));
                    }
                });
                /*End Menghitung Panjang tiap Perkerasan*/
            }
        });
    }, "JSON");
}
</script>
{/literal}