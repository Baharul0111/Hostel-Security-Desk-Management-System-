<?php

    $dates = $_POST['dates'];
    $names = $_POST['names'];
    $roll_no = $_POST['roll_no'];
    $room_no = $_POST['room_no'];
    $dept = $_POST['dept'];
    $in_time= $_POST['in_time'];
    $mobile_no = $_POST['mobile_no'];
    $key_recieved= $_POST['key_recieved'];


    $conn = new mysqli('localhost','root','','Hostel_Security_Desk_Management_System');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO In_Details (dates, names, roll_no, room_no, dept, in_time, mobile_no, key_recieved) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiissss", $dates, $names, $roll_no, $room_no, $dept, $in_time, $mobile_no, $key_recieved);
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