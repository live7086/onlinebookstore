<?php
session_start();
function generateItemId($conn, $item_info) {
    // 定義最大重試次數
    $max_attempts = 10;
    $attempts = 0;

    do {
        // 生成item_id
        $item_id = "ITEM" . sprintf("%05d", rand(10000, 99999));

        // 檢查是否有重複的item_id
        $sql = "SELECT COUNT(*) FROM item_info WHERE item_id='$item_id'";
        $result = mysqli_query($conn, $sql);
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
    $item_id = generateItemId($conn, $item_info);
    $dbaction = $_POST['dbaction'];
    $item_name = $_POST['title'];
    $item_isbn = $_POST['isbn'];
    $item_price = $_POST['price'];
    $item_info = $_POST['info'];
    $itime_1 = $_POST['time-1'];
    $itime_2 = $_POST['time-2'];
    $itime_3 = $_POST['time-3'];
    $link = mysqli_connect('localhost','root','12345678','sa');
    $iloc_name = $_POST['place'];
    $user_id=$_SESSION['user_id'];
  if($dbaction=="insert")
  {
	//這裡是新增的語法
	$sql  = "insert into item_info (item_id, item_name, item_isbn, item_price, user_id, item_info) values ('$item_id', '$item_name', '$item_isbn', '$item_price','$user_id','$item_info')";
    $sql1 = "INSERT INTO itime (item_id, itime_name) VALUES ('$item_id', '$itime_1')";
    $sql2 = "INSERT INTO itime (item_id, itime_name) VALUES ('$item_id', '$itime_2')";
    $sql3 = "INSERT INTO itime (item_id, itime_name) VALUES ('$item_id', '$itime_3')";
    $sql4 = "INSERT INTO iloc (item_id, iloc_name) VALUES ('$item_id', '$iloc_name')";
    $sql5 = "INSERT INTO iphoto (item_id, iphoto_name) VALUES ('$item_id', 'https://dummyimage.com/450x300/dee2e6/6c757d.jpg')";
    if(mysqli_query($link,$sql) && mysqli_query($link,$sql1) && mysqli_query($link,$sql2) && mysqli_query($link,$sql3) && mysqli_query($link,$sql4) && mysqli_query($link,$sql5)

    )
	  {
	    //echo "新增成功";
		header("Location:index.php");
	  }
	else
	  {
	    header("Location:index.php?message=新增失敗$iloc_name,$item_info,$item_price");
	  }
  }
  else
  {
	  //這裡是修改
	$sql  = "UPDATE account set name='$name', phone='$phone', authority='$authority', password='$password' where ID='$ID'";
    if(mysqli_query($link,$sql))
	  {
	    header("Location:message.php?message=修改完成");
	  }
	else
	  {
	    header("Location:message.php?message=修改失敗");
	  }
  }
  ?>