{literal}
<style>
.map-icon-label i {
    font-size: 10px;
    color: #FFFFFF;
    line-height: 30px;
    text-align: center;
    white-space: nowrap;
}
</style>
<script>
var center = null;
var map = null;
var currentPopup;
var bounds = new google.maps.LatLngBounds();

function initMap() {
	map = new google.maps.Map(document.getElementById("map_canvas"), {
		//bagian paling penting dari map. bagian ini menampilkan posisi yang diinginkan. ubah nilai tersebut jika ingin         
		//mengganti peta yang akan ditampilkan
		//latitude dan longitude dapat ditemukan di google map.
		center: new google.maps.LatLng(-7.3879046, 109.3633768),
        gestureHandling: 'greedy',
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
        },
		navigationControl: true,
		navigationControlOptions: {
			style: google.maps.NavigationControlStyle.SMALL
		}
	});
//Panggil Marker

	center = bounds.getCenter();
}

function addMarkerJembatan(lat, lng, color = '#000000', simbol, info) {
    // gambar ikon penanda [marker] bisa diganti sendiri, sesuai keinginan. ckup modifikasi linknya!
//		var icon = new google.maps.MarkerImage(symbol,
//		new google.maps.Size(35, 35), new google.maps.Point(0, 0),
//		new google.maps.Point(16, 32));

    var pt = new google.maps.LatLng(lat, lng);
    bounds.extend(pt);

    var marker = new Marker({
        map: map,
        position: pt,
        icon: {
            path: MAP_PIN,
            scale: 0.5,
            fillColor: color,
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        },
        map_icon_label: '<i class="fas fa-'+simbol+'"></i>'
    });

    var popup = new google.maps.InfoWindow({
        content: info
        //maxWidth: 300
    });

    google.maps.event.addListener(marker, "click", function() {
        if (currentPopup != null) {
            currentPopup.close();
            currentPopup = null;
        }
        popup.open(map, marker);
        currentPopup = popup;
    });

    //supaya pada saat close pupup, tetap di halaman yang sama
    google.maps.event.addListener(popup, "closeclick", function() {
        // map.panTo(center);
        currentPopup = null;
    });
}

function addMarker(lat, lng, color = '#000000', info) {
    // gambar ikon penanda [marker] bisa diganti sendiri, sesuai keinginan. ckup modifikasi linknya!
//		var icon = new google.maps.MarkerImage(symbol,
//		new google.maps.Size(35, 35), new google.maps.Point(0, 0),
//		new google.maps.Point(16, 32));

    var pt = new google.maps.LatLng(lat, lng);
    bounds.extend(pt);

    var marker = new Marker({
        map: map,
        position: pt,
        icon: {
            path: google.maps.SymbolPath.CIRCLE,
            scale: 5,
            fillColor: color,
            fillOpacity: 1,
            strokeColor: '',
            strokeWeight: 0
        }
    });

    var popup = new google.maps.InfoWindow({
        content: info
        //maxWidth: 300
    });
    
    google.maps.event.addListener(marker, "click", function() {
        
        if (currentPopup != null) {
            currentPopup.close();
            currentPopup = null;
        }
        popup.open(map, marker);
        currentPopup = popup;
    });

    //supaya pada saat close pupup, tetap di halaman yang sama
    google.maps.event.addListener(popup, "closeclick", function() {
        // map.panTo(center);
        currentPopup = null;
    });
}

function showTooltip(lat, lng, symbol, info){
    
}
</script>
{/literal}
<div class="w3-dropdown-click w3-hover-theme-l5">
    <button onclick="Dropdown('kriteria')" type="button" class="w3-button w3-hover-white w3-hover-text-theme-d2 w3-theme-d2 w3-text-white w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-padding-small" style="width: 150px;"><i class="fas fa-search-location"></i> Kriteria</button>
    <div id="kriteria" class="w3-dropdown-content w3-card-4" style="width:250px">
        <div class="w3-container w3-padding-small w3-theme-l5">
            <form id="myForm">
                <div class="w3-margin-bottom">
                    <label for="sts_kepemilikan">Status Kepemilikan</label>
                    <select class="w3-input w3-theme-l5 w3-border w3-border-theme w3-padding-small  w3-focus-border-blue" name="sts_kepemilikan" onchange="getRuasJalan(this.value);">
                        <option value="0">&nbsp;</option>
                        {html_options options=$kepemilikan_options2}
                        <option value="99">Semua</option>
                    </select>
                </div>
                <div class="w3-margin-bottom">
                    <label for="id_jalan">Ruas Jalan</label>
                    <select class="w3-input w3-theme-l5 w3-border w3-border-theme w3-padding-small  w3-focus-border-blue" name="id_jalan" onfocus='this.size=10;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                        <option value="0">&nbsp;</option>
                    </select>					
                </div>
                <div class="">
                    <input class="w3-check" type="checkbox" name="cari_jalan_provinsi" value="1">&nbsp;<label>Jalan Provinsi</label>
                </div>
                <div class="">
                    <input class="w3-check" type="checkbox" name="cari_perkerasan" value="1">&nbsp;<label>Tipe Perkerasan</label>
                </div>
                <div class="">
                    <input class="w3-check" type="checkbox" name="cari_kondisi" value="1">&nbsp;<label>Kondisi</label>
                </div>
                <div class="w3-margin-bottom">
                    <input class="w3-check" type="checkbox" name="cari_jembatan" value="1">&nbsp;<label>Jembatan</label>
                </div>
                {*
                <div class="">
                    <input class="w3-check" type="checkbox" name="saluran_air" value="1">&nbsp;<label>Saluran Air</label>
                </div>
                <div class="w3-margin-bottom">
                    <input class="w3-check" type="checkbox" name="gorong" value="1">&nbsp;<label>Gorong-Gorong</label>
                </div>
                *}
                <button type="button" class="w3-button w3-hover-white w3-hover-text-theme-d2 w3-theme-d2 w3-text-white w3-border-theme-d2 w3-border w3-ripple w3-round-xxlarge w3-padding-small" style="width: 150px;" onclick="cariKriteria();">Submit</button>
            </form>
            <br>
            <div class="summary" style="display:none">
                <legend>Summary</legend>
                <div>Total Panjang Jalan: <span id="total-panjang" class="pull-right"></span></div>
                <div id="panjang-beton-wrapper" style="display:none">Total Panjang Jalan Beton: <span id="total-panjang-beton" class="pull-right"></span></div>
                <div id="panjang-aspal-wrapper" style="display:none">Total Panjang Jalan Aspal: <span id="total-panjang-aspal" class="pull-right"></span></div>
                <div id="jembatan-wrapper" style="display:none">Total Jembatan: <span id="total-jembatan" class="pull-right"></span></div>
                {*
                <div id="panjang-saluran-air-wrapper" style="display:none">Total Panjang Saluran Air: <span id="total-panjang-saluran-air" class="pull-right"></span></div>
                <div id="gorong-wrapper" style="display:none">Total Gorong-Gorong: <span id="total-gorong" class="pull-right"></span></div>
                *}
            </div>
        </div>
    </div>
