<?php
include 'db.php';

$sql = "SELECT distinct names, roll_no FROM Out_Details WHERE roll_no IN (SELECT roll_no FROM 
        (SELECT roll_no, COUNT(roll_no) AS count_students FROM Out_Details 
        WHERE dates BETWEEN '2024-04-01' AND '2024-04-30'GROUP BY roll_no) AS temp WHERE count_students > 1)";

$result = $conn->query($sql);

$student_moved_more_than_one_time_a_month = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $student_moved_more_than_one_time_a_month[] = $row;
    }
    echo json_encode($student_moved_more_than_one_time_a_month);
} else {
    echo json_encode([]);
}
$conn->close();
?>
