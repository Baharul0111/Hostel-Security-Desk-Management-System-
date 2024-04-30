<?php

    $dates = $_POST['dates'];
    $names = $_POST['names'];
    $room_no = $_POST['room_no'];
    $mobile_no = $_POST['mobile_no'];
    $roll_no = $_POST['roll_no'];
    $out_time = $_POST['out_time'];
    $leave_days= $_POST['leave_days'];
    $destination= $_POST['destination'];
    $key_submit= $_POST['key_submit'];


    $conn = new mysqli('localhost','root','','Hostel_Security_Desk_Management_System');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO Out_Details (dates, names, room_no, mobile_no, roll_no, out_time, leave_days, destination, key_submit) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisisiss", $dates, $names, $room_no, $mobile_no, $roll_no, $out_time, $leave_days, $destination, $key_submit);
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