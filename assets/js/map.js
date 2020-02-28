var center = null;
var currentPopup;
var bounds = new google.maps.LatLngBounds();

/*Inisiasi Map (menampilkan map pada layar)*/
function initMap() {
	map = new google.maps.Map(document.getElementById("map_canvas"), {
		center: new google.maps.LatLng(DEFAULT_LATITUDE, DEFAULT_LONGITUDE),
        gestureHandling: 'greedy',
        zoom: 15,
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
	center = bounds.getCenter();
    return map;
}

/*Inisisasi Marker*/
function initMarker(coordinate, color, info, markertype, icon ){
    var point = new google.maps.LatLng(lat, lng);
    bounds.extend(point);
    
    var markersymbol;
    var scale;
    var strokeWeight;
    
    if (markertype < 3){
        switch (markertype){
            case 0: // Segment
                markersymbol = google.maps.SymbolPath.CIRCLE;
                break;
            case 1: // Awal Ruas Jalan
                markersymbol = 'M -1.5,1 1.5,1 0,-1.5 z';
                break;
            case 2: // Akhir Ruas Jalan
                markersymbol = 'M -1.5,0 0,-1.5 1.5,0 0,1.5 z';
                break;
        }
        scale = 5;
        strokeWeight = 2
    }
    else{
        // Jembatan
        markersymbol = MAP_PIN;
        scale = 0.5;
        strokeWeight = 0;
    }
    
    var myIcon = (icon != null) ? '<i class="fas fa-'+icon+'"></i>' : '';
    
    var marker = new Marker({
        map: map,
        position: pt,
        icon: {
            path: markersymbol,
            scale: scale,
            fillColor: color.fill,
            fillOpacity: 1,
            strokeColor: color.stroke,
            strokeWeight: strokeWeight
        },
        map_icon_label: myIcon
    });
    
    var popup = new google.maps.InfoWindow({
        content: info
    });
    
    google.maps.event.addListener(marker, "click", function() {
        if (currentPopup != null) {
            currentPopup.close();
            currentPopup = null;
        }
        popup.open(map, marker);
        currentPopup = popup;
    });

    google.maps.event.addListener(popup, "closeclick", function() {
        currentPopup = null;
    });
}

/*Menampilkan Line pada Map*/
function DrawLine(koordinat, width, color = '#000'){
    var road = [];
    
    $.each(koordinat, function(i, r){
        var point = r.split(",");
        road.push(new google.maps.LatLng(point[0], point[1])); 
    });
    
    var roadPrimer = new google.maps.Polyline({
        path: road,
        strokeColor: color,
//        strokeOpacity : item.opacity,
        strokeWeight: width
    });
    
    roadPrimer.setMap(map);
}