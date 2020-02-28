{section name=a loop=$data}
<div class="w3-row" id="{$data[a].id}-wrapper">
    <div class="w3-col m5 w3-display-container">
        <label class="w3-left w3-margin-right w3-padding-small">{$data[a].label}{if $data[a].required eq 1}<sup><i class="w3-text-red fa fa-asterisk"></i></sup>{/if}
        </label>
        <span class="w3-right w3-padding-small w3-display-topright w3-hide-small">:</span>
        {*
        *}
    </div>
    <div class="w3-col m7 w3-margin-bottom">
{if $data[a].type eq 'text'}
        <input class="w3-input w3-white w3-border w3-border-theme w3-padding-small " name="{$data[a].name}" id="{$data[a].id}" type="text" />
{elseif $data[a].type eq 'password'}
        <input class="w3-input w3-white w3-border w3-border-theme w3-padding-small " name="{$data[a].name}" id="{$data[a].id}" type="password" />
{elseif $data[a].type eq 'static'}
        <input class="w3-input w3-white w3-border w3-border-theme w3-padding-small " name="{$data[a].name}" id="{$data[a].id}" type="text" readonly />
{elseif $data[a].type eq 'textarea'}
        <textarea class="w3-input w3-white w3-border w3-border-theme w3-padding-small " name="{$data[a].name}" id="{$data[a].id}" rows="4" style="resize:none;"></textarea>
{elseif $data[a].type eq 'select'}
        <select class="w3-input w3-white w3-border w3-border-theme w3-padding-small  w3-focus-border-blue" name="{$data[a].name}" id="{$data[a].id}">
        <option value="0">&nbsp;</option>
        {html_options options=$data[a].options}
        </select>
{elseif $data[a].type eq 'date'}
        <input class="w3-input w3-white w3-border w3-border-theme w3-padding-small  datepicker" name="{$data[a].name}" id="{$data[a].id}" type="text" readonly />
{elseif $data[a].type eq 'image'}
        <input type="hidden" name="{$data[a].name}" id="{$data[a].id}" />
		<div id="upload-{$data[a].id}"></div>
		<div class="{$data[a].id}-container"></div>
        <script>
        UploadMyFile("image/*", '{$data[a].id}', '{$data[a].name}', true);
        </script>
{elseif $data[a].type eq 'video'}
        <input type="hidden" name="{$data[a].name}" />
		<div id="upload-{$data[a].id}"></div>
		<div class="{$data[a].id}-container"></div>
        <script>
        UploadMyFile("video/*", '{$data[a].id}', '{$data[a].name}', false);
        </script>
{elseif $data[a].type eq 'document'}
        <input type="hidden" name="{$data[a].name}" />
		<div id="upload-{$data[a].id}"></div>
		<div class="{$data[a].id}-container"></div>
        <script>
        UploadMyFile(".pdf", '{$data[a].id}', '{$data[a].name}', false);
        </script>
{elseif $data[a].type eq 'coordinate'}
        <div class="w3-row">
            <div class="w3-col l6 m12 w3-padding-small">
                <input type="hidden" name="{$data[a].name}" />
                <div id="upload-{$data[a].id}-arcgis"></div>
                <div class="{$data[a].id}-arcgis-container"></div>
            </div>
            <div class="w3-col l6 m12 w3-padding-small">
                <input type="hidden" name="{$data[a].name}" />
                <div id="upload-{$data[a].id}-tracker"></div>
                <div class="{$data[a].id}-tracker-container"></div>
            </div>
        </div>
        <script>
        /* Upload Cooroinate from ArcGIS */
        UploadCoordinate('ArcGIS', '{$data[a].id}', '{$data[a].id}', '{$system_id},{$module_id},{$action_id}');
        
        /* Upload Cooroinate from GPS Tracker */
        UploadCoordinate('Tracker', '{$data[a].id}', '{$data[a].id}', '{$system_id},{$module_id},{$action_id}');
        </script>
{elseif $data[a].type eq 'color'}
        <input class="w3-input w3-white w3-border w3-border-theme w3-padding-small  colorpicker" name="{$data[a].name}" id="{$data[a].id}" type="text" readonly />
{elseif $data[a].type eq 'slider'}
        <div class="slider" style="margin: 7px 10px;">
              <div class="ui-slider-handle custom-handle"></div>
        </div>
        <input type="hidden" class="slider-value" name="{$data[a].name}" id="{$data[a].id}" />
{/if}
    </div>
</div>
{/section}