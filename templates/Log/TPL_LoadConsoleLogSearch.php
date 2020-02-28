<div class="w3-margin-bottom">
    <table class="w3-table-all w3-small">
        <thead>
            <tr class="w3-theme-l1">
                <th width="50px" class="w3-right-align">#</th>
                <th width="20%">Tag</th>
                <th width="*">Log Message</th>
                <th width="10%">Username</th>
                <th width="20%">Datetime</th>
            </tr>
        </thead>
        <tbody>
            {section name=outer loop=$list}
            <tr>
                <td class="w3-right-align">{($page-1) * $smarty.const.PAGER_PER_PAGE_CONSOLE + $smarty.section.outer.index+1}</td>
                <td>{$list[outer].tag}</td>
                <td>{$list[outer].log_message}</td>
                <td>{$list[outer].username}</td>
                <td>{$list[outer].update_dt|date_format: $smarty.const.SMARTY_DATETIME_FORMAT}</td>
            </tr>
            {/section}      
        </tbody>
    </table>
</div>
{$pager}