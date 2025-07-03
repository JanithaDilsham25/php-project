<?php
    session_start();
    include "../connection.php";

    function validate($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    if (isset($_POST['email']) && isset($_POST['pass'])){
        $email = validate($_POST['email']);
        $password = validate($_POST['pass']);

        if(empty($email)){
            header("Location: login.php?error=Username is required");
            exit();
        } else if(empty($password)){
            header("Location: login.php?error=Password is required");
            exit();
        }

        $stmt = $conn->prepare("SELECT email, password FROM users WHERE email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 1){
            $row = $result->fetch_assoc();

            if(password_verify($password,$row['password'])){
                $_SESSION['email'] = $row['email'];
                header("Location: ../index.php?success=Login Successful");
                exit();
            }else{
                header("Location: login.php?error=Incorrect Email or Password");
                exit();
            }
        }else{
            header("Location: login.php?error=Incorrect Email or Password");
            exit();
        }
    }else{
        header("Location: login.php?error=Please Enter Email and Password");
        exit();
    }
?>