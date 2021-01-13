<?php

include 'db.php';

// init empty array
$arr = [];

$sql_level = "SELECT * FROM us_zip_code";

$result = $conn->query($sql_level);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        $trim_zip_code = trim($row['zip'],'"');

        $url = "https://www.airnowapi.org/aq/forecast/zipCode/?format=application/json&zipCode='".$trim_zip_code."'&date=2021-01-05&distance=25&API_KEY=A7A6F352-ED87-48BC-AD2F-546405519B47";

        //Initiate curl
        $ch = curl_init();

        //Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //Set the url
        curl_setopt($ch, CURLOPT_URL, $url);

        //Execute
        $output = curl_exec($ch);

        // Closing
        curl_close($ch);

        // Will dump a beauty json :3
        $data = json_decode($output, true);

        echo '<pre>';
        print_r($data);
    }
}
die;

echo json_encode($arr);
