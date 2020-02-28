<table class="w3-table w3-tiny w3-border w3-border-black">
<thead class="w3-theme-l4">
	<tr class="w3-border-bottom w3-border-black">
		<th class="w3-padding-small w3-center w3-display-container" rowspan="3" width="3%"><span class="w3-display-middle">No</span></th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center w3-display-container" rowspan="3" width="3%"><span class="w3-display-middle">No<br>Ruas</span></th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center w3-display-container" rowspan="3" width="*"><span class="w3-display-middle">Nama Ruas</span></th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center w3-display-container" rowspan="3" width="6%"><span class="w3-display-middle">Kecamatan<br />yang<br />dilalui</span></th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center w3-display-container" rowspan="3" width="4%"><span class="w3-display-middle">Panjang<br>Ruas<br>(km)</span></th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center w3-display-container" rowspan="3" width="4%"><span class="w3-display-middle">Lebar<br>(m)</span></th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center" colspan="4">Panjang Tiap Jenis Permukaan (km)</th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center" colspan="8">Panjang Tiap Kondisi (km)</th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center w3-display-container" rowspan="3" width="3%"><span class="w3-display-middle">LHR</span></th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center w3-display-container" rowspan="3" width="4%"><span class="w3-display-middle">AKSES<br>KE<br>N/P/K</span></th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center w3-display-container" rowspan="3"  width="6%"><span class="w3-display-middle">Keterangan</span></th>
	</tr>
	<tr class="w3-border-bottom w3-border-black">
		<th class="w3-padding-small w3-border-left w3-border-black w3-center w3-display-container" rowspan="2"  width="5%"><span class="">Aspal/<br>Penetrasi/<br>Macadam</span></th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center w3-display-container" rowspan="2" width="6%"><span class="w3-display-middle">Perkerasan<br>Beton</span></th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center w3-display-container" rowspan="2" width="4%"><span class="w3-display-middle">Telford/<br>Kerikil</span></th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center w3-display-container" rowspan="2" width="4%"><span class="w3-display-middle">Tanah/<br>Belum<br>Tembus</span></th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center w3-display-container" colspan="2"><span class="w3-display-middle">Baik</span></th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center w3-display-container" colspan="2"><span class="w3-display-middle">Sedang</span></th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center w3-display-container" colspan="2"><span class="">Rusak Ringan</span></th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center w3-display-container" colspan="2"><span class="w3-display-middle">Rusak Berat</span></th>
	</tr>
	<tr class="w3-border-bottom w3-border-black">
		<th class="w3-padding-small w3-border-left w3-border-black w3-center" width="3%">km</th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center" width="3%">%</th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center" width="3%">km</th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center" width="3%">%</th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center" width="3%">km</th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center" width="3%">%</th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center" width="3%">km</th>
		<th class="w3-padding-small w3-border-left w3-border-black w3-center" width="3%">%</th>
	</tr>
	<tr class="w3-border-bottom w3-border-black">
		<th class="w3-padding-small w3-center">1</th>
	{for $n=2 to 21}
		<th class="w3-padding-small w3-border-left w3-border-black w3-center">{$n}</th>
	{/for}
	</tr>
</thead>
<tbody>
    {foreach from=$list key=j item=jalan}
    <tr class="w3-border-bottom w3-border-black">
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">{$kepemilikan_opt[$j]}</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
    </tr>
    {foreach from=$jalan key=k item=v}
    <tr class="w3-border-bottom w3-border-black">
        <td class="w3-padding-small w3-border-left w3-border-black w3-right-align">{$k+1}</td>
        <td class="w3-padding-small w3-border-left w3-border-black">{$v.no_jalan}</td>
        <td class="w3-padding-small w3-border-left w3-border-black">{$v.nama_jalan}</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black w3-right-align" id="panjang-{$v.id}">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black w3-right-align">{$v.lebar}</td>
        {foreach from=$perkerasan_opt key=a item=b}
        <td class="w3-padding-small w3-border-left w3-border-black w3-right-align" id="perkerasan-{$a}-{$v.id}">&nbsp;</td>
        {/foreach}
        {foreach from=$kondisi_opt key=a item=b}
        <td class="w3-padding-small w3-border-left w3-border-black w3-right-align" id="kondisi-{$a}-{$v.id}">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black w3-right-align" id="kondisi-persen-{$a}-{$v.id}">&nbsp;</td>
        {/foreach}
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
        <td class="w3-padding-small w3-border-left w3-border-black">&nbsp;</td>
    </tr>
    {/foreach}
    {/foreach}
</tbody>
</table>