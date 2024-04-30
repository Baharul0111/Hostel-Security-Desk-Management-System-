<?php
include 'db.php';

$sql = "SELECT * FROM Out_Details ORDER BY dates DESC";

$result = $conn->query($sql);

$out_details_data_view = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $out_details_data_view[] = $row;
    }
    echo json_encode($out_details_data_view);
} else {
    echo json_encode([]);
}
$conn->close();
?>
