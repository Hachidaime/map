{$title}


<div id="msg" class="w3-padding-small"></div>
<form id="myForm">    
<div class="w3-row w3-margin-bottom">
    <div class="w3-col l3">&nbsp;</div>
    <div class="w3-col l6">
        <input type="hidden" name="id" id="id" />
        {$form}
    </div>
</div>
{*
*}
{foreach from=$permission_options key=a item=x}
<div class="w3-row w3-margin-bottom">
    <div class="w3-col l3">&nbsp;</div>
    <div class="w3-col l6">
        <table class="w3-table">
            <tr class="w3-theme-d1">
                <th colspan="3" class="w3-center">{$x.name}</th>
            </tr>
            {foreach from=$x.module key=b item=y}
            <tr class="w3-theme-l2">
                <th width="40%">{$y.name}</th>
                <th width="30%" class="w3-center">Allow</th>
                <th width="30%" class="w3-center">Deny</th>
            </tr>
            {foreach from=$y.action key=c item=z}
            <tr>
                <td>{$z.name}</td>
                <td class="w3-center"><input class="w3-radio w3-small" type="radio" id="action_{$c}_0" name="permission[{$a},{$b},{$c}]" value="0"></td>
                <td class="w3-center"><input class="w3-radio w3-small" type="radio" id="action_{$c}_1" name="permission[{$a},{$b},{$c}]" value="1"></td>
            </tr>
            {/foreach}
            {/foreach}
        </table>
    </div>
</div>
{/foreach}
<div class="w3-row">
     <div class="w3-col">
        <button type="button" class="w3-button w3-hover-theme-d2 w3-white w3-text-theme-d2 w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-margin-bottom w3-left" style="width: 150px;" onclick="GoMenu({$system_id}, {$module_id}, {$action_id}, 'LoadUserGroup');" id="back">
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
        $.post(GoAjax({$system_id}, {$module_id}, {$action_id}, 'UserGroupDetail'), data, function(reply){
            $.each(reply, function(i, v){
                $('#'+i).val(v);
                if(i == 'action_allow'){
                    $.each(v, function(j, x){
                        $("#action_"+x+"_1").prop("checked", true);    
                    });
                }
                if(i == 'action_deny'){
                    $.each(v, function(j, x){
                        $("#action_"+x+"_0").prop("checked", true);    
                    });
                }
            });
        }, "json");
        {literal}
    }
}

function Submit(){
    var data = $('#myForm').serialize();
    {/literal}
    $.post(GoAjax({$system_id}, {$module_id}, {$action_id}, 'SubmitUserGroup'), data, function(reply){
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