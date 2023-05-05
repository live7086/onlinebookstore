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
    $sql5 = "INSERT INTO iphoto (item_id, iphoto_name) VALUES ('$item_id', 'https://verse-static-1.azureedge.net/storage/app/media/uploaded-files/taiwan-textbook01.jpg')";
        if(mysqli_query($link,$sql) && mysqli_query($link,$sql1) && mysqli_query($link,$sql2) && mysqli_query($link,$sql3) && mysqli_query($link,$sql4) && mysqli_query($link,$sql5)

        )
        {
          //echo "新增成功";
        header("Location:index.php");
        }
      else
        {
          header("Location:pinfo.php?message=新增失敗$iloc_name,$item_info,$item_price");
        }
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
	    header("Location:pinfo.php?message=修改完成");
	  }
	else
	  {
	    header("Location:index.php?message=修改失敗");
	  }
  }
  ?>