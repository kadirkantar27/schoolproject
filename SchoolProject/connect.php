<?php
    $userName=$_POST['userName'];
    $eMail=$_POST['eMail'];
    $password=$_POST['password'];

    $conn=new mysqli('localhost','root','','users');
    if($conn->connect_error)
    {
        die('connection failed :' . $conn->connect_error);
    }
    else{
        $stmt=$conn->prepare("insert into registration(userName, eMail, password) values(?, ?, ?)");
        $stmt->bind_param("sss", $userName, $eMail, $password);
        $stmt->execute();
        echo "registration succesfully";
        $stmt-> close();
        $conn->close();

    }
?>