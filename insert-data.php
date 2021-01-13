<?php

include 'db.php';

$result = file_get_contents('json_files/file_4.json');

$data = json_decode($result);
// echo'<pre>';
// print_r($data);
// die;
foreach ($data as $d) {
    $sql = "INSERT INTO arinow (DateIssue, DateForecast, ReportingArea, StateCode, Latitude, Longitude, ParameterName, AQI, Category, ActionDay, Discussion) VALUES ('" . $d->DateIssue . "', '" . $d->DateForecast . "', '" . $d->ReportingArea . "', '" . $d->StateCode . "', '" . $d->Latitude . "', '" . $d->Longitude . "', '" . $d->ParameterName. "', '" . $d->AQI. "', '" . json_encode($d->Category) . "', '" . $d->ActionDay . "', '" . $d->Discussion . "')";
    if ($conn->query($sql) === true) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
