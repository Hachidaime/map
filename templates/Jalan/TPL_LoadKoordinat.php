{$title}

<div id="msg" class="w3-padding-small"></div>
<form id="myForm">
<div class="w3-row w3-margin-bottom">
    <div class="w3-col l3">&nbsp;</div>
    <div class="w3-col l6">
        {*
        <div class="w3-row w3-margin-bottom">
            <div class="w3-col m5 w3-display-container">
                <label class="w3-left w3-margin-right w3-padding-small">Nomor Jalan</label>
                <span class="w3-right w3-padding-small w3-display-topright w3-hide-small">:</span>
            </div>
            <div class="w3-col m7 w3-display-container w3-border w3-border-theme w3-padding-small" id="text_no_jalan"></div>
        </div>
        <div class="w3-row w3-margin-bottom">
            <div class="w3-col m5 w3-display-container">
                <label class="w3-left w3-margin-right w3-padding-small">Nama Jalan</label>
                <span class="w3-right w3-padding-small w3-display-topright w3-hide-small">:</span>
            </div>
            <div class="w3-col m7 w3-display-container w3-border w3-border-theme w3-padding-small" id="text_nama_jalan"></div>
        </div>
        *}
        
        <!--Start Coordinate Form-->
        {$form}
        <!--End Coordinate Form-->
        <div class="w3-row w3-margin-top w3-margin-bottom" id="segmentation-wrapper">
            <div class="w3-col m5 w3-display-container">&nbsp;</div>
            <div class="w3-col m7 w3-display-container">
                <button type="button" class="w3-button w3-hover-white w3-hover-text-theme-d2 w3-theme-d2 w3-text-white w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-margin-bottom w3-display-middle" style="width: 250px;" onclick="LoadCoordinateWithSegment('{$system_id},{$module_id},{$action_id}');">
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
        <button type="button" class="w3-button w3-hover-theme-d2 w3-white w3-text-theme-d2 w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-margin-bottom w3-left" style="width: 150px;" onclick="GoMenu({$system_id}, {$module_id}, {$action_id}, 'LoadJalan');" id="back">
            Back
        </button>
        <button type="button" class="w3-button w3-hover-white w3-hover-text-theme-d2 w3-theme-d2 w3-text-white w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-margin-bottom w3-right" style="width: 150px;" onclick="Submit();">
            Submit
        </button>
     </div>
</div>


{literal}
<script>
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
        {/literal}
        $.post(GoAjax({$system_id}, {$module_id}, {$action_id}, 'KoordinatJalan'), data, function(reply){
            $.each(reply, function(i, v){
                $('#text_'+i).text(v);
                $('#'+i).val(v);
                if(i == 'segmentasi')
                    ShowHideSegmentationButton(v);
            });
        }, "json");
        {literal}
    }
}

/*Coordinate List*/
function Search(page = 1){
    var search = {};
    var id = localStorage.getItem('id');
    var is_new = localStorage.getItem('is_new');
    search['id'] = id;
    search['is_new'] = is_new;
    {/literal}
    $('#data-content').load(GoAjax('{$system_id}','{$module_id}','{$action_id}','LoadKoordinatSearch')+'&page='+page+'&'+$.param(search));
    {literal}
    if(localStorage.getItem('after_modify') != 1)
        localStorage.removeItem('is_new');
}

/*Submit Coordinate*/
function Submit(){
    var data = $('#myForm').serialize();
    console.log(data);
    {/literal}
    $.post(GoAjax({$system_id}, {$module_id}, {$action_id}, 'SubmitKoordinat'), data, function(reply){
    {literal}
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
    {/literal}
    GoMenu('{$system_id}','{$module_id}','{$action_id}','LoadKoordinatForm');
    {literal}
}
</script>
{/literal}