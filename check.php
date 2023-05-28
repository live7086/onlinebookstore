<?php
        session_start();
        $check=$_GET['check'];
        $user_email=$_GET['user_email'];
        $user_password=$_GET['user_password'];
        $link = mysqli_connect('localhost','root','12345678','sa');
        if($check=="login"){
        $sql="SELECT * FROM account where user_email='$user_email' and user_password='$user_password'";
        $result= mysqli_query($link,$sql);
            if($row=mysqli_fetch_assoc($result)){
                $_SESSION['user_id']=$row['user_id'];
                $_SESSION['test'] = $row['user_id'];
                header("Location:index.php?error=");
            }else{
                header("Location:login.php?error=error");
            }
        }else if($check=="verify"){
            
        }   
    ?>