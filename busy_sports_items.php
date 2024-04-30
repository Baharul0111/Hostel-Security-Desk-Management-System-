<?php
include 'db.php';

$sql = "SELECT in_time AS Busy_time FROM (SELECT in_time, COUNT(roll_no) AS count_time FROM Sports_Items GROUP BY in_time HAVING count_time =
        (SELECT MAX(count_time) FROM (SELECT COUNT(roll_no) AS count_time FROM Sports_Items GROUP BY in_time) AS max_counts)) AS temp";

$result = $conn->query($sql);

$busy_sports_items = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $busy_sports_items[] = $row;
    }
    echo json_encode($busy_sports_items);
} else {
    echo json_encode([]);
}
$conn->close();
?>
