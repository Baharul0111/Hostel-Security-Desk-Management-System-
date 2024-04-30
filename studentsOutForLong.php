<?php
include 'db.php';

$sql = "SELECT names, leave_days, dates as Date_of_Leave from Out_Details where leave_days>10";

$result = $conn->query($sql);

$studentsOutLong = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $studentsOutLong[] = $row;
    }
    echo json_encode($studentsOutLong);
} else {
    echo json_encode([]);
}
$conn->close();
?>
