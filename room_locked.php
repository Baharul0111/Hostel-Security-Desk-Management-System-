<?php
include 'db.php';

$sql = "SELECT DISTINCT Out_Details.room_no FROM Out_Details LEFT JOIN In_Details  ON Out_Details.roll_no = In_Details.roll_no
        WHERE In_Details.roll_no IS NULL AND Out_Details.key_submit = 'y' ";

$result = $conn->query($sql);

$room_locked = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $room_locked[] = $row;
    }
    echo json_encode($room_locked);
} else {
    echo json_encode([]);
}
$conn->close();
?>
