<?php
include 'db.php';

$sql = "SELECT dates, COUNT(roll_no) AS Students_in FROM In_Details GROUP BY dates";

$result = $conn->query($sql);

$students_coming = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $students_coming[] = $row;
    }
    echo json_encode($students_coming);
} else {
    echo json_encode([]);
}
$conn->close();
?>
