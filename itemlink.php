<?php
session_start();
function generateItemId($link, $item_info) {
    // 定義最大重試次數
    $max_attempts = 10;
    $attempts = 0;

    do {
        // 生成item_id
        $item_id = "ITEM" . sprintf("%05d", rand(10000, 99999));

        // 檢查是否有重複的item_id
        $sql = "SELECT COUNT(*) FROM item_info WHERE item_id='$item_id'";
        $result = mysqli_query($link, $sql);
        $count = mysqli_fetch_array($result)[0];

        // 如果沒有重複，則返回item_id
        if ($count == 0) {
            return $item_id;
        }
        // 如果已經生成了最大次數的item_id，則返回false
        $attempts++;
        if ($attempts >= $max_attempts) {
            return false;
        }
    } while (true);
}

// 生成item_id
    $link = mysqli_connect('localhost','root','12345678','sa');
    $item_id = generateItemId($link, $item_info);
    $dbaction = $_POST['dbaction'];
    $item_name = $_POST['title'];
    $item_isbn = $_POST['isbn'];
    $item_price = $_POST['price'];
    $item_info = $_POST['info'];
    $itime_1 = $_POST['time-1'];
    $itime_2 = $_POST['time-2'];
    $itime_3 = $_POST['time-3'];
    $tag_1 = $_POST['tag_1'];
    $tag_2 = $_POST['tag_2'];
    $tag_3 = $_POST['tag_3'];
    $iloc_name = $_POST['place'];
    $user_id=$_SESSION['user_id'];
  if($dbaction=="insert")
  {
	//這裡是新增的語法
	$sql  = "INSERT into item_info (item_id, item_name, item_isbn, item_price, user_id, item_info) values ('$item_id', '$item_name', '$item_isbn', '$item_price','$user_id','$item_info')";
    $sql1 = "INSERT INTO itime (item_id, itime_name) VALUES ('$item_id', '$itime_1')";
    $sql2 = "INSERT INTO itime (item_id, itime_name) VALUES ('$item_id', '$itime_2')";
    $sql3 = "INSERT INTO itime (item_id, itime_name) VALUES ('$item_id', '$itime_3')";
    $sql4 = "INSERT INTO iloc (item_id, iloc_name) VALUES ('$item_id', '$iloc_name')";
    
    $sql6 = "INSERT INTO tag (item_id, tag_name) VALUES ('$item_id', '$tag_1')";
    $sql7 = "INSERT INTO tag (item_id, tag_name) VALUES ('$item_id', '$tag_2')";
    $sql8 = "INSERT INTO tag (item_id, tag_name) VALUES ('$item_id', '$tag_3')";
        if(mysqli_query($link,$sql) && mysqli_query($link,$sql1) && mysqli_query($link,$sql2) && mysqli_query($link,$sql3) && mysqli_query($link,$sql4) && mysqli_query($link,$sql6) && mysqli_query($link,$sql7) && mysqli_query($link,$sql8)

        )
        {
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 獲取上傳文件的數量
            $count = count($_FILES['images']['name']);
          
            // 循環處理每個上傳的文件
            for ($i = 0; $i < $count; $i++) {
              $name = $_FILES['images']['name'][$i];
              $type = $_FILES['images']['type'][$i];
              $tmp_name = $_FILES['images']['tmp_name'][$i];
              $error = $_FILES['images']['error'][$i];
              $size = $_FILES['images']['size'][$i];
          
              // 檢查是否有上傳錯誤
              if ($error !== UPLOAD_ERR_OK) {
                echo "Error uploading file $name: $error";
                continue;
              }
          
              // 檢查文件類型是否合法
              if (!in_array($type, ['image/gif', 'image/jpeg', 'image/png'])) {
                echo "Invalid file type for file $name: $type";
                continue;
              }
          
              // 將文件保存到目標路徑
              $name = $item_id."_".$i.".jpg";
              $destination = "C:\\AppServ\\www\\onlinebookstore\\imageUpload\\$name";
              $sql5 = "INSERT INTO iphoto (item_id, iphoto_name) VALUES ('$item_id', '$name')";
              mysqli_query($link,$sql5);
              move_uploaded_file($tmp_name, $destination);
            }
            chmod("C:\\AppServ\\www\\onlinebookstore\\imageUpload\\", 0755);
            
          }
          //echo "新增成功";
        header("Location:index.php");
        }
      else
        {
          header("Location:pinfo_1.php?message=新增失敗$iloc_name,$item_info,$item_price");
        }
  }
  else if($dbaction=="user_update"){
    $user_name= $_POST['user_name'];
    $user_dept= $_POST['user_dept'];
    $user_phone= $_POST['user_phone'];
    $user_email= $_POST['user_email'];
    $user_intro= $_POST['user_intro'];
    $sql  = "UPDATE account SET user_name='$user_name', user_dept='$user_dept', user_phone='$user_phone', user_email='$user_email' , user_intro='$user_intro' where user_id='$user_id'";
    if(mysqli_query($link,$sql)){
      header("Location:pinfo_1.php");
    };
}
  else
  {
  $item_id = $_POST['item_id'];
  $link = mysqli_connect('localhost','root','12345678','sa');
	  //這裡是修改
	$sql  = "UPDATE item_info SET item_name='$item_name', item_isbn='$item_isbn', item_price='$item_price', item_info='$item_info' where item_id='$item_id'";
  $sql7 = "SELECT * FROM itime WHERE item_id='$item_id'";
  $result2 = mysqli_query($link, $sql7);
  $count=1;

    //之後記得要改成跟著資料庫的筆數跑

    

  while($row2 = mysqli_fetch_assoc($result2)){
  $postitime = $_POST['time-'.$count.''];
  $sql1 = "UPDATE itime SET  itime_name='$postitime' where item_id='$item_id' AND itime_id=".$row2['itime_id']."";
  mysqli_query($link,$sql1);
  $count=$count+1;
  
  }
  $sql4 = "UPDATE iloc  SET  iloc_name='$iloc_name' where item_id='$item_id'";
    if(mysqli_query($link,$sql) && mysqli_query($link,$sql4))
	  {
	    header("Location:pinfo_1.php?message=修改完成");
	  }
	else
	  {
	    header("Location:index.php?message=修改失敗");
	  }
  }
  ?>