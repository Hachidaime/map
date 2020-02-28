{$title}

<div id="msg" class="w3-padding-small"></div>
<form id="myForm">    
<div class="w3-row w3-margin-bottom">
    <div class="w3-col l3">
        &nbsp;
    </div>
    <div class="w3-col l6">
        {$form}
    </div>
</div>
<div class="w3-row">
     <div class="w3-col">
        <button type="button" class="w3-button w3-hover-white w3-hover-text-theme-d2 w3-theme-d2 w3-text-white w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-margin-bottom w3-right" style="width: 150px;" onclick="Submit();">
            Submit
        </button>
     </div>
</div>
</form>
{literal}
<script>
$(document).ready(function(){
    Detail();
});
function Detail(){
    var id = localStorage.getItem('id');
    if(id != '' || id != null){
        {/literal}
        var url = GoAjax({$system_id}, {$module_id}, {$action_id}, 'SetupDetail');
        {literal}
        var data = {};
        data['id'] = id;
        $.post(url , data, function(reply){
            $.each(reply, function(i, r){
                if(r.category == 'kondisi')
                    $('#' + r.category + "_" + r.item).colorpicker({color: r.value});
                else
                    $('#' + r.category + "_" + r.item).val(r.value);
            });
        }, "json");
    }
}

function Submit(){
    var data = $('#myForm').serialize();
    console.log(data);
    {/literal}
    $.post(GoAjax({$system_id}, {$module_id}, {$action_id}, 'SubmitSetup'), data, function(reply){
    {literal}
        $('#msg').html(reply.msg);
        GoTop();
		if(reply.id > 0){
			Detail();
		}
    }, "json");
}
</script>
{/literal}