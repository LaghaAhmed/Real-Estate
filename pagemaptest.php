<!DOCTYPE html>
<html>
<?php include_once("inc/connexion.php"); 
$req = "SELECT * FROM `villes` WHERE `id`=10";
        $data = mysql_query($req) or die('Erreur SQL !<br />'.$req.'<br />'.mysql_error());
?>
  <head>
    <title>test</title>
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        height: 400px;
        width:480px;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
function initialize() {
    var mapOptions = {
      scaleControl: true,
      center: new google.maps.LatLng(46, 5),
      zoom: 10
    };
var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
<?php    

  while($row = mysql_fetch_array($data))

    { $lat=$row['latitude'];$lng=$row['longitude'];$id=$row['id'] ?>

              var myLatLng = new google.maps.LatLng(<?php echo $lat;?>,<?php echo $lng;?>);
              
              var marker = new google.maps.Marker(
              {
                map: map,
                position: myLatLng,
                title:'test',
                clickable:true,
                link:'https://www.google.fr/',
                draggable:true
              });
    <?php } ?>
alert(marker.getPosition());  
function getpos() {
alert(marker.getPosition());  
}
}

google.maps.event.addDomListener(window, 'load', initialize);





    </script>
  </head>
  <body>
    <div id="map-canvas" style='float:left'></div>
    <input type="button" onclick='initialize().getpos()' value='get'>
  </body>
</html>