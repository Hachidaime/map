<div class="w3-row">
    <div class="w3-col l4 m6 w3-padding-small" id="last-activity-content"></div>
    <div class="w3-col l4 m6 w3-padding-small"></div>
    <div class="w3-col l4 m6 w3-padding-small"></div>
</div>

{literal}
<script>
$(document).ready(function(){
    lastactivity();
    setInterval(function() {
        lastactivity();
    }, 60 * 1000); // 60 * 1000 milsec
});

function lastactivity(){
    var url = 'ajax.php?role=lastactivity';
    {/literal}
    $('#last-activity-content').load(url);
    {literal}
}
</script>
{/literal}