<?php
include 'db.php'; 

$sql = "SELECT distinct names , dates FROM Sports_Items WHERE dates IN (SELECT dates FROM Sports_Items GROUP BY dates HAVING COUNT(items) > 1)";

$result = $conn->query($sql);

$students_who_takes_twice_sports_items = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $students_who_takes_twice_sports_items[] = $row;
    }
    echo json_encode($students_who_takes_twice_sports_items);
} else {
    echo json_encode([]);
}
$conn->close();
?>
