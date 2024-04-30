<?php

    $dates = $_POST['dates'];
    $names = $_POST['names'];
    $room_no = $_POST['room_no'];
    $in_time= $_POST['in_time'];
    $mobile_no = $_POST['mobile_no'];
    $delivery_name = $_POST['delivery_name'];
    $parcel_source = $_POST['parcel_source'];
    $out_time = $_POST['out_time'];
    $remarks = $_POST['remarks'];

    $conn = new mysqli('localhost','root','','Hostel_Security_Desk_Management_System');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO Parcel (dates, names, room_no, in_time, mobile_no, delivery_name, parcel_source, out_time, remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssissssss", $dates, $names, $room_no, $in_time, $mobile_no, $delivery_name, $parcel_source, $out_time, $remarks);
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