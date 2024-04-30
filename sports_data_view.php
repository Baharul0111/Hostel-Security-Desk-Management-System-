<?php
include 'db.php';

$sql = "SELECT * FROM Sports_Items ORDER BY dates DESC";

$result = $conn->query($sql);

$sports_data_view = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $sports_data_view[] = $row;
    }
    echo json_encode($sports_data_view);
} else {
    echo json_encode([]);
}
$conn->close();
?>
