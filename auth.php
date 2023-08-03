<?php
	$host = "localhost"; 
	$user = "buycodec_root";
	$password = "Robinson2006";
	$database = "buycodec_buycode";
$conn = mysqli_connect($host,$user,$password,$database);

if(isset($_POST['type'])){
    if($_POST['type'] == "register"){
        $username = str_replace(' ','',$_POST['username']);
        $passcode = $_POST['passcode'];
        $checkusersql = mysqli_query($conn,"SELECT * FROM users where username='$username'");
        $available = mysqli_num_rows($checkusersql);
        if($available == 0){
            $sql = "INSERT into `users` (username, passcode) VALUES ('$username', '$passcode ')";

            mysqli_query($conn,$sql);
            $_SESSION['username'] = $username;
            $_SESSION['logged'] = true;
            setcookie('user', $username, time() + (86400 * 30), "/"); 
            echo 1;
        }else{
            echo 2;
        }
       
        
    }elseif($_POST['type'] == "login"){
        $username = str_replace(' ','',$_POST['username']);
        $passcode = $_POST['passcode'];
        $checkusersql = mysqli_query($conn,"SELECT * FROM users where username='$username' and passcode='$passcode'");
        $available = mysqli_num_rows($checkusersql);
        if($available == 1){
            $_SESSION['username'] = $username;
            $_SESSION['logged'] = true;
            setcookie('user', $username, time() + (86400 * 30), "/"); 
            echo 1;
        }else{
            echo 2;
        }
           }elseif($_POST['type'] == "message"){
            $message = ($_POST['message']);
            $user = $_POST['user'];
            $receiver = $_POST['receiver'];
             
                $sql = "INSERT into `messages` (message, sender,receiver) VALUES ('$message', '$user', '$receiver')";
    
                if(mysqli_query($conn,$sql)){
                
                echo 1;
            }else{
                echo 2;
            }
           
            
        }
}

?>