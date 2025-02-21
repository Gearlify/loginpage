<?php 

include 'connect.php';

if(isset($_POST['signUp'])){
    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

     $checkEmail = $conn->prepare("SELECT * FROM users WHERE email = ?");
     $checkEmail->bind_param("s", $email);
     $checkEmail->execute();
     $result = $checkEmail->get_result();
     if($result->num_rows>0){
        echo "Email Address Already Exists !";
        $insertQuery = $conn->prepare("INSERT INTO users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)");
        $insertQuery->bind_param("ssss", $firstName, $lastName, $email, $password);
        if ($insertQuery->execute() === TRUE) {
                       VALUES ('$firstName','$lastName','$email','$password');
            if($conn->query($insertQuery)==TRUE){
                header("location: index.php");
            }
            else{
                echo "Error:".$conn->error;
            }
     }
   

}

if(isset($_POST['signIn'])){
   $email=$_POST['email'];
   $password=$_POST['password'];
   $sql = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
   $sql->bind_param("ss", $email, $password);
   $sql->execute();
   $result = $sql->get_result();
   $password = md5($password);
   $sql->bind_param("ss", $email, $password);
   $sql->execute();
   $result = $sql->get_result();
   if($result->num_rows>0){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['email']=$row['email'];
    header("Location: homepage.php");
    exit();
   }
   else{
    echo "Not Found, Incorrect Email or Password";
   }

}
?>
