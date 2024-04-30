<?php
include 'db.php';

$sql = "SELECT distinct items FROM Sports_Items WHERE items IN (SELECT items FROM Sports_Items GROUP BY items HAVING COUNT(items)=
    (SELECT MIN(item_count) FROM (SELECT COUNT(items) AS item_count FROM Sports_Items GROUP BY items) AS temp))";

$result = $conn->query($sql);

$studentsSportsFrequent = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $studentsSportsFrequent[] = $row;
    }
    echo json_encode($studentsSportsFrequent);
} else {
    echo json_encode([]);
}
$conn->close();
?>