</div>
	
<div class="map-bg">
    <div class="kotakpeta">
        <div id="map_canvas"></div>
    </div>
</div>
{literal}
<script>
initMap();
function getRuasJalan(sts_kepemilikan){
	var url = GoAjax('Dashboard', 'getRuasJalan');
	var data = "sts_kepemilikan="+sts_kepemilikan;
	
    $.post(url, data, function(reply){
//        console.log(reply);
        $("select[name='id_jalan'] option[value!='0']").remove();
        if(Object.keys(reply).length){
            $.each(reply,function(key, value) {
//                console.log(value.id);
                $('select[name="id_jalan"]').append('<option value=' + value.id + '>' + value.no_jalan + ' - ' + value.nama_jalan + '</option>');
            });
            $('select[name="id_jalan"]').append('<option value="999">Semua</option>');
        }
    }, "json");
}

function cariKriteria(){
	var url = GoAjax('Dashboard', 'Search');
	var data = $('#myForm').serialize();
	
	var sts_kepemilikan = $('select[name="sts_kepemilikan"]').val();
	var id_jalan = $('select[name="id_jalan"]').val();
	
	var cari_jembatan = $('input[name="cari_jembatan"]').is(":checked");
    var cari_perkerasan = $('input[name="cari_perkerasan"]').is(":checked");
    var cari_kondisi = $('input[name="cari_kondisi"]').is(":checked");
	// console.log(sts_kepemilikan);
	if(sts_kepemilikan > 0){
		if(id_jalan > 0){
			$.post(url, data, function(reply){
                var jalan = reply.jalan;
                var zoom = 15;
                
                /* insiasi awal map */
                map = new google.maps.Map(document.getElementById("map_canvas"), {
                    //bagian paling penting dari map. bagian ini menampilkan posisi yang diinginkan. ubah nilai tersebut jika ingin         
                    //mengganti peta yang akan ditampilkan
                    //latitude dan longitude dapat ditemukan di google map.
                    center: new google.maps.LatLng(-7.3879046, 109.3633768),
                    gestureHandling: 'greedy',
                    zoom: zoom,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: true,
                    mapTypeControlOptions: {
                        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
                    },
                    navigationControl: true,
                    navigationControlOptions: {
                        style: google.maps.NavigationControlStyle.SMALL
                    }
                });
                
//                console.log(jalan);
                
//                $.each(reply.jalan, function(kepemilikan_id, jalan){
                    $.each(reply.jalan, function(id_jalan, segment){
//                        console.log(segment);
                        var lat, lng, warna;
                        $.each(segment, function(key, item){
                            var road = [];
                            var n = 1;
//                            console.log(item);
                            $.each(item.koordinat, function(idx, row){
                                if(idx == 0){
                                    addMarker(row.latitude, row.longitude, item.warna, row.info);
                                }
                                if(row.gen200 == 'Y'){
                                    addMarker(row.latitude, row.longitude, item.warna, row.info);
                                    n++;
                                }
                                road.push(new google.maps.LatLng(row.latitude, row.longitude));
                                lat = row.latitude;
                                lng = row.longitude;
                                info = row.info;
                            });
                            console.log(road);
                            var roadPrimer = new google.maps.Polyline({
                                path: road,
                                strokeColor: item.warna,
                                strokeOpacity : item.opacity,
                                strokeWeight: item.width
                            });

                            var meters = google.maps.geometry.spherical.computeLength(roadPrimer.getPath());
        //                    console.log(meters);

                            roadPrimer.setMap(map);
                            warna = item.warna;
                        });
                        
                        addMarker(lat, lng, warna, info);
                    });
//                });
                
                if(cari_jembatan > 0){
                    $.each(reply.jembatan, function(idx, item){
                        addMarkerJembatan(item.latitude, item.longitude, item.warna, "bookmark", item.info);
                    });
                }
            }, "json");
		}
		else{
			alert("Silahkan pilih Ruas Jalan.");
		}
	}
	else{
		alert("Silahkan pilih Status Kepemilikan.");
	}
}

</script>
{/literal}