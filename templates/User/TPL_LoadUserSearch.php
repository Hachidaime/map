{$title}

<div class="w3-margin-bottom">
    <table class="w3-table-all w3-small">
        <thead>
            <tr class="w3-theme-l1">
                <th width="50px" class="w3-right-align">#</th>
                <th width="20%">Username</th>
                <th width="*">User Group</th>
                <th width="10%">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {section name=outer loop=$list}
            <tr>
                <td class="w3-right-align">{($page-1) * $smarty.const.PAGER_PER_PAGE_CONSOLE + $smarty.section.outer.index+1}</td>
                <td>{$list[outer].username}</td>
                <td>{$list[outer].usergroup}</td>
                <td>
                    <div class="w3-dropdown-hover w3-right">
                        <button class="w3-button w3-hover-white w3-hover-text-theme-d2 w3-theme-d2 w3-text-white w3-border-theme-d2 w3-border w3-tiny w3-padding-small">
                            <i class="fas fa-caret-down"></i>
                        </button>
                        <div class="w3-dropdown-content w3-bar-block w3-border w3-border-theme-d2" style="right: 0;">
                            <button class="w3-bar-item w3-button w3-hover-theme-d2" onclick="Change({$list[outer].id});">Change</button>
                            {if $list[outer].id ne 1 || $list[outer].id ne $login_id}
                            <button class="w3-bar-item w3-button w3-hover-theme-d2" onclick="confirmDeletion({$list[outer].id})">Remove</button>
                            {/if}
                        </div>
                    </div>
                </td>
            </tr>
            {/section}      
        </tbody>
    </table>
</div>
{$pager}