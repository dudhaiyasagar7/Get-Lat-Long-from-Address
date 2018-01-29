var map;
var geocoder;

function loadMap(){
	var anand = {lat: 22.564518, lng: 72.928871};
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: anand
    });

    // var marker = new google.maps.Marker({
    //   position: anand,
    //   map: map
    // });

    var blankData = JSON.parse(document.getElementById('blank').innerHTML);
    geocoder = new google.maps.Geocoder();
    codeAddress(blankData);


    var allData = JSON.parse(document.getElementById('all').innerHTML);
    showAllLocations(allData);
}

function showAllLocations(allData){
	var markerImg = "D:/xampp/htdocs/geo/img/main.png";

	Array.prototype.forEach.call(allData, function(data){
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(data.lat, data.lng),
			map: map,
			iconImage: 'img/map-marker-32x32.png',
			content: '<?php echo ' + data.name + '; ?>'
		});
    });
}

function codeAddress(blankData) {
	Array.prototype.forEach.call(blankData, function(data){
    	var address = data.name + ' ' + data.address;

    	geocoder.geocode( { 'address': address}, function(results, status) {
		  if (status == 'OK') {
		    map.setCenter(results[0].geometry.location);

		    var points = {};
		    points.id = data.id;
		    points.lat = map.getCenter().lat();
		    points.lng = map.getCenter().lng();

		    updateBlankLocations(points);

		  } else {
		    alert('Geocode was not successful for the following reason: ' + status);
		  }
		});
    });
}

function updateBlankLocations(points){
	$.ajax({
	    url: "action.php",
	    method: "POST",
	    data: points,
	    success: function(response){
	        console.log(response);
	    }
	});
}