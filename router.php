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
        


    }else{
            $_SESSION['otp']=rand(10000,99999);
            // 創建 PHPMailer 實例
            $mail = new PHPMailer(true);
            
            try {
                // 設置 SMTP 連接參數
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'luzzyyo@gmail.com'; // 替換成您的 Gmail 帳戶
                $mail->Password = 'xwhkuamjkdaeoitx'; // 替換成您的應用程式密碼
            
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
                header("Location:index.php?user_id=".$user_id."&error=");
            }else{
                echo "錯誤";
            }

    }else if($router=="remove"){
        $item_id=$_GET['item_id'];
        //依序進行刪除
        $sqllocation="DELETE FROM iloc WHERE item_id='".$item_id."'";
        $sqltime="DELETE FROM itime WHERE item_id='".$item_id."'";
        $sqlphoto="DELETE FROM iphoto WHERE item_id='".$item_id."'";
        $sqlinfo="DELETE FROM item_info WHERE item_id='".$item_id."'";
        $result=mysqli_query($link,$sqllocation);
        $result=mysqli_query($link,$sqltime);
        $result=mysqli_query($link,$sqlphoto);
        $result=mysqli_query($link,$sqlinfo);
        header("Location:pinfo.php");
    }   



?>