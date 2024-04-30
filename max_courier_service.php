<?php
include 'db.php';

$sql = "SELECT parcel_source AS Max_Courier_Service FROM Parcel GROUP BY parcel_source HAVING COUNT(*) = 
(SELECT MAX(parcel_count) FROM (SELECT COUNT(*) AS parcel_count FROM Parcel GROUP BY parcel_source) AS temp)";

$result = $conn->query($sql);

$max_courier_service = [];
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $max_courier_service[] = $row;
    }
    echo json_encode($max_courier_service);
} else {
    echo json_encode([]);
}
$conn->close();
?>
