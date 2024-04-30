<?php

    $dates = $_POST['dates'];
    $names = $_POST['names'];
    $roll_no = $_POST['roll_no'];
    $room_no = $_POST['room_no'];
    $in_time= $_POST['in_time'];
    $mobile_no = $_POST['mobile_no'];
    $items= $_POST['items'];

    $conn = new mysqli('localhost','root','','Hostel_Security_Desk_Management_System');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO Sports_Items (dates, names, room_no, mobile_no, roll_no, items, in_time) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisiss", $dates, $names, $room_no, $mobile_no, $roll_no, $items, $in_time);
        $execval = $stmt->execute();
        if(!$execval){
            echo "Error: " . $conn->error;
        } else {
            echo "Registration successful...";
        }
        $stmt->close();
        $conn->close();
    }
?>