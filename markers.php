<?php 

include('db.php');

// init empty array
$arr = [];

$sql_level = "SELECT * FROM arinow";

$result = $conn->query($sql_level);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $arr[] = array(
            'lat' => $row['Latitude'],
            'lng' => $row['Longitude'],
            'DateIssue' => $row['DateIssue'],
            'DateForecast' => $row['DateForecast'],
            'ReportingArea' => $row['ReportingArea'],
            'StateCode' => $row['StateCode'],
            'ParameterName' => $row['ParameterName'],
            'AQI' => $row['AQI'],
        );
    }
}

echo json_encode($arr);