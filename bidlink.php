<?php

session_start();
function generateItemId($conn, $item_info) {
    // 定義最大重試次數
    $max_attempts = 10;
    $attempts = 0;

    do {
        // 生成item_id
        $bid_id = "BID" . sprintf("%05d", rand(10000, 99999));
        $link = mysqli_connect('localhost','root','12345678','sa');
        // 檢查是否有重複的item_id
        $sql = "SELECT COUNT(*) FROM bid_info WHERE bid_id='$bid_id'";
        $result = mysqli_query($link, $sql);
        $count = mysqli_fetch_array($result)[0];

        // 如果沒有重複，則返回item_id
        if ($count == 0) {
            return $bid_id;
        }
        // 如果已經生成了最大次數的item_id，則返回false
        $attempts++;
        if ($attempts >= $max_attempts) {
            return false;
        }
    } while (true);
}   

    $link = mysqli_connect('localhost','root','12345678','sa');
    $bid_id = generateItemId($link, $bid_info);
    $item_id = $_POST['item_id'];
    $bid_price = $_POST['price'];
    $bid_price = preg_replace('/\D/', '', $bid_price);
    $user_id=$_SESSION['user_id'];
    $btime_1=$_POST['time_1'];
    $btime_2=$_POST['time_2'];
    $btime_3=$_POST['time_3'];
    echo $btime_1,$btime_2,$btime_3, $bid_price, $user_id, $item_id, $bid_id;
	//這裡是新增的語法
    $sql  = "insert into bid_info (item_id, bid_id, bid_price, user_id) values ('$item_id', '$bid_id', '$bid_price','$user_id')";
    if (!empty($btime_1)) {
        $sql1 = "INSERT INTO btime (bid_id, btime_name) VALUES ('$bid_id', '$btime_1')";
        // 執行 $sql1
    }
    if (!empty($btime_2)) {
        $sql1 = "INSERT INTO btime (bid_id, btime_name) VALUES ('$bid_id', '$btime_2')";
        // 執行 $sql1
      }
      if (!empty($btime_3)) {
        $sql1 = "INSERT INTO btime (bid_id, btime_name) VALUES ('$bid_id', '$btime_3')";
        // 執行 $sql1
      }
    if(mysqli_query($link,$sql) && mysqli_query($link,$sql1) && mysqli_query($link,$sql2) && mysqli_query($link,$sql3))
	  {
	    //echo "新增成功";
		header("Location:index.php");
	  }
	else
	  {
	    header("Location:index.php?message=新增失敗$btime_1,$btime_2,$btime_3, $bid_price, $user_id, $item_id");
	  }
      ?>