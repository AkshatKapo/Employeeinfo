
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
 <h1>Find the latitude and longitude of your location</h1>
<form action="" method="get">
    <input type="text"name="location">
    <input type="submit" value="Get Geocode!">


</form>
<br>
</body>
</html>
<?php
if(!empty($_GET['location'])){
    $opts=array('http'=>array('header'=>"User-Agent:StevesCleverAddressScript 3.7.6\r\n"));
    $context=stream_context_create($opts);
    $location=$_GET['location'];
    $maps_url='https://'.
        'nominatim.openstreetmap.org/'.
        'search?q='.urlencode($location).
        '&format=json&limit=1';
    $maps_json=file_get_contents($maps_url,false,$context);
    $maps_array=json_decode($maps_json,true);
    $lat=$maps_array[0]['lat'];
    $lng=$maps_array[0]['lon'];
    $address=$maps_array[0]['display_name'];
    $typ=$maps_array[0]['type'];
    $clas=$maps_array[0]['class'];
    if(!empty($_GET['location'])){
        echo "latitude:" .$lat."<br>";
        echo "longitude:" .$lng."<br>";
        echo "Class:" .$clas."<br>";
        echo "Type:" .$typ."<br>";

        echo "Address:".$address;

    }

}
