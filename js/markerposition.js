

function initialize() {
  var latLng = new google.maps.LatLng(46.819558518229776, 2.7625302734375055);
  var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 6,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var marker = new google.maps.Marker({
    position: latLng,
    title: 'Point A',
    map: map,
    draggable: true
  });


}

// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);