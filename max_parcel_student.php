<?php
include 'db.php'; 

$sql = "SELECT distinct names, mobile_no FROM Parcel WHERE names IN (SELECT names FROM Parcel GROUP BY names HAVING COUNT(names) = (
        SELECT MAX(name_count) FROM (SELECT COUNT(names) AS name_count FROM Parcel GROUP BY names) AS temp))";

$result = $conn->query($sql);

$max_parcel_student = [];
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $max_parcel_student[] = $row;
    }
    echo json_encode($max_parcel_student);
} else {
    echo json_encode([]);
}
$conn->close();
?>
