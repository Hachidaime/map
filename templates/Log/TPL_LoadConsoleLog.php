{$title}
<!-- START SEARCH FORM -->
<form id="mySearch">
<div class="w3-bar w3-margin-bottom">
    <button type="button" class="w3-bar-item w3-button w3-hover-theme-d2 w3-white w3-text-theme-d2 w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-small w3-padding-small w3-margin-bottom w3-margin-left w3-right" onclick="Search();">
        <i class="fa fa-search"></i>
    </button>
    <button type="button" class="w3-bar-item w3-button w3-hover-red w3-white w3-text-red w3-border-red w3-border w3-ripple w3-round-xxlarge w3-small w3-padding-small w3-margin-bottom w3-margin-left w3-right" onclick="Reset('#mySearch');">
        <i class="fa fa-times"></i>
    </button>
    <input class="w3-bar-item w3-theme-l5 w3-border w3-border-theme w3-padding-small w3-right w3-margin-left datepicker" name="date" id="date" type="text" placeholder="Date" readonly />
    <input type="text" class="w3-bar-item w3-theme-l5 w3-border w3-border-theme w3-padding-small w3-right" id="keyword" name="keyword" placeholder="Tag/Log Message" />
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
    $('#data-content').load(GoAjax('{$system_id}','{$module_id}','{$action_id}','LoadConsoleLogSearch')+'&page='+page+'&'+search);
    {literal}
}
</script>
{/literal}