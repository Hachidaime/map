{$title}

<div class="w3-row">
    <div class="w3-col l12 m12 s12 w3-padding-small">
        <button type="button" class="w3-button w3-hover-white w3-hover-text-theme-d2 w3-theme-d2 w3-text-white w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-margin-bottom" onclick="GoMenu({$system_id}, {$module_id}, {$action_id}, 'LoadUserForm');" style="width: 150px;" >Add User</button>
    </div>
</div>

<!-- START SEARCH FORM -->
<form id="mySearch">
<div class="w3-bar w3-margin-bottom">
    <button type="button" class="w3-bar-item w3-button w3-hover-theme-d2 w3-white w3-text-theme-d2 w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-small w3-padding-small w3-margin-bottom w3-margin-left w3-right" onclick="Search();">
        <i class="fa fa-search"></i>
    </button>
    <button type="button" class="w3-bar-item w3-button w3-hover-red w3-white w3-text-red w3-border-red w3-border w3-ripple w3-round-xxlarge w3-small w3-padding-small w3-margin-bottom w3-margin-left w3-right" onclick="Reset('#mySearch');">
        <i class="fa fa-times"></i>
    </button>
    <input type="text" class="w3-bar-item w3-theme-l5 w3-border w3-border-theme w3-padding-small w3-right" id="keyword" name="keyword" placeholder="Username" />
</div>    
</form>
<!-- END SEARCH FORM -->

<!-- START DISPLAY DATA -->
<div id="data-content"></div>
<!-- END DISPLAY DATA -->

{literal}
<script>
$(document).ready(function(){
    Search();
    localStorage.removeItem('id');
});

/* Search Data */
function Search(page = "1"){
    var search = $('#mySearch').serialize();
    {/literal}
    $('#data-content').load(GoAjax('{$system_id}','{$module_id}','{$action_id}','LoadUserSearch')+'&page='+page+'&'+search);
    {literal}
}

/* Change Data */
function Change(id){
    localStorage.setItem('id', id);
    {/literal}
    GoMenu('{$system_id}','{$module_id}','{$action_id}','LoadUserForm');
    {literal}
}
    
/* Delete Data */
function confirmDeletion(params){
	if(confirm("Are you sure to delete this user?")) 
	{
		Delete(params);
	}
}

function Delete(params){
	var data = "id="+params;
    {/literal}
	var url = GoAjax('{$module_id}','{$module_id}','{$action_id}','DeleteUser');
    {literal}
	$.post(url, data, function(res){
		alert(res.msg);
        Search();
//		window.location.reload();
	}, "JSON");
}
</script>
{/literal}