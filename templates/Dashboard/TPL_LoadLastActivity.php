<div class="w3-card">
    <header class="w3-container w3-theme">{$title}</header>
    <div class="w3-container w3-padding">
        <table class="w3-table-all w3-small">
            <thead>
                <tr class="w3-theme-l1">
                    <th>Activity</th>
                    <th>Datetime</th>
                </tr>
            </thead>
            <tbody>
                {section name=outer loop=$list}
                <tr>
                    <td>{$list[outer].log_message}</td>
                    <td>{$list[outer].update_dt|date_format: $smarty.const.SMARTY_DATETIME_FORMAT}</td>
                </tr>
                {/section}
            </tbody>
        </table>
    </div>
</div>