<?php
            // 引入 PHPMailer 函式庫
            require 'PHPMailer/src/PHPMailer.php';
            require 'PHPMailer/src/SMTP.php';
            require 'PHPMailer/src/Exception.php';
            
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            session_start();
            $router=$_GET['router'];
            $user_email=$_GET['user_email'];

            $link = mysqli_connect('localhost','root','12345678','sa');

    if($router=="register"){
        //用戶資料
        $_SESSION['user_email']=$_GET['user_email'];
        $_SESSION['user_password']=$_GET['user_password'];
        $_SESSION['user_dept']=$_GET['user_dept'];
        $_SESSION['user_phone']=$_GET['user_phone'];
        $_SESSION['user_name']=$_GET['user_name'];
        $_SESSION['user_id']=str_replace("@m365.fju.edu.tw","",$user_email);

        $user_email=$_GET['user_email'];
        $sql="SELECT * FROM account where user_email='$user_email'";
        $result= mysqli_query($link,$sql);
        $row=mysqli_fetch_assoc($result);
        if(!empty($row)){
            
            echo "<script>alert('該帳號已註冊');
            window.location.href = \"index.php\";</script>";
            $_SESSION['user_id']="";


        }else if (strpos($user_email,"@m365.fju.edu.tw")==false){
            echo "<script>alert('請使用輔仁帳號註冊');
            window.location.href = \"register.php\";</script>";
            $_SESSION['user_id']="";
        }
        else{
            $_SESSION['otp']=rand(10000,99999);
            // 創建 PHPMailer 實例
            $mail = new PHPMailer(true);
            
            try {
                // 設置 SMTP 連接參數
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'luzzyyo@gmail.com'; // 替換成您的 Gmail 帳戶
                $mail->Password = 'danmphcwdyikwhru'; // 替換成您的應用程式密碼
            
                // 設置發件人和收件人的電子郵件地址，郵件主題和內容
                $mail->setFrom('luzzyyo@gmail.com', 'Your Name');
                $mail->addAddress(''.$user_email.'', 'Recipient Name');
                $mail->Subject = 'Verification OTP';
                $mail->Body = 'Your OTP is '.$_SESSION['otp'].'';
            
                // 發送郵件
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            
                header("Location:verify.php?user_email=".$user_email);
        }
    }else if($router=="verified"){
        $typeotp=$_GET['typeotp'];
        if($typeotp==$_SESSION['otp']){
                $user_email=$_SESSION['user_email'];
                $user_password=$_SESSION['user_password'];
                $user_dept=$_SESSION['user_dept'];
                $user_phone=$_SESSION['user_phone'];
                $user_name=$_SESSION['user_name'];
                $user_id=$_SESSION['user_id'];
                $sql=" INSERT INTO account (user_id, user_password, user_email, user_dept, user_credit, user_phone, user_turnover, user_name, user_intro) VALUES ('$user_id','$user_password','$user_email','$user_dept',0,'$user_phone',0,'$user_name','0')";
                $result= mysqli_query($link,$sql);
                header("Location:intro.php?");
            }else{
                echo "錯誤";
            }

    }else if($router=="resent"){
        $_SESSION['otp']=rand(10000,99999);
            // 創建 PHPMailer 實例
            $mail = new PHPMailer(true);
            
            try {
                // 設置 SMTP 連接參數
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'luzzyyo@gmail.com'; // 替換成您的 Gmail 帳戶
                $mail->Password = 'danmphcwdyikwhru'; // 替換成您的應用程式密碼
            
                // 設置發件人和收件人的電子郵件地址，郵件主題和內容
                $mail->setFrom('luzzyyo@gmail.com', 'Your Name');
                $mail->addAddress(''.$user_email.'', 'Recipient Name');
                $mail->Subject = 'Verification OTP';
                $mail->Body = 'Your OTP is '.$_SESSION['otp'].'';
            
                // 發送郵件
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            
                header("Location:verify.php?user_email=".$user_email);
        }
    else if($router=="remove"){
        $item_id=$_GET['item_id'];
        
        $sql  = "UPDATE item_info SET statement = 'sold' WHERE item_id = '$item_id' ";
        mysqli_query($link,$sql);

        header("Location:pinfo_1.php");
    }else if($router=="itemupdate"){
        $item_id=$_GET['item_id'];
        echo $item_id;
    }
    else if($router=="intro"){
        $user_intro=$_GET['user_intro'];
        $user_id=$_SESSION['user_id'];
        $sql="update account set user_intro='$user_intro' WHERE user_id='$user_id'";
        $result= mysqli_query($link,$sql);
        header("Location:index.php?user_id=".$user_id."&error=");
    }



?>