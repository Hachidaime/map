$( function() {
    /*jQuery Date Picker*/
    $( ".datepicker" ).datepicker({
        dateFormat: 'dd/mm/yy'
    });
    
    /*jQuery Slider*/
    var handle = $( ".custom-handle" );
    $( ".slider" ).slider({
      create: function() {
        handle.text( $( this ).slider( "value" ) );
        $('.slider-value').val($( this ).slider( "value" ));  
      },
      slide: function( event, ui ) {
        handle.text( ui.value );
      }
    });
    
    /*Color Picker*/
    $('.colorpicker').colorpicker();
    
    /*Prevent Press Enter*/
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
    
    /*Dropdown Hover*/
    $('.myDropdown').on('mouseover', function(){
        var myParent = $(this).parent();
        var prevParent = myParent.prev();
        prevParent.removeClass('w3-theme-d3').addClass('w3-theme-dark');
    }).on('mouseout', function(){
        var myParent = $(this).parent();
        var prevParent = myParent.prev();
        if(!prevParent.hasClass('active')){
            prevParent.removeClass('w3-theme-dark').addClass('w3-theme-d3');
        }
    });
} );

/*User Logout*/
function UserLogout(){
	var url = 'ajax.php?role=logout';
	var data = "";
	
	$.ajax({
		url : url,
		type : "POST",
		dataType : "json",
		data : data,
		success : function(reply){
            console.log(reply);
			if(reply.result > 0){
				alert("Logout Success");
				window.location.href = '';
			}
			else{
				alert("Logout Failed");
			}
		}
	});
}

/*Go Top Page*/
function GoTop(){
    $("html, body").animate({
        scrollTop: 0
    }, 1000);
}

/*Go Menu*/
function GoMenu(system_id, module_id, action_id, action = ''){
    window.location.href = 'index.php?'+GenUrl(system_id, module_id, action_id, action);
}

/*Get Ajax URL*/
function GoAjax(system_id, module_id, action_id, action = ''){
    return 'ajax.php?'+GenUrl(system_id, module_id, action_id, action);
}

/*Generate Param URL*/
function GenUrl(system_id, module_id, action_id, action = ''){
    return 'system_id='+system_id+'&module_id='+module_id+'&action_id='+action_id+'&action='+action;
}

/*Call Dropdown*/
function Dropdown(id) {    
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) { 
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

/*Call Collapse Menu*/
function myCollapse(){
    var x = document.getElementById("collapsed");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

/*Reset Form*/
function Reset(selector){
    $(selector)[0].reset();
    Search();
}

/*Upload File*/
function UploadMyFile(file_type, id, name, preview = false){
    $("#upload-" + id).uploadFile({
        url:"ajax.php?role=uploadfile",
        showDelete: true,
        multiple:false,
        dragDrop:false,
        maxFileCount:1,
        deleteCallback: function (data, pd) {
            $.post("ajax.php?role=deletefile", {op: "delete", name: JSON.parse(data)[0]}, function (resp, textStatus, jqXHR) {
                $('input[name="' + name + '"]').val('');
                //Show Message
                // alert("File Deleted");
            });
            pd.statusbar.hide(); //You choice.
        },
        acceptFiles: file_type,
        fileName:"myfile",
        showPreview: preview,
        previewWidth: "300px",
        onSuccess:function(files){
            $('input[name="' + name + '"]').val(files[0]);
        }
    });
}

/*Upload Coordinate*/
function UploadCoordinate(source_type, id, name, url_param){
    var upar = url_param.split(",");
    var system_id = upar[0];
    var module_id = upar[1];
    var action_id = upar[2];
    
    $("#upload-" + id + "-" + source_type.toLowerCase().trim()).uploadFile({
        url:"ajax.php?role=uploadfile",
        uploadStr:"<i class='fas fa-file-upload'></i> Upload GPS " + source_type,
        showDelete: true,
        multiple:false,
        dragDrop:false,
        maxFileCount:1,
        deleteCallback: function (data, pd) {
            $.post("ajax.php?role=deletefile", {op: "delete", name: JSON.parse(data)[0]}, function (resp, textStatus, jqXHR) {
                $('input[name="' + name + '"]').val('');
            });
            pd.statusbar.hide(); //You choice.
        },
        fileName:"myfile",
        acceptFiles: '.kml',
        onSuccess:function(files){
            $('input[name="' + name + '"]').val(files[0]);
            var params = {};
            params['filename'] = files[0];
            params['source'] = source_type;
            $.post(GoAjax(system_id, module_id, action_id, 'GetCoordinateFromFile'), params, function(reply){
                var coord = [];
                var flightPlanCoordinates = [];
                $.each(reply, function(k, i){
                    /*Konversi Array dari AJAX Reply*/
                    coord.push([Number(i.latitude), Number(i.longitude)]);

                    /*Create Path*/
                    flightPlanCoordinates.push(new google.maps.LatLng(Number(i.latitude), Number(i.longitude)));
                });
                localStorage.setItem('coord', JSON.stringify(coord));
                localStorage.setItem('flightPlanCoordinates', JSON.stringify(flightPlanCoordinates));
                AssignCoordinate(url_param, coord);
            }, "json");
        }
    });
}

/*Load Coordinate*/
function AssignCoordinate(url_param, coord, coordsegment = []){
    var upar = url_param.split(",");
    var system_id = upar[0];
    var module_id = upar[1];
    var action_id = upar[2];
    
    var params = {};
    params['coord'] = coord;
    params['coordsegment'] = coordsegment;
    $.post(GoAjax(system_id, module_id, action_id, 'AssignCoordinate'), params, function(res){
        localStorage.setItem('is_new', 1);
        Search(1);
    }, "html");
}

/*Load Coordinate with Segment*/
function LoadCoordinateWithSegment(url_param){
    var segmentasi = $('#segmentasi').val();
    var coordsegment = [];
    
    var coord = JSON.parse(localStorage.getItem('coord'));
    var flightPlanCoordinates = JSON.parse(localStorage.getItem('flightPlanCoordinates'));

    /*Mendapatkan Koordinate setiap segmentasi m*/
    var flightPath = new google.maps.Polyline({
        path: flightPlanCoordinates
    });

    var i=1;
    segmentasi = (segmentasi > 0) ? segmentasi : 0;

    var length = google.maps.geometry.spherical.computeLength(flightPath.getPath());
    var remainingDist = length;
    
    while (remainingDist > 0)
    {
        var point = flightPath.GetPointAtDistance(segmentasi*i);
        if(point != null){
            coordsegment.push([point.lat(), point.lng()]);
        }
        remainingDist -= segmentasi;
        i++;
    }

    /*Mencari koordinat terdekat dari koordinat segmentasi m*/
    $.each(coordsegment, function(k, i){
        var line = turf.lineString(coord);
        var pt = turf.point(i);
        var snapped = turf.nearestPointOnLine(line, pt);

        coordsegment[k].push(snapped.properties.index);
    });
    
    AssignCoordinate(url_param, coord, coordsegment);
}

/*Menghitung Panjang Path*/
function CountDistance(koordinat){
    var distancePath = [];
    $.each(koordinat, function(i, r){
        var point = r.split(",");
        distancePath.push(new google.maps.LatLng(Number(point[0]), Number(point[1])));
    });

    var distanceRoadPath = new google.maps.Polyline({
       path: distancePath
    });

    var distance = google.maps.geometry.spherical.computeLength(distanceRoadPath.getPath());
    var distance_total = (distance/1000).toFixed(2);
    return distance_total;
}