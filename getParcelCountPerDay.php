<?php
include 'db.php'; 

$sql = "SELECT dates , COUNT(parcel_id) AS count FROM Parcel GROUP BY dates";
$result = $conn->query($sql);

$parcelCounts = [];
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $parcelCounts[] = $row;
    }
    echo json_encode($parcelCounts);
} else {
    echo json_encode([]);
}
$conn->close();
?>
