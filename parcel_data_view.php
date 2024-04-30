<?php
include 'db.php';

$sql = "SELECT * FROM Parcel ORDER BY dates DESC";

$result = $conn->query($sql);

$parcel_data_view = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $parcel_data_view[] = $row;
    }
    echo json_encode($parcel_data_view);
} else {
    echo json_encode([]);
}
$conn->close();
?>
