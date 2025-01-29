<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];

    $con = new mysqli("localhost","root", "", "db_muscleup");
    if($con->connect_error){
        exit("Failed to conect : " .$con->connect_error);
    }else{
        $stmt = $con->prepare("select * from muscle_up_account where username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result-> num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password){
                echo header('location:user-page.html');
            }else{
                echo  "<h2>Invalid Username or Password</h2>";
            }
        }else{
            echo  "<h2>Invalid Username or Password</h2>";
        }
        
    }if(isset($_SESSION["username"])){
        header("index.html");
    }
?>