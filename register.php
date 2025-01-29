<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'db_muscleup');
    if ($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into muscle_up_account(username,email,password)
            values(?, ?, ?)");
        $stmt->bind_param("sss", $username,$email,$password);
        $stmt->execute();
        echo "registration Successfully...";
        header("location: user-page.html");
        $stmt->close();
        $conn->close();
    }
?>