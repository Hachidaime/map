<div class="w3-row">
    <div class="w3-col l3 m3 s6">
        <div class="w3-left w3-margin-bottom">
            {if $page ne 1}
            <button type="button" class="btn-page{$custom} w3-button w3-hover-theme-d1 w3-white w3-text-theme-d1 w3-border-theme-d1 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-small" style="width:50px;" data-page="1"><i class="fas fa-angle-double-left"></i></button>
            <button type="button" class="btn-page{$custom} w3-button w3-hover-theme-d1 w3-white w3-text-theme-d1 w3-border-theme-d1 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-small" style="width:50px;" data-page="{$previous}"><i class="fas fa-angle-left"></i></button>
            {else}
            &nbsp;
            {/if}
        </div>
    </div>
    <div class="w3-col l6 m6 w3-hide-small">
        <div class="w3-center w3-margin-bottom">
            {for $foo=$snum to $enum}
            <button type="button" class="btn-page{$custom} w3-button w3-hover-theme-d1 {if $page eq $foo}w3-theme-d1 w3-text-white w3-disabled{else}w3-white w3-text-theme-d1{/if} w3-border-theme-d1 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-small" style="width:50px;" data-page="{$foo}">{$foo}</button>
            {/for}
        </div>
    </div>
    <div class="w3-col l3 m3 s6">
        <div class="w3-right w3-margin-bottom">
            {if $page ne $total_page && $total_page > 1}
            <button type="button" class="btn-page{$custom} w3-button w3-hover-theme-d1 w3-white w3-text-theme-d1 w3-border-theme-d1 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-small" style="width:50px;" data-page="{$next}"><i class="fas fa-angle-right"></i></button>
            <button type="button" class="btn-page{$custom} w3-button w3-hover-theme-d1 w3-white w3-text-theme-d1 w3-border-theme-d1 w3-border w3-ripple w3-round-xxlarge w3-padding-small w3-small" style="width:50px;" data-page="{$total_page}"><i class="fas fa-angle-double-right"></i></button>
            {else}
            &nbsp;
            {/if}
        </div>
    </div>
</div>

{literal}
<script>
$(document).ready(function(){
    $('.btn-page{/literal}{$custom}{literal}').on('click', function(){
        {/literal}
        Search{$custom}($(this).attr('data-page'));
        {literal}
    });
});
</script>
{/literal}