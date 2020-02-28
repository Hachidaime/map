{$title}

<div id="msg" class="w3-padding-small"></div>
<form id="myForm">    
<div class="w3-row w3-margin-bottom">
    <div class="w3-col l3">
        &nbsp;
    </div>
    <div class="w3-col l6">
        <input type="hidden" name="id" id="id" />
        {$form}
    </div>
</div>
<div class="w3-row">
     <div class="w3-col">
        <button type="button" class="w3-button w3-hover-theme-d2 w3-white w3-text-theme-d2 w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-margin-bottom w3-left" style="width: 150px;" onclick="GoMenu({$system_id}, {$module_id}, {$action_id}, 'LoadSystem');" id="back">
            Back
        </button>
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
        var data = {};
        data['id'] = id;
        {/literal}
        $.post(GoAjax({$system_id}, {$module_id}, {$action_id}, 'SystemDetail'), data, function(reply){
            $.each(reply, function(i, v){
                $('#'+i).val(v);
            });
        }, "json");
        {literal}
    }
}

function Submit(){
    var data = $('#myForm').serialize();
    console.log(data);
    {/literal}
    $.post(GoAjax({$system_id}, {$module_id}, {$action_id}, 'SubmitSystem'), data, function(reply){
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
</script>
{/literal}