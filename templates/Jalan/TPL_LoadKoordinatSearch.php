<div class="w3-row w3-border-bottom w3-border-theme">
    <div class="w3-col l1 w3-center w3-hide-small w3-hide-medium">#</div>
    <div class="w3-col l1 w3-center w3-hide-small w3-hide-medium">Latitude</div>
    <div class="w3-col l1 w3-center w3-hide-small w3-hide-medium">Longitude</div>
    <div class="w3-col l1 w3-center w3-hide-small w3-hide-medium">Lebar (m)</div>
    <div class="w3-col l2 w3-center w3-hide-small w3-hide-medium">Tipe Perkerasan</div>
    <div class="w3-col l1 w3-center w3-hide-small w3-hide-medium">Kondisi</div>
    <div class="w3-col l2 w3-center w3-hide-small w3-hide-medium">Foto</div>
    <div class="w3-col l1 w3-center w3-hide-small w3-hide-medium">@segment</div>
    <div class="w3-col l1 w3-center w3-hide-small w3-hide-medium">IRI</div>
    <div class="w3-col l1 w3-center">
        <button type="button" class="w3-btn w3-text-highway-green w3-small w3-padding-small" onclick="AddCoordinate();" style="display:none;" id="btn-add-coord"><i class="fas fa-plus"></i></button>
    </div>
</div>
{foreach from=$list key=k item=v}
<div class="w3-row w3-small w3-hover-theme-d1 {if $v.new > 0}w3-yellow{elseif $v.segment > 0}w3-pink{else}{cycle values='w3-theme-l4,w3-theme-l5'}{/if}" id="row-{$k}">
    <input type="hidden" class="coordinate-{$k}" name="latitude" value="{$v.latitude}" id="">
    <input type="hidden" class="coordinate-{$k}" name="longitude" value="{$v.longitude}">
    <input type="hidden" class="coordinate-{$k}" name="lebar" value="{$v.lebar}">
    <input type="hidden" class="coordinate-{$k}" name="perkerasan" value="{$v.perkerasan}">
    <input type="hidden" class="coordinate-{$k}" name="kondisi" value="{$v.kondisi}">
    <input type="hidden" class="coordinate-{$k}" name="iri" value="{$v.iri}">
    <input type="hidden" class="coordinate-{$k}" name="segment" value="{$v.segment}">
    
    <div class="w3-col l1 text-coordinate-{$k} w3-padding-small">
        <div class="w3-row">
            <div class="w3-col m6 s6 w3-hide-large">#</div>
            <div class="w3-col m6 s6 w3-right-align"><span id="text-latitude-{$k}">{$k + 1}</span></div>
        </div>
    </div>
    <div class="w3-col l1 text-coordinate-{$k} w3-padding-small">
        <div class="w3-row">
            <div class="w3-col m6 s6 w3-hide-large">Latitude</div>
            <div class="w3-col m6 s6 w3-right-align"><span id="text-latitude-{$k}">{$v.latitude}</span></div>
        </div>
    </div>
    <div class="w3-col l1 text-coordinate-{$k} w3-padding-small">
        <div class="w3-row">
            <div class="w3-col m6 s6 w3-hide-large">Longitude</div>
            <div class="w3-col m6 s6 w3-right-align"><span id="text-longitude-{$k}">{$v.longitude}</span></div>
        </div>
    </div>
    <div class="w3-col l1 text-coordinate-{$k} w3-padding-small">
        <div class="w3-row">
            <div class="w3-col m6 s6 w3-hide-large">Lebar (m)</div>
            <div class="w3-col m6 s6 w3-right-align"><span id="text-lebar-{$k}">{if $v.lebar > 0 }{$v.lebar|default:'&nbsp;'}{else}&nbsp;{/if}</span></div>
        </div>
    </div>
    <div class="w3-col l2 text-coordinate-{$k} w3-padding-small">
        <div class="w3-row">
            <div class="w3-col m6 s6 w3-hide-large">Perkerasan</div>
            <div class="w3-col m6 s6"><span id="text-perkerasan-{$k}">{$perkerasan_opt[$v.perkerasan]|default:'&nbsp;'}</span></div>
        </div>
    </div>
    <div class="w3-col l1 text-coordinate-{$k} w3-padding-small">
        <div class="w3-row">
            <div class="w3-col m6 s6 w3-hide-large">Kondisi</div>
            <div class="w3-col m6 s6"><span id="text-kondisi-{$k}">{$kondisi_opt[$v.kondisi]|default:'&nbsp;'}</span></div>
        </div>
    </div>
    <div class="w3-col l2 text-coordinate-{$k} w3-padding-small">
        <div class="w3-row">
            <div class="w3-col m6 s6 w3-hide-large">Foto</div>
            <div class="w3-col m6 s6">
                {if $v.path ne ''}
                <div class="w3-padding">
                    <img src="../upload/{$v.path}" style="width:100%;cursor:pointer" onclick="openModal();currentDiv(1)" class="w3-hover-shadow">
                </div>
                {else}
                &nbsp;
                {/if}  
            </div>
        </div>
    </div>
    <div class="w3-col l1 text-coordinate-{$k} w3-padding-small">
        <div class="w3-row">
            <div class="w3-col m6 s6 w3-hide-large">@segment</div>
            <div class="w3-col m6 s6 w3-right-align"><span id="text-segment-{$k}">{if $v.segment > 0}{$v.segment|default:'&nbsp;'}{else}&nbsp;{/if}</span></div>
        </div>
    </div>
    <div class="w3-col l1 text-coordinate-{$k} w3-padding-small">
        <div class="w3-row">
            <div class="w3-col m6 s6 w3-hide-large">IRI</div>
            <div class="w3-col m6 s6"><span id="text-iri-{$k}">{if $v.iri > 0}{$v.iri|default:'&nbsp;'}{else}&nbsp;{/if}</span></div>
        </div>
    </div>
    <div class="w3-col l1">
        <button type="button" class="w3-btn w3-text-highway-yellow w3-small w3-padding-small" onclick="Change({$k});"><i class="far fa-edit"></i></button>
        <button type="button" class="w3-btn w3-text-highway-red w3-small w3-padding-small" onclick="RemoveCoordinate({$k})" data-id="{$k}"><i class="fas fa-minus"></i></button>
    </div>
</div>
{foreachelse}
<div class="w3-row w3-small w3-hover-theme-l3 w3-theme-l5">
    <div class="w3-col l12 w3-center">Data not found...</div>
</div>
{/foreach}

<div class="w3-margin-top">{$pager}</div>