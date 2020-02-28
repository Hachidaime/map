<!-- Navbar -->
<div class="w3-bar w3-theme-d3" style="padding: 0px 16px;">
    {foreach from=$module key=k item=v}
    <div class="w3-dropdown-hover">
        <a href="javascript:void(0)" class="menu-item {if $module_id eq $k}active w3-theme-dark{else}w3-theme-d3{/if} w3-hover-theme-dark w3-hide-medium w3-hide-small" onclick="Dropdown('Demo-{$k}')">
            {$v.name} <i class="fas fa-caret-down"></i>
        </a>
        <div id="Demo-{$k}" class="w3-dropdown-content w3-bar-block w3-card-4" style="margin-top: 38px;">
            {foreach from=$action[$k] key=i item=s}
            <a href="javascript:void(0);" onclick="GoMenu('{$v.system_id}', '{$k}', '{$s.id}');" class="myDropdown w3-theme-d3 w3-hover-theme-dark w3-bar-item w3-button">{$s.name}</a>
            {/foreach}
        </div>
    </div>
    {/foreach}
    <a href="javascript:void(0)" class="w3-button w3-bar-item w3-button w3-right w3-hide-large w3-hover-theme-d5" onclick="myCollapse()">&#9776;</a>
    <div class="w3-dropdown-hover w3-right w3-theme-d3 w3-hide-medium w3-hide-small">
        <a href="javascript:void(0)" class="menu-item w3-theme-d3 w3-hover-theme-dark" onclick="Dropdown('Demo-User')">
            <i class="fas fa-user-circle"></i>
        </a>
        <div id="Demo-User" class="w3-dropdown-content w3-bar-block w3-card-4" style="margin-top: 38px; right: 0;">
            <a href="javascript:void(0);" onclick="UserLogout();" class="myDropdown w3-theme-d3 w3-hover-theme-dark w3-bar-item w3-button">Keluar</a>
        </div>
    </div>
    <div class="w3-dropdown-hover w3-right w3-theme-d3 w3-hide-medium w3-hide-small">
        <a href="javascript:void(0)" class="menu-item w3-theme-d3 w3-hover-theme-dark" onclick="Dropdown('Demo-System')">
            <i class="fas fa-map-marker-alt"></i>
        </a>
        <div id="Demo-System" class="w3-dropdown-content w3-bar-block w3-card-4" style="margin-top: 38px; right: 0;">
            {foreach from=$system key=k item=v}
            <a href="javascript:void(0);" onclick="GoMenu('{$k}', '', '', '');" class="myDropdown w3-theme-d3 w3-hover-theme-dark w3-bar-item w3-button">{$v.name}</a>
            {/foreach}
        </div>
    </div>
    
    <div class="w3-dropdown-click w3-right w3-theme-d3 w3-hide-large">
        <a href="javascript:void(0)" class="menu-item w3-theme-d3 w3-hover-theme-dark" onclick="Dropdown('Demo-User2')">
            <i class="fas fa-user-circle"></i>
        </a>
        <div id="Demo-User2" class="w3-dropdown-content w3-bar-block w3-card-4" style="margin-top: 38px; right: 0;">
            <a href="javascript:void(0);" onclick="UserLogout();" class="w3-theme-d3 w3-hover-theme-dark w3-bar-item w3-button">Keluar</a>
        </div>
    </div>
    <div class="w3-dropdown-click w3-right w3-theme-d3 w3-hide-large">
        <a href="javascript:void(0)" class="menu-item w3-theme-d3 w3-hover-theme-dark" onclick="Dropdown('Demo-System2')">
            <i class="fas fa-map-marker-alt"></i>
        </a>
        <div id="Demo-System2" class="w3-dropdown-content w3-bar-block w3-card-4" style="margin-top: 38px; right: 0;">
            {foreach from=$system key=k item=v}
            <a href="javascript:void(0);" onclick="GoMenu('{$k}', '', '', '');" class="w3-theme-d3 w3-hover-theme-dark w3-bar-item w3-button">{$v.name}</a>
            {/foreach}
        </div>
    </div>
</div>

<div id="collapsed" class="w3-bar-block w3-theme-d3 w3-hide w3-hide-large">
    {foreach from=$module key=k item=v}
    <div class="w3-dropdown-click">
        <a href="javascript:void(0)" class="w3-button w3-bar w3-theme-d3 w3-hover-theme-dark" onclick="Dropdown('Demo2-{$k}')">
            {$v.name} <i class="fas fa-caret-down"></i>
        </a>
        <div id="Demo2-{$k}" class="w3-dropdown-content w3-bar-block w3-card-4">
            {foreach from=$action[$k] key=i item=s}
            <a href="javascript:void(0);" onclick="GoMenu('{$v.system_id}', '{$k}', '{$s.id}');" class="w3-theme-d1 w3-hover-theme-dark w3-bar-item w3-button">{$s.name}</a>
            {/foreach}
        </div>
    </div>
    {/foreach}
</div>
<!-- Navbar -->

