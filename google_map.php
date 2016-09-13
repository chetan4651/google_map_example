<!DOCTYPE html>
<html>
<head></head>
<body>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript">
        window.onload = function () {
            var mapOptions = {
                center: new google.maps.LatLng(18.5073985, 73.80765040000006),
                zoom: 12,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();

            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            var allMarkers = [];
			var allcircles = [];

            var parent_marker = new google.maps.Marker({
                position: new google.maps.LatLng(18.5073985,73.80765040000006),
                map: map,
                title: "Parent"
            });


                parent_marker.setMap(map);

 // put circle around marker 
            var parent_circle = new google.maps.Circle({
                    map: map,
                  radius: 5000,    // 20 KM in metres
                  strokeColor: '#FF0000',
                  strokeOpacity: 0.8,
                  strokeWeight: 2,
                  fillColor: '#FF0000',
                  title: "parent_circle",
                  fillOpacity: 0.35,
                  clickable:true,
            });

            parent_circle.bindTo('center', parent_marker, 'position');


    //  click event for map
            //google.maps.event.addListener(parent_circle, 'click', function (e) {

    //  click event for circle
            google.maps.event.addListener(parent_circle, 'click', function (e) {
                //alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());

                var msg = "Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng();

                //console.log(msg);

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng( e.latLng.lat(),e.latLng.lng()),
                    map: map,
                    title: msg
                });

                marker.setMap(map);

 // put circle around marker 
                var circle = new google.maps.Circle({
				  map: map,
				  radius: 2000,    // 20 KM in metres
				  strokeColor: 'green',
			      strokeOpacity: 0.8,
			      strokeWeight: 2,
			      fillColor: 'green',
                  title: "sub",
			      fillOpacity: 0.35,
				});

				circle.bindTo('center', marker, 'position');

				allcircles.push(circle);

// remove previous marker
                allMarkers.push(marker);
                //alert(allMarkers.length);

                if(allMarkers.length > 1)
                {
	                for(i=0; i<(allMarkers.length-1); i++){
				        allMarkers[i].setMap(null);
				    }
				}


// remove previous circles around markers
				if(allcircles.length > 1)
                {
	                for(i=0; i<(allcircles.length-1); i++){
				        allcircles[i].setMap(null);
				    }
				}
            });
        }
    </script>
    <div id="dvMap" style="width: 500px; height: 500px">
    </div>
</body>
</html>


